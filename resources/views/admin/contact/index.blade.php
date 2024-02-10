@extends('layouts.admin')
@section('content')
    <form action="{{ route('admin.contact.update', $result) }}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="row">
            <div class="col-12">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {!! Session::get('success') !!}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Əlaqə</h4>
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
                            <label class="form-label">Email</label>
                            <div class="input-group">
                                <div class="input-group-text"><i class="bx bx-at font-size-16"></i></div>
                                <input type="text" name="email"
                                       class="form-control"
                                       value="{{ $result->email }}">
                            </div>
                            @error('email')
                            <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label class="form-label">Facebook</label>
                                    <div class="input-group">
                                        <div class="input-group-text"><i class="bx bxl-facebook-circle font-size-16"></i></div>
                                        <input type="text" name="facebook"
                                               class="form-control"
                                               value="{{ $result->facebook }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label class="form-label">Instagram</label>
                                    <div class="input-group">
                                        <div class="input-group-text"><i class="bx bxl-instagram-alt font-size-16"></i></div>
                                        <input type="text" name="instagram"
                                               class="form-control"
                                               value="{{ $result->instagram }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label class="form-label">Youtube</label>
                                    <div class="input-group">
                                        <div class="input-group-text"><i class="bx bxl-youtube font-size-16"></i></div>
                                        <input type="text" name="youtube"
                                               class="form-control"
                                               value="{{ $result->youtube }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label class="form-label">Telegram</label>
                                    <div class="input-group">
                                        <div class="input-group-text"><i class="bx bxl-telegram font-size-16"></i></div>
                                        <input type="text" name="telegram"
                                               class="form-control"
                                               value="{{ $result->telegram }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection


