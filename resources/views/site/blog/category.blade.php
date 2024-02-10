@extends('layouts.site')
@section('title', $category->name)
@section('content')
    <section class="latest-post-area pt-80 pb-80">
        <div class="container">
            <div class="row justify-content-center">
                @if($blogs->count() > 0)
                    <div class="col-xl-9 col-lg-8">
                        <div class="section__title-wrap mb-40">
                            <div class="row align-items-end">
                                <div class="col-sm-6">
                                    <div class="section__title">
                                        <h3 class="section__main-title">{{ $category->name }}</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="latest__post-wrap">
                            <x-blog-list :blogs="$blogs"/>
                        </div>
                    </div>
                    <x-sidebar/>
                @else
                    <div class="col-xxl-6 col-xl-7 col-lg-8">
                        <div class="newsletter__title text-center mb-35">
                            <h4 class="title mb-4">Bu bölməyə məqalə əlavə edilməyib. Digər bölmələrə baxa bilərsiz</h4>
                            <a href="{{ route("site.home.get") }}" class="btn" >
                                <span class="text">Ana səhifə</span>
                                <i class="fas fa-home"></i>
                            </a>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>
@endsection
