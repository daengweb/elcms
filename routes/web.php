<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', 'Front\FrontController@index')->name('depan');
Route::get('/kategori/{slug}', 'Front\FrontController@kategori');
Route::get('/artikel', 'Front\FrontController@allPost');
Route::get('/tag/{slug}', 'Front\FrontController@tag');
Route::get('/cari', 'Front\FrontController@cari')->name('cari');
Route::get('/tentang', 'Front\FrontController@tentang')->name('tentang');
Route::get('/sitemap.xml', 'Front\FrontController@sitemap')->name('sitemap');
Route::get('/sitemap/posts.xml', 'Front\FrontController@sitemapPost')->name('sitemap.posts');
Route::get('/sitemap/kategori.xml', 'Front\FrontController@sitemapPost')->name('sitemap.kategori');

Route::group(['prefix' => 'bd-admin'], function() {
	Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
	Route::post('login', 'Auth\LoginController@login');
	Route::post('logout', 'Auth\LoginController@logout')->name('logout');
	Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
	Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
	Route::post('password/reset', 'Auth\ResetPasswordController@reset');
	Route::get('/bd-admin/password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
});

Route::group(['middleware' => 'auth'], function () {
	Route::group(['prefix' => 'bd-admin'], function() {
		Route::get('/', 'HomeController@index')->name('dashboard');

		Route::get('/kategori', 'KategoriController@index')->name('kategori');
		Route::post('/kategori', 'KategoriController@save')->name('kategori.store');
		Route::get('/kategori/{slug}', 'KategoriController@edit')->name('kategori.edit');
		Route::put('/kategori/{slug}', 'KategoriController@update')->name('kategori.update');
		Route::delete('/kategori', 'KategoriController@hapus')->name('kategori.hapus');

		Route::get('/tag', 'TagController@index')->name('tag');
		Route::post('/tag', 'TagController@save')->name('tag.store');
		Route::get('/tag/{slug}', 'TagController@edit')->name('tag.edit');
		Route::delete('tag', 'TagController@hapus')->name('tag.hapus');

		Route::get('/post', 'PostController@index')->name('post');
		Route::get('/post/tambah', 'PostController@tambah')->name('post.tambah');
		Route::post('/post', 'PostController@simpan')->name('post.simpan');
		Route::get('/post/{slug}', 'PostController@edit')->name('post.edit');
		Route::put('/post/{slug}', 'PostController@update')->name('post.update');
		Route::delete('/post', 'PostController@hapus')->name('post.hapus');

		Route::get('/user', 'UserController@index')->name('user');
		Route::get('/user/{id}', 'UserController@edit')->name('user.edit');
		Route::put('/user/{id}', 'UserController@update')->name('user.update');

		Route::get('/pengaturan', 'SettingController@index')->name('pengaturan');
		Route::post('/pengaturan', 'SettingController@update')->name('pengaturan.update');
	});
});

Route::get('/{slug}', 'Front\FrontController@showPost')->where('slug', '[A-Za-z0-9-_]+');
