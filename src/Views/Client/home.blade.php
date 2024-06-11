@extends('layouts.master')

@section('title')
    Home
@endsection

@section('content')
    <!-- ======= Hero Slider Section ======= -->
    <section id="hero-slider" class="hero-slider">
        <div class="container-md" data-aos="fade-in">
            <div class="row">
                <div class="col-12">
                    <div class="swiper sliderFeaturedPosts">
                        <div class="swiper-wrapper">
                            @foreach($getPostByTrend as $post)
                                <div class="swiper-slide">
                                    <a href="/postDetail/{{ $post['slug'] }}" class="img-bg d-flex align-items-end"
                                       style="background-image: url({{ $post['image'] }});">
                                        <div class="img-bg-inner">
                                            <h2>{{ $post['title'] }}</h2>
                                            <p>{{ $post['content'] }}</p>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                        <div class="custom-swiper-button-next">
                            <span class="bi-chevron-right"></span>
                        </div>
                        <div class="custom-swiper-button-prev">
                            <span class="bi-chevron-left"></span>
                        </div>

                        <div class="swiper-pagination"></div>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- End Hero Slider Section -->

    <!-- ======= Post Grid Section ======= -->
    <section id="posts" class="posts">
        <div class="container" data-aos="fade-up">
            <div class="row g-5">
                @foreach($onePost as $post)
                    <div class="col-lg-4">
                        @include('composers.post-entry-1',
                            [
                                'post' => $post,
                            ]
                        )
                    </div>
                @endforeach

                <div class="col-lg-8">
                    <div class="row g-5">

                        @foreach($postListPostTop6 as $postItem)
                            <div class="col-lg-4 border-start custom-border">
                                @foreach($postItem as $index => $post)
                                    @include('composers.post-entry-1',
                                        [
                                            'post' => $post,
                                            'hiddenAuthor' => false,
                                            'lastIndex' => count($postItem) - 1, // Số lượng phần tử trong mỗi mảng $postItem
                                            'index' => $index
                                        ]
                                    )
                                @endforeach
                            </div>
                        @endforeach

                        <!-- Trending Section -->
                        <div class="col-lg-4">

                            <div class="trending">
                                <h3>Xu Hướng</h3>
                                <ul class="trending-post">
                                    @foreach($getPostByTrend as $key => $postTrend)
                                        <li>
                                            <a href="/postDetail/{{ $postTrend['slug'] }}">
                                                <span class="number">{{ $key+1 }}</span>
                                                <h3>{{ $postTrend['title'] }}</h3>
                                                <span class="author">{{ $postTrend['name_category'] }}</span>
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>

                        </div>
                        <!-- End Trending Section -->
                    </div>
                </div>

            </div> <!-- End .row -->
        </div>
    </section> <!-- End Post Grid Section -->

    <!-- ======= Culture Category Section ======= -->
    <section class="category-section">
        <div class="container" data-aos="fade-up">

            <div class="section-header d-flex justify-content-between align-items-center mb-5">
                <h2>Văn Hóa</h2>
                <div><a href="/category/van-hoa" class="more">Xem Tất Cả Văn Hóa</a></div>
            </div>

            <div class="row">
                <div class="col-md-9">
                    @foreach($postByCategoryCultureMain as $post)
                        @include('composers.post-entry-2',
                            [
                                'post' => $post
                            ]
                        )
                    @endforeach

                    <div class="row">
                        @foreach($postByCategoryCultureSmall as $key => $postItem)
                            <div class="col-lg-{{ $key == 0 ? 4 : 8 }}">
                                @foreach($postItem as $index => $post)
                                    @include('composers.post-entry-1',
                                        [
                                            'post' => $post,
                                            'lastIndex' => count($postItem) - 1, // Số lượng phần tử trong mỗi mảng $postItem
                                            'index' => $index
                                        ]
                                    )
                                @endforeach

                            </div>
                        @endforeach
                    </div>

                </div>

                <div class="col-md-3">

                    @foreach($postByCategoryCultureSidebar as $index => $post)

                        @include('composers.post-entry-1-sidebar',
                            [
                                'post' => $post,
                                'lastIndex' => count($postByCategoryCultureSidebar) - 1, // Số lượng phần tử trong mỗi mảng $postByCategoryCultureSidebar
                                'index' => $index
                            ]
                        )

                    @endforeach

                </div>
            </div>
        </div>
    </section><!-- End Culture Category Section -->

    <!-- ======= Business Category Section ======= -->
    <section class="category-section">
        <div class="container" data-aos="fade-up">

            <div class="section-header d-flex justify-content-between align-items-center mb-5">
                <h2>Thể thao</h2>
                <div><a href="/category/the-thao" class="more">Xem tất cả thể thao</a></div>
            </div>

            <div class="row">
                <div class="col-md-9 order-md-2">

                    @foreach($postByCategoryFootballMain as $post)
                        @include('composers.post-entry-2',
                            [
                                'post' => $post
                            ]
                        )
                    @endforeach

                    <div class="row">
                        @foreach($postByCategoryFootballSmail as $key => $postItem)
                            <div class="col-lg-{{ $key == 0 ? 4 : 8 }}">
                                @foreach($postItem as $index => $post)
                                    @include('composers.post-entry-1',
                                        [
                                            'post' => $post,
                                            'lastIndex' => count($postItem) - 1, // Số lượng phần tử trong mỗi mảng $postItem
                                            'index' => $index
                                        ]
                                    )
                                @endforeach

                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-md-3">
                    @foreach($postByCategoryFootballSidebar as $index => $post)

                        @include('composers.post-entry-1-sidebar',
                            [
                                'post' => $post,
                                'lastIndex' => count($postByCategoryFootballSidebar) - 1, // Số lượng phần tử trong mỗi mảng $postByCategoryCultureSidebar
                                'index' => $index
                            ]
                        )

                    @endforeach
                </div>
            </div>
        </div>
    </section><!-- End Business Category Section -->

    <!-- ======= Lifestyle Category Section ======= -->
    <section class="category-section">
        <div class="container" data-aos="fade-up">

            <div class="section-header d-flex justify-content-between align-items-center mb-5">
                <h2>Đời Sống</h2>
                <div><a href="/category/doi-song" class="more">Xem Tất Cả Đời Sống</a></div>
            </div>

            <div class="row g-5">
                <div class="col-lg-4">
                    @foreach($postByCategoryLifeMain as $post)
                        <div class="post-entry-1 lg">
                            <a href="/postDetail/{{ $post['slug'] }}">
                                <img src="{{ $post['image'] }}" alt=""
                                     class="img-fluid">
                            </a>
                            <div class="post-meta"><span class="date">{{ $post['name_category'] }}</span> <span
                                        class="mx-1">&bullet;</span>
                                <span>{{ date("M jS 'y", strtotime($post['create_at'])) }}</span></div>
                            <h2><a href="/postDetail/{{ $post['slug'] }}">{{ $post['title'] }}</a></h2>
                            <p class="mb-4 d-block">{{ $post['content'] }}</p>
                        </div>
                    @endforeach

                    @foreach($postByCategoryLifeSmail as $key => $post)
                        <div class="post-entry-1 {{ $key == 1 ? "" : "border-bottom" }}">
                            <div class="post-meta"><span class="date">{{ $post['name_category'] }}</span>
                                <span class="mx-1">&bullet;</span>
                                <span>{{ date("M jS 'y", strtotime($post['create_at'])) }}</span></div>
                            <div>
                                <a href="/postDetail/{{ $post['slug'] }}">
                                    <img width="100px" src="{{ $post['image'] }}" alt=""
                                         class="img-fluid">
                                </a>
                            </div>
                            <h2 class="mb-2"><a href="/postDetail/{{ $post['slug'] }}">{{ $post['title'] }}</a></h2>
                        </div>
                    @endforeach


                </div>

                <div class="col-lg-8">
                    <div class="row g-5">
                        @foreach($lifeTop6 as $key => $postItem)
                            @if($key <= 1)
                                <div class="col-lg-4 {{ $key <= 1 ? "border-start custom-border" : "" }}">
                                    @foreach($postItem as $index => $post)
                                        @include('composers.post-entry-1',
                                            [
                                                'post' => $post,
                                                'lastIndex' => count($postItem) - 1, // Số lượng phần tử trong mỗi mảng $postItem
                                                'index' => $index
                                            ]
                                        )
                                    @endforeach
                                </div>
                            @else
                                <div class="col-lg-4">
                                    @foreach($postByCategoryLifeSmailRight as $post)
                                        <div class="post-entry-1 border-bottom">
                                            <div class="post-meta"><span
                                                        class="date">{{ $post['name_category'] }}</span> <span
                                                        class="mx-1">&bullet;</span>
                                                <span>{{ date("M jS 'y", strtotime($post['create_at'])) }}</span></div>
                                            <h2 class="mb-2"><a href="{{ $post['slug'] }}">{{ $post['title'] }}</a></h2>
                                        </div>
                                    @endforeach

                                </div>
                            @endif
                        @endforeach

                    </div>
                </div>

            </div> <!-- End .row -->
        </div>
    </section><!-- End Lifestyle Category Section -->
@endsection