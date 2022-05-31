<?php

namespace App\Http\Controllers;

use App\Place;
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
}
