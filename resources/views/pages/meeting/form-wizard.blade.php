@extends('layouts.app')
@section('title')
    {{ $title }}
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/daterangepicker.css') }}">
@endsection
@section('js')
    <!-- jquery-validation Js -->
    <script src="{{ asset('assets/js/plugins/jquery.validate.min.js') }}"></script>
    <!-- form-picker-custom Js -->
    <script src="{{ asset('assets/js/pages/form-validation.js') }}"></script>
    <!-- select2 Js -->
    <script src="{{ asset('assets/js/plugins/select2.full.min.js') }}"></script>
    <!-- form-select-custom Js -->
    <script src="{{ asset('assets/js/pages/form-select-custom.js') }}"></script>

    <script src="{{ asset('assets/js/plugins/moment.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/daterangepicker.js') }}"></script>
    <script src="{{ asset('assets/js/pages/ac-datepicker.js') }}"></script>

    <script src="{{ asset('assets/js/plugins/jquery.bootstrap.wizard.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#besicwizard').bootstrapWizard({
                withVisible: false,
                'nextSelector': '.button-next',
                'previousSelector': '.button-previous',
                'firstSelector': '.button-first',
                'lastSelector': '.button-last'
            });
            $('#btnwizard').bootstrapWizard({
                withVisible: false,
                'nextSelector': '.button-next',
                'previousSelector': '.button-previous',
                'firstSelector': '.button-first',
                'lastSelector': '.button-last'
            });
            $('#progresswizard').bootstrapWizard({
                withVisible: false,
                'nextSelector': '.button-next',
                'previousSelector': '.button-previous',
                'firstSelector': '.button-first',
                'lastSelector': '.button-last',
                onTabShow: function(tab, navigation, index) {
                    var $total = navigation.find('li').length;
                    var $current = index + 1;
                    var $percent = ($current / $total) * 100;
                    $('#progresswizard .progress-bar').css({
                        width: $percent + '%'
                    });
                }
            });
            $('#validationwizard').bootstrapWizard({
                withVisible: false,
                'nextSelector': '.button-next',
                'previousSelector': '.button-previous',
                'firstSelector': '.button-first',
                'lastSelector': '.button-last',
                onNext: function(tab, navigation, index) {
                    if (index == 1) {
                        if (!$('#validation-t-name').val()) {
                            $('#validation-t-name').focus();
                            $('.form-1').addClass('was-validated');
                            return false;
                        }
                        if (!$('#validation-t-email').val()) {
                            $('#validation-t-email').focus();
                            $('.form-1').addClass('was-validated');
                            return false;
                        }
                        if (!$('#validation-t-pwd').val()) {
                            $('#validation-t-pwd').focus();
                            $('.form-1').addClass('was-validated');
                            return false;
                        }
                    }
                    if (index == 2) {
                        if (!$('#validation-t-address').val()) {
                            $('#validation-t-address').focus();
                            $('.form-2').addClass('was-validated');
                            return false;
                        }
                    }
                }
            });
            $('#tabswizard').bootstrapWizard({
                'nextSelector': '.button-next',
                'previousSelector': '.button-previous',
            });
            $('#verticalwizard').bootstrapWizard({
                'nextSelector': '.button-next',
                'previousSelector': '.button-previous',
            });
        });
    </script>

    @include('shared.message.error-reporting')

    <script>
        $('.schedule').click(function() {
            schedule_type = $('input[name="type_of_meeting"]:checked').val();
            switch (schedule_type) {
                case 'single-day': {
                    break;
                }
            }
        });
    </script>
