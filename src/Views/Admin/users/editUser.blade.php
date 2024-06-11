@extends('layouts.master')

@section('title')
    Cập Nhật Tài Khoản
@endsection

@section('content')
    <div class="container-fluid">

        <div class="card shadow card-body">
            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800">Cập Nhật Tài Khoản</h1>

            @if(!empty($success))
                <div class="alert alert-success">
                    {{ $success }}
                </div>
            @endif

            <form action="" method="post">
                <div class="form-group">
                    <label class="form-label">Tên tài khoản</label>
                    <input type="text" value="{{ $user['name'] }}" name="name" class="form-control">
                </div>
                <div class="form-group">
                    <label class="form-label">Email</label>
                    <input type="text" value="{{ $user['email'] }}" name="email" class="form-control">
                </div>
                <div class="form-group">
                    <label class="form-label">Mật khẩu</label>
                    <input type="text" value="{{ $user['password'] }}" name="password" class="form-control">
                </div>
                <button type="submit" class="btn btn-facebook" name="updateUser">Cập nhật tài khoản</button>
                <a href="{{ !empty($_SESSION['url_listUser']) ? $_SESSION['url_listUser'] : $_SERVER['REQUEST_URI'] }}"
                   class="btn btn-success">Quay lại</a>
            </form>

        </div>
    </div>
@endsection