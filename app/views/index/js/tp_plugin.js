// Generated by CoffeeScript 1.7.1
(function() {
  (function($) {
    var PreventHtmlTag;
    $.rb_Reply = function(a, q) {
      var aptemplate, color, data, pretemplate, topic, vrfy;
      data = $.extend({
        status: "",
        header: "",
        user: "",
        date: "",
        last_update: "",
        verify: "",
        topicid: ""
      }, a);
      if (data.status === "1") {
        color = 'green';
      } else if (data.status === "2") {
        color = 'blue';
      } else if (data.status === "3") {
        color = 'red';
      }
      if (data.verify === "Y") {
        vrfy = '<span style="color:green">ยืนยันแล้ว</span>';
      } else if (data.verify === "N") {
        vrfy = '<span style="color:red">ยังไม่ได้ยืนยัน</span>';
      }
      topic = '<div class="reply">' + '<a href="tpmanage/edit/' + data.topicid + '" class="tp_edit">แก้ไข</a><a href="" class="tp_del">ลบ</a>' + '<span style="background-color:' + color + '" class="rep_status">' + data.status + '</span>' + '<span class="head">' + data.header + '</span><br><br>' + '<a href="topic/id/' + data.topicid + '"><div>' + '<span class="descrip">สร้างโดย : </span>' + data.user + '<br>' + '<span class="descrip">อัพเดทล่าสุด : </span>' + data.last_update + '' + '<span class="descrip2">การยืนยัน : ' + vrfy + '</span><br>' + '<span class="descrip">วันที่สร้าง : </span>' + data.date + '<br><br>' + '</div></a></div>';
      aptemplate = function() {
        return $("#content").append(topic);
      };
      pretemplate = function() {
        return $("#content").prepend(topic);
      };
      if (q === "ap") {
        return aptemplate();
      } else if (q === "pre") {
        return pretemplate();
      }
      return false;
    };
    return PreventHtmlTag = function(prob) {
      return prob.replace(/&/g, "&amp;").replace(/</g, "&lt;").replace(/>/g, "&gt;").replace(/"/g, "&quot;");
    };
  })(jQuery);

}).call(this);

//# sourceMappingURL=tp_plugin.map
