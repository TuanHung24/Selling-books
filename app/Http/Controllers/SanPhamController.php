<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SanPham;
use App\Models\LoaiSanPham;
class SanPhamController extends Controller
{
    public function themMoi()
    {
        $adminLogin=session()->get('admin_login');
        if(empty($adminLogin))
        {
            return redirect()->route('dang-nhap');
        }
        $dsLoaiSanPham=LoaiSanPham::all();
        return view('san-pham.them-moi',compact('dsLoaiSanPham'));
    }

    public function xuLyThemMoi(Request $request)
    {
        $adminLogin=session()->get('admin_login');
        if(empty($adminLogin))
        {
            return redirect()->route('dang-nhap');
        }
        $sanPham = new SanPham();
        $sanPham->ten       = $request->ten;
        $sanPham->mo_ta          = $request->mo_ta;
        $sanPham->gia          = $request->gia;
        $sanPham->so_luong          = $request->so_luong;
        $sanPham->loai_san_pham_id      = $request->loai_san_pham;
        $sanPham->nha_cung_cap        = $request->nha_cung_cap;
        $sanPham->save();
        return redirect()->route('san-pham.danh-sach')->with(['thong_bao'=>"Thêm sản phẩm {$sanPham->ten} thành công!"]);
    }

    public function danhSach()
    {
        #kiểm tra trạng thái đăng nhập của admin
        $adminLogin=session()->get('admin_login');
        if(empty($adminLogin))
        {
            return redirect()->route('dang-nhap');
        }
        $dsSanPham=SanPham::all();
        return view("san-pham.danh-sach", compact('dsSanPham'));
    }

    public function capNhat($id)
    {
        $adminLogin=session()->get('admin_login');
        if(empty($adminLogin))
        {
            return redirect()->route('dang-nhap');
        }
        $dsLoaiSanPham=LoaiSanPham::all();
        $sanPham = SanPham::find($id);
        if (empty($sanPham)) {
            return "Sản phẩm không tồn tại";
        }

        return view('san-pham.cap-nhat', compact('sanPham', 'dsLoaiSanPham'));
    }

    public function xuLyCapNhat(Request $request, $id)
    {
        $adminLogin=session()->get('admin_login');
        if(empty($adminLogin))
        {
            return redirect()->route('dang-nhap');
        }
        $sanPham = SanPham::find($id);
        if (empty($sanPham)) {
            return view('san-pham.cap-nhat', compact('sanPham', 'dsLoaiSanPham'));
        }
        
        $sanPham->ten       = $request->ten;
        $sanPham->mo_ta          = $request->mo_ta;
        $sanPham->gia          = $request->gia;
        $sanPham->so_luong          = $request->so_luong;
        $sanPham->loai_san_pham_id        = $request->loai_san_pham;
        $sanPham->nha_cung_cap        = $request->nha_cung_cap;
        $sanPham->save();

        return redirect()->route('san-pham.danh-sach')->with(['thong_bao'=>"Cập nhật sản phẩm {$sanPham->ten} thành công!"]);
    }

    public function xoa($id)
    {
        $adminLogin=session()->get('admin_login');
        if(empty($adminLogin))
        {
            return redirect()->route('dang-nhap');
        }
        $sanPham = SanPham::find($id);
        if (empty($sanPham)) {
            return "Sản phẩm không tồn tại";
        }
        
        $sanPham->delete();
        return redirect()->route('san-pham.danh-sach')->with(['thong_bao'=>"Xóa sản phẩm {$sanPham->ten} thành công!"]);
    }
}
