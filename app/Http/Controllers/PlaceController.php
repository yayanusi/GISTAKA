<?php

namespace App\Http\Controllers;

use App\Place;
use Alert;
use Illuminate\Http\Request;
use Image, Storage, File, Validator;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\FormatImportPlace;
use App\Imports\PlaceImport;

class PlaceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Place::all();
        return view('places.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('places.create');
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
            'place_name' => 'required|min:3',
            'address'   => 'required|min:10',
            'description' => 'required|min:10',
            'longitude'  => 'required',
            'latitude'  => 'required',
            'spp'  => 'required',
            'biaya_masuk'  => 'required',
            'batas_tampung'  => 'required',
            'pengajar'  => 'required',
            'akreditasi'  => 'required',
            'status'  => 'required',
            'abk'  => 'required',
            'fasilitas'  => 'required',
        ]);

        $data = $request->all();
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = str_random(3) . str_slug($request->place_name) . '.' . $file->getClientOriginalExtension();
            $path = $request->file('image')->storeAs('public/sekolah/', $filename, 'local');
            $data['image'] = '/storage' . substr($path, strpos($path, '/'));



            $thumbnailpath = public_path() . $data['image'];
            $img = Image::make($thumbnailpath)->resize(1110, 624, function ($constrait) {
                $constrait->aspectRatio();
            });
            $img->save($thumbnailpath);
        // dd(auth()->user());

        }
        Place::create($data);

        alert()->success('Sukses', 'Berhasil menyimpan data');
        return redirect()->route('places.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Place $place)
    {
        return view('places.detail', [
            'place' => $place,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $place = Place::find($id);
        // dd($place);
        return view('places.edit', compact('place'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'place_name' => 'required|min:3',
            'address'   => 'required|min:10',
            'description' => 'required|min:10',
            'longitude'  => 'required',
            'latitude'  => 'required',
            'spp' => 'required',
            'biaya_masuk' => 'required',
            'batas_tampung' => 'required',
            'pengajar' => 'required',
            'akreditasi' => 'required',
            'status' => 'required',
            'abk' => 'required',
            'fasilitas' => 'required',
        ]);

        $data = $request->all();
        $edit = Place::find($id);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = str_random(3) . str_slug($request->place_name) . '.' . $file->getClientOriginalExtension();
            $path = $request->file('image')->storeAs('public/sekolah/', $filename, 'local');
            $data['image'] = '/storage' . substr($path, strpos($path, '/'));

            #hapus image lama
            if ($edit->image) {
                try {
                    File::delete(public_path() . $edit->image);
                }
                catch (FileNotFoundException $e) {
                #file not found
                }
            }
            $thumbnailpath = public_path() . $data['image'];
            $img = Image::make($thumbnailpath)->resize(1110, 624, function ($constrait) {
                $constrait->aspectRatio();
            });
            $img->save($thumbnailpath);
        }
        $edit->update($data);


        alert()->success('Sukses', 'Berhasil update data');
        return redirect()->route('places.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $place = Place::find($id);
            File::delete(public_path() . $place->image);
            $place->delete();
        }
        catch (FileNotFoundException $e) {
        }
        
        alert()->warning('Berhasil menghapus data');
        return redirect()->route('places.index');
    }

    public function sampleMap()
    {
        return view('sample');
    }

    public function generateExcelTemplate()
    {
        return Excel::download(new FormatImportPlace(), 'FormatDataSekolah.xlsx');
    }

    public function importExcel(Request $request)
    {
        // validasi untuk memastikan file yang diupload adalah excel
        $this->validate($request, ['excel' => 'required|mimes:xls,xlsx']);
        // ambil file yang baru diupload
        $excel = $request->file('excel');
        // baca sheet pertama

        $excels = Excel::import(new PlaceImport, $excel);
        // rule untuk validasi setiap row pada file excel
        $rowRules = [
            'place_name' => 'required',
            'address' => 'required',
            'description' => 'required',
            'longitude' => 'required',
            'latitude' => 'required',
            'spp' => 'required',
            'biaya_masuk' => 'required',
            'batas_tampung' => 'required',
            'pengajar' => 'required',
            'akreditasi' => 'required',
            'status' => 'required',
            'abk' => 'required',
            'fasilitas' => 'required'
        ];

        // looping setiap baris, mulai dari baris ke 2 (karena baris ke 1 adalah nama kolom)
        foreach ($excel as $row) {
            // Membuat validasi untuk row di excel
            // Disini kita ubah baris yang sedang di proses menjadi array
            $validator = Validator::make($row->toArray(), $rowRules);
            // Skip baris ini jika tidak valid, langsung ke baris selanjutnya
            if ($validator->fails()) {
                continue;
            }

            // Syntax dibawah dieksekusi jika baris excel ini valid

            $data = Place::create([
                'place_name' => $row['place_name'],
                'address' => $row['address'],
                'description' => $row['description'],
                'longitude' => $row['longitude'],
                'latitude' => $row['latitude'],
                'spp' => $row['spp'],
                'biaya_masuk' => $row['biaya_masuk'],
                'batas_tampung' => $row['batas_tampung'],
                'pengajar' => $row['pengajar'],
                'akreditasi' => $row['akreditasi'],
                'status' => $row['status'],
                'abk' => $row['abk'],
                'fasilitas' => $row['fasilitas'],

            ]);
            // catat id dari buku yang baru dibuat
            array_push($data_id, $data->id);
        }

        // Tampilkan index buku
        alert()->success('Sukses', 'Berhasil Import Data Sekolah');

        return redirect()->route('places.index');
    }
}
