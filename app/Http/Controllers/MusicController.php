<?php

namespace App\Http\Controllers;

class MusicController extends Controller
{
    /**
     * Index action
     */
    public function index()
    {
        return view('music.index');
    }
}
