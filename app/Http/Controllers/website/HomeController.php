<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\HomeRequest;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use App\Models\Branch;

class HomeController extends Controller
{
    public function index()
    {
        $data = [
            
            'branch' => Branch::orderBy('created_at', 'desc')->get()

        ];
        // dd($data);
        // return view('students.index', $data);
        return view('website.home')->with(compact('data'));
    }
}
