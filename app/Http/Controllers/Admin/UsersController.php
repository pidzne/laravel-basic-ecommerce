<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    public function index() {
        $users = User::paginate(5);
        // $role = User::select(['role'])->get();
        // dd($role);
        return view('admin.user.list-user')->with('users', $users);
    }

    public function edit($id) {
        $users = User::findOrFail($id);
        return view('admin.user.edit-user')->with('users', $users);
    }

    public function update(Request $request, $id) {
        $validatedData = $request->validate([
            'role' => 'required',
        ], [
            'role.required' => 'Không được để trống *',
        ]);
        $users = User::findOrFail($id);
        $users->role = $request->input('role');
        $users->save();
        return redirect()->route('user_admin.index')->with('status', 'Cập nhật vai trò thành công!');
    }

    public function destroy($id) {
        $users = User::findOrFail($id);
        $users->delete();
        return redirect()->route('user_admin.index')->with('status', 'Xóa người dùng thành công!');      
    }

    public function multipleSearchUsers(Request $request) { 
        // tìm theo tên
        if ($request->input('searchByName')) {
            $result = User::where('name', 'LIKE', '%' .$request->input('searchByName'). '%')
            ->orWhere('email', 'LIKE', '%' .$request->input('searchByName'). '%')
            ->paginate(5);
            return view('admin.user.list-user')->with('users', $result);
        } 

        // tìm theo vai trò
        if ($request->filled('searchByRole')) {
            $data = User::where('role', $request->searchByRole)->paginate(5);
            return view('admin.user.list-user')->with('users', $data);
        } else {
            return redirect()->route('user_admin.index');
        }
    }

    // public function sortByChoice(Request $request) { // fix
    //     return view('admin.user.list-user');
    // }
}
