@extends('layouts.master')

@section('title')
    Danh Sách Danh Mục
@endsection

@section('content')
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-9" data-aos="fade-up">
                    <h3 class="category-title">Danh sách danh mục:</h3>
                    @foreach($listCategory as $category)
                        <div class="d-md-flex post-entry-2 half">
                            <a href="/category/{{ $category['slug'] }}" class="me-4 thumbnail">
                                {{ $category['name_category'] }}
                            </a>
                        </div>
                    @endforeach
                </div>
                <div class="col-md-3">
                    <div class="aside-block">
                        <h3 class="aside-title">Danh mục</h3>
                        <ul class="aside-links list-unstyled">
                            @foreach($listCategory as $category)
                                <li><a href="/category/{{ $category['slug'] }}"><i class="bi bi-chevron-right"></i> {{ $category['name_category'] }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection