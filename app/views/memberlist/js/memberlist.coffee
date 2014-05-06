
$(document).ready ()->

	UnreadMsg()

	$(' .chatlink').click (e)->
		e.preventDefault()
		ViewAll()
		UnreadMsg()
		window.open $(this).attr('href'),'chat','scrollbars=1,height=550,width=500'

UnreadMsg = ()->
	$.ajax
		url:'memberlist/unread'
		type:'POST'
		dataType:'JSON'
		success: (d)->
			for a of d
				$("#"+a).html(d[a]);
		complete: (d)->
			UnreadMsg()

ViewAll = ()->
	$.ajax
		url:'memberlist/SetViewAll'
		type:'POST'