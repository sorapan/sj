(($) ->

	$.rb_Reply = (a, q) ->

		data = $.extend(
			status: ""
			header: ""
			user: ""
			date: ""
			last_update: ""
			verify: ""
			url: ""
		, a)

		if data.status == "1" then color = 'green'
		else if data.status == "2" then color = 'blue'
		else if data.status == "3" then color = 'red'

		if data.verify == "Y" then vrfy = '<span style="color:green">ยืนยันแล้ว</span>'
		else if data.verify == "N" then vrfy = '<span style="color:red">ยังไม่ได้ยืนยัน</span>'

		topic = '<div class="reply">'+
		'<a href="" class="tp_edit">แก้ไข</a><a href="" class="tp_del">ลบ</a>'+
		'<span style="background-color:'+color+'" class="rep_status">'+data.status+'</span>'+
		'<span class="head">'+data.header+'</span><br><br>'+
		'<a href="'+data.url+'"><div>'+
		'<span class="descrip">สร้างโดย : </span>'+data.user+'<br>'+
		'<span class="descrip">อัพเดทล่าสุด : </span>'+data.last_update+''+
		'<span class="descrip2">การยืนยัน : '+vrfy+'</span><br>'+
		'<span class="descrip">วันที่สร้าง : </span>'+data.date+'<br><br>'+
		'</div></a></div>';

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