<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BlogPost;

class BlogController extends Controller
{
    public function index()
    {
        $blogPosts = BlogPost::with('tags')->paginate(10); // Fetch all blog posts
        return view('dashboard')->with([
            'blogPosts' => $blogPosts,
        ]); // Pass the blog posts to the view
    }

    public function show(BlogPost $blogPost)
    {
        return view('blog.show', compact('blogPost'));
    }
}
