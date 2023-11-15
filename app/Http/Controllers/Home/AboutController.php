<?php

namespace App\Http\Controllers\Home;

use App\Models\About;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
}
