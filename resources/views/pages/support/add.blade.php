@extends('layouts.app')
@section('title')
    {{ $title }}
@endsection
@section('css')
@endsection
@section('js')
<!-- jquery-validation Js -->
<script src="{{ asset('assets/js/plugins/jquery.validate.min.js')}}"></script>
<!-- form-picker-custom Js -->
<script src="{{ asset('assets/js/pages/form-validation.js')}}"></script>
@endsection
@section('content')
 <!-- [ Main Content ] start -->
 <div class="row">
     <!-- [ Form Validation ] start -->
     <div class="col-sm-12">
         <div class="card">
             <div class="card-header">
                 <h5>{{ $title }}</h5>
             </div>
             <div class="card-body">
                 <form id="validation-form123" action="{{ route('support.store') }}">
                     <div class="row">
                         <div class="col-md-10">
                             <div class="form-group">
                                 <label class="form-label" for="title">Title</label>
                                 <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" required placeholder="Your support query title">
                             </div>
                         </div>
                         <div class="col-md-10">
                             <div class="form-group">
                                 <label class="form-label" for="description">Title</label>
                                 <textarea id="description" name="description" class="form-control"></textarea>
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
