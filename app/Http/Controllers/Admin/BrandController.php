<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use Illuminate\Support\Facades\File;

class BrandController extends Controller
{
    public function index() {
        $brand = Brand::orderBy('id', 'DESC')->get(); 
        return view('admin.brand.list-brand')->with('brand', $brand);
    }

    public function create() {
        return view('admin.brand.add-brand');
    }

    public function store(Request $request) {
        $validatedData = $request->validate([
            'brand_name' => 'required',
            'brand_image' => 'required',
        ], [
            'brand_name.required' => 'Không được để trống *',
            'brand_image.required' => 'Không được để trống *',
        ]);
        $brand = new Brand();
        if ($request->hasFile('brand_image')) {
            $file = $request->file('brand_image');
            $extension = $file->getClientOriginalExtension();
            $filename = time(). '.' .$extension;
            $file->move('uploads/brandImg/',$filename);
            $brand->brand_image = $filename;
        }
        $brand->brand_name = $request->input('brand_name');
        $brand->save();
        return redirect()->route('brand.index')->with('status', 'Thêm mới thương hiệu thành công!');
    }

    public function edit($id) {
        $brand = Brand::findOrFail($id);
        return view('admin.brand.edit-brand')->with('brand', $brand);
    }

    public function update(Request $request, $id) {
        // kiểm thử
        $validatedData = $request->validate([
            'brand_name' => 'required',
            'brand_image' => 'required',
        ], [
            'brand_name.required' => 'Không được để trống *',
        ]);
        $brand = Brand::findOrFail($id);
        if ($request->hasFile('brand_image')) {
            $path = 'uploads/brandImg/'.$brand->brand_image;
            if (File::exists($path)) {
                File::delete($path);
            }
            $file = $request->file('brand_image');
            $extension = $file->getClientOriginalExtension();
            $filename = time(). '.' .$extension;
            $file->move('uploads/brandImg/',$filename);
            $brand->brand_image = $filename;
        }
        $brand->brand_name = $request->input('brand_name');
        $brand->save();
        return redirect()->route('brand.index')->with('status', 'Cập nhật thương hiệu thành công!');
    }

    public function destroy($id) {
        $brand = Brand::findOrFail($id);
        if ($brand->brand_image) {
            $path = 'uploads/brandImg/'.$brand->brand_image;
            if (File::exists($path)) {
                File::delete($path);
            }
        }
        $brand->delete();
        return redirect()->route('brand.index')->with('status', 'Xóa thương hiệu thành công!');
    }

    public function unActive($id) {
        Brand::where('id', $id)->update(['brand_status'=>1]);
        return redirect()->route('brand.index')->with('status', 'Ẩn thương hiệu thành công!');
    }

    public function active($id) {
        Brand::where('id', $id)->update(['brand_status'=>0]);
        return redirect()->route('brand.index')->with('status', 'Hiện thương hiệu thành công!');
    }
}
