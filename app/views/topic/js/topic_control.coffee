
$(document).ready ()->
	$(' .box_in_head').click ()->
		$(this).parent().find('img').toggle()
		$(this).parent().find('br').last().toggle()
		if $(this).find('.arrow').html() == '▲'
			$(this).find('.arrow').html '▼'
		else
			$(this).find('.arrow').html '▲'