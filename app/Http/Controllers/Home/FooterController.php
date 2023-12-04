<?php

namespace App\Http\Controllers\Home;

use App\Models\Footer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FooterController extends Controller
{
    public function footerSetup()
    {
        $footerSetup = Footer::find(1);
        return view('admin.footer.footer_view', compact('footerSetup'));
    }
    public function footerUpdate(Request $request)
    {
        try {
            $footerUpdate = $request->id;
            // return $request;
            Footer::findOrFail($footerUpdate)->update([
                'number' => $request->number,
                'description' => $request->description,
                'address' => $request->address,
                'email' => $request->email,
                'facebook' => $request->facebook,
                'twitter' => $request->twitter,
                'copyright' => $request->copyright,
                'updated_at' => now(),
            ]);


            $notification = array(
                'message' => 'Footer Page Updated Successfully',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
