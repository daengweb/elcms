<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use App\Kategori;
use App\Tag;
use App\Setting;

class FrontController extends Controller
{
    public function index()
    {
        $setting = Setting::first();
    	$post = Post::where('is_publish', 1)->orderBy('created_at', 'DESC')->paginate($setting->blog_show_item);
    	return view('front.material.index', compact('post'));
    }

    public function kategori($slug)
    {
    	$post = Kategori::where('slug', $slug)->first()->post()->where('is_publish', 1)->paginate(10);
    	$kategori = Kategori::where('slug', $slug)->first();
    	return view('front.material.kategori', compact('post', 'kategori'));
    }

    public function showPost($slug)
    {
    	$post = Post::where('slug', $slug)->first();
    	$post->update(['dilihat' => $post->dilihat+1]);
    	$artikel = Post::where('slug', '!=', $slug)->where('is_publish', 1)->orderBy('created_at', 'DESC')->take(3)->skip(0)->get();
    	return view('front.material.show_post', compact('post', 'artikel'));
    }

    public function tag($slug)
    {
        $post = Tag::where('slug', $slug)->first()->post()->where('is_publish', 1)->paginate(10);
        $tag = Tag::where('slug', $slug)->first();
        return view('front.material.tag', compact('post', 'tag'));
    }

    public function cari(Request $request)
    {
        $post = Post::search($request->q)->paginate(10);
        $q = $request->q;
        return view('front.material.cari', compact('post', 'q'));
    }

    public function tentang()
    {
        return view('front.material.tentang');
    }

    public function sitemap()
    {
        $post = Post::where('is_publish', 1)->orderBy('created_at', 'DESC')->first();
        $kategori = Kategori::orderBy('created_at', 'DESC')->first();
        return response()->view('front.material.sitemap.index', [
            'post' => $post,
            'kategori' => $kategori,
        ])->header('Content-Type', 'text/xml');
    }

    public function sitemapPost()
    {
        $posts = Post::where('is_publish', 1)->orderBy('created_at', 'DESC')->get();
        return response()->view('front.material.sitemap.posts', [
            'posts' => $posts,
        ])->header('Content-Type', 'text/xml');
    }

    public function sitemapKategori()
    {
        $kategori = Kategori::orderBy('created_at', 'DESC')->get();
        return response()->view('front.material.sitemap.kategori', [
            'categories' => $kategori,
        ])->header('Content-Type', 'text/xml');
    }
}