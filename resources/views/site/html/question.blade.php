@extends('layouts.site')
@section('title', 'Mövcud suallar')
@section('content')
<section class="techno-latest-news">
  <div class="container">
    <h3 class="side-border">Mövcud suallar</h3>
    <aside class="header-aside aos-init aos-animate" data-aos="fade-up">
      <div class="card-list card-counting">
        @foreach($results as $result)
        <!-- single card list -->
        <div class="single-card-list card-border">
          <div class="card-list-cont">
            <div class="card-list-discript">
              <span>{{ date_format($result->created_at,'d.m.Y') }}</span>
              <span>{{ $result->Category->name }}</span>
            </div>
            <div class="card-list-heading">
              <h6><a href="{{ route('site.question.details.get', $result->slug) }}">{{ $result->title }} <i class="icofont-long-arrow-right"></i></a></h6>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </aside>
  </div>
</section>
@endsection