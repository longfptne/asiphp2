@extends('layouts.master')

@section('title')
    Thêm Bài Viết
@endsection

@section('content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="card shadow card-body">
            <h1 class="h3 mb-2 text-gray-800">Thêm Bài Viết</h1>

            <form action="" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label class="form-label">Hình Ảnh</label><br>
                    <input type="file"
                           onchange="document.getElementById('img').src = window.URL.createObjectURL(this.files[0])"
                           id="image" name="image">
                </div>
                <div>
                    <img src="img" id="img" alt="" width="300px" style="margin: 0 0 20px 0;">
                </div>
                <div class="form-group">
                    <label class="form-label">Tiêu Đề</label>
                    <input type="text" name="title" class="form-control">
                </div>
                <div class="form-group">
                    <label class="form-label">Nội Dung</label>
                    <input type="text" name="content" class="form-control">
                </div>
                <div class="form-group">
                    <label class="form-label">Mô Tả Ngắn</label>
                    <textarea name="excerpt" id="editor" class="form-control" cols="30" rows="10"></textarea>
                </div>
                <div class="form-group">
                    <label class="form-label">Danh Mục</label>
                    <select name="category" class="form-control" style="width:200px;" id="">
                        @foreach($listCategory as $category)
                            <option class="form-control" value="{{ $category['id_category'] }}">{{ $category['name_category']}}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-facebook" name="addPost">Thêm Bài Viết</button>
                <a href="/admin/posts/" class="btn btn-success">Quay lại</a>
            </form>
        </div>

    </div>

@endsection