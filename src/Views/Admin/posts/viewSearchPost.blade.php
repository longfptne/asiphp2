@extends('layouts.master')

@section('title')
    Tìm Kiếm Bài Viết
@endsection

@section('content')
    <div class="container-fluid">

        <div class="card shadow card-body">
            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800">Tìm Kiếm Bài Viết</h1>

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    Bài viết bạn vừa tìm kiếm: {{ $_GET['search_post'] }}
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                            <div class="row">
                                <div class="col-sm-12 col-md-6">
                                    <div class="dataTables_length" id="dataTable_length">
                                        <label>
                                            Hiển thị
                                            <select name="dataTable_length" aria-controls="dataTable"
                                                    class="custom-select custom-select-sm form-control form-control-sm">
                                                <option value="10">10</option>
                                                <option value="25">25</option>
                                                <option value="50">50</option>
                                                <option value="100">100</option>
                                            </select>
                                        </label>
                                    </div>
                                </div>
                                <form action="/admin/posts/searchPost" method="get">
                                    <div class="col-sm-12 col-md-6">
                                        <div id="dataTable_filter" class="dataTables_filter">
                                            <label style="display: flex; align-items: center; width: 200%;">
                                                <div style="width: 140px;">Tìm kiếm:</div>
                                                <input type="search" class="form-control form-control-sm"
                                                       name="search_post" placeholder="Nhập tên bài viết..."
                                                       aria-controls="dataTable">
                                                <input style="margin-left: 7px;" type="submit" value="Tìm kiếm"
                                                       class="btn btn-sm btn-facebook">
                                            </label>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    @if(!empty($searchPost))
                                        <table class="table table-bordered dataTable" id="dataTable" width="100%"
                                               cellspacing="0" role="grid" aria-describedby="dataTable_info"
                                               style="width: 100%;">
                                            <thead>
                                            <tr role="row">
                                                <th class="sorting sorting_asc" tabindex="0" aria-controls="dataTable"
                                                    rowspan="1" colspan="1" aria-sort="ascending"
                                                    aria-label="Name: activate to sort column descending"
                                                    style="width: 50px;">ID
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                    colspan="1" aria-label="Position: activate to sort column ascending"
                                                    style="width: 100px;">Hình Ảnh
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                    colspan="1" aria-label="Position: activate to sort column ascending"
                                                    style="width: 343.111px;">Tiêu Đề
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                    colspan="1" aria-label="Position: activate to sort column ascending"
                                                    style="width: 250px;">Danh Mục
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                    colspan="1" aria-label="Position: activate to sort column ascending"
                                                    style="width: 230px;">Ngày Đăng
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                    colspan="1" aria-label="Office: activate to sort column ascending"
                                                    style="width: 166.111px;">Hành Động
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                    colspan="1" aria-label="Office: activate to sort column ascending"
                                                    style="width: 200px;">Thao Tác
                                                </th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($searchPost as $key => $post)
                                                <tr class="odd">
                                                    <td class="sorting_1">{{ (intval($key) + 1) }}</td>
                                                    <td><img width="100px" src="{{ $post['image'] }}" alt=""></td>
                                                    <td>{{ $post['title'] }}</td>
                                                    <td>{{ $post['name_category'] }}</td>
                                                    <td>{{ date("d-m-Y H:i:s", strtotime($post['create_at'])) }}</td>
                                                    <td>
                                                        <a class="btn btn-facebook"
                                                           href="/admin/posts/detailPost/{{ $post['id_post'] }}">Chi
                                                            tiết</a>
                                                    </td>
                                                    <td>
                                                        <a href="/admin/posts/editPost/{{ $post['id_post'] }}"
                                                           class="btn btn-sm btn-success">Sửa</a>
                                                        <a onclick="return confirm('Bạn có chắc chắn muốn xóa bài viết này hay không?')"
                                                           href="/admin/posts/deletePost/{{ $post['id_post'] }}"
                                                           class="btn btn-sm btn-danger">Xóa</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    @else
                                        <div style="display: flex; justify-content: center; align-items: center; height: 300px;">
                                            <h5>Không tìm thấy bài viết: "{{ $_GET['search_post'] }}"</h5>
                                        </div>
                                    @endif

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-5">
                                    <div class="dataTables_info" id="dataTable_info" role="status" aria-live="polite">
                                        Hiển thị 1 đến 10 trong 57 mục
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-7">
                                    <div class="dataTables_paginate paging_simple_numbers" id="dataTable_paginate">
                                        <ul class="pagination">
                                            <li class="paginate_button page-item previous disabled"
                                                id="dataTable_previous">
                                                <a href="#" aria-controls="dataTable" data-dt-idx="0" tabindex="0"
                                                   class="page-link">Quay lại</a></li>
                                            <li class="paginate_button page-item active"><a href="#"
                                                                                            aria-controls="dataTable"
                                                                                            data-dt-idx="1" tabindex="0"
                                                                                            class="page-link">1</a></li>
                                            <li class="paginate_button page-item "><a href="#" aria-controls="dataTable"
                                                                                      data-dt-idx="2" tabindex="0"
                                                                                      class="page-link">2</a></li>
                                            <li class="paginate_button page-item "><a href="#" aria-controls="dataTable"
                                                                                      data-dt-idx="3" tabindex="0"
                                                                                      class="page-link">3</a></li>
                                            <li class="paginate_button page-item "><a href="#" aria-controls="dataTable"
                                                                                      data-dt-idx="4" tabindex="0"
                                                                                      class="page-link">4</a></li>
                                            <li class="paginate_button page-item "><a href="#" aria-controls="dataTable"
                                                                                      data-dt-idx="5" tabindex="0"
                                                                                      class="page-link">5</a></li>
                                            <li class="paginate_button page-item "><a href="#" aria-controls="dataTable"
                                                                                      data-dt-idx="6" tabindex="0"
                                                                                      class="page-link">6</a></li>
                                            <li class="paginate_button page-item next" id="dataTable_next"><a href="#"
                                                                                                              aria-controls="dataTable"
                                                                                                              data-dt-idx="7"
                                                                                                              tabindex="0"
                                                                                                              class="page-link">Tiếp</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection