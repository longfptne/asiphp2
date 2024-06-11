@extends('layouts.master')

@section('title')
    Cập Nhật Danh Mục
@endsection

@section('content')
    <div class="container-fluid">

        <div class="card shadow card-body">
            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800">Cập Nhật Danh Mục</h1>

            <form action="{{ $_SERVER['REQUEST_URI'] }}" method="post">
                @if(!empty($success))
                    <div class="alert alert-success">
                        {{ $success }}
                    </div>
                @endif
                <div class="form-group">
                    <label class="form-label">Tên danh mục</label>
                    <input type="text" name="nameCategory" value="{{ $categoryById['name_category'] }}"
                           class="form-control">
                </div>
                <button type="submit" class="btn btn-facebook" name="updateCategory">Cập nhật danh mục</button>
                <a href="{{ !empty($_SESSION['url_listCategory']) ? $_SESSION['url_listCategory'] : $_SERVER['REQUEST_URI'] }}"
                   class="btn btn-success">Quay lại</a>
            </form>

        </div>
    </div>
@endsection