<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index() {
        $service = 'active';
        return view('service', compact('service'));
    }
}
