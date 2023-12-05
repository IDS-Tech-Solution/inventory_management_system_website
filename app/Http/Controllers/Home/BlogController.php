<?php

namespace App\Http\Controllers\Home;

use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Intervention\Image\ImageManagerStatic as Image;

class BlogController extends Controller
{
    public function allBlog()
    {
        try {
            $allBlog = Blog::latest()->get();
            return view('admin.blog.all_blog', compact('allBlog'));
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public function addBlog()
    {
        try {
            $category = BlogCategory::orderby('blog_category', 'ASC')->get();
            return view('admin.blog.add_blog', compact('category'));
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public function storeBlog(Request $request)
    {
        try {
            $image = $request->file('blog_image');
            // Resize the image
            $resizeWidth = 430; // You can set your desired width here
            $resizeHeight = 327; // You can set your desired height here

            Image::configure(array('driver' => 'gd'));

            $img = Image::make($image->getRealPath());
            $img->resize($resizeWidth, $resizeHeight);

            // Generate a unique name for the resized image
            $imageName = time() . '.' . $image->getClientOriginalExtension();

            // Save the resized image to the destination folder
            $img->save(public_path('upload/blog') . '/' . $imageName);

            $save_url = 'upload/blog/' . $imageName;

            Blog::insert([
                'blog_category_id' => $request->blog_category_id,
                'blog_title' => $request->blog_title,
                'blog_tag' => $request->blog_tag,
                'blog_description' => $request->blog_description,
                'blog_image' => $save_url,
                'created_at' => Carbon::now(),
            ]);

            $notification = array(
                'message' => 'Blog page Updated With Image Successfully',
                'alert-type' => 'success'
            );

            return redirect()->route('all.blog')->with($notification);
        } catch (\Throwable $th) {

            throw $th;
        }
    }
    public function editBlog($id)
    {
        try {

            $category = BlogCategory::orderby('blog_category', 'ASC')->get();
            $editBlog = Blog::findOrFail($id);
            return view('admin.blog.blog_edit', compact('editBlog', 'category'));
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public function updateBlog(Request $request)
    {
        try {
            $blog_id = $request->id;
            if ($request->file('blog_image')) {
                $image = $request->file('blog_image');

                // Resize the image
                $resizeWidth = 430; // You can set your desired width here
                $resizeHeight = 327; // You can set your desired height here

                Image::configure(array('driver' => 'gd'));

                $img = Image::make($image->getRealPath());
                $img->resize($resizeWidth, $resizeHeight);

                // Generate a unique name for the resized image
                $imageGenName = $image->getClientOriginalName() . '.' . $image->getClientOriginalExtension();
                // Save the resized image to the destination folder
                $img->save(public_path('upload/blog') . '/' . $imageGenName);

                $save_url = 'upload/blog/' . $imageGenName;

                Blog::findOrFail($blog_id)->update([
                    'blog_category_id' => $request->blog_category_id,
                    'blog_title' => $request->blog_title,
                    'blog_tag' => $request->blog_tag,
                    'blog_description' => $request->blog_description,
                    'blog_image' => $save_url,
                    'updated_at' => Carbon::now(),
                ]);

                $notification = array(
                    'message' => 'Blog Updated With Image Successfully',
                    'alert-type' => 'success'
                );

                return redirect()->route('all.blog')->with($notification);
            } else {
                Blog::findOrFail($blog_id)->update([
                    'blog_category_id' => $request->blog_category_id,
                    'blog_title' => $request->blog_title,
                    'blog_tag' => $request->blog_tag,
                    'blog_description' => $request->blog_description,
                    'updated_at' => Carbon::now(),
                ]);

                $notification = array(
                    'message' => 'Blog Updated Without Image Successfully',
                    'alert-type' => 'success'
                );

                return redirect()->route('all.blog')->with($notification);
            }
        } catch (\Throwable $th) {

            throw $th;
        }
    }
    public function deleteBlog($id)
    {
        try {
            $deleteBlog = Blog::findOrFail($id);
            $image_path = $deleteBlog->blog_image;
            unlink($image_path);
            Blog::findOrFail($id)->delete();
            $notification = array(
                'message' => 'Blog Deleted Successfully',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public function blogDetails($id)
    {
        try {
            $all = Blog::latest()->limit(5)->get();
            $category = BlogCategory::orderby('blog_category', 'ASC')->get();
            $blogDetails = Blog::findOrFail($id);
            return view('frontend.blog_details', compact('blogDetails', 'all', 'category'));
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public function blogCategories($id)
    {
        try {

            $blogPost = Blog::where('blog_category_id', $id)->orderBy('id', 'DESC')->get();
            $all = Blog::latest()->limit(5)->get();
            $category = BlogCategory::orderby('blog_category', 'ASC')->get();
            $categoryName = BlogCategory::findOrFail($id);
            return view('frontend.blog_categories', compact('blogPost', 'all', 'category', 'categoryName'));
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public function blogHome()
    {
        try {
            $all = Blog::latest()->paginate(3);
            $category = BlogCategory::orderby('blog_category', 'ASC')->get();

            return view('frontend.blogHome', compact('all', 'category'));
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
