<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\Category;
use App\Models\Comment;
class FrontEndController extends Controller
{
    public function getHome(){
        $data['featured'] = Product::where('pro_featured',1)->orderBy('pro_id','desc')->take(8)->get();
        $data['new'] = Product::orderBy('pro_id','desc')->get();
        return view('frontend.home',$data);
    }

    public function getDetail($id){
        $data['item'] = Product::find($id);
        $data['comment'] = Comment::where('com_product',$id)->get(  );
        return view('frontend.details',$data);
    }

    public function getCategory($id){
        $data['catename'] = Category::find($id);
        $data['item1'] = Product::where('pro_cate',$id)->orderBy('pro_id','desc')->paginate(8);
        return view('frontend.category',$data);
    }

    public function postComment(Request $request,$id){
        $comment = new Comment;
        $comment->com_name = $request->name;
        $comment->com_email = $request->email;
        $comment->com_content = $request->content;
        $comment->com_product = $id;
        $comment->save();
        return back();
        // $comment = new Comment($request->all());
        // $comment->save();
    }

    public function getSearch(Request $request){
        $result = $request->result;
        $data['keyword'] = $result;

        $result = str_replace(' ','%',$result);
        
        $data['item'] = Product::where('pro_name','like','%'.$result.'%')->paginate(1);
        
        return view('frontend.search',$data);

    }
}
