<div class="col-md-3">
    <!-- ======= Sidebar ======= -->
    <div class="aside-block">

        <ul class="nav nav-pills custom-tab-nav mb-4" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="pills-popular-tab" data-bs-toggle="pill" data-bs-target="#pills-popular" type="button" role="tab" aria-controls="pills-popular" aria-selected="true">Phổ biến</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="pills-trending-tab" data-bs-toggle="pill" data-bs-target="#pills-trending" type="button" role="tab" aria-controls="pills-trending" aria-selected="false">Xu hướng</button>
            </li>
        </ul>

        <div class="tab-content" id="pills-tabContent">

            <!-- Popular -->
            <div class="tab-pane fade show active" id="pills-popular" role="tabpanel" aria-labelledby="pills-popular-tab">
                @foreach($postByCategory as $post)
                    <div class="post-entry-1 border-bottom">
                        <div class="post-meta"><span class="date">{{ $post['name_category'] }}</span> <span class="mx-1">&bullet;</span> <span>{{ date("M jS 'y", strtotime($post['create_at'])) }}</span></div>
                        <h2 class="mb-2"><a href="/postDetail/{{ $post['slugPro'] }}">{{ $post['title'] }}</a></h2>
                    </div>
                @endforeach
            </div>
            <!-- End Popular -->

            <!-- Trending -->
            <div class="tab-pane fade" id="pills-trending" role="tabpanel" aria-labelledby="pills-trending-tab">
                @foreach($postCategoryByTrend as $post)
                    <div class="post-entry-1 border-bottom">
                        <div class="post-meta"><span class="date">{{ $post['name_category'] }}</span> <span class="mx-1">&bullet;</span> <span>{{ date("M jS 'y", strtotime($post['create_at'])) }}</span></div>
                        <h2 class="mb-2"><a href="/postDetail/{{ $post['slugPro'] }}">{{ $post['title'] }}</a></h2>
                    </div>
                @endforeach
            </div>
            <!-- End Trending -->

        </div>
    </div>

    <div class="aside-block">
        <h3 class="aside-title">Danh mục</h3>
        <ul class="aside-links list-unstyled">
            @foreach($getAllCategory as $category)
                <li><a href="/category/{{ $category['slug'] }}"><i class="bi bi-chevron-right"></i> {{ $category['name_category'] }}</a></li>
            @endforeach
        </ul>
    </div>

</div>