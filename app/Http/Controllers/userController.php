<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Hash;
use Auth;


class userController extends Controller
{

    public function getDanhsach()
    {
        $user = User::all();
        return view('admin.user.list', compact('user'));
    }
    public function getThem()
    {
        return view('admin.user.them');
    }
    public function postThem(Request $request)
    {
        $this->validate(
            $request,
            [
                'email' => 'required|email|unique:users,email',
                'password' => 'required|min:6|max:20',
                'name' => 'required',
                're_password' => 'required|same:password'
            ],
            [
                'email.required' => 'Vui lòng nhập email',
                'email.email' => 'Không đúng định dạng email',
                'email.unique' => 'Email đã có người sử dụng',
                'password.required' => 'Vui lòng nhập mật khẩu',
                're_password.same' => 'Mật khẩu không giống nhau',
                'password.min' => 'Mật khẩu ít nhất 6 kí tự'
            ]
        );
        $user = new User();
        $user->full_name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->save();
        return redirect('admin/user/them')->with('thongbao', 'Tạo tài khoản thành công');
    }
    public function getSua($id)
    {
        $user = User::find($id);
        return view('admin.user.sua', compact('user'));
    }
    public function postSua(Request $request, $id)
    {
        $this->validate(
            $request,
            [
                'email' => 'required|email|unique:users,email',
                'password' => 'required|min:6|max:20',
                'name' => 'required',
                're_password' => 'required|same:password'
            ],
            [
                'email.required' => 'Vui lòng nhập email',
                'email.email' => 'Không đúng định dạng email',
                'email.unique' => 'Email đã có người sử dụng',
                'password.required' => 'Vui lòng nhập mật khẩu',
                're_password.same' => 'Mật khẩu không giống nhau',
                'password.min' => 'Mật khẩu ít nhất 6 kí tự'
            ]
        );
        $user = User::find($id);
        $user->full_name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->save();
        return redirect('admin/user/sua' . $id)->with('thongbao', 'Cập nhật tài khoản thành công');
    }
    public function getXoa($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect('admin/user/danhsach')->with('thongbao', 'Xóa thành công');
    }
    public function getLogin()
    {
        return view('page.dangnhap');
    }

    public function postLogin(Request $req)
    {
        $this->validate(
            $req,
            [
                'email' => 'required|email',
                'password' => 'required|min:6|max:20'
            ],
            [
                'email.required' => 'Vui lòng nhập email',
                'email.email' => 'Email không đúng định dạng',
                'password.required' => 'Vui lòng nhập mật khẩu',
                'password.min' => 'Mật khẩu ít nhất 6 kí tự',
                'password.max' => 'Mật khẩu không quá 20 kí tự'
            ]
        );

        $email = $req->email;
        $password = $req->password;
        if (Auth::attempt(['email' => $email, 'password' => $password])) {

            return redirect('admin/cart/danhsach');
        } else {
            return redirect()->back()->with(['flag' => 'danger', 'message' => 'Tài khoản chưa kích hoạt hoặc không đúng']);
        }
    }
    public function postLogout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
