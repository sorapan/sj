
count = 1

$(document).ready ()->
	$('.car_img_upload_btn').click (e)->
		e.preventDefault()

	$('#add').click ()->
		$('#add_upload_div').append '<div id="w'+count+'">
		                    <div class="wait_car_img">+</div>
		                    <input type="file" class="car_file" name="file">
		                </div><br>'
		count++

	$('#del').click ()->
		if count>1
			count--
			$('#add_upload_div').find('.wait_car_img').last().remove()
			$('#add_upload_div').find('input').last().remove()
			$('#add_upload_div').find('br').last().remove()