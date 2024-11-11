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

    public function show(BlogPost $blogPost)
    {
        $blogPost->load('user');

        return view('blog')->with([
            'blogPost' => $blogPost,
        ]); // Pass the blog posts to the view
    }
}
