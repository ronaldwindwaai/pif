@extends('layouts.app')
@section('title')
{{ $title }}
@endsection
@section('css')
<link rel="stylesheet" href="{{ asset('assets/css/plugins/select2.min.css')}}">
@endsection
@section('js')
<!-- jquery-validation Js -->
<script src="{{ asset('assets/js/plugins/jquery.validate.min.js')}}"></script>
<!-- form-picker-custom Js -->
<script src="{{ asset('assets/js/pages/form-validation.js')}}"></script>
<!-- select2 Js -->
<script src="{{ asset('assets/js/plugins/select2.full.min.js')}}"></script>
<!-- form-select-custom Js -->
<script src="{{ asset('assets/js/pages/form-select-custom.js')}}"></script>

@include('shared.message.error-reporting')
@endsection
@section('content')
<!-- [ Main Content ] start -->
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h5>{{ $title }}</h5>
            </div>
            <div class="card-body">
                <form id="form" action="{{ route($page.'.store') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-10">
                            <div class="form-group">
                                <label class="form-label" for="title">{{ __('admin/programme/form.title') }}</label>
                                <input id="title" type="text" class="form-control @error('title') is-invalid @enderror"  @error('title') aria-invalid="true" @enderror
                                    name="title" required placeholder="{{ __('admin/programme/form.place_holder.title') }}" value="{{ old('title') }}">
                            </div>
                        </div>
                        @if (!empty($managers))
                        <div class="col-md-10">
                            <div class="form-group">
                            <h5>{{ __('admin/programme/form.manager') }}</h5>
                            <p>{{ __('admin/programme/form.place_holder.manager') }}</p>
                                <select class="js-example-basic-multiple col-md-6" name="manager_id">
                                    @foreach ($managers as $manager)
                                        <option value="{{ $manager->id }}">{{ $manager->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        @endif
                        <div class="col-md-10">
                            <div class="form-group">
                                <label class="form-label" for="description">{{ __('admin/programme/form.description') }}</label>
                                <textarea class="form-control @error('title') is-invalid @enderror"  @error('description') required aria-invalid="true" @enderror name="description" id="description"
                                    placeholder="{{ __('admin/programme/form.place_holder.description') }}">{{ old('description') }}</textarea>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn  btn-primary">{{ __('admin/form.submit') }}</button>
                </form>
            </div>
        </div>
    </div>
    <!-- [ Form Validation ] end -->
</div>
<!-- [ Main Content ] end -->
@endsection
