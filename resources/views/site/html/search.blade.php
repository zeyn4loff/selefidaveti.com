@extends('layouts.site')
@section('title', $key)
@section('content')
<section class="techno-latest-news">
  <div class="container">
    <div class="tln-content-wrapper">
      @foreach($results as $result)
      <div class="news-vcard-single" data-aos="fade-up">
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
    </div>
  </div>
</section>
@endsection