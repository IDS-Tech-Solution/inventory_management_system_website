<?php

namespace App\Http\Controllers\Home;

use App\Models\HomeSlide;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;
use App\Http\Controllers\Controller;

class HomeSliderController extends Controller
{
    public function HomeSlider()
    {

        $homeslide = HomeSlide::find(1);
        return view('admin.home_slide.home_slide_all', compact('homeslide'));
    } //end Method

    public function UpdateSlider(Request $request)
    {
        try {
            //todo! validation

            $slide_id = $request->id;
            if ($request->file('image')) {
                $image = $request->file('image');

                // Resize the image
                $resizeWidth = 636; // You can set your desired width here
                $resizeHeight = 852; // You can set your desired height here

                Image::configure(array('driver' => 'gd'));

                $img = Image::make($image->getRealPath());
                $img->resize($resizeWidth, $resizeHeight);

                // Generate a unique name for the resized image
                $imageName = time() . '.' . $image->getClientOriginalExtension();

                // Save the resized image to the destination folder
                $img->save(public_path('upload/home_slide') . '/' . $imageName);

                $save_url = 'upload/home_slide/' . $imageName;

                HomeSlide::findOrFail($slide_id)->update([
                    'title' => $request->title,
                    'short_title' => $request->short_title,
                    'video_url' => $request->video_url,
                    'image' => $save_url,
                ]);

                $notification = array(
                    'message' => 'Home Slide Updated With Image Successfully',
                    'alert-type' => 'success'
                );

                return redirect()->route('home.slide')->with($notification);
            } else {

                HomeSlide::findOrFail($slide_id)->update([
                    'title' => $request->title,
                    'short_title' => $request->short_title,
                    'video_url' => $request->video_url,

                ]);


                $notification = array(
                    'message' => 'Home Slide Updated Without Image Successfully',
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
