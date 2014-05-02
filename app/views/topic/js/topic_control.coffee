
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