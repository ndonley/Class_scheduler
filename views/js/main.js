/*
Author: Nicholas Donley
Revision date: May 6, 2015
File name: main.js
Description: additional javascript as needed
*/

$(document).ready(function(){
	if(screen.width < 500px){
		$('#calendar').fullCalendar({
			defaultView: 'agendaDay'
		});
	}

});