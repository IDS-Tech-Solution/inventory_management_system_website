<?php

namespace App\Http\Controllers\Home;

use App\Models\BlogCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;

class BlogCategoryController extends Controller
{
    public function AllBlogCategory()
    {
        try {
            $blogcategory = BlogCategory::latest()->get();
            return view('admin.blog_category.blog_category_all', compact('blogcategory'));
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public function AddBlogCategory()
    {
        try {
            return view('admin.blog_category.blog_category_add');
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public function StoreCategory(Request $request)
    {
        try {
            /* --------------------------------- validation  -------------------------------- */

            // $request->validate([
            //     'blog_category' => 'required',
            // ], [
            //     'blog_category.required' => 'Please Input Blog Category',
            // ]);
            /* --------------------------------- End validation  -------------------------------- */

            BlogCategory::insert([
                'blog_category' => $request->blog_category,
                'created_at' => Carbon::now(),
            ]);

            $notification = array(
                'message' => 'Blog Category Inserted Successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('all.blog.category')->with($notification);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public function EditBlogCategory($id)
    {
        try {
            $blog = BlogCategory::findOrFail($id);
            return view('admin.blog_category.edit_blog_category', compact('blog'));
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public function UpdateBlogCategory(Request $request)
    {
        try {
            // return $request;
            $blog = $request->id;

            BlogCategory::findOrFail($blog)->update([
                'blog_category' => $request->blog_category,
                'updated_at' => Carbon::now(),
            ]);

            $notification = array(
                'message' => 'Blog Category updated Successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('all.blog.category')->with($notification);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public function DeleteBlogCategory($id)
    {
        try {

            BlogCategory::findOrFail($id)->delete();
            $notification = array(
                'message' => 'Blog Category Deleted Successfully',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
