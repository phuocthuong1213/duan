<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Str;

class CategoryController extends Controller
{
    #Hiển thị danh mục
    public function getCate(){
        $data['catelist'] = Category::all();
        return view('backend.category',$data);
    }

    #Thêm danh mục
    public function postCate(Request $request){
        $category = new Category;
        $category->cate_name = $request->name;
        $category->cate_slug = Str::slug($request->name);
        $category->save();
        return back();
    }

    #Value danh mục
    public function getEditCate($id){
        $data['cate'] = Category::find($id);
        return view('backend.editcategory',$data);
    }

    #Sửa danh mục
    public function postEditCate(Request $request, $id){
        $data['cate'] = Category::find($id);
    
        try {
            $category = Category::find($id);
            $category->cate_name = $request->name;
            $category->cate_slug = Str::slug($request->name);
            $category->save();
        } catch (\Illuminate\Database\QueryException $ex) {
            $data['error'] = 'Tên bị trùng';
            return view('backend.editcategory', $data);
        }
        return redirect()->to('admin/category');
    }

    #Xóa danh mục
    public function getDeleteCate($id){
        Category::destroy($id);
        return back();
    }
}