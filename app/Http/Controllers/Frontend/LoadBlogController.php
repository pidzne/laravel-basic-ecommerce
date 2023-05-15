<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Http\Request;

class LoadBlogController extends Controller
{
    public function index() {
        $blogCate = BlogCategory::all();
        // $blog = Blog::all();
        $blog = Blog::orderBy('id', 'desc')->get();
        $blogRandom = Blog::inRandomOrder()->limit(5)->get();
        // dd($blogRandom);
        $blogHashtag = Blog::select('hashtag')->get();
        // dd($blogHashtag);
        return view('frontend.blogger.blog-list')->with(compact('blog', 'blogCate', 'blogRandom', 'blogHashtag'));
    }

    public function show($id) {
        $blog = Blog::findOrFail($id);
        return view('frontend.blogger.blog-detail')->with(compact('blog'));
    }

    public function searchBlog(Request $request) {
        if ($request->input('searchByBlogName')) {
            $blogCate = BlogCategory::all();
            $blogRandom = Blog::inRandomOrder()->limit(5)->get();
            $blogHashtag = Blog::select('hashtag')->get();
            $blog = Blog::where('title', 'LIKE', '%' .$request->input('searchByBlogName'). '%')->get();
            return view('frontend.blogger.blog-list')->with(compact('blog', 'blogCate', 'blogRandom', 'blogHashtag'));
        } else {
            return redirect()->route('blogger.index');
        }
    }

    public function loadBlogByCate($id) {
        $isExist = BlogCategory::where('id', $id)->exists();
        if ($isExist) {
            $blogCate = BlogCategory::where('id', $id)->firstOrFail();
            $blog = Blog::where('blog_cate_id', $blogCate->id)->where('blog_status', '0')->orderBy('id', 'desc')->get();
            return view('frontend.blogger.blog-cate')->with(compact('blogCate', 'blog'));
        } else {
            return back()->with('info', 'Không tìm thấy bài viết theo danh mục');
        }
    }
}
