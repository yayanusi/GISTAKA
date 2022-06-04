<?php

namespace App\Http\Controllers;

use App\Place;
use App\Berita;
use Illuminate\Http\Request;

class PlaceMapController extends Controller
{
    public function index()
    {
        $places = Place::all();
        // dd($places);
        return view('frontend.index');
    }

    public function maps()
    {
        $places = Place::all();
        // dd($places);
        return view('frontend.maps', compact('places'));
    }

    public function berita(){
        $data = Berita::all();
        return view('frontend.berita.index', compact('data'));
    }

    public function detail($id){
        $data = Berita::find($id);
        // dd($data);
        return view('frontend.berita.detail', compact('data'));

    }
}
