// Generated by CoffeeScript 1.7.1
(function() {
  var result_url, url, urlsplt;

  url = document.URL;

  urlsplt = url.split("/");

  result_url = urlsplt[urlsplt.length - 1];

  $(document).ready(function() {
    return $("#sendmes").click(function(e) {
      var msg;
      e.preventDefault();
      msg = $("#ip").val();
      return $.ajax({
        url: '../pushMessage',
        type: 'POST',
        data: {
          msg: msg,
          rc: result_url
        },
        success: function(d) {}
      });
    });
  });

}).call(this);

//# sourceMappingURL=chat.map
