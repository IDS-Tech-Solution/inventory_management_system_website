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
        try {
            $portfolio = Portfolio::latest()->get();
            return view('admin.portfolio.portfolio_view', compact('portfolio'));
        } catch (\Throwable $th) {
            throw $th;
        }
        // converted to try catch
        // $portfolio = Portfolio::latest()->get();
        // return view('admin.portfolio.portfolio_view', compact('portfolio'));

    }
    //End Function
    public function AddPortfolio()
    {
        try {
            return view('admin.portfolio.portfolio_add');
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    //End Function
    public function StorePortfolio(Request $request)
    {
        try {
            /* --------------------------------- validation  -------------------------------- */

            $request->validate([
                'portfolio_name' => 'required',
                'portfolio_title' => 'required',
                // 'portfolio_description' => 'required',
                'portfolio_image' => 'required|mimes:jpg,jpeg,png',

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

            $img = Image::make($image->getRealPath()); //Error when image not selected ----Call to a member function getRealPath() on null
            $img->resize($resizeWidth, $resizeHeight);

            // Generate a unique name for the resized image
            $imageName = time() . '.' . $image->getClientOriginalExtension();

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
    public function EditPortfolio($id)
    {
        $portfolio = Portfolio::findOrFail($id);
        return view('admin.portfolio.portfolio_edit', compact('portfolio'));
    }
    //End Function
    public function UpdatePortfolio(Request $request)
    {
        try {

            $portfolio_id = $request->id;
            if ($request->file('portfolio_image')) {
                $image = $request->file('portfolio_image');

                // Resize the image
                $resizeWidth = 1020; // You can set your desired width here
                $resizeHeight = 519; // You can set your desired height here

                Image::configure(array('driver' => 'gd'));

                $img = Image::make($image->getRealPath());
                $img->resize($resizeWidth, $resizeHeight);

                // Generate a unique name for the resized image
                $imageGenName = $image->getClientOriginalName() . '.' . $image->getClientOriginalExtension();
                // Save the resized image to the destination folder
                $img->save(public_path('upload/portfolio') . '/' . $imageGenName);

                $save_url = 'upload/portfolio/' . $imageGenName;

                Portfolio::findOrFail($portfolio_id)->update([


                    'portfolio_name' => $request->portfolio_name,
                    'portfolio_title' => $request->portfolio_title,
                    'portfolio_description' => $request->portfolio_description,
                    'portfolio_image' => $save_url,
                    'updated_at' => Carbon::now(),

                ]);

                $notification = array(
                    'message' => 'Portfolio Updated Successfully',
                    'alert-type' => 'success'
                );

                return redirect()->route('view.portfolio')->with($notification);
            } else {
                // Handle the case when no files were uploaded
                Portfolio::findOrFail($portfolio_id)->update([


                    'portfolio_name' => $request->portfolio_name,
                    'portfolio_title' => $request->portfolio_title,
                    'portfolio_description' => $request->portfolio_description,
                    'updated_at' => Carbon::now(),

                ]);
                $notification = [
                    'message' => 'Portfolio Updated without Image Successfully',
                    'alert-type' => 'success'
                ];

                return redirect()->route('view.portfolio')->with($notification);
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public function DeletePortfolio($id)
    {
        try {

            $portfolio = Portfolio::findOrFail($id);
            $delete_id = $portfolio->portfolio_image;
            if (file_exists($delete_id)) {
                unlink($delete_id);
            }
            Portfolio::findOrFail($id)->delete();
            $notification = array(
                'message' => 'Portfolio Image Deleted Successfully',
                'alert-type' => 'success'
            );

            return redirect()->back()->with($notification);
        } catch (\Throwable $th) {
            throw $th;
        }
    } //End Method
    public function PortfolioDetail($id)
    {
        try {
            $portfolio = Portfolio::findOrFail($id);
            return view('frontend.portfolio_detail', compact('portfolio'));
        } catch (\Throwable $th) {
            throw $th;
        }
    } //End Method
}
