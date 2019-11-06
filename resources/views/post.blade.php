@extends('master.master')

@section('content')
<div class="row">
        <h1>Quản lí Bài đăng</h1>
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
                            <th>Tiêu đề</th>
                            <th>Mô tả</th>
                            <th>Nội dung</th>
                            <th>Ngày tạo</th>
                            <th>Ngày cập nhật</th>
                            <th>Danh mục</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(count($posts) > 0)
                            @foreach ($posts as $post)
                                <tr>
                                    <td>{{ $post->id }}</td>
                                    <td>{{ $post->title }}</td>
                                    <td>{{ $post->summary }}</td>
                                    <td>{{ $post->content }}</td>
                                    <td>{{ $post->created_at }}</td>
                                    <td>{{ $post->updated_at }}</td>
                                    <td>{{ $post->name }}</td>
                                    <td>
                                        <a href="/post/delete/{{ $post->id }}">Xóa</a>
                                        <a href="/post/edit/{{ $post->id }}">Sửa</a>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td>Không có dữ liệu</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            <form method="POST" action="/post/add">
                @csrf
                <table style="border:none;">
                    <tr>
                        <td>Tiêu đề:</td>
                        <td style="width: 500px;"><input class="form-control" style="margin: 0 0 0 10px;" type="text" name="title"/></td>
                    </tr>
                    <tr>
                        <td>Mô tả:</td>
                        <td style="width: 500px;"><textarea class="form-control" style="margin: 0 0 0 10px;" type="text" name="summary"></textarea></td>
                    </tr>
                    <tr>
                        <td style="vertical-align: top;">Nội dung:</td>
                        <td style="width: 500px;"><textarea rows="10" class="form-control" style="margin: 0 0 0 10px;" type="text" name="content"></textarea></td>
                    </tr>
                    <tr>
                        <td>Danh mục:</td>
                        <td style="width: 500px;">
                            <select name="cat" class="form-control" style="margin: 0 0 0 10px; width: 150px;" >
                                @foreach ($cats as $cat)
                                    <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                @endforeach
                            </select>
                        </td>
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