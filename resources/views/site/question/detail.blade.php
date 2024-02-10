@section('title', $question->title)
@extends('layouts.site')
@section('content')
    <div class="breadcrumb-area mt-3 mb-4">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-content">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('site.question.index.get') }}">Mövcud suallar</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{ $question->title }}</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="blog-details-area section__hover-line pt-75 pb-80">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-8 col-lg-7">
                    <div class="col-lg-12 col-sm-12">
                        <div class="featured__post white-bg p-4 shadow-sm mb-3">
                            <div class="featured__thumb" data-background="{{ asset('assets/site/img/user.png') }}"></div>
                            <div class="featured__content">
                                <ul class="tgbanner__content-meta list-wrap">
                                    <li class="category">{{ $question->created_at->format('d.m.Y') }}</li>
                                    <li class="category"><i class="fa fa-eye"></i> {{ $question->views }}</li>
                                </ul>
                                <h4 class="title tgcommon__hover">{{ $question->title }}</h4>
                                <p class="tgcommon__hover">{!! $question->text !!}</p>
                            </div>
                        </div>
                        <div class="featured__post white-bg p-4 shadow-sm mb-3">
                            <div class="featured__thumb" data-background="{{ asset('assets/site/img/user.png') }}"></div>
                            <div class="featured__content">
                                <ul class="tgbanner__content-meta list-wrap">
                                    <li class="category">{{ $question->updated_at->format('d.m.Y') }}</li>
                                </ul>
                                <h4 class="title tgcommon__hover">Samiq Mustafayev</h4>
                                <p class="tgcommon__hover">{!! $question->answer !!}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <x-sidebar/>
            </div>
        </div>
    </section>
@endsection
