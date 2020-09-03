<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChiTietHoaDon extends Model
{
	protected $table = "chitiet_hoadon";
	public function sanpham(){
		return $this -> belongsTo('App\SanPham','id_sanpham','id');
	}
	public function hoadon(){
		return $this -> belongsTo('App\HoaDon','id_hoadon','id');
	}
}
