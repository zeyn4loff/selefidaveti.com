@extends('layouts.site')
@section('title', 'Mövcud suallar')
@section('content')
<section class="techno-latest-news">
  <div class="container">
    <h3 class="side-border">Sual ver</h3>
    <aside class="header-aside aos-init aos-animate" data-aos="fade-up">
        @if ($message = Session::get('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  {!! Session::get('success') !!}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
@if ($errors->any())
<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>😢 Əlavə olunmadı!</strong>
  @foreach ($errors->all() as $error)
  {!! $error !!}.
  @endforeach
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
        <form action="{{ route('site.question.ask-question.post') }}" method="POST">
            @csrf
      <div class="card-list card-counting">
        <div class="checkout-from">
          <div class="input-group">
            <label>Başlıq</label>
            <input class="bg-white" type="text" name="title">
          </div>
          <div class="ch-form-group d-block mb-5">
            <div class="select-group">
              <label>Kateqoriya</label>
              <select name="category_id " class="bg-white">
                @foreach($categories as $categorie)
                <option value="{{ $categorie->id }}">{{ $categorie->name }}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="input-group">
            <label>Ad</label>
            <input class="bg-white" name="name" type="text">
          </div>
          <div class="input-group">
            <label>Email</label>
            <input class="bg-white" name="email" type="email">
          </div>
          <div class="input-group">
              <label>Sual</label>
              <textarea class="bg-white" name="text" autocomplete="nope" rows="5"></textarea>
          </div>
          <div class="mt-5">
             <button type="submit" class="btn btn-success">Göndər</button>
          </div>
        </div>
      </div>
      </form>
    </aside>
  </div>
</section>
@endsection