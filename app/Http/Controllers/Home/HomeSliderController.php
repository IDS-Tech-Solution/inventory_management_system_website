<?php

namespace App\Http\Controllers\Home;

use App\Models\HomeSlide;
use Illuminate\Http\Request;
use Intervention\Image\Image;
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
        //todo: validation
        // todo: update/slider doesn't work
        $slide_id = $request->id;

        if ($request->file('image')) {
            $img = $request->file('image');
            $img_name = hexdec(uniqid()) . '.' . $img->getClientOriginalExtension(); //456488465.png
            Image::make($img)->resize(636, 852)->save('upload/home_slide/' . $img_name);
            $save_url = 'upload/home_slide/' . $img_name;

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

            return redirect()->back()->with($notification);
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
    } //end Method
}
