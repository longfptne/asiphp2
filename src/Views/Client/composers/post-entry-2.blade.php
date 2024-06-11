<div class="d-lg-flex post-entry-2">
    <a href="/postDetail/{{ $post['slug'] }}" class="me-4 thumbnail mb-4 mb-lg-0 d-inline-block">
        <img src="{{ $post['image'] }}" alt="" class="img-fluid">
    </a>
    <div>
        <div class="post-meta"><span class="date">{{ $post['name_category'] }}</span> <span class="mx-1">&bullet;</span> <span>{{ date("M jS 'y", strtotime($post['create_at'])) }}</span></div>
        <h3><a href="/postDetail/{{ $post['slug'] }}">{{ $post['title'] }}</a></h3>
        <p>{{ $post['content'] }}</p>
        <div class="d-flex align-items-center author">
            <div class="photo"><img src="{{ PATH_FOLDER }}/assets/client/assets/img/person-2.jpg" alt="" class="img-fluid"></div>
            <div class="name">
                <h3 class="m-0 p-0">Wade Warren</h3>
            </div>
        </div>

    </div>
</div>