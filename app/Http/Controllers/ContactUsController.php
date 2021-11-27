<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    public function index() {
        $contact = 'active';
        return view('contact-us', compact('contact'));
    }
}
