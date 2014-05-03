
$(document).ready ()->

	$(' .box_in_head').click ()->
		$(this).parent().find('img').toggle()
		$(this).parent().find('br').toggle()
		if $(this).find('.arrow').html() == '▲'
			$(this).find('.arrow').html '▼'
			$(this).parent().find('br').last().remove()
		else
			$(this).find('.arrow').html '▲'
			$(this).parent().append '<br>'

	$(' #verify').click (e)->

		url = document.URL
		urlsplt = url.split "/"
		result_url = urlsplt[urlsplt.length-1]

		e.preventDefault()
		$.ajax
			url:'../verify'
			type:'POST'
			data:
				id:result_url
			success: (d)->
				location.replace("");