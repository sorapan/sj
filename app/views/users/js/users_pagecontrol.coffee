
$(document).ready ()->

	$(" #main").click (e)->
		e.preventDefault()

	$("#click_backup").click ()->
		$.ajax
			url: 'Backupit'
			success:(d)->

	$(' #click_backup').click ()->
		$.ajax
			url:''

	$(' .edit').click (e)->
		e.preventDefault()
		window.open $(this).attr('href'), 'backup', 'scrollbars=1,height=450,width=500' ;

	$(' .del').click ()->
		if confirm 'คุณต้องการที่จะลบ?' then true
		else false

	$(" #backuplink").click (e) ->
		e.preventDefault()
		window.open $(this).attr('href'), 'backup', 'scrollbars=1,height=550,width=500'

	$(" #createlink").click (e)->
		e.preventDefault()
		$(' #content').html ''
		$(' #content').load $(this).attr 'href'

	$('#create_submit').click (e)->
		e.preventDefault()
		$.ajax
			url:'users/insert'
			type:'POST'
			data:
				username:$("#user").val()
				password:$('#pass').val()
				class:$('#role').val()
			success: (d)->
				if d == "fuck"
					alert "ชื่อผู้ใช้ซ้ำครับ"
				else
					location.reload();
