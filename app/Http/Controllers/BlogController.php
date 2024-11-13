<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BlogPost;
use App\Models\Tag;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;

class BlogController extends Controller
{
    private function generateUniqueSlug($title)
    {
        $slug = Str::slug($title); // Generate a slug from the title
        $count = BlogPost::where('slug', 'LIKE', "{$slug}%")->count(); // Count the number of blog posts with the same slug

        return $count ? "{$slug}-{$count}" : $slug; // Append a number to the slug if it's not unique
    }

    public function index()
    {
        $blogPosts = BlogPost::with(['user', 'tags'])->paginate(10); // Get all blog posts with user and tags relationships and paginate

        // Pass the blog posts to the view
        return view('dashboard')->with([
            'blogPosts' => $blogPosts,
            'tags' => Tag::all(),
        ]); 
    }

    public function show($slug)
    {
        $blogPost = BlogPost::with(['user', 'tags'])
            ->where('slug', $slug)  // Use the slug to find the blog post
            ->firstOrFail();  // Return 404 if no blog post is found

            // Pass the blog posts to the view
        return view('blog')->with([
            'blogPost' => $blogPost,
        ]); 
    }

    public function store(Request $request)
    {
        //Get the user ID
        $userID = Auth::user()->id;

        //Make sure the Data meets DB requirements
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        // Check if user is authenticated
        if (!$userID) {
            return redirect()->route('login')->with('error', 'You must be logged in to create a blog post.');
        }

        // Create a new blog post
        $blogPost = BlogPost::create([
            'title' => $validatedData['title'],
            'user_id' => $userID,
            'slug' => $this->generateUniqueSlug($validatedData['title']), // Generate unique slug from title
            'content' => $validatedData['content'],
            'excerpt' => Str::limit($validatedData['content'], 100),
        ]);

        // Attach tags to the blog post
        $tags = $request->input('tags', []);
        $blogPost->tags()->sync($tags);

        // Redirect back to dashboard
        return redirect()->route('dashboard');
    }

    public function update(Request $request, $slug)
    {
        //Get the user ID
        $userID = Auth::user()->id;

        //Make sure the Data meets DB requirements
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        // Check if user is authenticated
        if (!$userID) {
            return redirect()->route('login')->with('error', 'You must be logged in to create a blog post.');
        }

        // Find the blog post
        $blogPost = BlogPost::where('slug', $slug)->firstOrFail();

        // Update the blog post
        $blogPost->update([
            'title' => $validatedData['title'],
            'content' => $validatedData['content'],
            'excerpt' => Str::limit($validatedData['content'], 100),
        ]);

        // Redirect back to dashboard
        return redirect()->route('blog.show', $blogPost->slug);
    }

    public function destroy($slug)
    {
        //Get the user ID
        $userID = Auth::user()->id;

        // Check if user is authenticated
        if (!$userID) {
            return redirect()->route('login')->with('error', 'You must be logged in to create a blog post.');
        }

        // Find the blog post
        $blogPost = BlogPost::where('slug', $slug)->firstOrFail();

        // Delete the blog post
        $blogPost->delete();

        // Redirect back to dashboard
        return redirect()->route('dashboard');
    }

    public function search(Request $request)
    {
        $query = $request->input('query'); // Get the search query

        //If the query is empty, redirect back to the dashboard
        if (!$query) {
            return redirect()->route('dashboard');
        }

        // Search for Blog Titles and Tags (assuming tags are stored in a separate table related to blog posts)
        $blogPosts = BlogPost::where('title', 'like', '%' . $query . '%')
            ->orWhereHas('tags', function ($tagQuery) use ($query) {
                $tagQuery->where('title', 'like', '%' . $query . '%');
            })
            ->paginate(10);

        // Return results to the view
        return view('dashboard')->with([
            'blogPosts' => $blogPosts,
            'tags' => Tag::all(),
            'query' => $query,
        ]);
    }
}
