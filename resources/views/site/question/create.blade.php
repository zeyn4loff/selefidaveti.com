@section('title', 'Sual ver')
@extends('layouts.site')
@section('content')
    <div class="breadcrumb-area mt-3 mb-4">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-content">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item active" aria-current="page">Sual ver</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="blog-details-area section__hover-line white-bg pt-75 pb-80">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-8 col-lg-7">
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {!! Session::get('success') !!}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <form action="{{ route('site.question.store.post') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-6">
                                <div class="mb-3">
                                    <label class="form-label">Qısa başlıq</label>
                                    <input type="text" name="title" class="form-control shadow-none @error('title') border-danger @enderror" value="{{ old('title') }}">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label class="form-label">Ad</label>
                                    <input type="text" name="name" class="form-control shadow-none @error('name') border-danger @enderror" value="{{ old('name') }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" name="email" class="form-control shadow-none @error('email') border-danger @enderror" value="{{ old('email') }}">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-3">
                                <label class="form-label">Sual</label>
                                <textarea type="text" name="text" class="form-control shadow-none @error('text') border-danger @enderror" rows="5">{!! old('text') !!}</textarea>
                            </div>
                            <button class="btn" type="submit"><span class="text">Göndər</span> <i class="fas fa-paper-plane"></i></button>
                        </div>
                    </form>
                </div>
                <x-sidebar/>
            </div>
        </div>
    </section>
@endsection
