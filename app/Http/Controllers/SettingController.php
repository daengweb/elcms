<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Setting;

class SettingController extends Controller
{
    public function index()
    {
    	$setting = Setting::first();
    	return view('adminTheme-v1.setting', compact('setting'));
    }

    public function update(Request $request)
    {
    	$this->validate($request, [
    		'site_title'	=> 'required|max:255',
    		'tagline'	=> 'required|max:255',
    		'email'	=> 'required|email|max:255',
    		'blog_show_item'	=> 'required|numeric|max:255'
    	]);

    	try {
	    	$setting = Setting::orderBy('created_at', 'DESC');
	    	$data = [
	    		'site_title'	=> $request->site_title,
	    		'tagline'	=> $request->tagline,
	    		'email'	=> $request->email,
	    		'blog_show_item'	=> $request->blog_show_item,
	    		'meta_keyword'	=> $request->meta_keyword,
	    		'meta_description'	=> $request->meta_description,
	    		'google_webmaster'	=> $request->google_webmaster,
	    		'bing_webmaster'	=> $request->bing_webmaster,
	    		'google_analystic'	=> $request->google_analystic,
	    		'pixel_fb'	=> $request->pixel_fb
	    	];
	    	if ($setting->get()->count() > 0) {
	    		$updateSetting = $setting->first();
	    		$updateSetting->update($data);
	    	} else {
	    		$updateSetting = Setting::create($data);
	    	}
	    	return redirect(route('pengaturan'))->with(['success' => 'Pengaturan']);
	    }  catch (\Exception $e) {
    		return $e->getMessage();
		}
    }
}
