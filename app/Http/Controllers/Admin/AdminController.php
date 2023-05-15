<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Album;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Contact;
use App\Models\Product;
use App\Models\Slide;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index() {
        $cateCount = Category::count('id');
        $prodCount = Product::count('id');
        $userCount = User::count('id');
        $blogCount = Blog::count('id');
        $reviewCount = Comment::count('id');
        $sliderCount = Slide::count('id');
        $albumCount = Album::count('id');
        $contactCount = Contact::count('id');

        return view('admin.dashboard') 
        ->with('cateCount', $cateCount)
        ->with('prodCount', $prodCount)
        ->with('userCount', $userCount)
        ->with('blogCount', $blogCount)
        ->with('reviewCount', $reviewCount)
        ->with('sliderCount', $sliderCount)
        ->with('albumCount', $albumCount)
        ->with('contactCount', $contactCount);
    }
}
