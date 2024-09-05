<?php

namespace App\Http\Controllers\Admin; // Correct namespace for Admin area

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admins;
use App\Models\Blog; // Ensure Blog model is imported correctly
use Session;

class FrontpageController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $admindata = Admins::where('id', Session::get('ADMIN_LOGIN'))->first();
            view()->share([
                'admindata' => $admindata,
            ]);
            return $next($request);
        });
    }

    //===========================

    public function viewblog()
    {
        $blogs = Blog::where('status', 1)->get();
        
        $blogsData = $blogs->map(function ($blog) {
            $imagePath = $blog->image ? url( $blog->image) : null;
            return [
                'id' => $blog->id,
                'title' => $blog->title,
                'slug' => $blog->slug,
                'image' => $imagePath,
                'category' => $blog->category,
                'author' => $blog->author,
                'published_date' => $blog->published_date,
                'content' => $blog->content,
                'status' => $blog->status,
                'created_at' => $blog->created_at,
                'updated_at' => $blog->updated_at,
                'meta_title' => $blog->meta_title,
                'meta_description' => $blog->meta_description,
                'meta_keywords' => $blog->meta_keywords
            ];
        });

        return response()->json($blogsData, 200);
    }

    public function viewBlogBySlug($slug)
    {
        $blog = Blog::where('slug', $slug)->firstOrFail();
        $imagePath = $blog->image ? url($blog->image) : null;

        $blogData = [
            'id' => $blog->id,
            'title' => $blog->title,
            'image' => $imagePath,
            'category' => $blog->category,
            'author' => $blog->author,
            'published_date' => $blog->published_date,
            'content' => $blog->content,
            'status' => $blog->status,
            'created_at' => $blog->created_at,
            'updated_at' => $blog->updated_at,
            'meta_title' => $blog->meta_title,
            'meta_description' => $blog->meta_description,
            'meta_keywords' => $blog->meta_keywords,
        ];

        return response()->json($blogData, 200);
    }

    public function dashboard()
    {
        $blogCount = Blog::count();
        return view('admin.auth.dashboard', compact('blogCount'));
    }
}
