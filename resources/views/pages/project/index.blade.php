@extends('layouts.app')
@section('title')
    {{ $title }}
@endsection
@section('css')
<!-- data tables css -->
<link rel="stylesheet" href="{{ asset('assets/css/plugins/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/plugins/select.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/plugins/select2.min.css')}}">
@endsection
@section('js')
<!-- datatable Js -->
<script src="{{ asset('assets/js/plugins/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('assets/js/plugins/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{ asset('assets/js/plugins/dataTables.select.min.js')}}"></script>
<script src="{{ asset('assets/js/pages/data-select-custom.js')}}"></script>
<script src="{{ asset('assets/js/plugins/bootstrap-notify.min.js')}}"></script>
<script src="{{ asset('assets/js/pages/ac-notification.js')}}"></script>

<!-- jquery-validation Js -->
<script src="{{ asset('assets/js/plugins/jquery.validate.min.js')}}"></script>
<!-- form-picker-custom Js -->
<script src="{{ asset('assets/js/pages/form-validation.js')}}"></script>
<!-- select2 Js -->
<script src="{{ asset('assets/js/plugins/select2.full.min.js')}}"></script>
<!-- form-select-custom Js -->
<script src="{{ asset('assets/js/pages/form-select-custom.js')}}"></script>

<script type="text/javascript">

$(document).ready(function(){
   $( "#modal-delete-button" ).click(function() {
        var input = $('.checkboxes');
        var ids = [];
        for (var i = 0; i < input.length; i++) {
            if (input[i].type === 'checkbox' && input[i].checked === true) {
                ids.push(input[i].value);
            }
        }

        console.log(ids);
    });


})
  function selectAll() {
        var input = document.getElementsByTagName('input');
        for (var i = 0; i < input.length; i++) {
            if (input[i].type === 'checkbox' && input[i].checked === false) {
                input[i].checked = true;
            }else{
                input[i].checked = false;
            }
        }
    }
</script>

@if (!empty($success))
<script>
    $(window).on('load', function() {
        function notify(message) {
            $.notify({
                message: message
            }, {
                type: 'success',
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
    notify('Test line');
    });
</script>

@endif

@endsection
@section('content')
@include('partial.table_list',[
    'title' =>  $title,
    'data'  =>  $data,
    'columns'  =>  $columns,
    'form' => 'project',
    'page' => 'projects',
])
@endsection
