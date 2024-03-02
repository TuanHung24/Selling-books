<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\LoaiSach;
use Illuminate\Http\Request;

class LoaiSanPhamController extends Controller
{
    public function themMoi()
    {
        return view('loai-sach.them-moi');
    }

    public function xuLyThemMoi(Request $request)
    {
        $loaiSanPham = new LoaiSach();
        if($request->ten!=null)
        {
            $loaiSanPham->ten       = $request->ten;
            $loaiSanPham->save();
            return redirect()->route('loai-sach.danh-sach')->with(['thong_bao'=>"Thêm loại sản phẩm {$loaiSanPham->ten} thành công!"]);
        }
        return view('loai-san-pham.them-moi');
        
    }

    public function danhSach()
    {
        $dsLoaiSanPham=LoaiSach::paginate(10);
        return view("loai-sach.danh-sach", compact('dsLoaiSanPham'));
    }
}
