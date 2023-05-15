<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;

class SliderController extends Controller
{
    public function index() {
        $slider = Slide::orderBy('id', 'desc')->paginate(5); 
        return view('admin.slider.list-slider')->with('slider', $slider);
    }

    public function create() {
        return view('admin.slider.add-slider');
    }

    public function store(Request $request) {
        // kiểm thử
        $validatedData = $request->validate([
            'slider_title' => 'required',
            'slider_subtitle1' => 'required',
            'slider_subtitle2' => 'required',
            'slider_subtitle3' => 'required',
            'slider_subtitle4' => 'required',
        ], [
            'slider_title.required' => 'Không được để trống *',
            'slider_subtitle1.required' => 'Không được để trống *',
            'slider_subtitle2.required' => 'Không được để trống *',
            'slider_subtitle3.required' => 'Không được để trống *',
            'slider_subtitle4.required' => 'Không được để trống *',
        ]);
        $slider = new Slide();
        if ($request->hasFile('slider_image')) {
            $file = $request->file('slider_image');
            $extension = $file->getClientOriginalExtension();
            $filename = time(). '.' .$extension;
            $file->move('uploads/sliderImg/',$filename);
            $slider->slider_image = $filename;
        }
        $slider->slider_title = $request->input('slider_title');
        $slider->slider_subtitle1 = $request->input('slider_subtitle1');
        $slider->slider_subtitle2 = $request->input('slider_subtitle2');
        $slider->slider_subtitle3 = $request->input('slider_subtitle3');
        $slider->slider_subtitle4 = $request->input('slider_subtitle4');
        $slider->save();
        return redirect()->route('slider.index')->with('status', 'Thêm mới slider thành công!');
    }

    public function edit($id) {
        $slider = Slide::findOrFail($id);
        return view('admin.slider.edit-slider')->with('slider', $slider);
    }

    public function update(Request $request, $id) {
        $validatedData = $request->validate([
            'slider_title' => 'required',
            'slider_subtitle1' => 'required',
            'slider_subtitle2' => 'required',
            'slider_subtitle3' => 'required',
            'slider_subtitle4' => 'required',
        ], [
            'slider_title.required' => 'Không được để trống *',
            'slider_subtitle1.required' => 'Không được để trống *',
            'slider_subtitle2.required' => 'Không được để trống *',
            'slider_subtitle3.required' => 'Không được để trống *',
            'slider_subtitle4.required' => 'Không được để trống *',
        ]);
        $slider = Slide::findOrFail($id);
        if ($request->hasFile('slider_image')) {
            $path = 'uploads/sliderImg/'.$slider->slider_image;
            if (File::exists($path)) {
                File::delete($path);
            }
            $file = $request->file('slider_image');
            $extension = $file->getClientOriginalExtension();
            $filename = time(). '.' .$extension;
            $file->move('uploads/sliderImg/',$filename);
            $slider->slider_image = $filename;
        }
        $slider->slider_title = $request->input('slider_title');
        $slider->slider_subtitle1 = $request->input('slider_subtitle1');
        $slider->slider_subtitle2 = $request->input('slider_subtitle2');
        $slider->slider_subtitle3 = $request->input('slider_subtitle3');
        $slider->slider_subtitle4 = $request->input('slider_subtitle4');
        $slider->save();
        return redirect()->route('slider.index')->with('status', 'Cập nhật slider thành công!');
    }

    public function destroy($id) {
        $slider = Slide::findOrFail($id);
        if ($slider->slider_image) {
            $path = 'uploads/sliderImg/'.$slider->slider_image;
            if (File::exists($path)) {
                File::delete($path);
            }
        }
        $slider->delete();
        return redirect()->route('slider.index')->with('status', 'Xóa slider thành công!');
    }

    public function unActive($id) {
        Slide::where('id', $id)->update(['slider_status'=>1]);
        return redirect()->route('slider.index')->with('status', 'Ẩn slider thành công!');
    }

    public function active($id) {
        Slide::where('id', $id)->update(['slider_status'=>0]);
        return redirect()->route('slider.index')->with('status', 'Hiện slider thành công!');
    }
}
