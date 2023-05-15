<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use Illuminate\Http\Request;

class BlogCateController extends Controller
{
    public function index() {
        $blogCate = BlogCategory::orderBy('id', 'DESC')->get();
        return view('admin.blog.list-blog-cate', with(compact('blogCate')));
    }

    public function create() {
        return view('admin.blog.add-blog-cate');
    }

    public function store(Request $request) {
        $validatedData = $request->validate([
            'name' => 'required',
        ], [
            'name.required' => 'Không được để trống *',
        ]);
        $blogCate = new BlogCategory();
        $blogCate->blog_cate_name = $request->name;
        $blogCate->save();        
        return redirect()->route('blog_cate.index')->with('status', 'Thêm mới danh mục bài viết thành công!');
    }

    public function show($id) {
        return view();
    }

    public function edit($id) {
        $blogCate = BlogCategory::findOrFail($id);
        return view('admin.blog.edit-blog-cate')->with(compact('blogCate'));
    }

    public function update(Request $request, $id) {
        $validatedData = $request->validate([
            'name' => 'required',
        ], [
            'name.required' => 'Không được để trống *',
        ]);
        $blogCate = BlogCategory::findOrFail($id);
        $blogCate->blog_cate_name = $request->name;
        $blogCate->save(); 
        // $blogCate->update();        
        return redirect()->route('blog_cate.index')->with('status', 'Cập nhật danh mục bài viết thành công!');
    }

    public function destroy($id) {
        $blogCate = BlogCategory::findOrFail($id);
        $blogCate->delete();
        return redirect()->route('blog_cate.index')->with('status', 'Xóa danh mục bài viết thành công!');
    }

    public function unActive($id) {
        BlogCategory::where('id', $id)->update(['blog_cate_status' => 1]);
        return redirect()->route('blog_cate.index')->with('status', 'Ẩn danh mục bài viết thành công!');
    }

    public function active($id) {
        BlogCategory::where('id', $id)->update(['blog_cate_status' => 0]);
        return redirect()->route('blog_cate.index')->with('status', 'Hiện danh mục bài viết thành công!');
    }
}
