
$(document).ready ()->

	$('#grom').on 'dragenter', (e)-> e.preventDefault()
	$('#grom').on 'dragover', (e)-> e.preventDefault()
	$('#grom').on 'drop', (e)->
		e.preventDefault()
		upload(e.originalEvent.dataTransfer,"grom")

	$('.drop_div').on 'click',(e)->
		e.preventDefault()


#private function

upload = (data,type)->
	formdata = new FormData()
	formdata.append "img", data.files[0]
	$.ajax
		xhr:()->
			xhr = new window.XMLHttpRequest()
			xhr.upload.addEventListener "progress", (e)->
				if e.lengthComputable
					percentComplete = e.loaded / e.total;
					$("#grom").html percentComplete*100;
			, false
			return xhr;
		url:'post/uploadFile/'+type
		type:'POST'
		data:formdata
		processData: false
		contentType: false
		success:(d)->
			$('#grom').html "<img src='"+d+"'>"




