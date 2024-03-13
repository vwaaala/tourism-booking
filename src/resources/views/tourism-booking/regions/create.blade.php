@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">{{ __('global.create') }}</h5>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('regions.store') }}">
                @csrf
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <label for="name_bd" class="form-label">{{ __('pages.roles.fields.title') }} <span
                                class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('name_bd') is-invalid @enderror" id="name_bd"
                               name="name_bd" required>
                        @error('name_bd')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <label for="name_en" class="form-label">{{ __('pages.roles.fields.title') }}
                            <span class="text-danger">*</span>
                        </label>
                        <input type="text" class="form-control @error('name_en') is-invalid @enderror" id="name_en"
                               name="name_en" required>
                        @error('name_en')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-12 mt-2">
                        <button type="submit"
                                class="btn btn-primary">{{ __('global.create') }}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
