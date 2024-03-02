<?php

use App\Http\Controllers\DangNhapController;
use App\Http\Controllers\HoaDonController;
use App\Http\Controllers\KhachHangController;
use App\Http\Controllers\LoaiSanPhamController;
use App\Http\Controllers\NhaCungCapController;
use App\Http\Controllers\NhanVienController;
use App\Http\Controllers\SanPhamController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

  
Route::get('/', function () {
    return view('dang-nhap');
});
Route::get('dang-nhap', [DangNhapController::class, 'dangNhap'])->name('dang-nhap');
Route::post('dang-nhap', [DangNhapController::class, 'xuLyDangNhap'])->name('xl-dang-nhap');


Route::prefix('sach')->group(function(){
    Route::name('sach.')->group(function(){
        Route::get('them-moi', [SanPhamController::class, 'themMoi'])->name('them-moi');
        Route::post('them-moi', [SanPhamController::class, 'xuLyThemMoi'])->name('xl-them-moi');
        Route::get('/', [SanPhamController::class, 'danhSach'])->name('danh-sach');
        Route::get('/tim-kiem', [SanPhamController::class, 'timKiem'])->name('tim-kiem');
        Route::get('cap-nhat/{id}', [SanPhamController::class, 'capNhat'])->name('cap-nhat');
        Route::get('khoi-phuc/{id}', [SanPhamController::class, 'khoiPhuc'])->name('khoi-phuc');
        Route::get('xoa-vinh-vien/{id}', [SanPhamController::class, 'xoaVinhVien'])->name('xoa-vinh-vien');
        Route::get('thung-rac', [SanPhamController::class, 'thungRac'])->name('thung-rac');
        Route::post('cap-nhat/{id}', [SanPhamController::class, 'xuLyCapNhat'])->name('xl-cap-nhat');
        Route::get('chi-tiet/{id}', [SanPhamController::class, 'chiTietSanPham'])->name('chi-tiet');
        Route::get('xoa/{id}', [SanPhamController::class, 'xoa'])->name('xoa'); 
    });
});

Route::prefix('loai-sach')->group(function(){
    Route::name('loai-sach.')->group(function(){
        Route::get('them-moi', [LoaiSanPhamController::class, 'themMoi'])->name('them-moi');
        Route::post('them-moi', [LoaiSanPhamController::class, 'xuLyThemMoi'])->name('xl-them-moi');
        Route::get('/', [LoaiSanPhamController::class, 'danhSach'])->name('danh-sach');
        Route::get('/tim-kiem', [LoaiSanPhamController::class, 'timKiem'])->name('tim-kiem');
        Route::get('cap-nhat/{id}', [LoaiSanPhamController::class, 'capNhat'])->name('cap-nhat');
        Route::get('khoi-phuc/{id}', [LoaiSanPhamController::class, 'khoiPhuc'])->name('khoi-phuc');
        Route::get('xoa-vinh-vien/{id}', [LoaiSanPhamController::class, 'xoaVinhVien'])->name('xoa-vinh-vien');
        Route::get('thung-rac', [LoaiSanPhamController::class, 'thungRac'])->name('thung-rac');
        Route::post('cap-nhat/{id}', [LoaiSanPhamController::class, 'xuLyCapNhat'])->name('xl-cap-nhat');
        Route::get('chi-tiet/{id}', [LoaiSanPhamController::class, 'chiTietSanPham'])->name('chi-tiet');
        Route::get('xoa/{id}', [LoaiSanPhamController::class, 'xoa'])->name('xoa'); 
    });
});


