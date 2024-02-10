@foreach($blogs as $blog)
    <div class="latest__post-item">
        <div class="latest__post-thumb tgImage__hover">
            <a href="{{ route("site.blog.slug.get", $blog->slug) }}"><img src="{{ url($blog->image) }}" alt="{{ $blog->title }}"></a>
        </div>
        <div class="latest__post-content">
            <ul class="tgbanner__content-meta list-wrap">
                @if($blog->category->parent)
                    <li class="category"><a href="{{ route('site.blog-category.slug.get', $blog->category->parent->slug) }}">{{ $blog->category->parent->name }}</a></li>
                    <li class="category"><a href="{{ route('site.blog-category.slug.get', [$blog->category->parent->slug, $blog->category->slug]) }}">{{ $blog->category->name }}</a></li>
                @else
                    <li class="category"><a href="{{ route('site.blog-category.slug.get', $blog->category->slug) }}">{{ $blog->category->name }}</a></li>
                @endif
                <li>{{ $blog->created_at->format('d.m.Y') }}</li>
            </ul>
            <h3 class="title tgcommon__hover"><a href="{{ route("site.blog.slug.get", $blog->slug) }}">{{ $blog->title }}</a></h3>
            <p>{!! substr(strip_tags($blog->text), 0, 150) . '...' !!}</p>
            <ul class="post__activity list-wrap">
                <li><i class="fal fa-eye"></i> {{ $blog->views }}</li>
            </ul>
        </div>
    </div>
@endforeach
