<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LoaiSanPham;

class LoaiSanPhamController extends Controller
{
    public function themMoi()
    {
        return view('loai-san-pham.them-moi');
    }

    public function xuLyThemMoi(Request $request)
    {
        $loaiSanPham = new LoaiSanPham();
        if($request->ten!=null)
        {
            $loaiSanPham->ten       = $request->ten;
            $loaiSanPham->save();
            return redirect()->route('loai-san-pham.danh-sach')->with(['thong_bao'=>"Thêm loại sản phẩm {$loaiSanPham->ten} thành công!"]);
        }
        return view('loai-san-pham.them-moi');
        
    }

    public function danhSach()
    {
        $dsLoaiSanPham=LoaiSanPham::all();
        return view("loai-san-pham.danh-sach", compact('dsLoaiSanPham'));
    }

    public function capNhat($id)
    {
        
        $loaiSanPham = LoaiSanPham::find($id);
        if (empty($loaiSanPham)) {
            return "Loại sản phẩm không tồn tại";
        }

        return view('loai-san-pham.cap-nhat', compact('loaiSanPham'));
    }

    public function xuLyCapNhat(Request $request, $id)
    {
        $loaiSanPham = LoaiSanPham::find($id);
        if (empty($loaiSanPham)) {
            return "Loại sản phẩm không tồn tại";
        }
        
        $loaiSanPham->ten       = $request->ten;
        $loaiSanPham->save();

        return redirect()->route('loai-san-pham.danh-sach')->with(['thong_bao'=>"Cập nhật loại sản phẩm {$loaiSanPham->ten} thành công!"]);
    }

    public function xoa($id)
    {
        $loaiSanPham = LoaiSanPham::find($id);
        if (empty($loaiSanPham)) {
            return "Sản phẩm không tồn tại";
        }
        
        $loaiSanPham->delete();
        return redirect()->route('loai-san-pham.danh-sach')->with(['thong_bao'=>"Xóa loại sản phẩm {$loaiSanPham->ten} thành công!"]);
    }
}
