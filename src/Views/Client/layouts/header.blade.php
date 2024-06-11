<header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
        <a href="/" class="logo d-flex align-items-center">
            <!-- Uncomment the line below if you also wish to use an image logo -->
            <!-- <img src="assets/img/logo.png" alt=""> -->
            <h1>ZenBlog</h1>
        </a>

        @php
            $categories = (new \User\Mcvoop\Models\CLient\CategoryModel())->getForCategory();
        @endphp
        <nav id="navbar" class="navbar">
            <ul>
                <li><a href="/">Trang Chủ</a></li>
                <li><a href="single-post.html">Giới Thiệu</a></li>
                <li class="dropdown"><a href="/category"><span>Danh Mục</span> <i
                                class="bi bi-chevron-down dropdown-indicator"></i></a>
                    <ul>
                        @foreach($categories as $category)
                            <li><a href="/category/{{ $category['slug'] }}">{{ $category['name_category'] }}</a>
                            </li>
                        @endforeach
                        {{--                        <li><a href="#">Drop Down 1</a></li>--}}
                        {{--                        <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>--}}
                        {{--                            <ul>--}}
                        {{--                                <li><a href="#">Deep Drop Down 1</a></li>--}}
                        {{--                                <li><a href="#">Deep Drop Down 2</a></li>--}}
                        {{--                                <li><a href="#">Deep Drop Down 3</a></li>--}}
                        {{--                                <li><a href="#">Deep Drop Down 4</a></li>--}}
                        {{--                                <li><a href="#">Deep Drop Down 5</a></li>--}}
                        {{--                            </ul>--}}
                        {{--                        </li>--}}
                        {{--                        <li><a href="#">Drop Down 2</a></li>--}}
                        {{--                        <li><a href="#">Drop Down 3</a></li>--}}
                        {{--                        <li><a href="#">Drop Down 4</a></li>--}}
                    </ul>
                </li>

                <li><a href="/aboutUs">Về Chúng Tôi</a></li>
                <li><a href="/contact">Liên Hệ</a></li>
            </ul>
        </nav><!-- .navbar -->

        @php
            $user = (new \User\Mcvoop\Models\Admin\UserModel())->getUserById($_SESSION['account_id'] ?? null);
        @endphp

        <div class="position-relative">
            @if(!empty($_SESSION['account_id']))
                @if($user['role'] == 1)
                    <a style="padding-right: 4px" href="/admin">Vào trang quản trị</a>
                @endif
                <a style="{{ $user['role'] == 1 ? "border-left: 2px solid #000; padding-left: 5px" : "" }}"
                   href="/profile">{{ $user['name'] ?? null }}</a>
                <a style="border-left: 2px solid #000; padding-left: 5px" href="/auth/logout">Đăng xuất</a>

            @else
                <a href="/auth/register">Tạo tài khoản</a>
                <a style="border-left: 2px solid #000; padding-left: 5px" href="/auth/login">Đăng nhâp</a>
            @endif
            <a href="#" class="mx-2 js-search-open"><span class="bi-search"></span></a>
            <i class="bi bi-list mobile-nav-toggle"></i>

            <!-- ======= Search Form ======= -->
            <div class="search-form-wrap js-search-form-wrap">
                <form action="/result" method="get" class="search-form">
                    <span class="icon bi-search"><input type="submit" style="position: absolute;left: -8px;top: -6px;width: 32px;height: 33px;opacity: 0;" value=" "></span>
                    <input type="text" name="search_post" placeholder="Nhập từ khóa..." class="form-control">
                    <button class="btn js-search-close"><span class="bi-x"></span></button>
                </form>
            </div><!-- End Search Form -->

        </div>

    </div>

</header>
