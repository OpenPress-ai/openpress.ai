<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class DemoController extends Controller
{
    public function index()
    {
        $jsonPath = base_path('app/Http/Controllers/demo_page.json');
        $jsonContent = File::get($jsonPath);
        $page = json_decode($jsonContent, true);

        return view('content-blocks.demo', compact('page'));
    }
}