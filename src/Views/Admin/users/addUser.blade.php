@extends('layouts.master')

@section('title')
    Thêm Mới Tài Khoản
@endsection

@section('content')
    <div class="container-fluid">

        <div class="card shadow card-body">
            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800">Thêm Mới Tài Khoản</h1>

            <form action="" method="post">
                <div class="form-group">
                    <label class="form-label">Tên tài khoản</label>
                    <input type="text" name="name" class="form-control">
                </div>
                <div class="form-group">
                    <label class="form-label">Email</label>
                    <input type="text" name="email" class="form-control">
                </div>
                <div class="form-group">
                    <label class="form-label">Mật khẩu</label>
                    <input type="text" name="password" class="form-control">
                </div>
                <button type="submit" class="btn btn-facebook" name="addUser">Thêm tài khoản</button>
                <a href="{{ !empty($_SESSION['url_listUser']) ? $_SESSION['url_listUser'] : $_SERVER['REQUEST_URI'] }}"
                   class="btn btn-success">Quay lại</a>
            </form>

        </div>
    </div>
@endsection