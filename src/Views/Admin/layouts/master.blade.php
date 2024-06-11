<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield('title', 'Admin - Blog')</title>
    <!-- Favicons -->
    <link href="/assets/client/assets/img/favicon.png" rel="icon">
    <link href="/assets/client/assets/img/apple-touch-icon.png" rel="apple-touch-icon">
    <!-- Custom fonts for this template-->
    <link href="{{ PATH_FOLDER }}/assets/admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet"
          type="text/css">
    <link
            href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
            rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ PATH_FOLDER }}/assets/admin/css/sb-admin-2.min.css" rel="stylesheet">

    <script src="https://cdn.ckeditor.com/ckeditor5/41.0.0/classic/ckeditor.js"></script>
    <style>
        .ck-editor__editable[role="textbox"] {
            /* Editing area */
            min-height: 300px;
        }


    </style>
</head>

@section('wrapper')

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        @include('layouts.sidebar')
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                @include('layouts.topbar')
                <!-- End of Topbar -->

                @yield('content')

            </div>
            <!-- End of Main Content -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->



<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Bạn có chắc chắn muốn đăng xuất hay không?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Chọn "Đăng xuất" bên dưới nếu bạn sẵn sàng kết thúc phiên hiện tại của mình.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Hủy</button>
                <a class="btn btn-primary" href="/auth/logout">Đăng xuất</a>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="{{ PATH_FOLDER }}/assets/admin/vendor/jquery/jquery.min.js"></script>
<script src="{{ PATH_FOLDER }}/assets/admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="{{ PATH_FOLDER }}/assets/admin/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="{{ PATH_FOLDER }}/assets/admin/js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="{{ PATH_FOLDER }}/assets/admin/vendor/chart.js/Chart.min.js"></script>

<!-- Page level custom scripts -->
<script src="{{ PATH_FOLDER }}/assets/admin/js/demo/chart-area-demo.js"></script>
<script src="{{ PATH_FOLDER }}/assets/admin/js/demo/chart-pie-demo.js"></script>

<!-- jQuery and CKEditor -->
{{--<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>--}}

<!-- Include CKEditor locally (replace the CDN link) -->
<script src="{{ PATH_FOLDER }}/assets/admin/ckeditor/ckeditor/ckeditor.js"></script>

<!-- CKEditor initialization -->
<script>
    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );
</script>

</body>
@show

</html>