<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    function searchCategory(Request $request){
        $query = $request->get('query');
        $cats = Category::where('name', 'like', '%'.$query.'%')->orWhere('id', 'like', '%'.$query.'%')->get();
        $data = "";
        foreach ($cats as $cat){
            $data .= '<tr>';
            $data .= '<td>'. $cat->id .'</td>';
            $data .= '<td>'. $cat->name .'</td>';
            $data .= '<td><input type="checkbox" '. ($cat->isactive ? 'checked' : '') .' disabled></td>';
            $data .= '<td>'. $cat->created_at->format('d-m-Y H:i:s') .'</td>';
            $data .= '<td>'. $cat->updated_at->format('d-m-Y H:i:s') .'</td>';
            $data .= '<td><a href="' .route('category.edit', $cat->id). '" class="btn btn-primary">Sửa</a>';
            $data .= '<form action="'. route('category.destroy', $cat->id) .'" method="post">
                        <input type="hidden" name="_token" value="'. csrf_token() .'">
                        <input type="hidden" name="_method" value="DELETE">
                        <button class="btn btn-danger" type="submit">Xóa</button>
                        </form></td>';
            $data .= '</tr>';
        }
        if($data == ''){
            $data.='<tr><td colspan="6">Không có dữ liệu.<input type="hidden" name="_token" value="'. csrf_token() .'"></td></tr>';
        }
        echo $data;
    }
}
