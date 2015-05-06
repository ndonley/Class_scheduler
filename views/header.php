<?php
/*
Author: Nicholas Donley
Revision date: May 6, 2015
File name: header.php
Description: header file for project
*/

?>
<!DOCTYPE html>
<html lang="en">
    
    <!-- the head section -->
    <head>
        <title>Class Scheduler</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=false" />
		<link rel="stylesheet" href="views/css/main.css">
		<link rel="stylesheet" type="text/css" href="views/css/fullcalendar.css">

		<script type="text/javascript" src="views/lib/jquery.min.js"></script>
		<script type="text/javascript" src="views/lib/moment.min.js"></script>

		<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
		<script src="http://cdn.jsdelivr.net/jquery.validation/1.13.1/jquery.validate.min.js"></script>
		<script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
		<link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css" />
		<link rel="stylesheet" href="themes/ab-tech.min.css" />
		<link rel="stylesheet" href="themes/jquery.mobile.icons.min.css" />
		<script src='https://www.google.com/recaptcha/api.js'></script>

		<script type="text/javascript" src="views/js/fullcalendar.js"></script>
		<script type="text/javascript" src="views/js/main.js"></script>

	

	<script>
$(document).ready(function() {

    // page is now ready, initialize the calendar
	var date = new Date();
	var d = date.getDate();
	var m = date.getMonth();
	var y = date.getFullYear();
    
	$('#calendar').fullCalendar({
        // put your options and callbacks here
		header: {
			left: 'prev,next today',
			center: 'title',
			right: 'agendaWeek, agendaDay'
		},
		theme: {
			default: true
		},
		defaultView: 'agendaWeek',
		editable: true,
        events: [
					{
						title: 'All Day Event',
						start: new Date(y, m, 1)
					},
					{
						title: 'Long Event',
						start: new Date(y, m, d-5),
						end: new Date(y, m, d-2)
					},
					{
						id: 999,
						title: 'Repeating Event',
						start: new Date(y, m, d-3, 16, 0),
						allDay: false
					},
					{
						id: 999,
						title: 'Repeating Event',
						start: new Date(y, m, d+4, 16, 0),
						allDay: false
					},
					{
						title: 'Meeting',
						start: new Date(y, m, d, 10, 30),
						allDay: false
					},
					{
						title: 'Lunch',
						start: new Date(y, m, d, 12, 0),
						end: new Date(y, m, d, 14, 0),
						allDay: false
					},
					{
						title: 'Birthday Party',
						start: new Date(y, m, d+1, 19, 0),
						end: new Date(y, m, d+1, 22, 30),
						allDay: false
					},
					{
						title: 'Click for Google',
						start: new Date(y, m, 28),
						end: new Date(y, m, 29),
						url: 'http://google.com/'
					}
				]
		});
    

});
	</script>
	</head>

    <!-- the body section -->
    <body>
	<div data-role="header">
		<h1>Class Scheduler</h1>
	</div>
    <div id="page">
        <div id="main">

