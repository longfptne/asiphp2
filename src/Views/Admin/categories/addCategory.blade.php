@extends('layouts.master')

@section('title')
    Thêm Danh Mục
@endsection

@section('content')
    <div class="container-fluid">

        <div class="card shadow card-body">
            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800">Thêm Danh Mục</h1>

            <form action="" method="post">
                <div class="form-group">
                    <label class="form-label">Tên danh mục</label>
                    <input type="text" name="nameCategory" class="form-control">
                </div>
                <button type="submit" class="btn btn-facebook" name="addCategory">Thêm danh mục</button>
                <a href="{{ $_SERVER['HTTP_REFERER'] }}" class="btn btn-success">Quay lại</a>
            </form>

        </div>
    </div>
@endsection