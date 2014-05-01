

url = document.URL
urlsplt = url.split "/"
result_url = urlsplt[urlsplt.length-1]


$(document).ready ()->

	$("#sendmes").click (e)->
		e.preventDefault()
		msg = $("#ip").val()
		$.ajax
			url:'../pushMessage'
			type:'POST'
			data:
				msg:msg
				rc:result_url
			success: (d)->