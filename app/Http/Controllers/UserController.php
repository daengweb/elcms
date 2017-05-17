<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Image;
use File;

class UserController extends Controller
{
    public function index()
    {
    	$user = User::orderBy('created_at', 'DESC')->paginate(10);
    	return view('adminTheme-v1.user.index', compact('user'));
    }

    public function edit($id)
    {
    	$user = User::find($id);
    	return view('adminTheme-v1.user.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
    	$this->validate($request, [
    		'name'	=> 'required|max:191',
    		'email'	=> 'required|exists:users,email',
    		'password'	=> 'nullable|min:6|string|confirmed',
    		'avatar'	=> 'nullable|image|mimes:png,jpg,jpeg',
    		'deskripsi'	=> 'nullable|max:191'
    	]);

    	$user = User::find($id);

    	if ($request->hasFile('avatar')) {
    		$image = $request->file('avatar');
	        $images = $request->email . '-' . time() . '.' . $image->getClientOriginalExtension();
	        $saveImage = Image::make($image)->resize(1000, 800)->save(public_path('uploads/img/' . $images));

	        File::delete(public_path('uploads/img/' . $user->avatar));
    	} else {
    		$images = $user->avatar;
    	}
        
        if ($request->password != NULL || $request->password != '') {
        	$user->update([
	        	'name'	=> $request->name,
	        	'password'	=> bcrypt($request->password),
	        	'avatar'	=> $images,
	        	'deskripsi'	=> $request->deskripsi
	        ]);
        } else {
        	$user->update([
	        	'name'	=> $request->name,
	        	'avatar'	=> $images,
	        	'deskripsi'	=> $request->deskripsi
	        ]);
        }
        return redirect(route('user'))->with(['success' => '<strong>' . $user->name . '</strong> Telah diperbaharui']);
    }
}
