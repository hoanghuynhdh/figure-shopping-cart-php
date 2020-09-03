<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SanPham;
use App\LoaiSanPham;

class sanphamController extends Controller
{
    public function getDanhsach($type)
    {
        if ($type == 0) {
            $sanpham = SanPham::paginate(10);
        } else {

            $sanpham =  SanPham::where('id_type', $type)->paginate(10);
        }
        $sp_theoloai = SanPham::where('id_type', $type)->paginate(10);
        $theloai = LoaiSanPham::all();

        return view('admin.sanpham.list', compact('sanpham', 'theloai', 'sp_theoloai'));
    }
    public function getThem()
    {
        $theloai = LoaiSanPham::all();
        return view('admin.sanpham.them', compact('theloai'));
    }
    public function postThem(Request $request)
    {
        $this->validate(
            $request,
            [
                'ten' => 'required|min:3',
                'price' => 'required',
            ],
            [
                'ten.required' => 'Bạn chưa nhập tên sản phẩm',
                'ten.min' => 'Tên sản phẩm phải có ít nhất 3 kí tự',
                'ten.unique' => 'Tên sản phẩm đã tồn tại',
                'price.required' => 'Bạn phải nhập giá cho sản phẩm',
            ]
        );
        $product = new SanPham;
        $product->name = $request->ten;
        $product->id_type = $request->theloai;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->unit = 1;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $duoi = $file->getClientOriginalExtension();
            if ($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg') {
                return redirect('admin/sanpham/them')->with('loi', 'Bạn chỉ được trọn file có đuôi jpg ,png ,jpeg');
            }
            $name = $file->getClientOriginalName();
            $Hinh =str_random(4) . "_" . $name;
            while (file_exists("source/img/".$Hinh)) {
                $Hinh = str_random(4) . "_" . $name;
            }

            $file->move("source/img/",$Hinh);
            $product->image = $Hinh;
        } else {
            return redirect('admin/sanpham/them')->with('loi', 'vui lòng chọn ảnh');
        }
        $product->save();

        return redirect('admin/sanpham/them')->with('thongbao', 'thêm sản phẩm thành công');
    }


    public function getSua($id)
    {
        $sanpham = SanPham::find($id);
        $theloai = LoaiSanPham::all();
        return view('admin.sanpham.sua', compact('sanpham', 'theloai'));
    }
    public function postSua(Request $request, $id)
    {

        $this->validate(
            $request,
            [
                'ten' => 'required|min:3',
                'price' => 'required',
            ],
            [
                'ten.required' => 'Bạn chưa nhập tên sản phẩm',
                'ten.min' => 'Tên sản phẩm phải có ít nhất 3 kí tự',
                'ten.unique' => 'Tên sản phẩm đã tồn tại',
                'price.required' => 'Bạn phải nhập giá cho sản phẩm',
            ]
        );
        $product = SanPham::find($id);
        $product->name = $request->ten;
        $product->id_type = $request->theloai;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->unit = 1;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $duoi = $file->getClientOriginalExtension();
            if ($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg') {
                return redirect('admin/sanpham/sua/' . $id)->with('loi', 'Bạn chỉ được trọn file có đuôi jpg ,png ,jpeg');
            }
            $name = $file->getClientOriginalName();
            $Hinh =str_random(4) . "_" . $name;
            while (file_exists("source/img/".$Hinh)) {
                $Hinh = str_random(4) . "_" . $name;
            }

            $file->move("source/img/",$Hinh);
            $product->image = $Hinh;
        } else {
            return redirect('admin/sanpham/sua/' . $id)->with('loi', 'vui lòng chọn ảnh');
        }
        $product->save();

        return redirect('admin/sanpham/sua/' . $id)->with('thongbao', 'Cập nhật sản phẩm thành công');
    }
    public function getXoa($id)
    {
        $product = SanPham::find($id);
       
        $product->delete();

        return redirect('admin/sanpham/danhsach/0')->with('thongbao', 'xóa thành công');
    }
   
}
