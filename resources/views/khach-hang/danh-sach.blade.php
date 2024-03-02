@extends('master')



@section('content')
@if(session('thong_bao'))
<div class="alert alert-success" role="alert">
  {{session('thong_bao')}}
</div>
@endif
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">DANH SÁCH KHÁCH HÀNG</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
            <a href="{{ route('khach-hang.them-moi') }}" class="btn btn-sm btn-outline-secondary">Thêm mới</a>
        </div>
    </div>
</div>

<div class="table-responsive">
    <table class="table table-striped table-sm">
        <thead>
    <tr>
        <th>Id</td>
        <th>Tên</th>
        <th>Email</td>
        <th>Điện thoại</th>
        <th>Địa chỉ</th>
    </tr>
    </thead>
    @foreach($dskhachHang as $khachHang)
    <tr>
        <td>{{ $khachHang->id }}</td>
        <td>{{ $khachHang->ten }}</td>
        <td>{{ $khachHang->email }}</td>
        <td>{{ $khachHang->dien_thoai }}</td>
        <td>{{ $khachHang->dia_chi }}</td>
        <td>
            <a href="{{ route('khach-hang.cap-nhat', ['id' => $khachHang->id]) }}">Sửa</a> | <a href="{{ route('khach-hang.xoa', ['id' => $khachHang->id]) }}">Xóa</a>
        </td>
    <tr>
    @endforeach
</table>
@endsection
</div>