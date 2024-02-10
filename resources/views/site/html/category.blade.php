@extends('layouts.site')
@section('title', $category->name)
@section('content')
<section class="techno-latest-news">
  <div class="container">
    <div class="tln-content-wrapper">
    @if($results)
     @foreach($results as $p)
      @foreach($p as $k => $result)
      <div class="news-vcard-single" style="height: max-content;" data-aos="fade-up">
        <a href="{{ route('site.blog.details.get', $result->slug) }}">
          <div class="news-vcard-img">
            <img src="{{ url($result->image) }}" alt="{{ $result->title }}">
          </div>
          <div class="news-vcard-content">
            <h3><a href="{{ route('site.blog.details.get', $result->slug) }}">{{ $result->title }}</a></h3>
            <div class="news-vcard-title">
              <span>{{ date_format($result->created_at,'d.m.Y') }}</span>
            </div>
          </div>
        </a>
      </div>
      @endforeach
      @endforeach
      @endif
    </div>
  </div>
</section>
@endsection