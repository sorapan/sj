(($) ->

	$.rb_Reply = (a, q) ->

		data = $.extend(
			date: ""
			header: ""
			message: ""
			url: ""
		, a)

		aptemplate = ->

			$("#content").append "<a href='"+data.url+"'><div class='reply'>
<div class='head'><div class='head_msg'>"+data.date+"</div></div>
<div class='message'><div class='message_hdr'>"+PreventHtmlTag(data.header)+"</div>
<div class='message_msg'>"+PreventHtmlTag(data.message)+"</div></div></a>"

		pretemplate = ->

			$("#content").prepend "<a href='"+data.url+"'><div class='reply'>
<div class='head'><div class='head_msg'>"+data.date+"</div></div>
<div class='message'><div class='message_hdr'>"+PreventHtmlTag(data.header)+"</div>
<div class='message_msg'>"+PreventHtmlTag(data.message)+"</div></div></a>"

		if q is "ap" then return aptemplate()
		else if q is "pre" then return pretemplate()
		false


	PreventHtmlTag = (prob) ->
		prob.replace(/&/g, "&amp;").replace(/</g, "&lt;").replace(/>/g, "&gt;").replace /"/g, "&quot;"


) jQuery