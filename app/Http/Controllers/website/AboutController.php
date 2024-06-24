<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\AboutRequest;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;

class AboutController extends Controller
{
    public function index()
    {
        // $data = Home::orderBy('created_at', 'desc')->get();
        // dd($data);
        // return view('students.index', $data);
        return view('website.about');
    }
}
