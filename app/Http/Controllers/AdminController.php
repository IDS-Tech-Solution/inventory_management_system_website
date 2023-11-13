<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    } //Enf method
    public function profile()
    {

        $id = Auth::user()->id;
        $adminData = User::find($id);
        return view('admin.profile', compact('adminData'));
        // return redirect('/dashboard');
    } //Enf method
    public function edit_profile()
    {

        $id = Auth::user()->id;
        $editData = User::find($id);
        return view('admin.profile_edit', compact('editData'));
    } //Enf method
    public function store_profile(Request $request)
    {

        $id = Auth::user()->id;
        $data = User::find($id);
        $data->name = $request->name;
        $data->username = $request->username;
        $data->email = $request->email;

        if ($request->file('profile_image')) {

            $file = $request->file('profile_image');
            // @unlink(public_path('upload/user_images/' . $data->image));
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/admin_images'), $filename);
            $data['profile_image'] = 'upload/admin_images/' . $filename;
        }
        $data->save();

        return redirect()->route('admin.profile');
    } //Enf method
}
