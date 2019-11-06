@extends('master.master')

@section('content')
<div class="row">
        <h3>Quản lí Bài đăng</h3>
    </div>
    @if (session()->get('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif
    <div class="row mb-5">
        <a href="{{ route('post.create') }}" class="btn btn-primary ml-auto">Thêm</a>
    </div>
    <div class="row">
        <div class="container-fluid">
            <table class="table">
                <thead>
                    <tr>
                        <th>Mã</th>
                        <th>Tiêu đề</th>
                        <th>Mô tả</th>
                        <th>Nội dung</th>
                        <th>Ngày tạo</th>
                        <th>Ngày cập nhật</th>
                        <th>Danh mục</th>
                        <th>Tác giả</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                        <tr>
                            <td>{{ $post->id }}</td>
                            <td>{{ $post->title }}</td>
                            <td>{{ $post->summary }}</td>
                            <td>{{ $post->content }}</td>
                            <td>{{ $post->created_at }}</td>
                            <td>{{ $post->updated_at }}</td>
                            <td>{{ $post->category->name }}</td>
                            <td>{{ $post->person->name }}</td>
                            <td>
                                <a class="btn btn-primary" href="{{ route('post.edit', $post->id) }}">Sửa</a>
                                <form action="{{ route('post.destroy', $post->id) }}" method="POST">
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