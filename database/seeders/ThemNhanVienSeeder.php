<?php

namespace Database\Seeders;

use App\Models\NhanVien;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class ThemNhanVienSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $nhanVien=new NhanVien();
        $nhanVien->avatar_url='avt/9f1eFXrFyin63Eh3B4OOwHYdtp0kLJuu0QnC6cd4.jpg';
        $nhanVien->ho_ten='Âu Tuấn Hưng';
        $nhanVien->dien_thoai='0947417471';
        $nhanVien->email='tuanhung@gmail.com';
        $nhanVien->dia_chi='Quận 1, TP.HCM';
        $nhanVien->username='tuanhung';
        $nhanVien->password=Hash::make(123);
        $nhanVien->save();
    }
}
