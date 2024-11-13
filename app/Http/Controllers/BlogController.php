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
        $slug = Str::slug($title);
        $count = BlogPost::where('slug', 'LIKE', "{$slug}%")->count();

        return $count ? "{$slug}-{$count}" : $slug;
    }

    public function index()
    {
        $blogPosts = BlogPost::with(['user', 'tags'])->paginate(10);

        return view('dashboard')->with([
            'blogPosts' => $blogPosts,
            'tags' => Tag::all(),
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
}
