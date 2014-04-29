// Generated by CoffeeScript 1.7.1
(function() {
  var DelImgInDir, DragSetting, count, uploadDoc, uploadImg;

  count = 1;

  $(document).ready(function() {
    DragSetting('.in_drop_div');
    $(document).on('drop', '.in_drop_div', function(e) {
      e.preventDefault();
      return uploadDoc(e.originalEvent.dataTransfer, $(this).parent().attr("id"));
    });
    $(document).on('click', '.in_drop_div', function(e) {
      e.preventDefault();
      return $(this).parent().find('input').click();
    });
    $(document).on('change', '.ip_upload1', function(e) {
      e.preventDefault();
      return uploadDoc($(this)[0], $(this).parent().attr("id"));
    });
    $(document).on('click', '.del_upload_img', function(e) {
      $(this).parent().append('<div class="in_drop_div"></div>');
      $(this).parent().find('img').hide();
      DelImgInDir($(this).parent().find('img').attr('src'));
      return $(this).hide();
    });
    $('.car_img_upload_btn').click(function(e) {
      return e.preventDefault();
    });
    $('#add').click(function() {
      $('#add_upload_div').append('<div class="wrapall" id="w' + count + '"> <div class="wait_car_img">+</div> <input type="file" class="car_file" name="file"> </div><br>');
      return count++;
    });
    $(document).on('click', '#del', function() {
      if (count > 1) {
        if ($('#add_upload_div').find('.wrapall').last().find('.show_car_upload').length === 0) {
          $('#add_upload_div').find('.wait_car_img').last().remove();
          $('#add_upload_div').find('input').last().remove();
          $('#add_upload_div').find('div').last().remove();
          $('#add_upload_div').find('br').last().remove();
          return count--;
        } else {

        }
      }
    });
    DragSetting('.wait_car_img');
    $(document).on('drop', '.wait_car_img', function(e) {
      e.preventDefault();
      return uploadImg(e.originalEvent.dataTransfer, $(this).parent().attr('id'));
    });
    $(document).on('click', '.wait_car_img', function(e) {
      e.preventDefault();
      return $(this).parent().find('input').click();
    });
    $(document).on('change', '.car_file', function(e) {
      e.preventDefault();
      return uploadImg($(this)[0], $(this).parent().attr('id'));
    });
    return $(document).on('click', '.del_car_upload', function(e) {
      DelImgInDir($(this).parent().find('img').attr('src'));
      if ($(this).parent().is(':first-child')) {
        $(this).parent().html('<div class="wait_car_img">+</div> <in put type="file" class="car_file" name="file">');
        return count = 1;
      } else {
        $(this).parent().remove();
        $('#add_upload_div').find('br').last().remove();
        return count--;
      }
    });
  });

  uploadDoc = function(data, type) {
    var formdata;
    formdata = new FormData();
    formdata.append("img", data.files[0]);
    return $.ajax({
      xhr: function() {
        var xhr;
        xhr = new window.XMLHttpRequest();
        xhr.upload.addEventListener("progress", function(e) {
          var percentComplete;
          if (e.lengthComputable) {
            percentComplete = e.loaded / e.total;
            return $('#' + type + ' .in_drop_div').html(percentComplete * 100);
          }
        }, false);
        return xhr;
      },
      url: 'post/uploadFile/' + type,
      type: 'POST',
      data: formdata,
      processData: false,
      contentType: false,
      success: function(d) {
        $('#' + type + ' .in_drop_div').hide();
        return $('#' + type).append(' <img class="show_upload" src="' + d + '"> <span class="del_upload_img">X</span> ');
      }
    });
  };

  uploadImg = function(data, div) {
    var formdata;
    console.log(div);
    formdata = new FormData();
    formdata.append("img", data.files[0]);
    return $.ajax({
      url: 'post/uploadImg',
      type: 'POST',
      data: formdata,
      processData: false,
      contentType: false,
      success: function(d) {
        return $('#' + div).html('<img class="show_car_upload" src="' + d + '"><span class="del_car_upload">X</span>');
      }
    });
  };

  DelImgInDir = function(url) {
    return $.ajax({
      url: 'post/delImg',
      type: 'POST',
      data: {
        'del': url
      }
    });
  };

  DragSetting = function(element) {
    $(document).on('dragenter', element, function(e) {
      return e.preventDefault();
    });
    return $(document).on('dragover', element, function(e) {
      return e.preventDefault();
    });
  };

}).call(this);

//# sourceMappingURL=upload_img2.map