<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SanPham extends Model
{
	protected $table = "sanpham";
	public function loaisanpham(){
		return $this -> belongsTo('App\LoaiSanPham','id_type','id');
	}

	public function chitiethoadon(){
		return $this -> hasMany('App\ChiTietHoaDon','id_sanpham','id');
	}
}