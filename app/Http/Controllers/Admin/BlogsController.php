<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admins;
use App\Models\Blog;
use Session;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;

class BlogsController extends Controller
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
        $blogs = Blog::paginate(5); 
        return view('admin.blogs.view-blog', ['data' => $blogs]);
    }

    //============================

    public function addblog()
    {
        $data = Blog::all();
        return view('admin.blogs.add', ['data' => $data]);
    }

    public function insertdata(Request $request)
{
    try {
        // Validate the incoming request
        $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'category' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'published_date' => 'required|date',
            'content' => 'required|string',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
            'meta_keywords' => 'nullable|string|max:255',
        ]);

        // Handle file upload
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->file('image')->extension();
            $request->file('image')->move(public_path('media'), $imageName);
            $imagePath = '/media/' . $imageName;
        } else {
            $imagePath = null; // No image uploaded
        }

        // Create a new Blog instance and fill it with validated data
        $blog = new Blog();
        $blog->title = $request->input('title');
        $blog->slug = $request->input('slug'); // Use provided slug
        $blog->image = $imagePath; // Store the image path
        $blog->category = $request->input('category');
        $blog->author = $request->input('author');
        $blog->published_date = $request->input('published_date');
        $blog->content = $request->input('content');
        $blog->meta_title = $request->input('meta_title');
        $blog->meta_description = $request->input('meta_description');
        $blog->meta_keywords = $request->input('meta_keywords');
        $blog->save();

        // Flash success message and redirect
        return redirect()->back()->with('success', 'Blog created successfully!');
    } catch (\Exception $e) {
        // Log the error
        \Log::error('Error creating blog: '.$e->getMessage());

        // Redirect back with an error message
        return redirect()->back()->with('error', 'An error occurred while creating the blog. Please try again.');
    }
}


    

    // Edit blog =====================================

    public function editblog($id)
    {
        $data = Blog::where('status', 1)->get();
        $singledata = Blog::findOrFail($id);
        return view('admin.blogs.edit', ['singledata' => $singledata, 'data' => $data]);
    }

    // Update blog ==================================

    public function updateblog(Request $request, $id)
    {
        // Validate the incoming request
        $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:blogs,slug,' . $id,
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'category' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'published_date' => 'required|date',
            'content' => 'required|string',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
            'meta_keywords' => 'nullable|string|max:255',
        ]);
    
        // Find the blog by ID
        $blog = Blog::findOrFail($id);
    
        // Handle image upload if a new image is provided
        if ($request->hasFile('image')) {
            // Delete old image if it exists
            $this->deleteOldImage($blog->image);
    
            // Upload new image
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('media'), $imageName);
    
            // Update blog image path
            $blog->image = '/media/' . $imageName;
        }
    
        // Update other fields
        $blog->title = $request->input('title');
        $blog->slug = $request->input('slug');
        $blog->category = $request->input('category');
        $blog->author = $request->input('author');
        $blog->published_date = $request->input('published_date');
        $blog->content = $request->input('content');
        $blog->meta_title = $request->input('meta_title');
        $blog->meta_description = $request->input('meta_description');
        $blog->meta_keywords = $request->input('meta_keywords');
    
        // Save updated blog
        $blog->save();
    
        // Flash success message and redirect
        return redirect()->back()->with('message', 'Blog updated successfully');
    }

    // Helper function to delete old image
    private function deleteOldImage($imageName)
    {
        $imagePath = public_path('media/' . $imageName);
        if (File::exists($imagePath)) {
            File::delete($imagePath);
        }
    }

    // Blog Delete ==========================
    public function delete(Request $request)
    {
        Blog::where('id', $request['id'])->delete();
        Session::flash('message', 'Blog deleted successfully');
        return redirect()->back();
    }

    //  Approved  =================================

    public function approved($id)
    {
        $blog = Blog::findOrFail($id);
        $newStatus = $blog->status == '1' ? '0' : '1';
        $blog->status = $newStatus;
        $blog->save();
        $message = $newStatus == '1' ? 'Active successfully.' : 'Inactive successfully.';
        session()->flash('message', $message);
        return redirect()->back();
    }

    public function showDashboard()
{
    $blogsCount = Blog::count(); // Get the count of blogs
    return view('admin.dashboard', ['blogsCount' => $blogsCount]);
}
}
