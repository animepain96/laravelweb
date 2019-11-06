@extends('master.master')

@section('content')
<div class="row">
        <h3>Thêm Bài đăng</h3>
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
        <form method="POST" action="{{ route('post.store') }}">
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
                        <select name="cat_id" class="form-control" style="margin: 0 0 0 10px; width: 200px;" >
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
        <a href="{{ route('post.index') }}">Quay lại Bài đăng</a>
    </div>
</div>
@endsection