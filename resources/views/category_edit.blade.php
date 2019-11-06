@extends('master.master')

@section('content')
<div class="row">
    <h1>Sửa danh mục</h1>
</div>
@isset($message)
<div class="row">
    <div class="alert {{ $message['class'] }}" role="alert">
            {{ $message['content'] }}
    </div>
</div>
@endisset
<div class="row">
    <div class="container-fluid">
        <form method="POST" action="/category/edit">
            @csrf
            <table style="border:none; maxwidth: 500px;">
                    <tr>
                        <td>Tên danh mục:</td>
                    <td><input type="hidden" name="id" value="{{$cat->id}}"><input style="margin: 0 0 0 10px; padding: 0 5px;" type="text" name="name" value="{{ $cat->name }}"></td>
                    </tr>
                    <tr>
                        <td>Bật:</td>
                        <td><input style="margin: 0 0 0 10px;" type="checkbox" name="isactive" @if($cat->isactive == true) checked @endif/></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <button type="submit" class="btn btn-primary">Sửa</button>
                        </td>
                    </tr>
                </table>
        </form>
        <a href="/category">Quay lại Danh mục</a>
    </div>
</div>
@endsection