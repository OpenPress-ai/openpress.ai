<?php

namespace App\Http\Controllers;

use App\Models\Site;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SiteController extends Controller
{
    public function index()
    {
        $sites = Auth::user()->sites()->latest()->get();
        return view('dashboard', compact('sites'));
    }

    public function create()
    {
        return view('sites.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'root_domain' => 'required|string|max:255|unique:sites',
        ]);

        $site = Auth::user()->sites()->create($request->only(['name', 'root_domain']));

        return redirect()->route('dashboard')->with('success', 'Site created successfully.');
    }
}