
$(document).ready ()->

	$(" #main").click (e)->
		e.preventDefault()

	$("#backuplink").click (e)->
		e.preventDefault()
		window.open $(this).attr('href'),'backup','scrollbars=1,height=550,width=500'

	$(' #click_backup').click ()->
		$.ajax
			url:''