<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\KhachHang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class KhachHangController extends Controller
{
    public function themMoi()
    {
        return view('khach-hang.them-moi');
    }

    public function xuLyThemMoi(Request $request)
    {
        $khachHang = new KhachHang();
        if($request->ho_ten!=null)
        {
            $khachHang->ho_ten          = $request->ho_ten;
            $khachHang->email           = $request->email;
            $khachHang->ten_dang_nhap   = $request->ten_dang_nhap;
            $khachHang->dien_thoai      = $request->dien_thoai;
            $khachHang->password        = Hash::make($request->mat_khau);
            $khachHang->dia_chi         =$request->dia_chi;
            $khachHang->save();
            return redirect()->route('khach-hang.danh-sach')->with(['thong_bao'=>"Thêm khách hàng {$khachHang->ho_ten} thành công!"]);
        }
        return view('khach-hang.them-moi');
        
    }

    public function danhSach()
    {
        $dskhachHang=KhachHang::all();
        return view("khach-hang.danh-sach", compact('dskhachHang'));
    }
}
