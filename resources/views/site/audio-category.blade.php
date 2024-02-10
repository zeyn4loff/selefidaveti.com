@extends('layouts.site')
@section('title', $category->name)
@section('content')
    <section class="latest-post-area pt-80 pb-80">
        <div class="container">
            <div class="row justify-content-center">
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
                        <x-audio-list :audios="$audios"/>
                    </div>
                </div>
                <x-sidebar/>
            </div>
        </div>
    </section>
@endsection