@endsection
@section('content')
    <!-- [ Main Content ] start -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5>Add Meeting Information</h5>
                </div>
                <div class="card-body">
                    <div class="bt-wizard" id="progresswizard">
                        <ul class="nav nav-pills nav-fill mb-3">
                            <li class="nav-item"><a href="#progress-t-tab1" class="nav-link"
                                    data-toggle="tab">Programme/Activity General Information</a></li>
                            <li class="nav-item"><a href="#progress-t-tab2" class="nav-link" data-toggle="tab">Budget &
                                    Actual Provisions for Participants</a></li>
                            <li class="nav-item"><a href="#progress-t-tab3" class="nav-link" data-toggle="tab">Consultants &
                                    Support Personnel</a></li>
                        </ul>
                        <div id="bar" class="bt-wizard progress mb-3" style="height:6px">
                            <div class="progress-bar bg-success" role="progressbar" aria-valuenow="0" aria-valuemin="0"
                                aria-valuemax="100" style="width: 0%;"></div>
                        </div>
                        <div class="tab-content">
                            <div class="tab-pane active show" id="progress-t-tab1">
                                <form>
                                    <div class="form-group row">
                                        <label for="name-of-the-meeting" class="col-sm-3 col-form-label">Name of the
                                            Meeting</label>
                                        <div class="col-sm-9">
                                            <input id="name-of-the-meeting" type="text"
                                                class="form-control @error('name_of_the_meeting') is-invalid @enderror"
                                                @error('name_of_the_meeting') aria-invalid="true" @enderror
                                                name="name_of_the_meeting" required placeholder="Name of the Meeting"
                                                value="{{ old('name_of_the_meeting') }}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="type-of-meeting" class="col-sm-3 col-form-label">Type of Meeting</label>
                                        <div class="col-sm-9">
                                            <select class="js-example-basic-multiple col-md-6" id="type-of-meeting"
                                                name="type_of_meeting">
                                                @foreach ($type_of_meetings as $type_meeting)
                                                    <option value="{{ $type_meeting }}">{{ $type_meeting }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="meeting_dates" class="col-sm-3 col-form-label">Meeting Dates</label>
                                        <div class="col-sm-9">
                                            <input type="text" id="dates" name="dates" class="form-control datetimes" required>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="programme-officer" class="col-sm-3 col-form-label">Programme Officer</label>
                                        <div class="col-sm-9">
                                            <select class="js-example-basic-multiple col-md-6" id="type-of-meeting"
                                                name="type_of_meeting">
                                                @foreach ($type_of_meetings as $type_meeting)
                                                    <option value="{{ $type_meeting }}">{{ $type_meeting }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="progress-t-name" class="col-sm-3 col-form-label">Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="progress-t-name"
                                                placeholder="Password" />
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="progress-t-email" class="col-sm-3 col-form-label">Email</label>
                                        <div class="col-sm-9">
                                            <input type="email" class="form-control" id="progress-t-email"
                                                placeholder="Email">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="progress-t-pwd" class="col-sm-3 col-form-label">Password</label>
                                        <div class="col-sm-9">
                                            <input type="password" class="form-control" id="progress-t-pwd"
                                                placeholder="Password">
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane" id="progress-t-tab2">
                                <form>
                                    <div class="form-group row">
                                        <label for="progress-t-sate" class="col-sm-3 col-form-label">State</label>
                                        <div class="col-sm-9">
                                            <select class="form-control" id="progress-t-sate">
                                                <option>Select State</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="progress-t-address" class="col-sm-3 col-form-label">Address</label>
                                        <div class="col-sm-9">
                                            <textarea class="form-control" id="progress-t-address" rows="3"
                                                spellcheck="false"></textarea>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane" id="progress-t-tab3">
                                <form class="text-center">
                                    <i class="feather icon-check-circle display-3 text-success"></i>
                                    <h5 class="mt-3">Registration Done! . .</h5>
                                    <p>Lorem Ipsum is simply dummy text of the printing</p>
                                    <div class="custom-control custom-checkbox mb-3">
                                        <input type="checkbox" class="custom-control-input" id="customCheck2">
                                        <label class="custom-control-label" for="customCheck2">Subscribe Newslatter</label>
                                    </div>
                                </form>
                            </div>
                            <div class="row justify-content-between btn-page">
                                <div class="col-sm-6">
                                    <a href="#!" class="btn btn-primary button-previous">Previous</a>
                                </div>
                                <div class="col-sm-6 text-md-right">
                                    <a href="#!" class="btn btn-primary button-next">Next</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- [ Main Content ] end -->
@endsection
