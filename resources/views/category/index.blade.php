@extends('master.master')

@section('content')
<div class="row">
    <h3>Quản lí Danh mục</h3>
</div>
@if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div>
  @endif
<div class="row mb-5">
    <a href="{{ route('category.create') }}" class="btn btn-primary ml-auto mr">Thêm mới</a>
</div>
<div class="row">
    <div class="container-fluid">
            <table class="table">
                <thead>
                    <tr>
                        <th>Mã</th>
                        <th>Tên</th>
                        <th>Hoạt động</th>
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
                                <a href="{{ route('category.edit', $cat->id) }}" class="btn btn-primary">Sửa</a>
                                <form action="{{ route('category.destroy', $cat->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" type="submit">Xóa</button>
                                </form>
                            </td>
                            </tr>
                        @endforeach
                </tbody>
            </table>
    </div>
</div>
@endsection