Route::prefix('khach-hang')->group(function(){
    Route::name('khach-hang.')->group(function(){
        Route::get('/', [KhachHangController::class, 'danhSach'])->name('danh-sach');
        Route::get('/tim-kiem', [KhachHangController::class, 'timKiem'])->name('tim-kiem');
        Route::get('them-moi',[KhachHangController::class, 'themMoi'])->name('them-moi');
        Route::post('them-moi',[KhachHangController::class, 'xuLyThemMoi'])->name('xl-them-moi');
        Route::get('cap-nhat/{id}', [KhachHangController::class, 'capNhat'])->name('cap-nhat');
        Route::post('cap-nhat/{id}', [KhachHangController::class, 'xuLyCapNhat'])->name('xl-cap-nhat');
        Route::get('xoa/{id}', [KhachHangController::class, 'xoa'])->name('xoa');
        Route::get('don-hang/{id}', [KhachHangController::class, 'donHang'])->name('don-hang');
       
        // Route::get('chi-tiet-don-hang', [KhachHangController::class, 'donHang'])->name('don-hang');
    });
});

Route::prefix('hoa-don')->group(function(){
    Route::name('hoa-don.')->group(function(){
        Route::get('/',[HoaDonController::class, 'danhSach'])->name('danh-sach');
       
        Route::get('/tim-kiem', [HoaDonController::class, 'timKiem'])->name('tim-kiem');
        Route::get('/tim-kiem-sdt', [HoaDonController::class, 'timKiemSdt'])->name('tim-kiem-sdt');
        Route::get('chi-tiet/{id}',[HoaDonController::class, 'chiTiet'])->name('chi-tiet');
        Route::get('them-moi',[HoaDonController::class, 'themMoi'])->name('them-moi');
        Route::post('them-moi',[HoaDonController::class, 'xuLyThemMoi'])->name('xl-them-moi');
        Route::get('xoa/{id}',[HoaDonController::class, 'xoa'])->name('xoa');

        Route::get('huy-don/{id}',[HoaDonController::class, 'daHuy'])->name('huy-don');
        Route::get('duyet-don/{id}',[HoaDonController::class, 'duyetDon'])->name('duyet-don');
        Route::get('dang-giao/{id}',[HoaDonController::class, 'dangGiao'])->name('dang-giao');
        Route::get('hoan-thanh/{id}',[HoaDonController::class, 'hoanThanh'])->name('hoan-thanh');

    });
});

Route::prefix('nha-cung-cap')->group(function(){
    Route::name('nha-cung-cap.')->group(function(){
        Route::get('/', [NhaCungCapController::class, 'danhSach'])->name('danh-sach');
        Route::get('/tim-kiem', [NhaCungCapController::class, 'timKiem'])->name('tim-kiem');
        Route::get('them-moi',[NhaCungCapController::class, 'themMoi'])->name('them-moi');
        Route::post('them-moi',[NhaCungCapController::class, 'xuLyThemMoi'])->name('xl-them-moi');
        Route::get('cap-nhat/{id}', [NhaCungCapController::class, 'capNhat'])->name('cap-nhat');
        Route::post('cap-nhat/{id}', [NhaCungCapController::class, 'xuLyCapNhat'])->name('xl-cap-nhat');
        Route::get('xoa/{id}', [NhaCungCapController::class, 'xoa'])->name('xoa');
    });
});

Route::prefix('nhan-vien')->group(function(){
    Route::name('nhan-vien.')->group(function(){
        Route::get('/', [NhanVienController::class, 'danhSach'])->name('danh-sach');
        Route::get('/tim-kiem', [NhanVienController::class, 'timKiem'])->name('tim-kiem');
        Route::get('them-moi',[NhanVienController::class, 'themMoi'])->name('them-moi');
        Route::post('them-moi',[NhanVienController::class, 'xuLyThemMoi'])->name('xl-them-moi');
        Route::get('cap-nhat/{id}', [NhanVienController::class, 'capNhat'])->name('cap-nhat');
        Route::post('cap-nhat/{id}', [NhanVienController::class, 'xuLyCapNhat'])->name('xl-cap-nhat');
        Route::get('xoa/{id}', [NhanVienController::class, 'xoa'])->name('xoa');
    });
});