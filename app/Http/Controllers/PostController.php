<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Website;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function store(Request $request, $websiteId)
    {
        $request->validate([
            'title' => 'required|string',
            'description' => 'required|string'
        ]);

        $website = Website::findOrFail($websiteId);

        $post = $website->posts()->create([
            'title' => $request->title,
            'description' => $request->description,
            'email_sent' => false
        ]);

        return response()->json([
            'message' => 'Post created successfully',
            'post' => $post
        ], 201);
    }
}
