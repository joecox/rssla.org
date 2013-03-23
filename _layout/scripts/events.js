var DAY_WIDTH = 100;
var DAY_HEIGHT = 80;
var SIDE_DELTA = 2;

var DAY_HEADING = [
  "SUN",
  "MON",
  "TUE",
  "WED",
  "THU",
  "FRI",
  "SAT"];

var MONTH_NAMES = [
  "JANUARY",
  "FEBRUARY",
  "MARCH",
  "APRIL",
  "MAY",
  "JUNE",
  "JULY",
  "AUGUST",
  "SEPTEMBER",
  "OCTOBER",
  "NOVEMBER",
  "DECEMBER"];

Date.prototype.daysIn = function ()
{
  return (new Date(this.getFullYear(), this.getMonth()+1, 0)).getDate();
};


function build_day_over_handler(x)
{
  return function ()
  {
    $(this).animate(
      {
        top: -SIDE_DELTA + "px",
        left: (x-SIDE_DELTA) + "px",
        height: (DAY_HEIGHT+2*SIDE_DELTA)+"px",
        width: (DAY_WIDTH+2*SIDE_DELTA)+"px",
      }, 100);
  }
}

function build_day_out_handler(x)
{
  return function ()
  {
    $(this).animate(
      {
        top: "0px",
        left: x + "px",
        height: DAY_HEIGHT + "px",
        width: DAY_WIDTH + "px",
      }, 100);
  }
}


function build_cal_frame(pos, calObj)
{
  var cal = $("<div>")
              .addClass("cal_frame")
              .css({top: "7px", left: (pos*720+7)+"px"})
              .appendTo($("#calendar_canvas"));

  calObj.framediv = cal[0]

  calObj.daydivs.length = 0;

  calObj.titlediv = $("<div>")
                      .addClass("cal_title")
                      .addClass("month_dependent")
                      .appendTo(cal)
                      .get(0);

  cal.append($("<div>").addClass("cal_header_row"));
  
  for(var ii = 0; ii < 6; ii++)
  {
    cal.append($("<div>")
                .addClass("cal_row")
                .addClass("row"+ii));

  }

  var rows = cal.children(".cal_row");
  var header_row = cal.children(".cal_header_row");
  var jj = 0;

  // Fill in the header row
  for(var ii = 0; ii < 7; ii++)
  {
    header_row.append($("<div>") 
                        .addClass("cal_header_el")
                        .css({left: (ii*DAY_WIDTH)+"px"})
                        .html(DAY_HEADING[ii]));
  }

  // Fill in each week, and add the day divs to the calendar object
  rows.each(
    function(index) 
    {
      for (var ii = 0; ii < 7; ii++)
      {
        var newDay = $("<div>")
                       .addClass("cal_day")
                       .addClass("col"+ii)
                       .addClass("index" + (index*7+ii))
                       .css({top: "0px", left: (ii*DAY_WIDTH)+"px"})
                       .mouseover(build_day_over_handler(ii*DAY_WIDTH))
                       .mouseout(build_day_out_handler(ii*DAY_WIDTH))
                       .append(
                         $("<div>")
                           .addClass("datenum"));

        $(this).append(newDay);
        calObj.daydivs.push(newDay[0]);
      }
    }
  );

  return cal;
}


function slide_cal_left()
{
  centerMonYear = monyearup(centerMonYear);

  $(".cal_frame.cal_left").remove();


  $(".cal_frame.cal_center")
    .animate({top: "7px", left: "-713px"}, 500)
    .addClass("cal_left")
    .removeClass("cal_center");

  $(".cal_frame.cal_right")
    .animate({top: "7px", left: "7px"}, 500)
    .addClass("cal_center")
    .removeClass("cal_right");

  setMonth(build_cal_frame(1).addClass("cal_right"), 
           monyearup(centerMonYear));

}

function slide_cal_right()
{
  centerMonYear = monyeardown(centerMonYear);

  $(".cal_frame.cal_right").remove();

  $(".cal_frame.cal_center")
    .animate({top: "7px", left: "727px"}, 500)
    .addClass("cal_right")
    .removeClass("cal_center");

  $(".cal_frame.cal_left")
    .animate({top: "7px", left: "7px"}, 500)
    .addClass("cal_center")
    .removeClass("cal_left");

  setMonth(build_cal_frame(-1).addClass("cal_left"), 
           monyeardown(centerMonYear));
}


var now = new Date();
var centerMonYear = {month: now.getMonth(), year: now.getFullYear()};

var leftCal = new CalObject();
var centerCal = new CalObject();
var rightCal = new CalObject();
  

build_cal_frame(0, centerCal).addClass("cal_center");
build_cal_frame(-1, leftCal).addClass("cal_left");
build_cal_frame(1, rightCal).addClass("cal_right");


centerCal.setMonth(centerMonYear);
leftCal.setMonth(monyeardown(centerMonYear));
rightCal.setMonth(monyearup(centerMonYear));


function monyeardown(monyear)
{
  var ret = {month: (monyear.month-1), year: monyear.year};
  if (ret.month == -1)
  {
    ret.month = 11;
    ret.year--;
  }
  return ret;
}
function monyearup(monyear)
{
  var ret = {month: (monyear.month+1)%12, year: monyear.year};
  if (ret.month == 0)
  {
    ret.year++;
  }
  return ret;
}

