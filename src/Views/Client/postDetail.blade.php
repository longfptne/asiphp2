@extends('layouts.master')

@section('title')
    {{ $post['title'] }}
@endsection

@section('content')

    <section class="single-post-content">
        <div class="container">
            <div class="row">
                <div class="col-md-9 post-content" data-aos="fade-up">

                    <!-- ======= Single Post Content ======= -->
                    <div class="single-post">
                        <div class="post-meta"><span class="date">{{ $post['name_category'] }}</span> <span class="mx-1">&bullet;</span> <span>{{ date("M jS 'y", strtotime($post['create_at'])) }}</span></div>
                        <h1 class="mb-5">{{ $post['title'] }}</h1>
                        <p style="text-align: justify">
                            {{ $post['content'] }}
                        </p>

                        <figure class="my-4" style="min-width: 0; left: 50%;">
                            <img src="{{ $post['image'] }}"  class="img-fluid">
                        </figure>
                        <p style="text-align: justify">
                            {!! $post['excerpt'] !!}
                        </p>
                    </div>
                    <!-- End Single Post Content -->

                    <!-- ======= Comments ======= -->
                    <div class="comments">
                        <h5 class="comment-title py-4">Ý KIẾN</h5>
                        @if(!empty($listComment))
                            @foreach($listComment as $comment)
                                <div class="comment d-flex mb-4">
                                    <div class="flex-shrink-0">
                                        <div class="avatar avatar-sm rounded-circle">
                                            <img class="avatar-img" src="/assets/admin/img/admin.jpg" alt="" class="img-fluid">
                                        </div>
                                    </div>
                                    <div class="flex-grow-1 ms-2 ms-sm-3">

                                        <div class="comment-meta d-flex align-items-baseline">
                                            <h6 class="me-2">{{ $comment['name'] }}</h6>
                                            <span class="text-muted">{{ date("M jS 'y", strtotime($comment['create_at'])) }}</span>
                                        </div>
                                        <div class="comment-body">
                                            {{ $comment['content'] }}
                                        </div>


                                        {{--                                <div class="comment-replies bg-light p-3 mt-3 rounded">--}}
                                        {{--                                    <h6 class="comment-replies-title mb-4 text-muted text-uppercase">2 replies</h6>--}}

                                        {{--                                    <div class="reply d-flex mb-4">--}}
                                        {{--                                        <div class="flex-shrink-0">--}}
                                        {{--                                            <div class="avatar avatar-sm rounded-circle">--}}
                                        {{--                                                <img class="avatar-img" src="assets/img/person-4.jpg" alt="" class="img-fluid">--}}
                                        {{--                                            </div>--}}
                                        {{--                                        </div>--}}
                                        {{--                                        <div class="flex-grow-1 ms-2 ms-sm-3">--}}
                                        {{--                                            <div class="reply-meta d-flex align-items-baseline">--}}
                                        {{--                                                <h6 class="mb-0 me-2">Brandon Smith</h6>--}}
                                        {{--                                                <span class="text-muted">2d</span>--}}
                                        {{--                                            </div>--}}
                                        {{--                                            <div class="reply-body">--}}
                                        {{--                                                Lorem ipsum dolor sit, amet consectetur adipisicing elit.--}}
                                        {{--                                            </div>--}}
                                        {{--                                        </div>--}}
                                        {{--                                    </div>--}}
                                        {{--                                    <div class="reply d-flex">--}}
                                        {{--                                        <div class="flex-shrink-0">--}}
                                        {{--                                            <div class="avatar avatar-sm rounded-circle">--}}
                                        {{--                                                <img class="avatar-img" src="assets/img/person-3.jpg" alt="" class="img-fluid">--}}
                                        {{--                                            </div>--}}
                                        {{--                                        </div>--}}
                                        {{--                                        <div class="flex-grow-1 ms-2 ms-sm-3">--}}
                                        {{--                                            <div class="reply-meta d-flex align-items-baseline">--}}
                                        {{--                                                <h6 class="mb-0 me-2">James Parsons</h6>--}}
                                        {{--                                                <span class="text-muted">1d</span>--}}
                                        {{--                                            </div>--}}
                                        {{--                                            <div class="reply-body">--}}
                                        {{--                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Distinctio dolore sed eos sapiente, praesentium.--}}
                                        {{--                                            </div>--}}
                                        {{--                                        </div>--}}
                                        {{--                                    </div>--}}
                                        {{--                                </div>--}}
                                    </div>
                                </div>
                            @endforeach
                        @else
                            Chưa có ý kiến góp ý nào
                        @endif

                    </div>
                    <!-- End Comments -->

                    <!-- ======= Comments Form ======= -->
                    <div class="row justify-content-center mt-5">


                            <div class="col-lg-12">
                                <h5 class="comment-title">Viết bình luận</h5>
                                @if(!empty($_SESSION['account_id']))
                                    <form action="" class="formComment" method="post">
                                        <div class="row">
                                            <div class="col-12 mb-3">
                                                <label for="comment-message">Nội dung</label>
                                                <textarea class="form-control inputComment" name="content" id="comment-message" placeholder="Viết bình luận..." cols="30" rows="10"></textarea>
                                                <span style="color: red;" class="errIndex"></span>
                                            </div>
                                            <input type="hidden" name="parentId" value="0">
                                            <div class="col-12">
                                                <input type="submit" name="submit" class="btn btn-primary" value="Gửi">
                                            </div>
                                        </div>
                                    </form>
                                @else
                                    <div class="row">
                                        <h6>Vui lòng đăng nhập để sử dụng tính năng này.</h6>
                                    </div>
                                @endif
                            </div>
                    </div><!-- End Comments Form -->

                </div>

                @include('layouts.sidebar')

            </div>
        </div>
    </section>

    <script>
        const formComment = document.querySelector('.formComment');
        formComment.onsubmit = function(event) {
            const inputComment = document.querySelectorAll('.inputComment');
            const errIndex = document.querySelectorAll('.errIndex');
            let isError = false;

            errIndex.forEach(e => {
                e.textContent = '';
            })

            inputComment.forEach(function(input, index) {
                if(!input.value.trim()) {
                    errIndex[index].textContent = "Vui lòng viết bình luận";
                    input.focus();
                    isError = true;
                }
            })

            if(isError) {
                event.preventDefault();
            }
        };

    </script>

@endsection