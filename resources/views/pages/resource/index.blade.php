@extends('layouts.app')
@section('title')
    {{ $title }}
@endsection
@section('css')
<!-- data tables css -->
<link rel="stylesheet" href="{{ asset('assets/css/plugins/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/plugins/fixedHeader.bootstrap4.min.css') }}">
@endsection
@section('js')
<!-- datatable Js -->
<script src="{{ asset('assets/js/plugins/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('assets/js/plugins/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{ asset('assets/js/plugins/dataTables.colReorder.min.js')}}"></script>
<script src="{{ asset('assets/js/plugins/dataTables.fixedHeader.min.js')}}"></script>
<script src="{{ asset('assets/js/pages/data-header-custom.js')}}"></script>
<!-- Notofication Js -->
<script src="{{ asset('assets/js/plugins/bootstrap-notify.min.js')}}"></script>
<script src="{{ asset('assets/js/pages/ac-notification.js')}}"></script>
<script>
    $(window).on('load', function () {
        function notify(message, type) {
            $.notify({
                message: message
            }, {
                type: type,
                allow_dismiss: true,
                label: 'Cancel',
                className: 'btn-xs btn-inverse',
                placement: {
                    from: 'top',
                    align: 'right'
                },
                delay: 2500,
                animate: {
                    enter: 'animated fadeInRight',
                    exit: 'animated fadeOutRight'
                },
                offset: {
                    x: 30,
                    y: 30
                }
            });
        };

@if (session('status'))
    notify('{{ session('status')}}','success');
@elseif($errors->any())
    @foreach($errors->all() as $error)
        notify('{{ $error}}','danger');
    @endforeach
@endif
});
</script>
@endsection
@section('content')
@include('partial.table_list',[
    'title' =>  $title,
    'data'  =>  $data,
    'columns'  =>  $columns,
    'form' => 'Resources',
    'page' => 'resources',
])
@endsection
