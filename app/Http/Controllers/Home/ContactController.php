<?php

namespace App\Http\Controllers\Home;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;

class ContactController extends Controller
{
    public function Contact()
    {
        try {
            return view('frontend.contact');
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public function StoreMessage(Request $request)
    {
        try {
            // return $request->all();
            Contact::insert([
                'name' => $request->name,
                'email' => $request->email,
                'subject' => $request->subject,
                'phone' => $request->phone,
                'message' => $request->message,
                'created_at' => Carbon::now(),
            ]);
            $notification = array(
                'message' => 'Your Message submitted Successfully ',
                'alert-type' => 'success'
            );


            return redirect()->back()->with($notification);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public function ContactMessage()
    {
        try {
            $contacts = Contact::latest()->get();
            return view('admin.contact.all_contact', compact('contacts'));
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public function DeleteMessage($id)
    {
        try {
            Contact::findOrFail($id)->delete();
            $notification = array(
                'message' => 'Message Deleted Successfully ',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
