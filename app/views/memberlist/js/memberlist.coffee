
$(document).ready ()->

	$(' .chatlink').click (e)->
		e.preventDefault()
		window.open $(this).attr('href'),'chat','scrollbars=1,height=550,width=500'