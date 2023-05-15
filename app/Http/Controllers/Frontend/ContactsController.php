<?php

namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;

class ContactsController extends Controller
{
    public function contact() {
        return view('frontend.contact');
    }

    public function insertContact(Request $request) {
        $request->validate([
            'cname' => 'required',
            'cemail' => 'required',
            'cphone' => 'required',
            'ctitle' => 'required',
            'cmessage' => 'required',
        ], [
            'cname.required' => 'Không được để trống *',
            'cemail.required' => 'Không được để trống *',
            'cphone.required' => 'Không được để trống *',
            'ctitle.required' => 'Không được để trống *',
            'cmessage.required' => 'Không được để trống *',
        ]);
        $validation = $request->all();
        $contact = new Contact();
        $contact->name = $request->input('cname');
        $contact->email = $request->input('cemail');
        $contact->phone = $request->input('cphone');
        $contact->title = $request->input('ctitle');
        $contact->message = $request->input('cmessage');
        $contact->save();
        return back()->with('status', 'Gửi thông tin liên hệ thành công!');
    }
}
