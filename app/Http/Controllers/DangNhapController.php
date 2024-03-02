<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DangNhap;
class DangNhapController extends Controller
{
    public function dangNhap()
    {
        return view('dang-nhap');
    }
    public function xuLyDangNhap(Request $rq)
    {
        $admin=DangNhap::where('ten_dang_nhap', $rq->username)->where('mat_khau', $rq->password)->first();
        if(empty($admin))
        {
            return view('dang-nhap');
        }
        session(['admin_login' => $admin]);
            return redirect()->route('san-pham.danh-sach');
    }
    public function dangXuat()
    {
        session()->forget('admin_login');
        return redirect()->route('dang-nhap');
    }
}
