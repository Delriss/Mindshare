<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BlogPost;

class BlogController extends Controller
{
    public function index()
    {
        $blogPosts = BlogPost::with(['user', 'tags'])->paginate(10);

        return view('dashboard')->with([
            'blogPosts' => $blogPosts,
        ]); // Pass the blog posts to the view
    }

    public function show($slug)
    {
        $blogPost = BlogPost::with(['user', 'tags'])
                        ->where('slug', $slug)  // Use the slug to find the blog post
                        ->firstOrFail();  // Return 404 if no blog post is found

        return view('blog')->with([
            'blogPost' => $blogPost,
        ]); // Pass the blog posts to the view
    }
}
