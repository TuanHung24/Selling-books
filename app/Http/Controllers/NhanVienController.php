<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\NhanVien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class NhanVienController extends Controller
{
    public function themMoi()
    {
        return view("nhan-vien.them-moi");
    }
    public function xuLyThemMoi(Request $request)
    {
            
            $files = $request->file('hinh_anh');
            $nhanVien=new NhanVien();
            if (isset($files)) {
                
                $path = $files->store('avt');
                $nhanVien->avatar_url=$path;
                $nhanVien->ho_ten           = $request->ho_ten;
                $nhanVien->email            = $request->email;
                $nhanVien->dien_thoai       = $request->dien_thoai;
                $nhanVien->dia_chi          = $request->dia_chi;
                
                $nhanVien->username   = $request->username;
                $nhanVien->password   = Hash::make($request->mat_khau);
                $nhanVien->save();
                return redirect()->route('nhan-vien.danh-sach')->with(['thong_bao'=>"Thêm nhân viên {$nhanVien->ho_ten} thành công!"]);
            
            
            }
        return view('nhan-vien.them-moi');  
    }
    public function danhSach()
    {
        $dsNhanVien = NhanVien::all();
        return view("nhan-vien.danh-sach", compact('dsNhanVien'));
    }
}
