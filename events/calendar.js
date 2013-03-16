function build_cal_frame(pos)
{
  var cal = $("<div>")
              .addClass("cal_frame")
              .css({top: "2px", left: (pos*710+2)+"px"})
              .appendTo($("#calendar_canvas"));

  cal.append($("<div>").addClass("cal_header_row"));
  
  for(var ii = 0; ii < 6; ii++)
  {
    cal.append($("<div>").addClass("cal_row"));
  }

  var rows = cal.children().filter(".cal_row");
  var header_row = cal.children().filter(".cal_header_row");
  for(var ii = 0; ii < 7; ii++)
  {
    header_row.append($("<div>").addClass("cal_header_el"));
    rows.append($("<div>").addClass("cal_day").addClass("col"+ii));
  }

  return cal;
}

function slide_cal_left()
{
  $(".cal_frame.cal_left").remove();

  $(".cal_frame.cal_center")
    .animate({top: "2px", left: "-708px"}, 500)
    .addClass("cal_left")
    .removeClass("cal_center");

  $(".cal_frame.cal_right")
    .animate({top: "2px", left: "2px"}, 500)
    .addClass("cal_center")
    .removeClass("cal_right");

  build_cal_frame(1).addClass("cal_right");
}

function slide_cal_right()
{
  $(".cal_frame.cal_right").remove();

  $(".cal_frame.cal_center")
    .animate({top: "2px", left: "712px"}, 500)
    .addClass("cal_right")
    .removeClass("cal_center");

  $(".cal_frame.cal_left")
    .animate({top: "2px", left: "2px"}, 500)
    .addClass("cal_center")
    .removeClass("cal_left");

  build_cal_frame(-1).addClass("cal_left");
}
  

build_cal_frame(0).addClass("cal_center");
build_cal_frame(-1).addClass("cal_left");
build_cal_frame(1).addClass("cal_right");

