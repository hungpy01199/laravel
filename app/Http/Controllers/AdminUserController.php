<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AdminUserController extends Controller
{

    public function show()
    {
        $users = Profile::with('getProfiles')
        ->get();
        $data=[
            'data'=>$users,
        ];
       
        // return $user;
        return view('admin.list', compact('data'));
    }

    function delete($id)
    {
        if (Auth::id() != $id) {
            $users = Profile::find($id);
            $users->delete();

            return redirect('admin/list')->with('status', 'Đã xóa thành công');
        } else {
            return redirect('admin/list')->with('status', 'Không thể xóa chính mình');
        }
    }

    public function edit($id)
    {
        $users = Profile::find($id);
        return view('admin.edit', compact('users'));
    }

    public function update(Request $request, $id)
    {
        if ($request->input('btn_edit')) {
            $request->validate(
                [
                    'name' => 'required|string|max:255',
                    'dob' => 'required|string|max:20',
                    'nickname' => 'required|string|max:255',
                    'email' => 'required|string|max:255|unique:profile',
                    'description' => 'required|string|max:255',
                    'phone' => 'required|string|max:10'
                ],
                [
                    'required' => ':attribute không được để trống',
                    'min' => ':attribute có độ dài ít nhất :min kí tự',
                    'max' => ':attribute có độ dài ít nhất :max kí tự'
                ],
                [
                    'name' => 'Tên người dùng',
                    'dob' => 'Ngày sinh',
                    'nickname' => 'Biệt danh',
                    'descrition' => 'Giới thiệu bản thân',
                    'phone' => 'Số điện thoại'
                ]
            );
        }
        // return $request->all();
        Profile::where('id', $id)->update([
            'name' =>$request->input('name'),
            'dob' =>$request->input('dob'),
            'nickname' =>$request->input('nickname'),
            'email' =>$request->input('email'),
            'description' =>$request->input('description'),
            'phone' =>$request->input('phone')
        ]);
        return redirect('admin/dashboard')->with('status', 'Sửa thành công');
    }
    
    
}
