<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class BlogController extends Controller
{
    public function index() {
        $blog = Blog::orderBy('id', 'DESC')->get();
        return view('admin.blog.list-blog')->with(compact('blog'));
    }

    public function create() {
        $blogCate = BlogCategory::all();
        return view('admin.blog.add-blog')->with(compact('blogCate'));
    }

    public function store(Request $request) {
        $validatedData = $request->validate([
            'blog_cate_id' => 'required',
            'title' => 'required',
            'content' => 'required',
            'hashtag' => 'required',
            'author' => 'required',
            'link' => 'required',
            'blog_image' => 'required',
        ], [
            'blog_cate_id.required' => 'Không được để trống *',
            'title.required' => 'Không được để trống *',
            'content.required' => 'Không được để trống *',
            'hashtag.required' => 'Không được để trống *',
            'author.required' => 'Không được để trống *',
            'link.required' => 'Không được để trống *',
            'blog_image.required' => 'Không được để trống *',
        ]);
        $blog = new Blog();
        $blog->blog_cate_id = $request->blog_cate_id;
        $blog->title = $request->title;
        $blog->content = $request->content;
        $blog->hashtag = $request->hashtag;
        $blog->author = $request->author;
        $blog->link = $request->link;
        if ($request->hasFile('blog_image')) {
            $file = $request->file('blog_image');
            $extension = $file->getClientOriginalExtension();
            $filename = time(). '.' .$extension;
            $file->move('uploads/blogImg/',$filename);
            $blog->blog_image = $filename;
        } 
         // dd($blog);
        $blog->save();
        return redirect()->route('blog.index')->with('status', 'Thêm mới bài viết thành công!');;
    }

    public function show($id) {
        return view();
    }

    public function edit($id) {
        $blogCate = BlogCategory::all();
        $blog = Blog::findOrFail($id);
        return view('admin.blog.edit-blog')->with(compact('blog', 'blogCate'));
    }

    public function update(Request $request, $id) {
        $validatedData = $request->validate([
            'blog_cate_id' => 'required',
            'title' => 'required',
            'content' => 'required',
            'hashtag' => 'required',
            'author' => 'required',
            'link' => 'required',
        ], [
            'blog_cate_id.required' => 'Không được để trống *',
            'title.required' => 'Không được để trống *',
            'content.required' => 'Không được để trống *',
            'hashtag.required' => 'Không được để trống *',
            'author.required' => 'Không được để trống *',
            'link.required' => 'Không được để trống *',
        ]);
        $blog = Blog::findOrFail($id);
        $blog->blog_cate_id = $request->blog_cate_id;
        $blog->title = $request->title;
        $blog->content = $request->content;
        $blog->hashtag = $request->hashtag;
        $blog->author = $request->author;
        $blog->link = $request->link;
        if ($request->hasFile('blog_image')) {
            $path = 'uploads/blogImg/'.$blog->blog_image;
            if (File::exists($path)) {
                File::delete($path);
            }
            $file = $request->file('blog_image');
            $extension = $file->getClientOriginalExtension();
            $filename = time(). '.' .$extension;
            $file->move('uploads/blogImg/',$filename);
            $blog->blog_image = $filename;
        } 
        $blog->save();
        return redirect()->route('blog.index')->with('status', 'Cập nhật bài viết thành công!');
    }

    public function destroy($id) {
        $blog = Blog::findOrFail($id);
        $blog->delete();
        return redirect()->route('blog.index')->with('status', 'Xóa bài viết thành công!');
    }

    public function unActive($id) {
        Blog::where('id', $id)->update(['blog_status' => 1]);
        return redirect()->route('blog.index')->with('status', 'Ẩn bài viết thành công!');
    }

    public function active($id) {
        Blog::where('id', $id)->update(['blog_status' => 0]);
        return redirect()->route('blog.index')->with('status', 'Hiện bài viết thành công!');
    }
}
