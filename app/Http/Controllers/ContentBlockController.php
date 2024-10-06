<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\File;

class ContentBlockController extends Controller
{
    public function demo()
    {
        $jsonPath = __DIR__ . '/demo_page.json';
        $jsonContent = File::get($jsonPath);
        $page = json_decode($jsonContent, true);

        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new \Exception('Error decoding JSON: ' . json_last_error_msg());
        }

        return view('content-blocks.demo', compact('page'));
    }
}