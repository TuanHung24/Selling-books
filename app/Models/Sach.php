<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sach extends Model
{
    use HasFactory;
    protected $table='sach';
    public function chi_tiet_san_pham(){
        return $this->hasMany(CTSanPham::class);
    }
}
