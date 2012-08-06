$(document).ready ->
	setSidebarHeight()


$(window).resize ->
	setSidebarHeight()
	
setSidebarHeight = ->
	$('.sidebar, .sidebar-wrapper, .sidebar-zigzag').css('height', $(window).height())	