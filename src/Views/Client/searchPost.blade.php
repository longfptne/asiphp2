@extends('layouts.master')

@section('title')
    {{ $_GET['search_post'] }}
@endsection

@section('content')
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-9" data-aos="fade-up">
                    <h3 class="category-title">Bài viết mà bạn tìm kiếm: {{ $_GET['search_post'] }}</h3>

                    @if(!empty($listPostSearch))
                        @foreach($listPostSearch as $post)
                            <div class="d-md-flex post-entry-2 half">
                                <a href="/postDetail/{{ $post['slug'] }}" class="me-4 thumbnail">
                                    <img src="{{ $post['image'] }}" alt="" class="img-fluid">
                                </a>
                                <div>
                                    <div class="post-meta"><span class="date">{{ $post['name_category'] }}</span> <span class="mx-1">&bullet;</span> <span>{{ date("M jS 'y", strtotime($post['create_at'])) }}</span></div>
                                    <h3><a href="/postDetail/{{ $post['slug'] }}">{{ $post['title'] }}</a></h3>
                                    <p>{{ $post['content'] }}</p>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div style="display: flex; justify-content: center; align-items: center; padding: 100px">
                            <h3>Không tìm thấy bài viết: "{{ $_GET['search_post'] }}"</h3>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection