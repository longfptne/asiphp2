<footer id="footer" class="footer">

    <div class="footer-content">
        <div class="container">

            <div class="row g-5">
                <div class="col-lg-4">
                    <h3 class="footer-heading">
                        Giới thiệu về ZenBlog</h3>
                    <p>
                        ZenBlog là 1 website đọc báo giúp người dùng có thể đọc những tin tức mới nhất</p>
                    <p><a href="about.html" class="footer-link-more">Xem thêm</a></p>
                </div>
                <div class="col-6 col-lg-2">
                    <h3 class="footer-heading">Đường dẫn</h3>
                    <ul class="footer-links list-unstyled">
                        <li><a href="/"><i class="bi bi-chevron-right"></i> Trang chủ</a></li>
                        <li><a href="index.html"><i class="bi bi-chevron-right"></i> Giới Thiệu</a></li>
                        <li><a href="/category"><i class="bi bi-chevron-right"></i> Danh Mục</a></li>
                        <li><a href="/aboutUs"><i class="bi bi-chevron-right"></i> Về Chúng Tôi</a></li>
                        <li><a href="/contact"><i class="bi bi-chevron-right"></i> Liên Hệ</a></li>
                    </ul>
                </div>
                <div class="col-6 col-lg-2">
                    <h3 class="footer-heading">Danh mục</h3>
                    @php
                        $listCategory = (new \User\Mcvoop\Models\Client\CategoryModel())->getForCategory();
                    @endphp
                    <ul class="footer-links list-unstyled">
                        @foreach($listCategory as $category)
                            <li><a href="/category/{{ $category['id_category'] }}"><i class="bi bi-chevron-right"></i> {{ $category['name_category'] }}</a></li>
                        @endforeach
                    </ul>
                </div>

                <div class="col-lg-4">
                    <h3 class="footer-heading">Bài viết gần đây</h3>
                    @php
                        $postLimit5 = (new \User\Mcvoop\Models\Client\PostModel())->getPostByTrend();
                    @endphp
                    <ul class="footer-links footer-blog-entry list-unstyled">
                        @foreach($postLimit5 as $post)
                            <li>
                                <a href="/postDetail/{{ $post['id_post'] }}" class="d-flex align-items-center">
                                    <img src="{{ $post['image'] }}" alt="" class="img-fluid me-3">
                                    <div>
                                        <div class="post-meta d-block"><span class="date">{{ $post['name_category'] }}</span> <span class="mx-1">&bullet;</span> <span>{{ date("M jS 'y", strtotime($post['create_at'])) }}</span></div>
                                        <span>{{ $post['title'] }}</span>
                                    </div>
                                </a>
                            </li>
                        @endforeach
                    </ul>

                </div>
            </div>
        </div>
    </div>

    <div class="footer-legal">
        <div class="container">

            <div class="row justify-content-between">
                <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                    <div class="copyright">
                        © Copyright <strong><span>ZenBlog</span></strong>.
                        Đã đăng ký Bản quyền
                    </div>

                    <div class="credits">
                        <!-- All the links in the footer should remain intact. -->
                        <!-- You can delete the links only if you purchased the pro version. -->
                        <!-- Licensing information: https://bootstrapmade.com/license/ -->
                        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/herobiz-bootstrap-business-template/ -->
                        Thiết kế <a href="https://bootstrapmade.com/">Hoàng Thanh Tú - PH41989</a>
                    </div>

                </div>

                <div class="col-md-6">
                    <div class="social-links mb-3 mb-lg-0 text-center text-md-end">
                        <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                        <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                        <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                        <a href="#" class="google-plus"><i class="bi bi-skype"></i></a>
                        <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
                    </div>

                </div>

            </div>

        </div>
    </div>

</footer>