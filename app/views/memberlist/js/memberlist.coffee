
$(document).ready ()->

	UnreadMsgNoPoll()
	$(' .chatlink').click (e)->
		e.preventDefault()
		ViewAll()
		UnreadMsgNoPoll()
		window.open $(this).attr('href'),'chat','scrollbars=1,height=550,width=500'

UnreadMsg = ()->
	$.ajax
		url:'memberlist/unread'
		type:'POST'
		dataType:'JSON'
		success: (d)->
			for a of d
				$("#"+a).html(d[a]);

UnreadMsgNoPoll = ()->
	$.ajax
		url:'memberlist/unreadNopoll'
		type:'POST'
		dataType:'JSON'
		success: (d)->
			for a of d
				$("#"+a).html(d[a]);
			UnreadMsg()

ViewAll = ()->
	$.ajax
		url:'memberlist/SetViewAll'
		type:'POST'