
url = document.URL
urlsplt = url.split "/"
tpid = urlsplt[urlsplt.length-1]
count = 1
count2 = 1
count3 = 1

$(document).ready ()->

	DelCarUpload("")
	DelCarUpload("2")
	DelCarUpload("3")

	formControl("")
	formControl("2")
	formControl("3")

	fetchImg()

	DragSetting('.in_drop_div')
	$(document).on 'drop','.in_drop_div', (e)->
		e.preventDefault()
		uploadDoc(e.originalEvent.dataTransfer,$(this).parent().attr "id")

	$(document).on 'click','.in_drop_div',(e)->
		e.preventDefault()
		$(this).parent().find('input').click();

	$(document).on 'change','.ip_upload1',(e)->
		e.preventDefault()
		uploadDoc($(this)[0],$(this).parent().attr "id")

	$(document).on 'click','.del_upload_img',(e)->
		$(this).parent().append '<div class="in_drop_div"></div>'
		$(this).parent().find('img').hide()
		DelImgInDir($(this).parent().find('img').attr 'src')
		$(this).hide()

	$("#submit").click (e)->
		e.preventDefault()
		$.ajax
			url:''
			type:''
			data:{


			}
			success:(d)->



fetchImg = ()->

	$.ajax
		url:'../fetchImg'
		type:'POST'
		data:
			topicid:tpid
		dataType:'JSON'
		success: (d)->

			if typeof d.grom != 'undefined'
				$('#grom .in_drop_div').hide()
				$('#grom').append ' <img class="show_upload" src="../../file/'+tpid+"/grom/"+d.grom+'"><span class="del_upload_img">X</span> '

			if typeof d.crame != 'undefined'
				$('#crame .in_drop_div').hide()
				$('#crame').append ' <img class="show_upload" src="../../file/'+tpid+"/crame/"+d.crame+'"><span class="del_upload_img">X</span> '

			if typeof d.drive != 'undefined'
				$('#drive .in_drop_div').hide()
				$('#drive').append ' <img class="show_upload" src="../../file/'+tpid+"/drive/"+d.drive+'"><span class="del_upload_img">X</span> '

			if typeof d.cussy != 'undefined'
				$('#cussy .in_drop_div').hide()
				$('#cussy').append ' <img class="show_upload" src="../../file/'+tpid+"/cussy/"+d.cussy+'"><span class="del_upload_img">X</span> '

			for i of d.img
				AddCarUploadDiv()
				$('#w'+count).html '<img class="show_car_upload" src="../../file/'+tpid+"/img/"+d.img[i]+'"><span class="del_car_upload">X</span>'
				count++

			for ii of d.img2
				AddCarUploadDiv2()
				$('#ww'+count2).html '<img class="show_car_upload2" src="../../file/'+tpid+"/img2/"+d.img2[ii]+'"><span class="del_car_upload2">X</span>'
				count2++

			for iii of d.img3
				AddCarUploadDiv3()
				$('#www'+count3).html '<img class="show_car_upload3" src="../../file/'+tpid+"/img3/"+d.img3[iii]+'"><span class="del_car_upload3">X</span>'
				count3++


AddCarUploadDiv = ()->
	$('#add_upload_div').append '<div class="wrapall" id="w'+count+'">
					                    <div class="wait_car_img">+</div>
					                    <input type="file" class="car_file" name="file">
					                </div><br>'

AddCarUploadDiv2 = ()->
	$('#add_upload_div2').append '<div class="wrapall2" id="ww'+count2+'">
						                    <div class="wait_car_img2">+</div>
						                    <input type="file" class="car_file2" name="file">
						                </div><br>'

AddCarUploadDiv3 = ()->
	$('#add_upload_div3').append '<div class="wrapall3" id="www'+count3+'">
											<div class="wait_car_img3">+</div>
											<input type="file" class="car_file3" name="file">
										</div><br>'

DelImgInDir = (url)->
	$.ajax
		url:'post/delImg'
		type:'POST'
		data:
			'del':url


formControl = (num)->

	$('.car_img_upload_btn'+num).click (e)->
		e.preventDefault()

	$('#add'+num).click ()->

		if num == "" then c =count
		else if num =="2" then c= count2
		else if num =="3" then c=count3

		$('#add_upload_div'+num).append '<div class="wrapall'+num+'" id="w'+c+'">
						                    <div class="wait_car_img'+num+'">+</div>
						                    <input type="file" class="car_file'+num+'" name="file">
						                </div><br>'
		if num == "" then count++
		else if num =="2" then count2++
		else if num =="3" then count3++

	$(document).on 'click','#del'+num,()->

		if num == "" then cc = count
		else if num =="2" then cc = count2
		else if num =="3" then cc = count3

		if cc > 1
			if $('#add_upload_div'+num).find('.wrapall'+num).last().find('.show_car_upload'+num).length == 0
				$('#add_upload_div'+num).find('.wait_car_img'+num).last().remove()
				$('#add_upload_div'+num).find('input').last().remove()
				$('#add_upload_div'+num).find('div').last().remove()
				$('#add_upload_div'+num).find('br').last().remove()
				if num == "" then count--
				else if num =="2" then count2--
				else if num =="3" then count3--
			else
				#do nothing

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
		url:'../../post/uploadFile/'+type
		type:'POST'
		data:formdata
		processData: false
		contentType: false
		success:(d)->
			$('#'+type+' .in_drop_div').hide();
			$('#'+type).append ' <img class="show_upload" src="../../'+d+'">
							<span class="del_upload_img">X</span> '

DelCarUpload = (num)->
	$(document).on 'click','.del_car_upload'+num, (e)->
		DelImgInDir($(this).parent().find('img').attr 'src')
		if $(this).parent().is ':first-child'
			$(this).parent().html '<div class="wait_car_img'+num+'">+</div>
											<in put type="file" class="car_file'+num+'" name="file">'
			if num == "" then count=1
			else if num =="2" then count2=1
			else if num =="3" then count3=1

		else
			$(this).parent().remove()
			$('#add_upload_div'+num).find('br').last().remove()
			if num == "" then count--
			else if num =="2" then count2--
			else if num =="3" then count3--

DelImgInDir = (url)->

	aa = url.split "../"
	$.ajax
		url:'../delImg'
		type:'POST'
		data:
			'del':aa[aa.length-1]

DragSetting = (element)->
	$(document).on 'dragenter',element, (e)-> e.preventDefault()
	$(document).on 'dragover',element, (e)-> e.preventDefault()