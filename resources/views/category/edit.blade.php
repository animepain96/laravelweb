@extends('master.master')

@section('content')
<div class="row">
    <h1>Sửa danh mục</h1>
</div>
@if($errors->any())
<div class="row">
    <div class="alert alert-danger" role="alert">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
</div>
@endif
<div class="row">
    <div class="container-fluid">
        <form method="post" action="{{ route('category.update', $cat->id) }}">
            @method('PATCH')
            @csrf
            <table style="border:none; maxwidth: 500px;">
                    <tr>
                        <td>Tên danh mục:</td>
                    <td><input style="margin: 0 0 0 10px; padding: 0 5px;" type="text" name="name" value="{{ $cat->name }}"></td>
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
        <a href="{{ route('category.index') }}">Quay lại Danh mục</a>
    </div>
</div>
@endsection