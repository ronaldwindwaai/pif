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
                <form id="validation-form123" action="{{ route($page.'.store') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-10">
                            <div class="form-group">
                                <label class="form-label" for="title">Title</label>
                                <input id="title" type="text" class="form-control @error('title') is-invalid @enderror"  @error('title') aria-invalid="true" @enderror
                                    name="title" required placeholder="Name of the Resource" value="{{ old('title') }}">
                            </div>
                        </div>
                        @if (!empty($officers))
                        <div class="col-md-10">
                            <div class="form-group">
                            <h5>Officer</h5>
                            <p>Kindly assign the Officer responsible for this Project.</p>
                                <select class="js-example-basic-multiple col-md-6" name="officer_id">
                                    @foreach ($officers as $officer)
                                        <option value="{{ $officer->id }}">{{ $officer->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        @endif
                        @if (!empty($programmes))
                        <div class="col-md-10">
                            <div class="form-group">
                            <h5>Programme</h5>
                            <p>Kindly select the programme this project belongs too.</p>
                                <select class="js-example-basic-multiple col-md-6" name="programme_id">
                                    @foreach ($programmes as $programme)
                                        <option value="{{ $programme->id }}">{{ $programme->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        @endif
                        <div class="col-md-10">
                            <div class="form-group">
                                <label class="form-label" for="objective">Objective</label>
                                <textarea class="form-control @error('objective') is-invalid @enderror"  @error('title')
                                aria-invalid="true" @enderror name="objective" id="objective"
                                placeholder="Project Objective">{{ old('objective') }}</textarea>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn  btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
    <!-- [ Form Validation ] end -->
</div>
<!-- [ Main Content ] end -->
@endsection
