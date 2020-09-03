<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\KhachHang;
use App\HoaDon;

use App\ChiTietHoaDon;
use App\SanPham;

class CartController extends Controller
{
    // public function index()
    // {
    //     $this->data['title'] = 'Quản lý hóa đơn';
    //     $customers = DB::table('customer')
    //                 ->orderBy('id', 'desc')
    //                 ->get();
    //     $this->data['customer'] = $customers;
    //     return view('admin.cart.list', $this->data);
    // }
    public function getDanhsach()
    {

        $customers = DB::table('khachhang')->orderBy('id', 'desc')->get();

        return view('admin.cart.list', compact('customers'));
    }
    public function getChitiet($id)
    {

        // $customerInfo = DB::table('customer')
        //                 ->join('bills', 'customer.id', '=', 'bills.id_customer')
        //                 ->select('customer.*', 'bills.id as bill_id', 'bills.total as bill_total', 'bills.note as bill_note')
        //                 ->where('customer.id', '=', $id)
        //                 ->first();
        $customerInfo = DB::table('khachhang')->join('hoadon', 'khachhang.id', '=', 'hoadon.id_khachhang')
            ->select('khachhang.*', 'hoadon.id as hoadon_id', 'hoadon.total as hoadon_total', 'hoadon.note as hoadon_note')
            ->where('khachhang.id', '=', $id)
            ->first();
        // $billInfo = DB::table('bill')
        //             ->join('bill_detail', 'bill.id', '=', 'bill_details.id_bill')
        //             ->leftjoin('product', 'bill_detail.id_product', '=', 'product.id')
        //             ->where('bill.id_customer', '=', $id)
        //             ->select('bill.*', 'bill_detail.*', 'products.name as product_name')
        //             ->get();
        $billInfo = DB::table('hoadon')
            ->join('chitiet_hoadon', 'hoadon.id', '=', 'chitiet_hoadon.id_hoadon')
            ->leftjoin('sanpham', 'chitiet_hoadon.id_sanpham', '=', 'sanpham.id')
            ->where('hoadon.id_khachhang', '=', $id)
            ->select('hoadon.*', 'chitiet_hoadon.*', 'sanpham.name as sanpham_name')
            ->get();
        $this->data['customerInfo'] = $customerInfo;
        $this->data['billInfo'] = $billInfo;

        return view('admin.cart.chitiet', $this->data);
    }


    public function update(Request $request, $id)
    {
        $bill = HoaDon::find($id);
        $bill->status = $request->input('status');
        $bill->save();
        Session::flash('message', "Successfully updated");

        return Redirect::to('admincp/bill');
    }


    public function getxoa($id)
    {   $customer=KhachHang::find($id);
        $customer->delete();
        $bill = HoaDon::where('id_khachhang',$id)->firstOrFail();
        $billdetail=ChiTietHoaDon::where('id_hoadon',$bill->id);
        $billdetail->delete();
        $bill->delete();


        return redirect('admin/cart/danhsach')->with('thongbao','xoa thanh cong');
    }
}
