<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Str;
use DB;
class ProductController extends Controller
{
    public function getProduct(){
        $data['productlist'] = DB::table('products')->join('categories','products.pro_cate','=','categories.cate_id')->orderBy('pro_id','desc')->get();
        return view('backend.product',$data);
    }

    public function getAddProduct(){
        $data['catelist'] = Category::all();
        return view('backend.addproduct',$data);
    }

    public function postAddProduct(Request $request){
        $filename = $request->img->getClientOriginalName();
        $product = new Product;
        $product->pro_name = $request->name;
        $product->pro_slug = Str::slug($request->name);
        $product->pro_img = $filename;
        $product->pro_accessories = $request->accessories;
        $product->pro_price = $request->price;
        $product->pro_warranty = $request->warranty;
        $product->pro_promotion = $request->promotion;
        $product->pro_condition = $request->condition;
        $product->pro_status = $request->status;
        $product->pro_description = $request->description;
        $product->pro_cate = $request->cate;
        $product->pro_featured = $request->featured;
        $product->save();
        $request->img->storeAs('avarta',$filename);
        return back();
    }

    public function getEditProduct($id){
        $data['product'] = Product::find($id);
        $data['listcate'] = Category::all();
        return view('backend.editproduct',$data);
    }

    public function postEditProduct(){
        
    }

    public function getDeleteProduct(){
        
    }
}
