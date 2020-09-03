<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HoaDon extends Model
{
    protected $table = "hoadon";
    public function chitiethoadon(){
		return $this -> hasMany('App\ChiTietHoaDon','id_hoadon','id');
	}
	public function hoadon(){
		return $this -> belongsTo('App\KhachHang','id_khachhang','id');
	}
}
