
$(document).ready ()->

	DragSetting('.in_drop_div')
	$(document).on 'drop','.in_drop_div', (e)->
		e.preventDefault()
		uploadDoc(e.originalEvent.dataTransfer,$(this).parent().attr "id")

	$(document).on 'click','.in_drop_div',(e)->
		e.preventDefault()
		$(this).parent().find('input').click();

	$(document).on 'click','.del_upload_img',(e)->
		$(this).parent().append '<div class="in_drop_div"></div>'
		$(this).parent().find('img').hide()
		DelImgInDir($(this).parent().find('img').attr('src'))
		$(this).hide()

	DragSetting('.wait_car_img')
	$(document).on 'drop','.wait_car_img', (e)->
		e.preventDefault()
		alert 'fuck'


#private function

uploadDoc = (data,type)->
	formdata = new FormData()
	formdata.append "img", data.files[0]
	$.ajax
		xhr:()->
			xhr = new window.XMLHttpRequest()
			xhr.upload.addEventListener "progress", (e)->
				if e.lengthComputable
					percentComplete = e.loaded / e.total;
					$('#'+type+' .in_drop_div').html percentComplete*100;
			, false
			return xhr;
		url:'post/uploadFile/'+type
		type:'POST'
		data:formdata
		processData: false
		contentType: false
		success:(d)->
			$('#'+type+' .in_drop_div').hide();
			$('#'+type).append ' <img class="show_upload" src="'+d+'">
				<span class="del_upload_img">X</span> '

uploadImg = (data)->
	formdata = new FormData()
	formdata.append "img", data.files[0]
	$.ajax
		url : ''
		type : 'POST'
		data : formdata
		processData: false
		contentType: false
		success:()->



DelImgInDir = (url)->
	$.ajax
		url:'post/delImg'
		type:'POST'
		data:
			'del':url

DragSetting = (element)->
	$(document).on 'dragenter',element, (e)-> e.preventDefault()
	$(document).on 'dragover',element, (e)-> e.preventDefault()



