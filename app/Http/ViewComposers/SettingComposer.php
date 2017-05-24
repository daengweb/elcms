<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Setting;
use App\Kategori;
use App\Tag;

class SettingComposer
{
    
    public function compose(View $view)
    {
        $setting = Setting::first();
        $kategori = Kategori::orderBy('nama_kategori', 'ASC')->take(6)->skip(0)->get();
        $sidebar_kategori = Kategori::orderBy('nama_kategori', 'ASC')->withCount('post')->get();
        $tag = Tag::orderBy('nama_tag', 'ASC')->get();

        $view->with('site_title', $setting->site_title);
        $view->with('tagline', $setting->tagline);
        $view->with('site_meta_keyword', $setting->meta_keyword);
        $view->with('site_meta_description', $setting->meta_description);
        $view->with('site_pixel_fb', $setting->pixel_fb);
        $view->with('site_google_webmaster', $setting->google_webmaster);
        $view->with('site_bing_webmaster', $setting->bing_webmaster);
        $view->with('site_google_analystic', $setting->google_analystic);

        $view->with('site_kategori', $kategori);
        $view->with('site_tag', $tag);
        $view->with('sidebar_kategori', $sidebar_kategori);
    }
}