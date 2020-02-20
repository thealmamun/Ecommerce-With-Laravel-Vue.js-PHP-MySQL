<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Category;
use App\Product;
use App\ProductGallery;
use Illuminate\Http\Request;
use Image;
Use Illuminate\Support\Facades\DB;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//Op1:
//        $products = Product::all();

//        OP2:
//        $products = DB::table('products');
//
//            ->join('categories', 'categories.id', '=' ,'products.cat_id')
//            ->join('brands', 'brands.id', '=' ,'products.brand_id')
//            ->select('products.*', 'categories.cat_name','brands.brand_name')
//            ->get();

//        OP3:

        $products = Product::with('categories', 'brands')->get();
        return view('admin.product.product',[
            'products'=>$products
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::where('status', 1)->get();
        $brands = Brand::where('status', 1)->get();

      return view('admin.product.addProduct',[
          'categories' => $categories,
          'brands'=>$brands,
      ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $productImage = $request->file('pro_image');
        $imageName= date('mdYHis') . uniqid() . $productImage->getClientOriginalName();
        $directory = 'admin/images/product-images/';
        $imageUrl = $directory.$imageName;
        Image::make($productImage)->resize(300,300)->save($imageUrl);

        $product = new Product();
        $product->cat_id=$request->cat_id;
        $product->brand_id=$request->brand_id;
        $product->pro_name=$request->pro_name;
        $product->pro_short_desc=$request->pro_short_desc;
        $product->pro_long_desc=$request->pro_long_desc;
        $product->pro_price=$request->pro_price;
        $product->pro_discount=$request->pro_discount;
        $product->pro_qty=$request->pro_qty;
        $product->pro_image=$imageUrl;
        $product->status=$request->status;
        $product->save();

        $galleryImage = $request->file('pro_gallery');
        foreach ($galleryImage as $gallery){
            $imageName= date('mdYHis') . uniqid() . $gallery->getClientOriginalName();
            $directory = 'admin/images/product-images/gallery/';
            $imageUrl1 = $directory.$imageName;
            Image::make($gallery)->resize(300,300)->save($imageUrl1);

            $productGallery = new ProductGallery();
            $productGallery->product_id=$product->id;
            $productGallery->pro_gallery=$imageUrl;
            $productGallery->save();
        }


        return redirect('/product');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::with('categories','brands', 'productGallery')->find($id);
//        return $product;
        return view('admin.product.showProduct',[
            'product'=>$product
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
