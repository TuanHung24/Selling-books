@extends('master')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">CẬP NHẬT KHÁCH HÀNG</h1>
</div>
<form class="row g-3" method="POST" action="{{ route('khach-hang.xl-cap-nhat', ['id' => $khachHang->id]) }}">
   @csrf
   <div class="row">
    <div class="col-md-6">
        <label for="ten" class="form-label">Tên</label>
        <input type="text" class="form-control" name="ten" value="{{$khachHang->ten}}">
    </div>
    <div class="col-md-6">
        <label for="ten" class="form-label">Email</label>
        <input type="text" class="form-control" name="email" value="{{$khachHang->email}}">
    </div>
    <div class="col-md-6">
        <label for="ten" class="form-label">Điện thoại</label>
        <input type="text" class="form-control" name="dien_thoai" value="{{$khachHang->dien_thoai}}">
    </div>
    <div class="col-md-6">
        <label for="ten" class="form-label">Địa chỉ</label>
        <input type="text" class="form-control" name="dia_chi" value="{{$khachHang->dia_chi}}">
    </div>
<div class="col-md-2">
    <button type="submit" class="btn btn-primary" class="Luu">Lưu</button>
  </div>

</form>
@endsection