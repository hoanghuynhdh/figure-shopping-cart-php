<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SanPham;
use App\LoaiSanPham;

class loaisanphamController extends Controller
{
    public function getDanhsach()
    {
        $theloai = LoaiSanPham::paginate(10);

        return view('admin.loaisanpham.list', compact('theloai'));
    }
    public function getThem()
    {
        return view('admin.loaisanpham.them');
    }
    public function postThem(Request $request)
    {
        $this->validate(
            $request,
            [
                'ten' => 'required|min:3|max:100'
            ],
            [
                'ten.required' => 'Bạn chưa nhập tên thể loại',
                'ten.min' => 'Tên thể loại phải có từ 3 đến 100 kí tự',
               
                'ten.max' => 'Tên thể loại phải có từ 3 đến 100 kí tự'
            ]
        );
        $typeproduct = new LoaiSanPham;
        $typeproduct->name = $request->ten;
        $typeproduct->save();
        return redirect('admin/loaisanpham/them')->with('thongbao', 'Thêm thành công');
    }
    public function getSua($id)
    {
        $theloai = LoaiSanPham::find($id);
        return view('admin.loaisanpham.sua', compact('theloai'));
    }
    public function postSua(Request $request, $id)
    {
        $typeproduct = LoaiSanPham::find($id);
        $this->validate(
            $request,
            [
                'ten' => 'required|min:3|max:100'
            ],
            [

                'ten.required' => 'Bạn chưa nhập tên thể loại',
                
                'ten.min' => 'Tên thể loại phải có từ 3 đến 100 kí tự',
                'ten.max' => 'Tên thể loại phải có từ 3 đến 100 kí tự'
            ]
        );
        $typeproduct->name = $request->ten;
        $typeproduct->save();

        return redirect('admin/loaisanpham/sua/'.$id)->with('thongbao','Sữa thành công');
    }
    public function getXoa($id){
        $theloai = LoaiSanPham::find($id);
        $theloai->delete();

        return redirect('admin/loaisanpham/danhsach/0')->with('thongbao','xóa thành công');
    }
}
