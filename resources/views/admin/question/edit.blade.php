@extends('layouts.admin')
@section('content')
    <form action="{{ route('admin.question.update', $result) }}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Suala düzəliş et</h4>
                    <div class="page-title-right d-flex align-items-center">
                        <div class="form-check me-3">
                            <input class="form-check-input" type="checkbox" name="notification" id="emailNotification">
                            <label class="form-check-label" for="emailNotification">
                                Email bildirişi göndər
                            </label>
                        </div>
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
                            <label class="form-label">Başlıq</label>
                            <input type="text"
                                   class="form-control"
                                   value="{{ $result->title }}" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Ad</label>
                            <input type="text"
                                   class="form-control"
                                   value="{{ $result->name }}" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="text"
                                   class="form-control"
                                   value="{{ $result->email }}" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Sual</label>
                            <textarea type="text" class="form-control" rows="6"
                                      readonly>{!! $result->text !!}</textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="card">
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label">Cavab</label>
                            <textarea type="text" name="answer" class="form-control editor"
                                      rows="6">{!! $result->answer !!}</textarea>
                            @error('answer')
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
