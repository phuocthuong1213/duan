<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Requests\AddCateRequest;
use Str;

class CategoryController extends Controller
{
    public function getCate(){
        $data['catelist'] = Category::all();
        return view('backend.category',$data);
    }

    public function postCate(AddCateRequest $request){
        $category = new Category;
        $category->cate_name = $request->name;
        $category->cate_slug = Str::slug($request->name);
        $category->save();
        return back();
    }

    public function getEditCate(){
        return view('backend.editcategory');
    }

    public function getDeleteCate(){

    }
}