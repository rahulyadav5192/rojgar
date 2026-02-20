<?php

namespace App\Http\Controllers;

use App\Models\Blog;

class BlogController extends Controller
{
    public function show(string $slug)
    {
        $blog = Blog::published()->where('slug', $slug)->firstOrFail();

        return view('blog-details', compact('blog'));
    }
}
