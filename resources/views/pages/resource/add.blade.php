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
                 <form id="validation-form123" action="#!">
                     <div class="row">
                         <div class="col-md-10">
                             <div class="form-group">
                                 <label class="form-label" for="programme-title">Programme Title</label>
                                 <input id="programme-title" type="text" class="form-control" name="programme_title" required placeholder="Name of the Programme">
                             </div>
                         </div>
                         <div class="col-md-10">
                             <div class="form-group">
                                 <label class="form-label" for="project-title">Project Title</label>
                                 <input id="project-title" type="text" class="form-control" name="project_title"
                                     placeholder="Title of the Project" required>
                             </div>
                         </div>
                         <div class="col-md-10">
                             <div class="form-group">
                                 <label class="form-label" for="activity-name">Activity Name</label>
                                 <input id="activity-name" type="text" class="form-control" name="activity_name"
                                     placeholder="Name of the Activity" required>
                             </div>
                         </div>
                         <div class="col-md-6">
                             <div class="form-group">
                                 <label class="form-label">Required</label>
                                 <input type="text" class="form-control" name="validation-required"
                                     placeholder="Required">
                             </div>
                         </div>
                         <div class="col-md-6">
                             <div class="form-group">
                                 <label class="form-label">URL</label>
                                 <input type="text" class="form-control" name="validation-url" placeholder="Url">
                             </div>
                         </div>
                         <div class="col-md-6">
                             <div class="form-group">
                                 <label class="form-label">Phone</label>
                                 <input type="text" class="form-control" name="validation-phone"
                                     placeholder="Phone: (999) 999-9999">
                             </div>
                         </div>
                         <div class="col-md-6">
                             <div class="form-group">
                                 <label class="form-label">Select</label>
                                 <select class="form-control" name="validation-select">
                                     <option value>Select gear...</option>
                                     <optgroup label="Climbing">
                                         <option value="pitons">Pitons</option>
                                         <option value="cams">Cams</option>
                                         <option value="nuts">Nuts</option>
                                         <option value="bolts">Bolts</option>
                                         <option value="stoppers">Stoppers</option>
                                         <option value="sling">Sling</option>
                                     </optgroup>
                                     <optgroup label="Skiing">
                                         <option value="skis">Skis</option>
                                         <option value="skins">Skins</option>
                                         <option value="poles">Poles</option>
                                     </optgroup>
                                 </select>
                             </div>
                         </div>
                         <div class="col-md-6">
                             <div class="form-group">
                                 <label class="form-label">Text</label>
                                 <textarea class="form-control" name="validation-text"></textarea>
                             </div>
                         </div>
                         <div class="col-md-6">
                             <div class="form-group">
                                 <label class="form-label">File</label>
                                 <div>
                                     <input type="file" class="validation-file" name="validation-file">
                                 </div>
                             </div>
                         </div>
                         <div class="col-md-6">
                             <div class="form-group">
                                 <div class="switch d-inline m-r-10">
                                     <input type="checkbox" class="switcher-input" name="validation-switcher"
                                         id="switch-1">
                                     <label for="switch-1" class="cr"></label>
                                 </div>
                                 <label>Check me</label>
                             </div>
                         </div>
                         <div class="col-md-6">
                             <div class="form-group">
                                 <label class="form-label">Radios</label>
                                 <div class="form-check">
                                     <label class="form-check-label">
                                         <input class="form-check-input" type="radio" name="validation-radios"> Option
                                         one is this and that—be sure to include why it's great
                                     </label>
                                 </div>
                                 <div class="form-check">
                                     <label class="form-check-label">
                                         <input class="form-check-input" type="radio" name="validation-radios"> Option
                                         two can be something else and selecting it will deselect option one
                                     </label>
                                 </div>
                                 <div class="form-check disabled">
                                     <label class="form-check-label">
                                         <input class="form-check-input" type="radio" name="validation-radios"> Option
                                         three is disabled
                                     </label>
                                 </div>
                             </div>
                         </div>
                         <div class="col-md-6">
                             <div class="form-group">
                                 <label class="form-label">Custom radios</label>
                                 <div class="custom-controls-stacked">
                                     <label class="custom-control custom-radio">
                                         <input name="validation-radios-custom" type="radio"
                                             class="custom-control-input">
                                         <span class="custom-control-label">Option one is this and that—be sure to
                                             include why it's great</span>
                                     </label>
                                     <label class="custom-control custom-radio">
                                         <input name="validation-radios-custom" type="radio"
                                             class="custom-control-input">
                                         <span class="custom-control-label">Option two can be something else and
                                             selecting it will deselect option one</span>
                                     </label>
                                     <label class="custom-control custom-radio">
                                         <input name="validation-radios-custom" type="radio"
                                             class="custom-control-input">
                                         <span class="custom-control-label">Option three is disabled</span>
                                     </label>
                                 </div>
                             </div>
                         </div>
                         <div class="col-md-6">
                             <div class="form-group">
                                 <label class="form-label">Checkbox</label>
                                 <div class="form-check">
                                     <label class="form-check-label">
                                         <input class="form-check-input" type="checkbox" name="validation-checkbox">
                                         Check me out
                                     </label>
                                 </div>
                             </div>
                         </div>
                         <div class="col-md-6">
                             <div class="form-group">
                                 <label class="form-label">Custom checkbox</label>
                                 <br>
                                 <label class="custom-control custom-checkbox d-block">
                                     <input type="checkbox" class="custom-control-input"
                                         name="validation-checkbox-custom">
                                     <span class="custom-control-label">Check me</span>
                                 </label>
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
