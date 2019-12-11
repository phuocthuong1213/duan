<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;
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
}
