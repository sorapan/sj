(($) ->

	$.rb_Reply = (a, q) ->

		data = $.extend(
			status: ""
			header: ""
			user: ""
			date: ""
			last_update: ""
			url: ""
		, a)

		topic = '<a href="'+data.url+'"><div class="reply">'+
		'<span class="rep_status">'+data.status+'</span>'+
		'<span class="head">'+data.header+'</span><br>'+
		'<span class="descrip">สร้างโดย : </span>'+data.user+'<br>'+
		'<span class="descrip">อัพเดท : </span>'+data.last_update+'<br>'+
		'<span class="descrip">วันที่สร้าง : </span>'+data.date+'<br><br>'+
		'</div></a>';

		aptemplate = ->

			$("#content").append topic

		pretemplate = ->

			$("#content").prepend topic

		if q is "ap" then return aptemplate()
		else if q is "pre" then return pretemplate()
		false

	PreventHtmlTag = (prob) ->
		prob.replace(/&/g, "&amp;").replace(/</g, "&lt;").replace(/>/g, "&gt;").replace /"/g, "&quot;"


) jQuery