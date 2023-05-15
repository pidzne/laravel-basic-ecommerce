<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CommentController extends Controller
{
    public function index() {
        $comments = DB::table('comments')
        ->join('users', 'comments.user_id', 'users.id')
        ->join('products', 'comments.prod_id', 'products.id')
        ->select('comments.*', 'users.name as userName', 'products.prod_name as prodName')
        ->orderBy('comments.id', 'DESC')
        ->paginate(5);
        return view('admin.comment.list-comment')->with('comments', $comments);
    }

    public function unActive($id) {
        Comment::where('id', $id)->update(['status'=>1]);
        return redirect()->route('comment.index')->with('status', 'Ẩn bình luận thành công!');
    }

    public function active($id) {
        Comment::where('id', $id)->update(['status'=>0]);
        return redirect()->route('comment.index')->with('status', 'Hiện bình luận thành công!');
    }
}
