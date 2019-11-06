@extends('master.master')

@section('content')
<div class="row">
        <h1>Sửa Bài đăng</h1>
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
            <form method="POST" action="/post/edit">
                @csrf
                <table style="border:none;">
                    <tr>
                        <td>Tiêu đề:</td>
                    <td style="width: 500px;"><input type="hidden" name="id" value="{{ $post->id }}"><input value="{{ $post->title }}" class="form-control" style="margin: 0 0 0 10px;" type="text" name="title"/></td>
                    </tr>
                    <tr>
                        <td>Mô tả:</td>
                    <td style="width: 500px;"><textarea class="form-control" style="margin: 0 0 0 10px;" type="text" name="summary">{{ $post->summary }}</textarea></td>
                    </tr>
                    <tr>
                        <td style="vertical-align: top;">Nội dung:</td>
                    <td style="width: 500px;"><textarea rows="10" class="form-control" style="margin: 0 0 0 10px;" type="text" name="content">{{ $post->content }}</textarea></td>
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
                            <button type="submit" class="btn btn-primary">Sửa</button>
                        </td>
                    </tr>
                </table>
            </form>
            <a href="/post">Quay lại Bài đăng</a>
        </div>
    </div>
@endsection