@section('title', $blog->title)
@section('url', url()->current())
@section('image', url($blog->image))
@extends('layouts.site')
@section('title', $blog->title)
@section('content')
    <div class="breadcrumb-area mt-3 mb-4">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-content">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                @if($blog->category->parent)
                                    <li class="breadcrumb-item"><a
                                            href="{{ route('site.blog-category.slug.get', $blog->category->parent->slug) }}">{{ $blog->category->parent->name }}</a>
                                    </li>
                                    <li class="breadcrumb-item"><a
                                            href="{{ route('site.blog-category.slug.get', [$blog->category->parent->slug, $blog->category->slug]) }}">{{ $blog->category->name }}</a>
                                    </li>
                                @else
                                    <li class="category"><a
                                            href="{{ route('site.blog-category.slug.get', $blog->category->slug) }}">{{ $blog->category->name }}</a>
                                    </li>
                                @endif
                                <li class="breadcrumb-item active" aria-current="page">{{ $blog->title }}</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="blog-details-area pb-100">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-1">
                    <div class="blog-details-social">
                        <ul class="list-wrap">
                            <li><a target="_blank" href="{{ $shareLinks['facebook'] }}"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a target="_blank" href="{{ $shareLinks['twitter'] }}"><i class="fab fa-twitter"></i></a></li>
                            <li><a target="_blank" href="{{ $shareLinks['linkedin'] }}"><i class="fab fa-linkedin-in"></i></a></li>
                            <li><a target="_blank" href="{{ $shareLinks['telegram'] }}"><i class="fab fa-telegram"></i></a></li>
                            <li><a target="_blank" href="{{ $shareLinks['whatsapp'] }}"><i class="fab fa-whatsapp"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-8 col-lg-7">
                    <div class="blog-details-wrap">
                        <ul class="tgbanner__content-meta list-wrap">
                            @if($blog->category->parent)
                                <li class="category"><a
                                        href="{{ route('site.blog-category.slug.get', $blog->category->parent->slug) }}">{{ $blog->category->parent->name }}</a>
                                </li>
                                <li class="category"><a
                                        href="{{ route('site.blog-category.slug.get', [$blog->category->parent->slug, $blog->category->slug]) }}">{{ $blog->category->name }}</a>
                                </li>
                            @else
                                <li class="category"><a
                                        href="{{ route('site.blog-category.slug.get', $blog->category->slug) }}">{{ $blog->category->name }}</a>
                                </li>
                            @endif
                            <li>{{ $blog->created_at->format('d.m.Y') }}</li>
                        </ul>
                        <h2 class="title">{{ $blog->title }}</h2>
                        <div class="blog-details-thumb">
                            <img src="{{ url($blog->image) }}" alt="{{ $blog->title }}">
                        </div>
                        <div class="blog-details-content bg-transparent">
                            {!! $blog->text !!}
                        </div>
                        <div class="col-xl-12 col-lg-12 mt-4">
                            <div class="section__title-wrap mb-40">
                                <div class="row align-items-end">
                                    <div class="col-sm-6">
                                        <div class="section__title">
                                            <h3 class="section__main-title">Digər məqalələr</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="trending__slider">
                                <div class="swiper-container other_blog-active">
                                    <div class="swiper-wrapper">
                                        <div class="swiper-slide">
                                            @foreach($otherBlogs as $otherBlog)
                                                <div class="trending__post">
                                                    <div class="trending__post-thumb tgImage__hover">
                                                        <a href="{{ route("site.blog.slug.get", $otherBlog->slug) }}">
                                                            <img src="{{ url($otherBlog->image ) }}" alt="{{ $otherBlog->blog }}"></a>
                                                    </div>
                                                    <div class="trending__post-content">
                                                        <ul class="tgbanner__content-meta list-wrap">
                                                            @if($otherBlog->category->parent)
                                                                <li class="category"><a href="{{ route('site.blog-category.slug.get', $otherBlog->category->parent->slug) }}">{{ $otherBlog->category->parent->name }}</a></li>
                                                                <li class="category"><a href="{{ route('site.blog-category.slug.get', [$otherBlog->category->parent->slug, $otherBlog->category->slug]) }}">{{ $otherBlog->category->name }}</a></li>
                                                            @else
                                                                <li class="category"><a href="{{ route('site.blog-category.slug.get', $otherBlog->category->slug) }}">{{ $otherBlog->category->name }}</a></li>
                                                            @endif
                                                        </ul>
                                                        <h4 class="title tgcommon__hover"><a href="{{ route("site.blog.slug.get", $otherBlog->slug) }}">{{ $otherBlog->title }}</a></h4>
                                                        <ul class="post__activity list-wrap">
                                                            <li><i class="fal fa-eye"></i> {{ $otherBlog->views }}</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <x-sidebar/>
            </div>
        </div>
    </section>
@endsection
