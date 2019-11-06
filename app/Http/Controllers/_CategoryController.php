<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    function getCategory(){
        return view('category', ['cats' => DB::table('categories')->get()]);
    }

    function deleteCategory($id){
        if(DB::table('categories')->where('id', $id)->delete()){
            return view('category', ['cats' => DB::table('categories')->get(), 'message' => ['class' => 'alert-success', 'content' => 'Xóa thành công!']]);
        }
        else{
            return view('category', ['cats' => DB::table('categories')->get(), 'message' => ['class' => 'alert-danger', 'content' => 'Không thể xóa. Thử lại sau!']]);
        }
    }

    function insertCategory(Request $data){
        $name = $data->name;
        $isactive = $data->isactive == null || $data->isactive == "off" ? false : true;
        if(empty($name) || empty($data)){
            return view('category', ['cats' => DB::table('categories')->get(), 'message' => ['class' => 'alert-danger', 'content' => 'Không được để trống!']]);
        }
        else{
            if(DB::table('categories')->insert(['name' => $name, 'isactive' => $isactive])){
                return view('category', ['cats' => DB::table('categories')->get(), 'message' => ['class' => 'alert-success', 'content' => 'Thêm thành công!']]);
            }
            else{
                return view('category', ['cats' => DB::table('categories')->get(), 'message' => ['class' => 'alert-danger', 'content' => 'Không thể thêm. Thử lại sau!']]);
            }
        }
    }

    function getEditCategory($id){
        $data = DB::table('categories')->where('id', $id)->first();
        return view('category_edit', ['cat' => $data]);
    }

    function postEditCategory(Request $data){
        $id = $data->id;
        $name = $data->name;
        $isactive = $data->isactive == null || $data->isactive == "off" ? false : true;
        $updated_at = date("Y-m-d H:i:s");
        if(empty($name) || empty($data) || empty($id)){
            return view('category_edit', ['cat' => DB::table('categories')->where('id', $id)->first(), 'message' => ['class' => 'alert-danger', 'content' => 'Không được để trống!']]);
        }
        else{
            if(DB::table('categories')->where('id', $id)->update(['name' => $name, 'isactive' => $isactive, 'updated_at' => $updated_at])){
                return view('category', ['cats' => DB::table('categories')->get(), 'message' => ['class' => 'alert-success', 'content' => 'Sửa thành công!']]);
            }
            else{
                return view('category_edit', ['cat' => DB::table('categories')->where('id', $id)->first(), 'message' => ['class' => 'alert-danger', 'content' => 'Không thể sửa. Thử lại sau!']]);
            }
        }
    }
}
