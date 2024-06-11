<div style="align-items: center" class="post-entry-1 {{ $index === $lastIndex ? '' : 'border-bottom' }}">
    <div class="post-entry-1 lg">
        <a href="/postDetail/{{ $post['slug'] }}">
                <img src="{{ $post['image'] }}" alt="" class="img-fluid">
        </a>
        <div class="post-meta"><span class="date">{{ $post['name_category'] }}</span>
            <span class="mx-1">&bullet;</span>
            <span>{{ date("M jS 'y", strtotime($post['create_at'])) }}</span></div>
        <h2 style="font-size: {{ !isset($hiddenAuthor) ? '' : '23px' }}"><a
                    href="/postDetail/{{ $post['slug'] }}">{{ $post['title'] }}</a></h2>
        @if(!isset($hiddenAuthor))
            <p class="mb-4 d-block">{{ $post['excerpt'] }}</p>
        @endif
    </div>
    @if(!isset($hiddenAuthor))
        <div class="d-flex align-items-center author">
            <div class="photo">
                <img src="{{ PATH_FOLDER }}/assets/client/assets/img/person-1.jpg" alt=""
                                    class="img-fluid"></div>
            <div class="name">
                <h3 class="m-0 p-0">Cameron Williamson</h3>
            </div>
        </div>
    @endif
</div>