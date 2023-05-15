<?php

namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request) {
        $keywords = $request->keywords;
        $searchResults = Product::where('prod_name', 'like', '%' .$keywords .'%')->get();
        return view('frontend.search')->with('searchProd', $searchResults);
    }  
}
