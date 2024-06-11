<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>@yield('title') - ZenBlog</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="/assets/client/assets/img/favicon.png" rel="icon">
    <link href="/assets/client/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=EB+Garamond:wght@400;500&family=Inter:wght@400;500&family=Playfair+Display:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
    <link href="{{ PATH_FOLDER }}/assets/admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet"
          type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <!-- Vendor CSS Files -->
    <link href="{{ PATH_FOLDER }}/assets/client/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ PATH_FOLDER }}/assets/client/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="{{ PATH_FOLDER }}/assets/client/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link href="{{ PATH_FOLDER }}/assets/client/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="{{ PATH_FOLDER }}/assets/client/assets/vendor/aos/aos.css" rel="stylesheet">

    <!-- Template Main CSS Files -->
    <link href="{{ PATH_FOLDER }}/assets/client/assets/css/variables.css" rel="stylesheet">
    <link href="{{ PATH_FOLDER }}/assets/client/assets/css/main.css" rel="stylesheet">
    <style>
        picture > img {
            width: 100% !important;
            object-fit: cover;
            height: 500px !important;
        }

        .errProfile {
            font-size: 13px;
            color: red;
            position: absolute;
            bottom: -21px;
            left: 5px;
        }
    </style>
</head>

<body>

<!-- ======= Header ======= -->
@include('layouts.header')
<!-- End Header -->

{{-- Main --}}
<main id="main">

@yield('content')

</main>
<!-- End #main -->

<!-- ======= Footer ======= -->
@include('layouts.footer')
<!-- End Footer -->

<a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="{{ PATH_FOLDER }}/assets/client/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="{{ PATH_FOLDER }}/assets/client/assets/vendor/swiper/swiper-bundle.min.js"></script>
<script src="{{ PATH_FOLDER }}/assets/client/assets/vendor/glightbox/js/glightbox.min.js"></script>
<script src="{{ PATH_FOLDER }}/assets/client/assets/vendor/aos/aos.js"></script>
<script src="{{ PATH_FOLDER }}/assets/client/assets/vendor/php-email-form/validate.js"></script>

<!-- Template Main JS File -->
<script src="/assets/client/assets/js/main.js"></script>


</body>

</html>