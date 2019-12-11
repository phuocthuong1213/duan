<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\Category;
class FrontEndController extends Controller
{
    public function getHome(){
        $data['featured'] = Product::where('pro_featured',1)->orderBy('pro_id','desc')->take(8)->get();
        $data['new'] = Product::orderBy('pro_id','desc')->get();
        return view('frontend.home',$data);
    }

    public function getDetail($id){
        $data['item'] = Product::find($id);
        return view('frontend.details',$data);
    }

    public function getCategory($id){
        $data['catename'] = Category::find($id);
        $data['item1'] = Product::where('pro_cate',$id)->orderBy('pro_id','desc')->paginate(8);
        //
        return view('frontend.category',$data);
    }
}
