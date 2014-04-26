
count = 1

$(document).ready ()->

	$('.car_img_upload_btn').click (e)->
		e.preventDefault()

	$('#add').click ()->
		$('#add_upload_div').append '<div class="wrapall" id="w'+count+'">
											<div class="wait_car_img">+</div>
											<input type="file" class="car_file" name="file">
										</div><br>'
		count++

	$(document).on 'click','#del',()->
		if count>1
			if $('#add_upload_div').find('.wrapall').last().find('.show_car_upload').length == 0
				$('#add_upload_div').find('.wait_car_img').last().remove()
				$('#add_upload_div').find('input').last().remove()
				$('#add_upload_div').find('div').last().remove()
				$('#add_upload_div').find('br').last().remove()
				count--
			else
				#do nothing

	DragSetting('.wait_car_img')
	$(document).on 'drop','.wait_car_img', (e)->
		e.preventDefault()
		uploadImg(e.originalEvent.dataTransfer,$(this).parent().attr 'id')

	$(document).on 'click','.wait_car_img', (e)->
		e.preventDefault()
		$(this).parent().find('input').click();

	$(document).on 'change','.car_file',(e)->
		e.preventDefault()
		uploadImg($(this)[0],$(this).parent().attr 'id')

	$(document).on 'click','.del_car_upload', (e)->
		DelImgInDir($(this).parent().find('img').attr 'src')
		if $(this).parent().is ':first-child'
			$(this).parent().html '<div class="wait_car_img">+</div>
											<in put type="file" class="car_file" name="file">'
			count=1
		else
			$(this).parent().remove()
			$('#add_upload_div').find('br').last().remove()
			count--

	#/////	pushdata /////
	postnote = $('#post_note').val()
	$(' #submit').click ()->
		$.ajax
			url:''
			type:'POST'
			data:
				postnote : postnote
			success: (d)->
				alert d
	#/////	pushdata /////


DragSetting = (element)->
	$(document).on 'dragenter',element, (e)-> e.preventDefault()
	$(document).on 'dragover',element, (e)-> e.preventDefault()

uploadImg = (data,div)->
	console.log div
	formdata = new FormData()
	formdata.append "img", data.files[0]
	$.ajax
		url : '../uploadImg'
		type : 'POST'
		data : formdata
		processData: false
		contentType: false
		success:(d)->
			$('#'+div).html '<img class="show_car_upload" src="'+d+'"><span class="del_car_upload">X</span>'