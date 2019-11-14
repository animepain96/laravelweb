@extends('master.master')

@section('content')
    <div class="row mb-5">
        <h3>Quản lí Danh mục</h3>
    </div>
    @if(session()->get('success'))
        <div class="alert alert-success fade show">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            {{ session()->get('success') }}
        </div>
    @endif
    <div class="row mb-5">
        <div class="col-md-12 text-right">
            <a href="{{ route('category.create') }}" class="btn btn-primary">Thêm mới</a>
        </div>
    </div>
    <div class="row">
        <div class="container-fluid">
            <div class="col-md-12">
            <table class="table table-striped table-bordered" id="dataTable">
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
                        <td>{{ $cat->created_at->format('d-m-Y H:i:s') }}</td>
                        <td>{{ $cat->updated_at->format('d-m-Y H:i:s') }}</td>
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
        <script>
            $(document).ready(function(){
                $('#dataTable').DataTable();
            });
        </script>
    </div>
@endsection
