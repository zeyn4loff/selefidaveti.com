@extends('layouts.site')
@section('title', $result->title)
@section('content')
<section class="techno-latest-news">
  <div class="single-post-carousel-wrapper">
    <div class="nsc-list-single nsc-border-list nsc-list-single review-single-cart">
      <div class="nsc-list-img round-image">
        <a href="javascript:void(0);"><img src="{{ asset('site/assets/img/user.png') }}" alt="image"></a>
      </div>
      <div class="nsc-list-content">
        <div class="nsc-list-title">
          <span>{{ date_format($result->created_at,'d.m.Y') }}</span>
          <span><i class="icofont-eye fs-5"></i> {{ $result->views }}</span>
        </div>
        <h3 class="mb-1">{{ $result->name }}</h3>
        <h3>{{ $result->title }}</h3>
        <div class="star-mark star-fill">
          <p>{!! $result->text !!}</p>
        </div>
      </div>
    </div>
    <h3 class="side-border mt-3 mb-3">Cavab</h3>
    <div class="nsc-list-single nsc-border-list nsc-list-single review-single-cart">
      <div class="nsc-list-img round-image">
        <a href="javascript:void(0);"><img src="{{ asset('site/assets/img/user.png') }}" alt="image"></a>
      </div>
      <div class="nsc-list-content">
        <div class="nsc-list-title">
          <span>{{ date_format($result->updated_at,'d.m.Y') }}</span>
        </div>
        <h3 class="mb-1">Samiq Mustafayev</h3>
        <div class="star-mark star-fill" style="display: block">
          <p>{!! $result->answer !!}</p>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection