<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HowToUseController extends Controller
{
    public function index() {
        $how = 'active';
        return view('how-to-use', compact('how'));
    }
}
