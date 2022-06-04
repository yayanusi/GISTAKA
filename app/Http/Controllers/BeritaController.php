<?php

namespace App\Http\Controllers;

use App\Berita;
use Illuminate\Http\Request;
use Image, Storage, File;


class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Berita::all();
        return view('berita.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('berita.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'foto' => 'required|mimes:png,jpg,jpeg',
            'sumber_foto' => 'required',
            'judul' => 'required',
            'preview' => 'required',
            'isi' => 'required',
        ]);
        $data = $request->all();
        $data['id_user'] = auth()->user()->id;
        $data['slug'] = str_slug($request->judul);

        // if ($request->hasFile('foto')) {
        //     $file = $request->file('foto');
        //     $filename = str_random(3).$data['slug'] . '.' . $file->getClientOriginalExtension();
        //     $path = $request->file('foto')->storeAs('public/berita/', $filename, 'local');
        //     $data['foto'] = '/storage' . substr($path, strpos($path, '/'));
        //     $thumbnailpath = public_path() . $data['foto'];
        //     $img = Image::make($thumbnailpath)->resize(1110, 624, function ($constrait) {
        //         $constrait->aspectRatio();
        //     });
        //     $img->save($thumbnailpath);
        // }

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = str_random(3).str_slug($request->judul) . '.' . $file->getClientOriginalExtension();
            $path = $request->file('foto')->storeAs('public/berita/', $filename, 'local');
            $data['foto'] = '/storage' . substr($path, strpos($path, '/'));



            $thumbnailpath = public_path() . $data['foto'];
            $img = Image::make($thumbnailpath)->resize(1110, 624, function ($constrait) {
                $constrait->aspectRatio();
            });
            $img->save($thumbnailpath);
        // dd(auth()->user());

        }



        Berita::create($data);
        alert()->success('Sukses', 'Berhasil Menambahkan Data');
        return redirect()->route('berita.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Berita::find($id);
        return view('berita.detail', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit = Berita::find($id);
        return view('berita.edit', compact('edit'));


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'foto' => 'mimes:png,jpg,jpeg',
            'sumber_foto' => 'required',
            'judul' => 'required',
            'preview' => 'required',
            'isi' => 'required',
        ]);

        $data = $request->all();
        $data['id_user'] = auth()->user()->id;

        $edit = Berita::find($id)->firstOrFail();

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = str_random(3) . str_slug($request->judul) . '.' . $file->getClientOriginalExtension();
            $path = $request->file('foto')->storeAs('public/berita/', $filename, 'local');
            $data['foto'] = '/storage' . substr($path, strpos($path, '/'));

            #hapus foto lama
            if ($edit->foto) {
                try {
                    File::delete(public_path() . $edit->foto);
                }
                catch (FileNotFoundException $e) {
                #file not found
                }
            }
            $thumbnailpath = public_path() . $data['foto'];
            $img = Image::make($thumbnailpath)->resize(1110, 624, function ($constrait) {
                $constrait->aspectRatio();
            });
            $img->save($thumbnailpath);
        }
        $edit->update($data);
        alert()->success('Sukses', 'Berhasil Mengupdate Data');

        // dd($kategori);
        return redirect()->route('berita.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $berita = Berita::find($id)->firstOrFail();
            File::delete(public_path() . $berita->foto);
            $berita->delete();
        }
        catch (FileNotFoundException $e) {
        }
        alert()->success('Sukses', 'Berhasil Menghapus Data');

        return redirect()->route('berita.index');
    }
}
