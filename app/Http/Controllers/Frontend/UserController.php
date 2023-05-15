<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index() {
        return view('frontend.account-detail');
    }

    public function edit($id) {
        $userDetails = User::findOrFail($id);
        return view('frontend.account-update')->with('userDetails', $userDetails);
    }

    public function update(Request $request, $id) {
        $users = User::find($id);
        if ($request->hasFile('image')) {
            $path = 'uploads/userImg/'.$users->image;
            if (File::exists($path)) {
                File::delete($path);
            }
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time(). '.' .$extension;
            $file->move('uploads/userImg/',$filename);
            $users->image = $filename;
        }
        $users->name = $request->input('name');
        $users->email = $request->input('email');
        $users->phone = $request->input('phone');
        $users->gender = $request->input('gender');
        $users->save();
        return redirect('account-detail')->with('status', 'Cập nhật thông tin người dùng thành công!');
    }

    public function changePass(){
        return view('frontend.account-chpass');
    }
    public function updatePass(Request $request){
        $validateData = $request->validate([
            'oldpassword' => 'required',
            'password' => ['required', 'confirmed',],
            'password_confirmation' => 'required'
        ], [
            'oldpassword.required' => 'Không được để trống *',
            'password.required' => 'Không được để trống *',
            'password.confirmed' => 'Mật khẩu phải đúng với mật khẩu đã nhập *',
            'password_confirmation.required' => 'Không được để trống *',
        ]);
        $hashedPassword = Auth::user()->password;
        if(Hash::check($request->oldpassword, $hashedPassword)){
            $user = User::find(Auth::id());
            $user->password = Hash::make($request->password);
            $user->save($validateData);
            return redirect('account-detail')->with('status', 'Thay đổi mật khẩu thành công!');
        }else{
            return redirect()->back()->with('info', 'Thay đổi mật khẩu không thành công!');
        }
    }

    public function getIndexAddress() {
        $userId = Auth::user()->id; // lay id nguoi dung dang dang nhap
        $dataAddress = Address::where('user_id', $userId)->orderBy('id', 'desc')->paginate(3);
        return view('frontend.address-list')->with('address', $dataAddress); 
    }

    public function createAddress() {
        return view('frontend.address-add'); 
    }

    public function storeAddress(Request $request) {
        $address = new Address();
        $userId = Auth::user()->id;
        $address->user_id = $userId;
        $address->name = $request->name;
        $address->phone = $request->phone;
        $address->street = $request->street;
        $address->city = $request->city;
        $address->district = $request->district;
        $address->ward = $request->ward;
        // dd($address);
        $address->save();
        return redirect()->route('address.index')->with('status', 'Thêm mới địa chỉ thành công!'); 
    }

    public function editAddress($id) {
        $address = Address::findOrFail($id); 
        return view('frontend.address-update')->with('address', $address); 
    }

    public function updateAddress(Request $request, $id) {
        $userId = Auth::user()->id; 
        $address = Address::findOrFail($id);
        $address->user_id = $userId;
        $address->name = $request->name;
        $address->phone = $request->phone;
        $address->street = $request->street;
        $address->city = $request->city;
        $address->district = $request->district;
        $address->ward = $request->ward;
        // dd($address);
        $address->save();
        return redirect()->route('address.index')->with('status', 'Cập nhật địa chỉ thành công!'); 
    }

    public function destroyAddress($id) {
        $getId = Address::findOrFail($id); 
        $getId->delete();
        return back()->with('status', 'Xóa địa chỉ thành công!'); 
    }
}
