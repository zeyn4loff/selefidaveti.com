@extends('layouts.admin')
@section('content')
    <form action="{{ route('admin.blog-category.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Bloq kateqoriyası əlavə et</h4>
                    <div class="page-title-right">
                        <button type="submit" class="btn btn-primary waves-effect waves-light">
                            <i class="bx bx-add-to-queue font-size-16 align-middle me-2"></i> Əlavə et
                        </button>
                    </div>
                </div>
            </div>
        </div>
        @if ($message = Session::get('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {!! Session::get('error') !!}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="row">
            <div class="col-xl-6">
                <div class="card">
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label">Kateqoriya</label>
                            <select name="parent_id" class="form-select">
                                <option value="{{ null }}">Ana kateqoriya</option>
                                @foreach($categories as $parentCategory)
                                    @if($parentCategory->children->isNotEmpty())
                                        <option value="{{ $parentCategory->id }}">{{ $parentCategory->name }}</option>
                                        @foreach($parentCategory->children as $childCategory)
                                            <optgroup label=" &#160; &#160; &#160;{{ $childCategory->name }}"></optgroup>
                                        @endforeach
                                    @else
                                        <option value="{{ $parentCategory->id }}">{{ $parentCategory->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                            @error('parent_id')
                            <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Ad</label>
                            <input type="text" name="name"
                                   class="form-control"
                                   value="{{ old('name') }}">
                            @error('name')
                            <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Status</label>
                            <select name="status" class="form-select">
                                <option value="{{ config('constants.ACTIVE') }}">Aktiv</option>
                                <option value="{{ config('constants.INACTIVE') }}">Deaktiv</option>
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
