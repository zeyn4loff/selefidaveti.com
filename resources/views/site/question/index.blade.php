@section('title', 'Mövcud suallar')
@extends('layouts.site')
@section('content')
    <div class="breadcrumb-area mt-3 mb-4">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-content">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item active" aria-current="page">Mövcud suallar</li>
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
                    @foreach($questions as $question)
                        <div class="col-lg-12 col-sm-12">
                            <div class="featured__post white-bg p-4 shadow-sm mb-3 d-block">
                                <div class="featured__content">
                                    <ul class="tgbanner__content-meta list-wrap">
                                        <li class="category">{{ $question->created_at->format('d.m.Y') }}</li>
                                        <li class="category"><i class="fa fa-eye"></i> {{ $question->views }}</li>
                                    </ul>
                                    <div class="d-flex">
                                        <h4 class="title tgcommon__hover"><a
                                                href="{{ route("site.question.detail.get", $question->slug) }}">{{ $question->title }}</a></h4>
                                        <a class="ms-auto" href="{{ route("site.question.detail.get", $question->slug) }}"><span class="fw-bold">Ətraflı</span>
                                            <i class="fa fa-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <x-sidebar/>
            </div>
        </div>
    </section>
@endsection
