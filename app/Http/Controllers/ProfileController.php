<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use App\Http\Requests\PasswordRequest;
use Illuminate\Support\Facades\Hash;
use Image, File;
class ProfileController extends Controller
{
    /**
     * Show the form for editing the profile.
     *
     * @return \Illuminate\View\View
     */
    public function edit()
    {
        return view('profile.edit');
    }

    /**
     * Update the profile
     *
     * @param  \App\Http\Requests\ProfileRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ProfileRequest $request)
    {

        $data = $request->all();

        #upload logic
        if ($request->hasFile('foto')) {
            #hapus foto lama
            if (auth()->user()->foto) {
                try {
                    File::delete(public_path() . auth()->user()->foto);
                } catch (FileNotFoundException $e) {
                    #file not found
                }
            }

            $file = $request->file('foto');
            $filename = str_slug($request->name).'.'.$file->getClientOriginalExtension();
            $path = $request->file('foto')->storeAs('public/user/', $filename, 'local');
            $data['foto'] = '/storage'. substr($path, strpos($path, '/'));

            

            $thumbnailpath = public_path().$data['foto'];
            $img = Image::make($thumbnailpath)->resize(300, 300, function($constrait){
                $constrait->aspectRatio();
            });
            $img->save($thumbnailpath);

// dd(auth()->user());

        }


        auth()->user()->update($data);
        

        return back()->withStatus(__('Profile successfully updated.'));
    }

    /**
     * Change the password
     *
     * @param  \App\Http\Requests\PasswordRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function password(PasswordRequest $request)
    {
        auth()->user()->update(['password' => Hash::make($request->get('password'))]);

        return back()->withPasswordStatus(__('Password successfully updated.'));
    }
}
