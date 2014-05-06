

url = document.URL
urlsplt = url.split "/"
result_url = urlsplt[urlsplt.length-1]
timestamp = null

$(document).ready ()->

	fetchmessage()
	ViewAll()
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
				$('#ip').val("");
				$('#ip').scrollTop = 0;

fetchmessage = ()->

	$.ajax
		url:'../polling'
		type: 'POST'
		dataType: 'JSON'
		data:
			p : result_url
			timestamp : timestamp
		success: (d)->
			if d.length > 0
				for i of d
					$('#op').append d[i].sender+" : "+d[i].msg+" <span style=\"color:grey\">"+d[i].date+"</span><br>"
			timestamp = d[0].timestamp
			fetchmessage_update()

fetchmessage_update = ()->

	$.ajax
		url:'../polling'
		type: 'POST'
		dataType: 'JSON'
		data:
			p : result_url
			timestamp : timestamp
		success: (d)->

			$('#op').prepend d.sender+" : "+d.msg+" <span style=\"color:grey\">"+d.date+"</span><br>"
			timestamp = d.timestamp

		complete : ()->

			ViewAll()
			fetchmessage_update()

ViewAll = ()->
	$.ajax
		url:'../SetViewAll'
		type:'POST'


