@extends('master.master')

@section('content')
<div class="row">
    <h3>Thêm mới Danh mục</h3>
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
        <form method="POST" action="{{ route('category.store') }}">
            @csrf
            <table style="border:none; maxwidth: 500px;">
                <tr>
                    <td>Tên danh mục:</td>
                    <td><input class="form-control" style="margin: 0 0 0 10px;" type="text" name="name"/></td>
                </tr>
                <tr>
                    <td>Hoạt động:</td>
                    <td><input style="margin: 0 0 0 10px;" type="checkbox" name="isactive"/></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <button type="submit" class="btn btn-primary">Thêm</button>
                    </td>
                </tr>
            </table>
        </form>
        <a href="{{ route('category.index') }}">Quay lại Danh mục</a>
    </div>
</div>
@endsection