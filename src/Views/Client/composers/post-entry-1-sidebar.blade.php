<div class="post-entry-1 {{ $index === $lastIndex ? '' : 'border-bottom' }}">
    <div class="post-meta"><span class="date">{{ $post['name_category'] }}</span> <span class="mx-1">&bullet;</span>
        <span>{{ date("M jS 'y", strtotime($post['create_at'])) }}</span></div>
    <h2 class="mb-2"><a href="/postDetail/{{ $post['slug'] }}">{{ $post['title'] }}</a></h2>
    <span class="author mb-3 d-block">{{ $post['name_category'] }}</span>
</div>