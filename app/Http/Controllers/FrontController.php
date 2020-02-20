<?php

namespace App\Http\Controllers;
use App\Category;
use App\Product;
use Illuminate\Http\Request;

class FrontController extends Controller
{

    public function index(){

//        $categories = Category::where('status', 1)->get();
        $products = Product::orderBy('id','desc')->take(3)->skip(1)->where('status', 1)->get();
        return view('front-end.home.home',[
//            'categories'=>$categories,
            'products'=>$products
        ]);

    }

    public function category($id){

        $categoryProduct = Product::where('cat_id',$id)->where('status',1)->get();

//        $categories = Category::where('status', 1)->get();
        return view('front-end.category.category',[
            'categoryProduct'=>$categoryProduct,
        ]);
    }
}
