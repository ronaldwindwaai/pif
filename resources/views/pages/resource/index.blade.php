@extends('layouts.app')
@section('title')
    {{ $title }}
@endsection
@section('css')
<!-- data tables css -->
<link rel="stylesheet" href="{{ asset('assets/css/plugins/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/plugins/select.bootstrap4.min.css') }}">
@endsection
@section('js')
<!-- datatable Js -->
<script src="{{ asset('assets/js/plugins/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('assets/js/plugins/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{ asset('assets/js/plugins/dataTables.select.min.js')}}"></script>
<script src="{{ asset('assets/js/pages/data-select-custom.js')}}"></script>

<!-- jquery-validation Js -->
<script src="{{ asset('assets/js/plugins/jquery.validate.min.js')}}"></script>
<!-- form-picker-custom Js -->
<script src="{{ asset('assets/js/pages/form-validation.js')}}"></script>
<!-- select2 Js -->
<script src="{{ asset('assets/js/plugins/select2.full.min.js')}}"></script>
<!-- form-select-custom Js -->
<script src="{{ asset('assets/js/pages/form-select-custom.js')}}"></script>
@endsection
@section('content')
@include('partial.table_list',[
    'title' =>  $title,
    'data'  =>  $data,
    'columns'  =>  $columns,
])
@endsection
