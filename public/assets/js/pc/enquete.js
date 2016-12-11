//アンケートフォーム専用JS
$(function () {

  //チェックボックスチェック 
  $(".lbl_checkbox").click(function(){
    if($(this).hasClass("active")) {
      $(this).removeClass("active");
      if($(this)[0].id == "lbl_secrit"){
        $("#txt_name").fadeIn();
      }
    } else {
      $(this).addClass("active");
      if($(this)[0].id == "lbl_secrit"){
        $("#txt_name").fadeOut();
      }
    }
  });

  //注文リスト拡張処理
  $(".lbl_openbutton").click(function(){
    if($(this)[0].innerHTML == '＋') {
      $(this).html('ー');
      $(this).parent().find(".open_area").slideDown();
    } else {
      $(this).html('＋');
      $(this).parent().find(".open_area").slideUp();
    }
  });
  $(".type").click(function(){
    if($(this).parent().find(".lbl_openbutton")[0].innerHTML == '＋') {
      $(this).parent().find(".lbl_openbutton").html('ー');
      $(this).parent().find(".open_area").slideDown();
    } else {
      $(this).parent().find(".lbl_openbutton").html('＋');
      $(this).parent().find(".open_area").slideUp();
    }
  });

  //ラジオボタンマウスオバーとクリック
  $(".rdo_star").hover(function(){
    var star_value = $(this).parent().find("input[type='radio']").val();
    var star_for = $(this)[0].htmlFor;
    for(var i = 1; i <= parseInt(star_value); i++) {
      $("#" + star_for.replace(star_value, i)).parent().find("img").attr("src", "/assets/img/system/star-on.png");
    }
    for(var i = parseInt(star_value) + 1; i <= 5; i++) {
      $("#" + star_for.replace(star_value, i)).parent().find("img").attr("src", "/assets/img/system/star-off.png");
    }
  },function(){
    var rdo_name = $(this).parent().find("input[type='radio']")[0].name;
    var star_value = $("input[name=" + rdo_name + "]:checked").val();
    if(typeof(star_value) == "undefined") { star_value = 0; }
    var star_now = $(this).parent().find("input[type='radio']").val();
    var star_for = $(this)[0].htmlFor;
    for(var i = 1; i <= parseInt(star_value); i++) {
      $("#" + star_for.replace(star_now, i)).parent().find("img").attr("src", "/assets/img/system/star-on.png");
    }
    for(var i = parseInt(star_value) + 1; i <= 5; i++) {
      $("#" + star_for.replace(star_now, i)).parent().find("img").attr("src", "/assets/img/system/star-off.png");
    }
  });

  //来店年変更
  $("#sel_visit_year").change(function(){
    if($("#sel_visit_month").val() == '2') {
      var day_last = parseInt($("#sel_visit_day option:last").val());
      day = 28;
      if(parseInt(this.value) % 4 == 0) {
        day = 29;
      }
    }
    if(day > day_last) {
      for(var i = day_last + 1; i <= day; i++) {
        $("#sel_visit_day").append('<option>' + i + '</option>');
      }
    } else if(day < day_last) {
      for(var i = day_last; i >= day; i--) {
        $("#sel_visit_day option:eq(" + i + ")").remove();
      }
    }
  });

  //来店月変更
  $("#sel_visit_month").change(function(){
    var year = parseInt($("#sel_visit_year").val());
    var month = this.value;
    var day_last = parseInt($("#sel_visit_day option:last").val());
    var day = 31;
    switch(month) {
      case '4':
      case '6':
      case '9':
      case '11':
        day = 30;
        break;
      case '2':
        day = 28;
        if(year % 4 == 0) {
          day = 29;
        }
        break;
    }
    if(day > day_last) {
      for(var i = day_last + 1; i <= day; i++) {
        $("#sel_visit_day").append('<option>' + i + '</option>');
      }
    } else if(day < day_last) {
      for(var i = day_last; i >= day; i--) {
        $("#sel_visit_day option:eq(" + i + ")").remove();
      }
    }
  });

  //提出ボタン
  $(".lbl_submit").hover(function(){
    $(this).addClass("active");
  }, function(){
    $(this).removeClass("active");
  });
  $(".lbl_submit").click(function(){
    $("#form_enquete").submit();
  });

});