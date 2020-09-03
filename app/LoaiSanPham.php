<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LoaiSanPham extends Model
{
	protected $table = "loai_sanpham";
	public function sanpham(){
		return $this -> hasMany('App\SanPham','id_type','id');
	}
}
