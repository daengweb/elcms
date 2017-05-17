<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Kategori;
use App\Kategori_post;
use App\Tag_post;
use App\Tag;
use DB;
use Auth;

class PostController extends Controller
{
    public function index()
    {	
    	$post = Post::orderBy('created_at', 'DESC')->with('kategori')->paginate(10);
    	return view('adminTheme-v1.post.index', compact('post'));
    }

    public function tambah()
    {
    	$kategori = Kategori::orderBy('nama_kategori', 'ASC')->get();
    	return view('adminTheme-v1.post.tambah', compact('kategori'));
    }

    public function simpan(Request $request)
    {
    	$this->validate($request, [
    		'judul'	=> 'required|max:191',
    		'gambar'	=> 'required',
    		'kategori_id'	=> 'required',
    		'is_publish'	=> 'required|numeric'
    	]);

    	if (Post::where('slug', str_slug($request->judul))->get()->count() > 0) {
    		return redirect()->back()->with(['error' => 'Artikel sudah ada']);
    	} else {
    		DB::beginTransaction();
    		try {
    			$post = Post::create([
    				'judul'	=> $request->judul,
    				'slug'	=> str_slug($request->judul),
    				'isi'	=> $request->isi,
    				'gambar'	=> $request->gambar,
    				'meta_keyword'	=> $request->meta_keyword,
    				'meta_description'	=> $request->meta_description,
    				'is_publish'	=> $request->is_publish == 1 ? true:false,
    				'dilihat'	=> 0,
                    'user_id'   => Auth::user()->id
    			]);

    			foreach ($request->kategori_id as $kategori) {
    				$kategori_post = Kategori_post::create([
    					'kategori_id'	=> $kategori,
    					'post_id'	=> $post->id
    				]);
    			}

                if ($request->tag != NULL || $request->tag != '') {
                    $explodeTag = explode(', ', $request->tag);
                    foreach ($explodeTag as $tags) {
                        if (Tag::where('slug', str_slug($tags))->get()->count() > 0) {
                            $tag = Tag::where('slug', str_slug($tags))->first();
                        } else {
                            $tag = Tag::create([
                                'nama_tag'  => $tags,
                                'slug'  => str_slug($tags)
                            ]);
                        }
                        $tag_post = Tag_post::create([
                            'tag_id'    => $tag->id,
                            'post_id'   => $post->id
                        ]);
                    }
                }
    			$success = true;
    		} catch (\Exception $e) {
    			DB::rollback();
    			$success = false;
    			return $e->getMessage();
    		}
    		DB::commit();

    		if ($success) {
    			return redirect(route('post'))->with(['success' => '<strong>' . $post->judul . '</strong> Disimpan!']);
    		}
    	}
    }

    public function edit($slug)
    {
    	$post = Post::where('slug', $slug)->first();
    	$kategori = Kategori::orderBy('nama_kategori', 'ASC')->get();

        if (count($post->tag) > 0) {
            foreach ($post->tag as $tags) {
                $dataTag[] = $tags->nama_tag;
            } 
            $implodeTag = implode(', ', $dataTag);
        } else {
            $implodeTag = '';
        }
        
    	return view('adminTheme-v1.post.edit', compact('post', 'kategori', 'post_kategori', 'implodeTag'));
    }

    public function update(Request $request, $slug)
    {
    	$this->validate($request, [
    		'judul'	=> 'required|max:191',
    		'gambar'	=> 'required',
    		'is_publish'	=> 'required|numeric'
    	]);

        DB::beginTransaction();
        try {
            $post = Post::where('slug', $slug)->first();
            $post->update([
            	'judul'	=> $request->judul,
            	'isi' => $request->isi,
            	'gambar'	=> $request->gambar,
            	'meta_keyword'	=> $request->meta_keyword,
            	'meta_description'	=> $request->meta_description,
            	'is_publish'	=> $request->is_publish
            ]);

            if (count($request->kategori_id) > 0) {
                Kategori_post::where('post_id', $post->id)->delete();
                foreach ($request->kategori_id as $kategori) {
                    $kategori_post = Kategori_post::create([
                        'kategori_id'   => $kategori,
                        'post_id'   => $post->id
                    ]);
                }
            } 

            Tag_post::where('post_id', $post->id)->delete();
            if ($request->tag != NULL || $request->tag != '') {
                $explodeTag = explode(', ', $request->tag);
                foreach ($explodeTag as $tags) {
                    if (Tag::where('slug', str_slug($tags))->get()->count() > 0) {
                        $tag = Tag::where('slug', str_slug($tags))->first();
                    } else {
                        $tag = Tag::create([
                            'nama_tag'  => $tags,
                            'slug'  => str_slug($tags)
                        ]);
                    }
                    $tag_post = Tag_post::create([
                        'tag_id'    => $tag->id,
                        'post_id'   => $post->id
                    ]);
                }
            }
            $success = true;
        } catch (\Exception $e) {
            DB::rollback();
            $success = false;
            return $e->getMessage();
        }
        DB::commit();

        if ($success) {
            return redirect(route('post'))->with(['success' => '<strong>' . $post->judul . '</strong> Diperbaharui']);
        }
    }

    public function hapus(Request $request)
    {
    	$this->validate($request, [
    		'action'	=> 'required'
    	]);

    	$id = $request->hapus_post;
    	if (count($id) > 0 && $request->action == 'y') {
    		foreach ($id as $ids) {
    			Post::find($ids)->delete();
    		}
    		return redirect(route('post'))->with(['success' => 'Postingan yang dipilih telah dihapus']);
    	} elseif ($request->action == '' || $request->action == NULL) {
    		return redirect(route('post'))->with(['error_action' => 'Aksi belum dipilih']);
    	} else {
    		return redirect(route('post'))->with(['error_action' => 'Tidak ada postingan yang dipilih']);
    	}
    }
}
