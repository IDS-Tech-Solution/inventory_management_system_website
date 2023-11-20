<?php

namespace App\Http\Controllers\Home;

use App\Models\Portfolio;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Intervention\Image\ImageManagerStatic as Image;


class PortfolioController extends Controller
{
    public function ViewPortfolio()
    {
        $portfolio = Portfolio::latest()->get();
        return view('admin.portfolio.portfolio_view', compact('portfolio'));
    }
    //end Function
    public function AddPortfolio()
    {

        return view('admin.portfolio.portfolio_add');
    }
    //End Function
    public function StorePortfolio(Request $request)
    {
        try {
            $request->validate([
                'portfolio_name' => 'required',
                'portfolio_title' => 'required',
                // 'portfolio_description' => 'required',
                // 'portfolio_image' => 'required|mimes:jpg,jpeg,png',

            ], [
                'portfolio_name.required' => 'Please Input Portfolio Name',
                'portfolio_title.required' => 'Please Input Portfolio Title',
                // 'portfolio_description.required' => 'Please Input Portfolio Description',
                // 'portfolio_image.required' => 'Please Input Portfolio Image',
            ]);

            /* --------------------------------- IMAGE RESIZE -------------------------------- */
            // use Intervention\Image\ImageManagerStatic as Image;  // ? composer require intervention/image
            $image = $request->file('portfolio_image');

            // Resize the image
            $resizeWidth = 1020; // You can set your desired width here
            $resizeHeight = 519; // You can set your desired height here

            Image::configure(array('driver' => 'gd'));

            $img = Image::make($image->getRealPath());
            $img->resize($resizeWidth, $resizeHeight);

            // Generate a unique name for the resized image
            $imageName = $image->getClientOriginalExtension();

            // Save the resized image to the destination folder
            $img->save(public_path('upload/portfolio') . '/' . $imageName);

            $save_url = 'upload/portfolio/' . $imageName;
            /* ----------------------------------- END RESIZE ---------------------------------- */

            Portfolio::insert([
                'portfolio_name' => $request->portfolio_name,
                'portfolio_title' => $request->portfolio_title,
                'portfolio_description' => $request->portfolio_description,
                'portfolio_image' => $save_url,
                'created_at' => Carbon::now(),
            ]);

            $notification = array(
                'message' => 'Portfolio Successfully Inserted',
                'alert-type' => 'success'
            );

            return redirect()->route('view.portfolio')->with($notification);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    //End Function
}
