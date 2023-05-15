<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    public function index() {
        $category = Category::orderBy('id', 'DESC')->paginate(5); 
        return view('admin.category.list-cate')->with('category', $category);
    }

    public function create() {
        return view('admin.category.add-cate');
    }

    public function store(Request $request) {
        $validatedData = $request->validate([
            'cate_name' => 'required',
            'cate_image' => 'required',
        ], [
            'cate_name.required' => 'Không được để trống *',
            'cate_image.required' => 'Không được để trống *',
        ]);

        $category = new Category();
        if ($request->hasFile('cate_image')) {
            $file = $request->file('cate_image');
            $extension = $file->getClientOriginalExtension();
            $filename = time(). '.' .$extension;
            $file->move('uploads/cateImg/',$filename);
            $category->cate_image = $filename;
        }
        $category->cate_name = $request->input('cate_name');
        $category->save();
        return redirect()->route('category.index')->with('status', 'Thêm mới danh mục thành công!');
    }

    public function edit($id) {
        $category = Category::findOrFail($id);
        return view('admin.category.edit-cate')->with('category', $category);
    }

    public function update(Request $request, $id) {
        $validatedData = $request->validate([
            'cate_name' => 'required',
        ], [
            'cate_name.required' => 'Không được để trống *',
        ]);
        $category = Category::findOrFail($id);
        if ($request->hasFile('cate_image')) {
            $path = 'uploads/cateImg/'.$category->cate_image;
            if (File::exists($path)) {
                File::delete($path);
            }
            $file = $request->file('cate_image');
            $extension = $file->getClientOriginalExtension();
            $filename = time(). '.' .$extension;
            $file->move('uploads/cateImg/',$filename);
            $category->cate_image = $filename;
        }
        $category->cate_name = $request->input('cate_name');
        $category->save();
        return redirect()->route('category.index')->with('status', 'Cập nhật danh mục thành công!');
    }

    public function destroy($id) {
        $category = Category::findOrFail($id);
        if ($category->cate_image) {
            $path = 'uploads/cateImg/'.$category->cate_image;
            if (File::exists($path)) {
                File::delete($path);
            }
        }
        $category->delete();
        return redirect()->route('category.index')->with('status', 'Xóa danh mục thành công!');
    }

    public function unActive($id) {
        Category::where('id', $id)->update(['cate_status'=>1]);
        return redirect()->route('category.index')->with('status', 'Ẩn danh mục thành công!');
    }

    public function active($id) {
        Category::where('id', $id)->update(['cate_status'=>0]);
        return redirect()->route('category.index')->with('status', 'Hiện danh mục thành công!');
    }
}
