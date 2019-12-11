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

    public function postEditProduct(Request $request,$id){
        $product = new Product;
            $arr['pro_name'] = $request->name;
            $arr['pro_slug'] = Str::slug($request->name);
            $arr['pro_price']= $request->price;
            $arr['pro_accessories'] = $request->accessories;
            $arr['pro_warranty'] = $request->warranty;
            $arr['pro_promotion'] = $request->promotion;
            $arr['pro_condition'] = $request->condition;
            $arr['pro_status'] = $request->status;
            $arr['pro_description'] = $request->description;
            $arr['pro_cate']= $request->cate;
            $arr['pro_featured'] = $request->featured;
        if($request->hasFile('img')){
            $img = $request->img->getClientOriginalName();
            $arr['pro_img'] = $img;
            $request->img->storeAs('avarta'.$img);
        }
        $product::where('pro_id',$id)->update($arr); 
        return redirect()->to('admin/product');
    }

    public function getDeleteProduct($id){
        Product::destroy($id);
        return back();
    }
}
