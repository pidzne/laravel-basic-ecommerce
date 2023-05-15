<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Album;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AlbumController extends Controller
{
    public function index($id) {
        $product = Product::findOrFail($id);
        $album = Album::with('products')->where('albums.prod_id',$id)->get();
        return view('admin.albums.list-album')->with('album', $album)->with('product', $product);
    }

    public function create($id) {
        $product = Product::findOrFail($id);
        return view('admin.albums.add-album')->with('product', $product);
    }

    public function store(Request $request, $id) {
        $validatedData = $request->validate([
            'album_image' => 'required',
        ], [
            'album_image.required' => 'Không được để trống *',
        ]);
        $product = Product::findOrFail($id);
        $album = new Album();
        if ($request->hasFile('album_image')) {
            $file = $request->file('album_image');
            $extension = $file->getClientOriginalExtension();
            $filename = time(). '.' .$extension;
            $file->move('uploads/albumImg/',$filename);
            $album->album_image = $filename;
        }
        $album->prod_id = $request->prod_id;
        $album->save();
        return redirect()->route('album.index', ['id'=>$product->id])->with('status','Thêm album thành công');
    }

    public function edit($id) {
        $album = Album::findOrFail($id);
        $prod_id_select = Product::select('id')->where('id', $album->prod_id)->firstOrFail();
        return view('admin.albums.edit-album')->with('album', $album)->with('prod_id_select', $prod_id_select);
    }

    public function update(Request $request, $id) {
        $validatedData = $request->validate([
            'album_image' => 'required',
        ], [
            'album_image.required' => 'Không được để trống *',
        ]);
        $album = Album::findOrFail($id);
        if ($request->hasFile('album_image')) {
            $path = 'uploads/albumImg/'.$album->album_image;
            if (File::exists($path)) {
                File::delete($path);
            }
            $file = $request->file('album_image');
            $extension = $file->getClientOriginalExtension();
            $filename = time(). '.' .$extension;
            $file->move('uploads/albumImg/',$filename);
            $album->album_image = $filename;
        }
        $album->save();
        return redirect()->route('album.index', ['id'=>$album->prod_id])->with('status','Cập nhật ảnh thành công');
    }

    public function destroy($id) {
        $album = Album::findOrFail($id);
        $album->delete();
        return redirect()->route('album.index', ['id'=>$album->prod_id])->with('status', 'Xóa ảnh thành công!');
    }

    public function unActive($id) {
        Album::where('id', $id)->update(['album_status'=>1]);
        return back()->with('status', 'Ẩn ảnh thành công!');
    }

    public function active($id) {
        Album::where('id', $id)->update(['album_status'=>0]);
        return back()->with('status', 'Hiện ảnh thành công!');
    }
}
