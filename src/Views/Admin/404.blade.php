@extends('layouts.master')

@section('title')
    404 Not Found
@endsection

@section('content')
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Begin Page Content -->
            <div class="container-fluid">

                <!-- 404 Error Text -->
                <div class="text-center">
                    <div class="error mx-auto" data-text="404">404</div>
                    <p class="lead text-gray-800 mb-5">Không tìm thấy trang</p>
                    <p class="text-gray-500 mb-0">Có vẻ như bạn đã tìm thấy trục trặc trong ma trận...</p>
                    <a href="/admin/dashboard">&larr; Quay về bảng điều khiển</a>
                </div>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        <footer class="sticky-footer bg-white">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Copyright &copy; Your Website 2020</span>
                </div>
            </div>
        </footer>
        <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->
@endsection