<?php

namespace App\Http\Controllers\Home;

use App\Models\About;
use App\Models\MultiImage;
use Illuminate\Http\Request;
use GuzzleHttp\Promise\Create;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Intervention\Image\ImageManagerStatic as Image;
use PhpParser\Node\Stmt\TryCatch;

class AboutController extends Controller
{
    public function AboutPage()
    {
        $aboutpage = About::find(1);
        return view('admin.about_page.about_page_all', compact('aboutpage'));
    } //End method

    public function UpdatePage(Request $request)
    {
        try {
            //todo! validation

            $about_id = $request->id;
            if ($request->file('about_image')) {
                $image = $request->file('about_image');

                // Resize the image
                $resizeWidth = 523; // You can set your desired width here
                $resizeHeight = 605; // You can set your desired height here

                Image::configure(array('driver' => 'gd'));

                $img = Image::make($image->getRealPath());
                $img->resize($resizeWidth, $resizeHeight);

                // Generate a unique name for the resized image
                $imageName = time() . '.' . $image->getClientOriginalExtension();

                // Save the resized image to the destination folder
                $img->save(public_path('upload/home_about') . '/' . $imageName);

                $save_url = 'upload/home_about/' . $imageName;

                About::findOrFail($about_id)->update([
                    'title' => $request->title,
                    'short_title' => $request->short_title,
                    'short_description' => $request->short_description,
                    'long_description' => $request->long_description,
                    'about_image' => $save_url,
                ]);

                $notification = array(
                    'message' => 'About page Updated With Image Successfully',
                    'alert-type' => 'success'
                );

                return redirect()->route('home.slide')->with($notification);
            } else {

                About::findOrFail($about_id)->update([
                    'title' => $request->title,
                    'short_title' => $request->short_title,
                    'short_description' => $request->short_description,
                    'long_description' => $request->long_description,
                ]);


                $notification = array(
                    'message' => 'About page Updated Without Image Successfully',
                    'alert-type' => 'success'
                );


                return redirect()->back()->with($notification);
            } //end else
            //end Method
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    //HomeAbout
    public function HomeAbout()
    {
        $aboutpage = About::find(1);
        return view('frontend.about_page', compact('aboutpage'));
    }
    public function AboutMultiImage()
    {
        return view('admin.about_page.multiimage');
    } // End Method


    public function StoreMultiImage(Request $request)
    {
        try {
            $images = $request->file('multi_image');
            if ($images) {
                foreach ($images as $image) {
                    // Resize the image
                    $resizeWidth = 220; // You can set your desired width here
                    $resizeHeight = 220; // You can set your desired height here

                    Image::configure(array('driver' => 'gd'));

                    $img = Image::make($image->getRealPath());
                    $img->resize($resizeWidth, $resizeHeight);

                    // Generate a unique name for the resized image
                    $imageGenName = $image->getClientOriginalName() . '.' . $image->getClientOriginalExtension();

                    // Save the resized image to the destination folder
                    $img->save(public_path('upload/multi') . '/' . $imageGenName);

                    $save_url = 'upload/multi/' . $imageGenName;

                    MultiImage::insert([
                        'multi_image' => $save_url,
                        'created_at' => Carbon::now(),
                    ]);

                    // Optionally, you may want to keep track of all saved URLs for notification or other purposes
                    $savedUrls[] = $save_url;
                }

                $notification = [
                    'message' => 'Multi Images Inserted Successfully',
                    'alert-type' => 'success'
                ];

                return redirect()->back()->with($notification);
            } else {
                // Handle the case when no files were uploaded
                $notification = [
                    'message' => 'No images uploaded',
                    'alert-type' => 'warning'
                ];

                return redirect()->back()->with($notification);
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    //End Method
    public function AllMultiImage()
    {
        $allImages = MultiImage::all();
        return view('admin.about_page.all_multi_image', compact('allImages'));
    } //End Method
}
