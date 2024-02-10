@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Suallar</h4>
                <div class="page-title-right">
                    <button type="button" class="btn btn-info waves-effect waves-light" data-bs-toggle="modal"
                            data-bs-target="#filterModal">
                        <i class="bx bx-filter-alt font-size-16 align-middle me-2"></i>Filter
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12">
            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {!! Session::get('success') !!}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        @if($results->isNotEmpty())
                            <table class="table align-middle table-nowrap mb-0 table-striped" id="sortable">
                                <thead class="table-light">
                                <tr>
                                    <th>ID</th>
                                    <th>Başlıq</th>
                                    <th>Email</th>
                                    <th>Ad</th>
                                    <th>Status</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($results as $result)
                                    <tr>
                                        <td>{{ $result->id }}</td>
                                        <td>{{ $result->title }}</td>
                                        <td>{{ $result->email }}</td>
                                        <td>{{ $result->name }}</td>
                                        <td>
                                            <div class="form-check form-switch form-switch-md">
                                                <input data_id="{{ $result->id }}"
                                                       route="{{ route('admin.question.status.ajax') }}"
                                                       class="form-check-input status_change"
                                                       type="checkbox" {{ $result->status == config('constants.ACTIVE') ? "checked" : null }}>
                                            </div>
                                        </td>
                                        <td class="text-end">
                                            <button type="button" data_id="{{ $result->id }}"
                                                    route="{{ route('admin.question.destroy.ajax') }}"
                                                    class="remove text-right btn btn-danger waves-effect btn-label waves-light btn-sm">
                                                <i class="bx bx-trash label-icon"></i> Sil
                                            </button>
                                            <a href="{{ route('admin.question.edit', $result->id) }}"
                                               class="btn btn-primary waves-effect btn-label waves-light btn-sm">
                                                <i class="bx bx-edit-alt label-icon"></i> Düzəliş et
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="col-sm-12 col-md-7 mt-3">
                                {{ $results->appends($_GET)->links("pagination::bootstrap-4") }}
                            </div>
                        @else
                            <div class="p-2">
                                <div class="text-center">
                                    <div class="avatar-md mx-auto">
                                        <div class="avatar-title rounded-circle bg-light">
                                            <i class="bx bx-shocked h1 mb-0 text-primary"></i>
                                        </div>
                                    </div>
                                    <div class="p-2 mt-2">
                                        <h4>Məlumatlar tapımadı!</h4>
                                        <p class="text-muted">Hələ heç-bir məlumat əlavə edilməyib.</p>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="filterModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
         role="dialog" aria-labelledby="filterLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="filterLabel">Filter</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('admin.question.index') }}" method="get">
                    <div class="modal-body">
                        <div class="mb-2">
                            <label class="form-label">Başlıq</label>
                            <input type="text" name="title" class="form-control"
                                   value="{{ request()->get('title') }}">
                        </div>
                        <div class="mb-2">
                            <label class="form-label">Email</label>
                            <input type="text" name="email" class="form-control"
                                   value="{{ request()->get('email') }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Status</label>
                            <select name="status" class="form-select">
                                <option value="{{ null }}" {{ !request()->has('status') ? 'selected' : '' }}>
                                    Seçilməyib
                                </option>
                                <option
                                    value="{{ config('constants.ACTIVE') }}" {{ request()->get('status') == config('constants.ACTIVE') ? 'selected' : '' }}>
                                    Aktiv
                                </option>
                                <option
                                    value="{{ config('constants.INACTIVE') }}" {{ request()->has('status') && request()->get('status') == config('constants.INACTIVE') && !is_null(request()->get('status')) ? 'selected' : '' }}>
                                    Deaktiv
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a href="{{ route('admin.question.index') }}" class="btn btn-dark">
                            <i class="bx bx-rotate-right font-size-16 align-middle me-2"></i>Sıfırla
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="bx bx-filter-alt font-size-16 align-middle me-2"></i>Filterlə
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
