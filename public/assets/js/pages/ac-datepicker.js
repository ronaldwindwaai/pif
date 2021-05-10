'use strict';
$(document).ready(function() {
    $(function() {
	  $('input[name="daterange"]').daterangepicker({
		opens: 'left'
	  }, function(start, end, label) {

	  });
	});
	$(function() {
	  $('.datetimes').daterangepicker({
		timePicker: true,
		startDate: moment().startOf('hour'),
		endDate: moment().startOf('hour').add(32, 'hour'),
		locale: {
		  format: 'DD/MM/Y hh:mm A'
		}
	  });
	});
	$(function() {
	  $('input[name="birthday"]').daterangepicker({
		singleDatePicker: true,
		showDropdowns: true,
		minYear: 1901,
		maxYear: parseInt(moment().format('YYYY'),10)
	  }, function(start, end, label) {
		var years = moment().diff(start, 'years');
		alert("You are " + years + " years old!");
	  });
	});
	$(function() {

		var start = moment().subtract(29, 'days');
		var end = moment();

		function cb(start, end) {
			$('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
		}

		$('#reportrange').daterangepicker({
			startDate: start,
			endDate: end,
			ranges: {
			   'Today': [moment(), moment()],
			   'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
			   'Last 7 Days': [moment().subtract(6, 'days'), moment()],
			   'Last 30 Days': [moment().subtract(29, 'days'), moment()],
			   'This Month': [moment().startOf('month'), moment().endOf('month')],
			   'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
			}
		}, cb);

		cb(start, end);

	});
	$(function() {
	  $('.daterange').daterangepicker({
		  autoUpdateInput: false,
		  locale: {
			  cancelLabel: 'Clear'
		  }
	  });

	  $('.daterange').on('apply.daterangepicker', function(ev, picker) {
		  $(this).val(picker.startDate.format('DD/MM/YYYY') + ' - ' + picker.endDate.format('DD/MM/YYYY'));
	  });

	  $('.daterange').on('cancel.daterangepicker', function(ev, picker) {
		  $(this).val('');
	  });

	});
});
