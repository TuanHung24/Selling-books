<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\NhanVien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DangNhapController extends Controller
{
    public function dangNhap(){
        return view('dang-nhap');
    } 
    public function xuLyDangNhap(Request $request){
        $user = NhanVien::whereRaw('BINARY username = ?', [$request->ten_dang_nhap])->first();
        
        if ($user && Hash::check($request->password, $user->password) && $user->trang_thai) {
            
            return redirect()->route('sach.danh-sach')->with(['dang_nhap' => 'Đăng nhập thành công!']);
        }
        return redirect()->route('dang-nhap')->with(['dang_nhap' => 'Đăng nhập không thành công!']);
    }
    
}
