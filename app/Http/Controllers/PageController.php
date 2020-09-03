<?php

namespace App\Http\Controllers;
use App\SanPham;
use App\LoaiSanPham;
use App\Cart;
use Session;
use App\KhachHang;
use App\HoaDon;
use App\ChiTietHoaDon;
use App\User;
use Hash;
use Auth;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function getIndex(){
        $sanphammoi = SanPham::where('unit',3) -> paginate(3);
        $loai = LoaiSanPham::all();
        return view('page.trangchu',compact('sanphammoi','loai'));
    }
    public function getGioithieu(){
    	return view('page.gioithieu');
    }
    public function getLienhe(){
    	return view('page.lienhe');
    }
    public function getLoaiSp($type){
        $sp_theoloai = SanPham::where('id_type',$type)->get();
        $sp_theoloai = SanPham::where('id_type',$type)->paginate(6);
        $loai = LoaiSanPham::all();
        $loai_sp = LoaiSanPham::where('id',$type)->first();
        return view('page.loaisanpham',compact('sp_theoloai','loai','loai_sp'));
    }
    public function getChitiet(Request $req){
        $sanpham = SanPham::where('id',$req->id)->first();
        $sp_tuongtu = SanPham::where('id_type',$sanpham->id_type)->paginate(6);
        return view('page.chitiet_sanpham',compact('sanpham','sp_tuongtu'));
    }
    public function getAddtoCart(Request $req,$id){
        $product = SanPham::find($id);
        $oldCart = Session('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->add($product,$id);
        $req->session()->put('cart',$cart);
        return redirect()->back();
    }
    public function getDelItemCart($id){
        $oldCart = Session::has('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);
        if(count($cart->items)>0){
            Session::put('cart',$cart);
        }else{
            Session::forget('cart');
        }
        
        return redirect()->back();
    }
    public function getCheckout(){
        return view('page.dathang');
    }
    public function postCheckout(Request $req){
        // $product = SanPham::all();
        $cart = Session::get('cart');
        // dd($cart);
        $customer = new KhachHang;
        $customer->name = $req ->name;
        $customer->gender = $req ->gender;
        $customer->email = $req ->email;
        $customer->address = $req ->address;
        $customer->phone_number = $req ->phone;
        $customer->note = $req ->notes;
        $customer->save();

        $bill = new HoaDon;
        $bill->id_khachhang = $customer ->id;
        $bill->date_order = date('Y-m-d');
        $bill->total = $cart ->totalPrice;
        $bill->payment = $req ->payment;
        $bill->note = $req ->notes;
        $bill->save();
        foreach ($cart->items as $key => $value) {
            $bill_detail = new ChiTietHoaDon;
            $bill_detail->id_hoadon = $bill->id;
            $bill_detail->id_sanpham = $key;
            $bill_detail->soluong = $value['qty'];
            $bill_detail->price = ($value['price']/$value['qty']);
            $bill_detail->save();
        }
        Session::forget('cart');
        return redirect()->back()->with('thongbao','Đặt hàng thành công');
    }
    public function getLogin(){
        return view('page.dangnhap');
    }
    public function getSignin(){
        return view('page.dangky');
    }

    public function postSignin(Request $req){
        $this->validate($req,
            [
                'email'=>'required|email|unique:users,email',
                'password'=>'required|min:6|max:20',
                'fullname'=>'required',
                're_password'=>'required|same:password'
            ],
            [
                'email.required'=>'Vui lòng nhập email',
                'email.email'=>'Không đúng định dạng email',
                'email.unique'=>'Email đã có người sử dụng',
                'password.required'=>'Vui lòng nhập mật khẩu',
                're_password.same'=>'Mật khẩu không giống nhau',
                'password.min'=>'Mật khẩu ít nhất 6 kí tự'
            ]);
        $user = new User();
        $user->full_name = $req->fullname;
        $user->email = $req->email;
        $user->password = Hash::make($req->password);
        $user->phone = $req->phone;
        $user->address = $req->address;
        $user->save();
        return redirect()->back()->with('thanhcong','Tạo tài khoản thành công');
    }

    public function postLogin(Request $req){
        $this->validate($req,
            [
                'email'=>'required|email',
                'password'=>'required|min:6|max:20'
            ],
            [
                'email.required'=>'Vui lòng nhập email',
                'email.email'=>'Email không đúng định dạng',
                'password.required'=>'Vui lòng nhập mật khẩu',
                'password.min'=>'Mật khẩu ít nhất 6 kí tự',
                'password.max'=>'Mật khẩu không quá 20 kí tự'
            ]
        );
        $email = $req->email;
        $password = $req->password;
        if (Auth::attempt(['email' => $email, 'password' => $password])) {

            return redirect('admin/cart/danhsach');
        } else {
            return redirect()->back()->with(['flag' => 'danger', 'message' => 'Tài khoản chưa kích hoạt hoac khong dung']);
        }
       //  $credentials = array('email'=>$req->email,'password'=>$req->password);
       //  $user = User::where([
       //      ['email','=',$req->email],
       //      ['status','=','1']
       //  ])->first();

       //  if($user){
       //      if(Auth::attempt($credentials)){

       //          return redirect()->back()->with(['flag'=>'success','message'=>'Đăng nhập thành công']);
       //      }
       //      else{
       //          return redirect()->back()->with(['flag'=>'danger','message'=>'Đăng nhập không thành công']);
       //      }
       //  }
       //  else{
       //     return redirect()->back()->with(['flag'=>'danger','message'=>'Tài khoản chưa kích hoạt']); 
       // }
    }

    public function postLogout(){
        Auth::logout();
        return redirect()->route('trang-chu');
    }

    public function getSearch(Request $req){
        $tukhoa = $req->key;
        $product = SanPham::where('name','like','%'.$req->key.'%')->get();
        return view('page.search',compact('product','tukhoa'));
    }
}