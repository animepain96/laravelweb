<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    function getPost(){
        $data = DB::table('posts')->join('categories', 'posts.cat_id', 'categories.id')->select('posts.*', 'categories.name')->get();
        $cats = DB::table('categories')->get();
        return view('post')->with(['posts' => $data, 'cats' => $cats]);
    }

    function deletePost($id){
        if(DB::table('posts')->where('id', $id)->delete()){
            $message = ['class' => 'alert-success', 'content' => 'Xóa thành công!'];
        }
        else{
            $message = ['class' => 'alert-danger', 'content' => 'Không thể xóa. Thử lại sau!'];
        }
        $data = DB::table('posts')->join('categories', 'posts.cat_id', 'categories.id')->select('posts.*', 'categories.name')->get();
        $cats = DB::table('categories')->get();
        return view('post')->with(['posts' => $data, 'cats' => $cats, 'message' => $message]);
    }

    function insertPost(Request $data){
        $title = $data->title;
        $summary = $data->summary;
        $content = $data->content;
        $cat_id = $data->cat;
        if(empty($title) || empty($summary) || empty($content) || empty($cat_id)){
            $message = ['class' => 'alert-danger', 'content' => 'Không được để trống!'];
        }
        else if(DB::table('posts')->insert(['title' => $title, 'summary' => $summary, 'content' => $content, 'cat_id' => $cat_id, 'per_id' => 1])){
            $message = ['class' => 'alert-success', 'content' => 'Thêm thành công!'];
        }
        else{
            $message = ['class' => 'alert-danger', 'content' => 'Không thể thêm. Thử lại sau!'];
        }
        $data = DB::table('posts')->join('categories', 'posts.cat_id', 'categories.id')->select('posts.*', 'categories.name')->get();
        $cats = DB::table('categories')->get();
        return view('post')->with(['posts' => $data, 'cats' => $cats, 'message' => $message]);
    }

    function getEditPost($id){
        $data = DB::table('posts')->where('id', $id)->first();
        $cats = DB::table('categories')->get();
        return view('post_edit', ['post' => $data, 'cats' => $cats]);
    }

    function postEditPost(Request $data){
        $id = $data->id;
        $title = $data->title;
        $summary = $data->summary;
        $content = $data->content;
        $updated_at = date("Y-m-d H:i:s");
        $cat_id = $data->cat;
        if(empty($title) || empty($summary) || empty($content) || empty($updated_at) || empty($cat_id)){
            $message = ['class' => 'alert-danger', 'content' => 'Không được để trống!'];
        }
        else if(DB::table('posts')->where('id', $id)->update(['title' => $title, 'summary' => $summary, 'content' => $content, 'updated_at' => $updated_at, 'cat_id' => $cat_id])){
            $message = ['class' => 'alert-success', 'content' => 'Sửa bài đăng thành công!'];
        }
        else{
            $message = ['class' => 'alert-danger', 'content' => 'Không sửa được. Thử lại sau!'];
        }
        $data = DB::table('posts')->where('id', $id)->first();
        $cats = DB::table('categories')->get();
        return view('post_edit', ['post' => $data, 'cats' => $cats, 'message' => $message]);
    }
}
