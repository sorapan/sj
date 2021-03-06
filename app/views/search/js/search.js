// Generated by CoffeeScript 1.7.1
(function() {
  var search, val, veri;

  val = "header";

  veri = "all";

  $(document).on('keyup', '#search', function() {
    return search();
  });

  $(document).on('change', '#var', function() {
    val = $(this).val();
    search();
    if (val === "all") {
      $("#search").prop('disabled', true);
      return $("#x_btn").prop('disabled', true);
    } else {
      $("#search").removeAttr('disabled');
      return $("#x_btn").removeAttr('disabled');
    }
  });

  $(document).on('change', '#veri', function() {
    veri = $(this).val();
    return search();
  });

  $(document).on('click', '#x_btn', function(e) {
    e.preventDefault();
    $("#search").val("");
    return $('#result').html('');
  });

  search = function() {
    return $.ajax({
      url: 'search/fetch',
      type: 'POST',
      data: {
        word: $("#search").val(),
        choice: val,
        veri: veri
      },
      dataType: 'JSON',
      success: function(d) {
        var i, _results;
        if ($("#search").val() !== "" || val === "all") {
          if (d.length > 0) {
            $('#result').html('');
            _results = [];
            for (i in d) {
              _results.push($('#result').append('<a href="topic/id/' + d[i].topicID + '"> <div class="tp"> <span class="header">' + d[i].header + '</span><br> <span class="descrip">รายละเอียด : ' + d[i].detail + '</span><br> <span class="descrip">การดำเนินงาน : ขั้นตอนที่ ' + d[i].status + '</span><br> <span class="descrip">สร้างโดย : ' + d[i].username + '</span><br> </div> </a>'));
            }
            return _results;
          } else {
            return $('#result').html('');
          }
        } else {
          return $('#result').html('');
        }
      }
    });
  };

}).call(this);

//# sourceMappingURL=search.map
