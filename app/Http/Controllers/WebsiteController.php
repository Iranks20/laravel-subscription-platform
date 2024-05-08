<?php

namespace App\Http\Controllers;

use App\Models\Website;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'url' => 'required|url|unique:websites',
        ]);

        $website = Website::create([
            'name' => $validated['name'],
            'url' => $validated['url'],
        ]);

        return response()->json($website, 201);
    }
}

