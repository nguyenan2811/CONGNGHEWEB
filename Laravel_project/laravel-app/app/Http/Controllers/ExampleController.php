<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExampleController extends Controller
{
    public function index()
    {
        return view('example.index'); // Trả về một view hoặc xử lý logic tại đây
    }
}


