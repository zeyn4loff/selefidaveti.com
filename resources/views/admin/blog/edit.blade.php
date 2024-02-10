@extends('layouts.admin')
@section('content')
    <form action="{{ route('admin.blog.update', $result) }}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Bloqa düzəliş et</h4>
                    <div class="page-title-right">
                        <button type="submit" class="btn btn-primary waves-effect waves-light">
                            <i class="bx bx-add-to-queue font-size-16 align-middle me-2"></i>Düzəliş et
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-6">
                <div class="card">
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label">Kateqoriya</label>
                            <select name="blog_category_id" class="form-select">
                                @foreach($categories as $parentCategory)
                                    @if($parentCategory->children->isNotEmpty())
                                        <optgroup label="{{ $parentCategory->name }}">
                                            @foreach($parentCategory->children as $childCategory)
                                                <option value="{{ $childCategory->id }}" {{ $childCategory->id  == $result->blog_category_id ? ' selected' : null }}>{{ $childCategory->name }}</option>
                                            @endforeach
                                        </optgroup>
                                    @else
                                        <option value="{{ $parentCategory->id }}" {{ $parentCategory->id  == $result->blog_category_id ? ' selected' : null }}>{{ $parentCategory->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                            @error('blog_category_id')
                            <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Başlıq</label>
                            <input type="text" name="title"
                                   class="form-control"
                                   value="{{ $result->title }}">
                            @error('title')
                            <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Təsnifat</label>
                            <textarea type="text" name="text" class="form-control editor">{!! $result->text !!}</textarea>
                            @error('text')
                            <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="card">
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label">Şəkil</label>
                            <input type="file" name="image" class="dropify"
                                   data-default-file="{{ url($result->image) }}">
                            @error('image')
                            <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Status</label>
                            <select name="status" class="form-select">
                                <option
                                    value="{{ config('constants.ACTIVE') }}" {{ config('constants.ACTIVE') == $result->status ? 'selected' : '' }}>
                                    Aktiv
                                </option>
                                <option
                                    value="{{ config('constants.INACTIVE') }}" {{ config('constants.INACTIVE') == $result->status ? 'selected' : '' }}>
                                    Deaktiv
                                </option>
                            </select>
                            @error('status')
                            <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
