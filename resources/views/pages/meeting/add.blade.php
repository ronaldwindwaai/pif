@extends('layouts.app')
@section('title')
{{ $title }}
@endsection
@section('css')
<link rel="stylesheet" href="{{ asset('assets/css/plugins/select2.min.css')}}">
<link rel="stylesheet" href="{{ asset('assets/css/plugins/daterangepicker.css')}}">
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

<script src="{{ asset('assets/js/plugins/moment.min.js')}}"></script>
<script src="{{ asset('assets/js/plugins/daterangepicker.js')}}"></script>
<script src="{{ asset('assets/js/pages/ac-datepicker.js')}}"></script>
@include('shared.message.error-reporting')

<script>
    schedule_type = $('input[name="type_of_meeting"]:checked').val();
</script>
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
                                <label class="form-label" for="title">Title</label>
                                <input id="title" type="text" class="form-control @error('title') is-invalid @enderror"  @error('title') aria-invalid="true" @enderror
                                    name="title" required placeholder="Name of the Meeting" value="{{ old('title') }}">
                            </div>
                        </div>
                        <div class="col-md-10">
                            <div class="form-group">
                                <h5>Schedule of Meeting</h5>
                                <p>Kindly select the meeting scheduling.</p>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" value="Single Day" name="type_of_meeting" id="single-day" checked>
                                    <label class="form-check-label" for="single-day">
                                        Single Day Meeting
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" value="Specific Days" name="type_of_meeting" id="specific-days">
                                    <label class="form-check-label" for="specific-days">
                                       Specific Days
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" value="Weekly" name="type_of_meeting" id="weekly">
                                    <label class="form-check-label" for="weekly">
                                       Weekly
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" value="Monthly" name="type_of_meeting" id="monthly">
                                    <label class="form-check-label" for="monthly">
                                       Monthly
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-10">
                            <div class="form-group">
                                <label class="form-label" for="title">Date</label>
                                <input type="text" name="birthday" value="10/24/1984" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-10">
                            <div class="form-group">
                                <label class="form-label" for="start-time">Start Time</label>
                                <input id="start-time" type="time" name="start_time" value="" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-10">
                            <div class="form-group">
                                <label class="form-label" for="end-time">End Time</label>
                                <input id="end-time" type="time" name="end_time" value="" class="form-control">
                            </div>
                        </div>
                        @if (!empty($resources))
                        <div class="col-md-10">
                            <div class="form-group">
                            <h5>Resources</h5>
                            <p>Kindly select the resources this meeting will require.</p>
                                <select class="js-example-basic-multiple col-md-6 multiple" multiple="multiple" name="programme_id">
                                    @foreach ($resources as $resource)
                                        <option value="{{ $resource->id }}">{{ $resource->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        @endif
                        <div class="col-md-10">
                            <div class="form-group">
                                <label class="form-label" for="venue">Venue of Meeting</label>
                                <input id="venue" type="text" class="form-control @error('venue') is-invalid @enderror"  @error('venue') aria-invalid="true" @enderror
                                    name="venue" required placeholder="Zoom" value="{{ old('venue') }}">
                            </div>
                        </div>
                        <div class="col-md-10">
                            <div class="form-group">
                                <h5>Meeting Settings</h5>
                                <div class="form-check">
                                    <input type="checkbox" name="is_breakout_room_required" value="1" class="form-check-input" id="is-breakout-room-required">
                                    <label class="form-check-label" for="is-breakout-room-required">Will you require a breakout room</label>
                                </div>
                                <div class="form-check">
                                    <input type="checkbox" name="is_recording_required" value="1" class="form-check-input" id="is-recording-required">
                                    <label class="form-check-label" for="is-recording-required">Will you require meeting to be recorded</label>
                                </div>
                                <div class="form-check">
                                    <input type="checkbox" name="is_attendance_report_required" value="1" class="form-check-input" id="is-attendance_report-required">
                                    <label class="form-check-label" for="is-attendance_report-required">Will you require require attendance/registration report to be recorded</label>
                                </div>
                            </div>
                        </div>
                        @if (!empty($programmes))
                        <div class="col-md-10">
                            <div class="form-group">
                            <h5>Programme</h5>
                            <p>Kindly select the programme this meeting belongs too.</p>
                                <select class="js-example-basic-multiple col-md-6" name="programme_id">
                                    @foreach ($programmes as $programme)
                                        <option value="{{ $programme->id }}">{{ $programme->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        @endif
                        @if (!empty($projects))
                        <div class="col-md-10">
                            <div class="form-group">
                            <h5>Project</h5>
                            <p>Kindly select under which project this meeting belings too.</p>
                                <select class="js-example-basic-multiple col-md-6" name="project_id">
                                    @foreach ($projects as $project)
                                        <option value="{{ $project->id }}">{{ $project->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        @endif
                        @if (!empty($partners))
                        <div class="col-md-10">
                            <div class="form-group">
                            <h5>Partnership</h5>
                            <p>Which Partner are we hosting this meeting with</p>
                                <select class="js-example-basic-multiple col-md-6" name="partner_id">
                                    @foreach ($partners as $partner)
                                        <option value="{{ $partner->id }}">{{ $partner->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        @endif
                        <div class="col-md-10">
                            <div class="form-group">
                                <label class="form-label" for="end-time">Meeting Description</label>
                                <textarea name="description" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="col-md-10">
                            <div class="form-group">
                                <label class="form-label" for="end-time">Upload Budget File</label>
                                 <input type="file" name="file_id" class="form-control-file" id="file-id">
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
