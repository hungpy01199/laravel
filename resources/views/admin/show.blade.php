@extends('layouts.admin')
@section('content')
<div id="content" class="container-fluid">
    <div class="card">
        <div class="card-header font-weight-bold">
            Thông tin người dùng
        </div>
        <div class="card-body">
            <form action="{{route('admin.update', $user->id)}}" method="POST">
            @csrf 

                <div class="form-group">
                    <label for="name">Họ và tên</label>
                    <input class="form-control" type="text" value="{{$user->name}}" name="name" id="name" disabled style="border: none">
                    @error('name')
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="dob">Ngày sinh</label>
                    <input class="form-control" type="text" value="{{$user->dob}}" name="dob" id="dob" disabled style="border: none">
                    @error('dob')
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="nickname">Biệt danh</label>
                    <input class="form-control" type="text" value="{{$user->nickname}}" name="nickname" id="nickname" disabled style="border: none">
                    @error('nickname')
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="email">Email</label>
                    <input class="form-control" type="text" value="{{$user->email}}" name="email" id="email" disabled style="border: none">
                    @error('email')
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="description">Giới thiệu bản thân</label>
                    <input class="form-control" type="text" value="{{$user->description}}" name="description" id="description" disabled style="border: none">
                    @error('description')
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="avatar">Avatar</label>
                    <input class="form-control" type="text" value="{{$user->avatar}}" name="avatar" id="avatar" disabled style="border: none">
                    @error('avatar')
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="address">Địa chỉ</label>
                    <input class="form-control" type="text" value="{{$user->address}}" name="address" id="address" disabled style="border: none">
                    @error('address')
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="phone">Số điện thoại</label>
                    <input class="form-control" type="text" value="{{$user->phone}}" name="phone" id="phone" disabled style="border: none">
                    @error('phone')
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                
            </form>
        </div>
    </div>
</div>
@endsection