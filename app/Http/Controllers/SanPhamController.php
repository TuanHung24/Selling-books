<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\HinhAnh;
use App\Models\LoaiSach;
use App\Models\LoaiSanPham;
use App\Models\Sach;
use App\Models\SanPham;
use Illuminate\Http\Request;

class SanPhamController extends Controller
{
    public function themMoi()
    {
        $dsLoaiSanPham=LoaiSach::all();
        return view('sach.them-moi',compact('dsLoaiSanPham'));
    }

    public function xuLyThemMoi(Request $request)
    {
        
        $files=$request->hinh_anh;
        $paths=[];
        
        foreach($files as $file)
        {
            if ($file->isValid() && in_array($file->getClientOriginalExtension(), ['jpg', 'png', 'jpeg'])) {
                // Kiểm tra kích thước của từng tệp tin
                $maxSize = 10240; // 10MB
                if ($file->getSize() <= $maxSize * 1024) { // Chuyển đổi sang byte
                    $paths[] = $file->store('uploads');
                } else {
                    // Kích thước hình ảnh quá lớn
                    return redirect()->back()->with(['error'=>"Kích thước hình ảnh quá lớn. Vui lòng chọn hình ảnh nhỏ hơn 10MB."]);
                }
            } else {
                // Tệp không phải là hình ảnh
                return redirect()->back()->with(['error'=>"Tệp không phải là hình ảnh jpg, png, hoặc jpeg."]);
            }
           
        }     
        $sanPham = new Sach();
        $sanPham->ten               = $request->ten;
        $sanPham->mo_ta             = $request->mo_ta;
        $sanPham->loai_san_pham_id  = $request->loai_san_pham;
        $sanPham->save();

        

        
        for($i=0;$i<count($paths);$i++)
        {
            $hinhAnh=new HinhAnh();
            $hinhAnh->sach_id=$sanPham->id;
            $hinhAnh->img_url=$paths[$i];
            $hinhAnh->save();
        }
        
        return redirect()->route('sach.danh-sach')->with(['thong_bao'=>"Thêm sản phẩm {$sanPham->ten} thành công!"]);
    }
    public function danhSach()
    {
        $dsSanPham=Sach::paginate(10);
        return view("sach.danh-sach", compact('dsSanPham'));
    }
}
