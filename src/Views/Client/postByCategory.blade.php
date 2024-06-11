@extends('layouts.master')

@section('title')
    {{ $category['name_category'] }}
@endsection

@section('content')
    <section>
        <div class="container">
            <div class="row">

                <div class="col-md-9" data-aos="fade-up">
                    <h3 class="category-title">Danh mục: {{ $category['name_category'] }}</h3>

                    @if(!empty($postByCategoryCountPage))
                        @foreach($postByCategoryCountPage as $post)
                            <div class="d-md-flex post-entry-2 half">
                                <a href="/postDetail/{{ $post['slugPro'] }}" class="me-4 thumbnail">
                                    <img src="{{ $post['image'] }}" alt="" class="img-fluid">
                                </a>
                                <div>
                                    <div class="post-meta"><span class="date">{{ $post['name_category'] }}</span> <span class="mx-1">&bullet;</span> <span>{{ date("M jS 'y", strtotime($post['create_at'])) }}</span></div>
                                    <h3><a href="/postDetail/{{ $post['slugPro'] }}">{{ $post['title'] }}</a></h3>
                                    <p>{{ $post['content'] }}</p>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div style="display: flex; justify-content: center; align-items: center; padding: 100px">
                            <h3>Danh mục này chưa có bài viết nào</h3>
                        </div>
                    @endif


                    <div class="text-start py-4">
                        <div class="custom-pagination">

                            @if($curentPage > 1)
                                <a href="/category/doi-song/{{ $curentPage - 1 }}" class="prev">Trước</a>
                            @endif

                            @for($i = 1; $i <= $countTrang; $i++)
                                <a href="/category/doi-song/{{ $i }}" class="{{ $curentPage == $i ? 'active' : '' }}">{{ $i }}</a>
                            @endfor

                            @if($curentPage < $countTrang)
                                <a href="/category/doi-song/{{ $curentPage + 1 }}" class="prev">Tiếp</a>
                            @endif

                        </div>
                    </div>
                </div>

                @include('layouts.sidebar')

            </div>
        </div>
    </section>
@endsection