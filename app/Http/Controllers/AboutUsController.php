<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    public function index() {
        $about = 'active';
        return view('about-us', compact('about'));
    }
}
