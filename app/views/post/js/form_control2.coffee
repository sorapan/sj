
$(document).ready ()->

	$('.drop_div').on 'dragenter', (e)-> e.preventDefault()
	$('.drop_div').on 'dragover', (e)-> e.preventDefault()
	$('.drop_div').on 'drop', (e)->
		e.preventDefault()
		alert '555'

#private function

Upload = (x)->

