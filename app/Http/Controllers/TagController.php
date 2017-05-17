<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;

class TagController extends Controller
{
    public function index()
    {
    	$tag = Tag::orderBy('created_at', 'DESC')->paginate(10);
    	return view('adminTheme-v1.tag.index', compact('tag'));
    }

    public function save(Request $request)
    {
    	$this->validate($request, [
    		'nama_tag'	=> 'required|max:191'
    	]);

    	if (Tag::where('slug', str_slug($request->nama_tag))->get()->count() > 0) {
    		return redirect()->back()->with(['error' => '<strong>' . $request->nama_tag . '</strong> Sudah ada!']);
    	} else {
    		$tag = Tag::create([
    			'nama_tag'	=> $request->nama_tag,
    			'slug'	=> str_slug($request->nama_tag),
    			'deskripsi'	=> $request->deskripsi
    		]);

    		return redirect(route('tag'))->with(['success' => '<strong>' . $tag->nama_tag . '</strong> Telah dibuat']);
    	}
    }

    public function edit($slug)
    {
    	//
    }

    public function hapus(Request $request)
    {
    	//
    }
}
