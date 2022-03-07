
<?php 
$list = $data['data'];
$menu= $data['menu'];
$auth_id=$data['auth_id'];

?>
@extends('layouts.admin')
@section('content')

<div id="content" class="container-fluid">
    <div class="card">
        <div class="card-header font-weight-bold d-flex justify-content-between align-items-center">
            <h5 class="m-0 ">Danh sách thành viên</h5>
            <div class="form-search form-inline">
                <form action="#">
                    <input type="" class="form-control form-search" placeholder="Tìm kiếm">
                    <input type="submit" name="btn-search" value="Tìm kiếm" class="btn btn-primary">
                </form>
            </div>
        </div>
        <div class="card-body">
            <div class="analytic">
                <a href="" class="text-primary">Trạng thái 1<span class="text-muted">(10)</span></a>
                <a href="" class="text-primary">Trạng thái 2<span class="text-muted">(5)</span></a>
                <a href="" class="text-primary">Trạng thái 3<span class="text-muted">(20)</span></a>
            </div>
            <div class="form-action form-inline py-3">
                <select class="form-control mr-1" id="">
                    <option>Chọn</option>
                    <option>Tác vụ 1</option>
                    <option>Tác vụ 2</option>
                </select>
                <input type="submit" name="btn-search" value="Áp dụng" class="btn btn-primary">
            </div>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Tên</th>
                        <th scope="col">Avatar</th>
                        <th scope="col">Số điện thoại</th>
                        <th scope="col">Email</th>
                        <th scope="col">Tác vụ</th>
                    </tr>
                </thead>
                <tbody>
                    
                    @foreach($list as $key => $value)
                    
                    <tr>
                        <th scope="row">{{$key+1}}</th>
                        <td>
                        {{$value->name}}
                        </td>
                        <td>{{$value->avatar}}</td>
                        <td>{{$value->phone}}</td>
                        <td>{{$value->email}}</td>
                        
                        @if($auth_id==1)
                        <td>

                            <a href="" class="btn btn-success btn-sm rounded-0 text-white" type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>
                          
                            <a href="" class="btn btn-danger btn-sm rounded-0 text-white" onclick="return confirm('Bạn chắc chắn muốn xóa ? ')" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></a>
                          
                            <a href="" class="btn btn-warning btn-sm rounded-0 text-white" type="button" data-toggle="tooltip" data-placement="top" title="Show"><i class="fa fa-eye" aria-hidden="true"></i></a>
                        </td>
                        @endif
                        @if($auth_id==2)
                        <td>

                           
                          
                            <a href="" class="btn btn-warning btn-sm rounded-0 text-white" type="button" data-toggle="tooltip" data-placement="top" title="Show"><i class="fa fa-eye" aria-hidden="true"></i></a>
                        </td>
                        @endif

                        @if($auth_id==3)
                        <td>
                            <a href="{{route('edit', $value->id)}}" class="btn btn-success btn-sm rounded-0 text-white" type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>
                            
                          
                            <a href="{{route('delete_user', $value->id)}}" class="btn btn-warning btn-sm rounded-0 text-white" type="button" data-toggle="tooltip" data-placement="top" title="Show"><i class="fa fa-eye" aria-hidden="true"></i></a>
                        </td>
                        @endif
                       

                    </tr>
                    @endforeach
                    
                    
                   
                </tbody>
            </table>
           
        </div>
    </div>
</div>
@endsection
