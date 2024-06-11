@extends('layouts.master')

@section('title')
    Chi Tiết Bài Viết
@endsection

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Chi Tiết Bài Viết</h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="row">
                    <div class="alert alert-dismissible">
                        <h3>Bài viết: {{ $post['title'] }}</h3>
                    </div>
                    <div class="col-sm-12">
                        <table class="table table-bordered">
                            <tr>
                                <td style="width: 200px">ID</td>
                                <td>{{ $post['id_post'] }}</td>
                            </tr>
                            <tr>
                                <td style="width: 200px">Hình Ảnh</td>
                                <td><img src="{{ $post['image'] }}" style="width: 140px" alt=""></td>
                            </tr>
                            <tr>
                                <td style="width: 200px">Tiêu Đề</td>
                                <td>{{ $post['title'] }}</td>
                            </tr>
                            <tr>
                                <td style="width: 200px">Nội Dung</td>
                                <td>{{ $post['content'] }}</td>
                            </tr>
                            <tr>
                                <td style="width: 200px">Mô Tả Ngắn</td>
                                <td>{!! $post['excerpt'] !!}</td>
                            </tr>
                            <tr>
                                <td style="width: 200px">Danh Mục</td>
                                <td>{{ $post['name_category'] }}</td>
                            </tr>
                            <tr>
                                <td style="width: 200px">Ngày Đăng</td>
                                <td>{{ date("d-m-Y H:i:s", strtotime($post['create_at'])) }}</td>
                            </tr>
                        </table>
                        <a href="{{ !empty($_SESSION['url_listPost']) ? $_SESSION['url_listPost'] : $_SERVER['REQUEST_URI'] }}" class="btn btn-facebook">Quay lại</a>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection