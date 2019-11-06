@extends('master.master')

@section('content')
<div class="row">
    <h1>Quản lí Danh mục</h1>
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
            <table class="table">
                <thead>
                    <tr>
                        <th>Mã</th>
                        <th>Tên</th>
                        <th>Bật</th>
                        <th>Ngày tạo</th>
                        <th>Ngày cập nhật</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                        @foreach ($cats as $cat)
                            <tr>
                                <td>{{ $cat->id }}</td>
                                <td>{{ $cat->name }}</td>
                                <td><input type="checkbox" @if($cat->isactive) checked @endif disabled></td>
                                <td>{{ $cat->created_at }}</td>
                                <td>{{ $cat->updated_at }}</td>
                            <td>
                                <a href="/category/delete/{{ $cat->id }}">Xóa</a>
                                <a href="/category/edit/{{ $cat->id }}">Sửa</a>
                            </td>
                            </tr>
                        @endforeach
                </tbody>
            </table>
        <form method="POST" action="{{ route('category.store') }}">
            @csrf
            <table style="border:none; maxwidth: 500px;">
                <tr>
                    <td>Tên danh mục:</td>
                    <td><input class="form-control" style="margin: 0 0 0 10px;" type="text" name="name"/></td>
                </tr>
                <tr>
                    <td>Bật:</td>
                    <td><input style="margin: 0 0 0 10px;" type="checkbox" name="isactive"/></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <button type="submit" class="btn btn-primary">Thêm</button>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>
@endsection