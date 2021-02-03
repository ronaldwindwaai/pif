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

<script src="{{ asset('assets/js/plugins/bootstrap-notify.min.js')}}"></script>
<script src="{{ asset('assets/js/pages/ac-notification.js')}}"></script>
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

                <div class="row">
                    <div class="col-md-10">
                        <div class="form-group">
                            <label class="form-label" for="title">Title</label>
                            <input id="title" type="text" class="form-control @error('title') is-invalid @enderror"
                                @error('title') aria-invalid="true" @enderror name="title" required
                                placeholder="Name of the Programme" value="{{ $data->title }}" readonly>
                        </div>
                    </div>

                    <div class="col-md-10">
                        <div class="form-group">
                            <label class="form-label" for="description">Description</label>
                            <textarea class="form-control @error('title') is-invalid @enderror" @error('description')
                                required aria-invalid="true" @enderror name="description" id="description"
                                placeholder="Programme Description" readonly>{{ $data->title }}</textarea>
                        </div>
                    </div>
                    <div class="col-md-10">
                        <div class="form-group">
                            <a href="{{ route($page.'.index') }}" class="btn btn-info btn"><i
                                    class="feather icon-edit"></i>&nbsp;Back </a>
                            <a href="{{ route($page.'.edit',$data->id) }}" class="btn btn-info btn"><i
                                    class="feather icon-edit"></i>&nbsp;Edit </a>
                            <form id="delete-form{{ $data->id }}" action="{{ route($page.'.destroy', $data->id) }}"
                                method="POST">
                                @csrf
                                @method('DELETE')
                                <a href="#"
                                    onclick="confirm('Are you sure, you want to delete this programme?')?document.getElementById('delete-form{{ $data->id }}').submit():''"
                                    class="btn btn-danger btn">
                                    <i class="feather icon-trash-2"></i>&nbsp;Delete</a>
                        </div>
                    </div>
                </div>
                </form>

            </div>
        </div>
    </div>
    <!-- [ Form Validation ] end -->
</div>
<!-- [ Main Content ] end -->
@endsection
