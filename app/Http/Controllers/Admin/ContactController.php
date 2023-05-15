<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index() {
        $contactInfo = Contact::orderBy('id', 'DESC')->paginate(5);
        return view('admin.contact.list-contact')->with('contactInfo', $contactInfo);   
    }

    // public function delete($id) {
    //     $contact = Contact::find($id);
    //     $contact->delete();
    //     return redirect('list-contact')->with('status', 'Xóa thông tin liên hệ thành công!');
    // }
}
