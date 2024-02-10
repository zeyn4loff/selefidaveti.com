@extends('layouts.site')
@section('title', $setting->site_name)
@section('content')
<div class="nvbanner-area">
  <div class="container">
    <div class="row">
      <div class="techno-trendy-news" data-aos="fade-up">
        <div class="container">
          <div class="trendy-slider-wrapper owl-carousel" data-carousel-loop="true" data-carousel-items="1" data-carousel-xl="1" data-carousel-lg="1" data-carousel-md="1" data-carousel-sm="1" data-carousel-nav="false" data-carousel-dots="true" data-carousel-margin="30">
            @foreach($sliders as $slider)
            <div class="col-md-12">
              <a href="{{ $slider->url }}">
                <div class="techno-banner-single">
                  <div class="tbs-img">
                    <img src="{{ url($slider->image) }}" alt="{{ $slider->title }}">
                  </div>
                  <div class="tbs-content">
                    <h3 class="text-white">{{ $slider->title }}</h3>
                  </div>
                </div>
              </a>
            </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<section class="techno-latest-news">
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-12 mb-4">
        <div class="tln-content-wrapper">
          @foreach($blogs as $blog)
          <div class="news-vcard-single" data-aos="fade-up">
            <a href="{{ route('site.blog.details.get', $blog->slug) }}">
              <div class="news-vcard-img">
                <img src="{{ url($blog->image) }}" alt="{{ $blog->title }}">
              </div>
              <div class="news-vcard-content">
                <h3>
            <a href="{{ route('site.blog.details.get', $blog->slug) }}">{{ $blog->title }}</a></h3>
            <div class="news-vcard-title">
            <span>{{ date_format($blog->created_at,'d.m.Y') }}</span>
            </div>
            </div>
            </a>
          </div>
          @endforeach
        </div>
      </div>
      <div class="col-md-4 col-12">
        <h3 class="side-border">Ən son suallar</h3>
        <aside class="header-aside aos-init aos-animate p-0" style="height: auto" data-aos="fade-up">
          <div class="card-list card-counting">
            @foreach($questions as $question)
            <!-- single card list -->
            <div class="single-card-list card-border" style="padding: 21px 7px;">
              <div class="card-list-cont">
                <div class="card-list-discript">
                  <span>{{ date_format($question->created_at,'d.m.Y') }}</span>
                </div>
                <div class="card-list-heading">
                  <h6><a href="{{ route('site.question.details.get', $question->slug) }}">{{ $question->title }} <i class="icofont-long-arrow-right"></i></a></h6>
                </div>
              </div>
            </div>
            @endforeach
          </div>
        </aside>
        <h3 class="side-border mt-4">Namaz vaxtları</h3>
        <div id="prayerTimesContainer"></div>
      </div>
    </div>
  </div>
</section>
@endsection