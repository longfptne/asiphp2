@extends('layouts.master')

@section('title')
    Cập Nhật Bài Viết
@endsection

@section('content')
    <div class="container-fluid">
        <div class="card shadow card-body">
            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800">Cập Nhật Bài Viết</h1>

            <form action="" method="post" enctype="multipart/form-data">
                @if(!empty($success))
                    <div class="alert alert-success">
                        {{ $success }}
                    </div>
                @endif
                <div class="form-group">
                    <label class="form-label">Hình Ảnh</label><br>
                    <input type="file"
                           onchange="document.getElementById('img').src = window.URL.createObjectURL(this.files[0])"
                           id="image" name="image">
                </div>
                <br>
                <img src="{{ $post['image'] }}" id="img" alt="" width="100px">
                <br>
                <br>
                <div class="form-group">
                    <label class="form-label">Tiêu Đề</label>
                    <input type="text" value="{{ $post['title'] }}" name="title" class="form-control">
                </div>
                <div class="form-group">
                    <label class="form-label">Nội Dung</label>
                    <input type="text" name="content" value="{{ $post['content'] }}" class="form-control">
                </div>
                <div class="form-group">
                    <label class="form-label">Mô Tả Ngắn</label>
                    <textarea name="excerpt" class="form-control" id="editor" cols="30"
                              rows="10">
                    {!! $post['excerpt'] !!}
                </textarea>
                </div>
                <div class="form-group">
                    <label class="form-label">Danh Mục</label>
                    <select name="category" class="form-control" style="width:200px;" id="">
                        @foreach($listCategory as $category)
                            @if($category['id_category'] == $post['id_category'])
                                <option class="form-control" value="{{ $category['id_category'] }}"
                                        selected>{{ $category['name_category']}}</option>
                            @else
                                <option class="form-control"
                                        value="{{ $category['id_category'] }}">{{ $category['name_category']}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-facebook" name="updatePost">Cập Nhật Bài Viết</button>
                <a href="{{ !empty($_SESSION['url_listPost']) ? $_SESSION['url_listPost'] : $_SERVER['REQUEST_URI'] }}"
                   class="btn btn-success">Quay lại</a>
            </form>

        </div>
    </div>
@endsection