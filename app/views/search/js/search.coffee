

choice = "header"
val = "header"

$(document).on 'keyup','#search',()->
	search()

$(document).on 'change','.radio',()->
	if $(" #header").is(':checked')
		choice = "header"
		search()
	else
		choice = "deatail"
		search()

$(document).on 'change','#var',()->
	val = $(this).val()
	search()

$(document).on 'click','#x_btn', (e)->
	e.preventDefault()
	$("#search").val("")
	$('#result').html ''


search = ()->
	$.ajax
		url:'search/fetch'
		type:'POST'
		data:
			word:$("#search").val()
			choice:val
		dataType: 'JSON'
		success:(d)->
			if $("#search").val() != ""
				if d.length > 0
					$('#result').html ''
					for i of d
						$('#result').append '
						<a href="topic/id/'+d[i].topicID+'">
							<div class="tp">
								<span class="header">'+d[i].header+'</span><br>
								<span class="descrip">รายละเอียด : '+d[i].detail+'</span><br>
								<span class="descrip">การดำเนินงาน : ขั้นตอนที่ '+d[i].status+'</span><br>
								<span class="descrip">สร้างโดย : '+d[i].username+'</span><br>
							</div>
						</a>'
				else $('#result').html ''
			else $('#result').html ''