<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kategori;

class KategoriController extends Controller
{
    public function index()
    {
    	$kategori = Kategori::orderBy('created_at', 'DESC')->paginate(10);
    	return view('adminTheme-v1.kategori.index', compact('kategori'));
    }

    public function save(Request $request)
    {
    	$this->validate($request, [
    		'nama_kategori'	=> 'required|max:191'
    	]);

    	if (Kategori::where('slug', str_slug($request->nama_kategori))->get()->count() > 0) {
    		return redirect()->back()->with(['error' => 'Kategori Sudah Tersedia']);
    	} else {
    		try {
    			$kategori = Kategori::create([
    				'nama_kategori'	=> $request->nama_kategori,
    				'slug'	=> str_slug($request->nama_kategori),
    				'deskripsi'	=> $request->deskripsi
    			]);
    			return redirect(route('kategori'))->with(['success' => '<strong>' . $kategori->nama_kategori . '</strong> Ditambahkan!']);
    		} catch (\Exception $e) {
    			return $e->getMessage();
    		}
    	}
    }

    public function edit($slug)
    {
    	$kategori = Kategori::where('slug', $slug)->first();
    	return view('adminTheme-v1.kategori.edit', compact('kategori'));
    }

    public function update(Request $request, $slug)
    {
    	$this->validate($request, [
    		'nama_kategori'	=> 'required|max:191'
    	]);

    	try {
    		$kategori = Kategori::where('slug', $slug)->first();
    		$kategori->update([
    			'nama_kategori'	=> $request->nama_kategori,
    			'deskripsi'	=> $request->deskripsi
    		]);
    		return redirect(route('kategori'))->with(['success' => '<strong>' . $kategori->nama_kategori . '</strong> Diperbaharui!']);
    	} catch (\Exception $e) {
    		return $e->getMessage();
    	}
    }

    public function hapus(Request $request)
    {
    	$id = $request->hapus_kategori;
    	if (count($id) > 0 && $request->action == 'y') {
    		foreach ($id as $ids) {
    			Kategori::find($ids)->delete();
    		}
    		return redirect(route('kategori'))->with(['success' => 'Kategori yang dipilih telah dihapus']);
    	} elseif ($request->action == '' || $request->action == NULL) {
    		return redirect(route('kategori'))->with(['error_action' => 'Aksi belum dipilih']);
    	} else {
    		return redirect(route('kategori'))->with(['error_action' => 'Tidak ada kategori yang dipilih']);
    	}
    }
}
