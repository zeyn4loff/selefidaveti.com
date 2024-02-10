@section('title', $result->title)
@section('url', url()->current())
@section('image', url($result->image))
@extends('layouts.site')
@section('title', $result->title)
@section('content')
<section class="single-post-area">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="single-post-carousel-wrapper">
          <div class="timeline mb-3">
            <span>{{ date_format($result->created_at,'d.m.Y') }}</span>
            <span><i class="icofont-eye fs-5"></i> {{ $result->views }}</span>
          </div>
          <div>
            <h2 class="text-left">{{ $result->title }}</h2>
            <p class="text-left">{!! $result->text !!}</p>
            @if(!is_null($result->mp3_file))<audio class="fraudio" src="{{ url($result->mp3_file) }}"></audio>@endif
          </div>
          <div class="author-content mt-5 mb-5">
            <h4>Paylaş</h4>
            {!! $shareComponent !!}
          </div>
        </div>
      </div>
    </div>
    <div class="single-post-carousel-wrapper">
      <div class="spc-navigation">
        <button class="prev"><span><i class="icofont-long-arrow-left"></i></span> </button>
        <button class="next"> <span><i class="icofont-long-arrow-right"></i></span></button>
      </div>
      <div class="single-post-carousel owl-carousel"  data-carousel-loop="true" data-carousel-items="4" data-carousel-nav="false" data-carousel-dots="false" data-carousel-autoplay="true" data-carousel-margin="30" data-carousel-md="3" data-carousel-sm="1" data-carousel-lg="4" data-carousel-xl="4">
        @foreach($random_blogs as $random_blog)
        <div class="spc-single-post">
          <div class="spc-single-post-img">
            <a href="{{ route('site.blog.details.get', $random_blog->slug) }}"><img src="{{ url($random_blog->image) }}" alt="{{ $random_blog->title }}"></a>
          </div>
          <div class="spc-single-post-content">
            <div class="spc-timeline mt-3">
              <span>{{ date_format($random_blog->created_at,'d.m.Y') }}</span>
            </div>
            <h3><a href="{{ route('site.blog.details.get', $random_blog->slug) }}">{{ $random_blog->title }}</a></h3>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </div>
</section>
@endsection