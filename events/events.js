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

  calObj.days.length = 0;

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
                       .mouseenter(build_day_over_handler(ii*DAY_WIDTH))
                       .mouseleave(build_day_out_handler(ii*DAY_WIDTH))
                       .append(
                         $("<div>")
                           .addClass("datenum"));

        $(this).append(newDay);
        calObj.days.push({$div: newDay, events: []});
      }
    }
  );

  return cal;
}


function slide_cal_left()
{
  centerMonYear = monyearup(centerMonYear);

  $(".cal_frame.cal_left").remove();

  leftCal = centerCal;
  centerCal = rightCal;

  $(".cal_frame.cal_center")
    .animate({top: "7px", left: "-713px"}, 500)
    .addClass("cal_left")
    .removeClass("cal_center");

  $(".cal_frame.cal_right")
    .animate({top: "7px", left: "7px"}, 500)
    .addClass("cal_center")
    .removeClass("cal_right");

  rightCal = new CalObject();
  build_cal_frame(1, rightCal).addClass("cal_right");

  rightCal.setMonth(monyearup(centerMonYear));
  if (eventsReceived) rightCal.fillMonth();

}

function slide_cal_right()
{
  centerMonYear = monyeardown(centerMonYear);

  $(".cal_frame.cal_right").remove();

  rightCal = centerCal;
  centerCal = leftCal;

  $(".cal_frame.cal_center")
    .animate({top: "7px", left: "727px"}, 500)
    .addClass("cal_right")
    .removeClass("cal_center");

  $(".cal_frame.cal_left")
    .animate({top: "7px", left: "7px"}, 500)
    .addClass("cal_center")
    .removeClass("cal_left");

  leftCal = new CalObject();
  build_cal_frame(-1, leftCal).addClass("cal_left");

  leftCal.setMonth(monyeardown(centerMonYear));
  if (eventsReceived) leftCal.fillMonth();

}

var eventsObj = 
{
};

var eventsReceived = false;

function gotEvents(data)
{
  eventsReceived = true;
  var entries = data.feed.entry;
  for (var e = 0; e < entries.length; e++)
  {
    var startDateEls;
    startDateEls= entries[e].gd$when[0].startTime.split("-");
    var ymstring = startDateEls[0].concat(startDateEls[1]);
    if (!eventsObj.hasOwnProperty(ymstring))
    {
      eventsObj[ymstring] = [];
    }
    
    eventsObj[ymstring].push(
    {
      date:   entries[e].gd$when[0].startTime.substr(8,2),
      shr:    entries[e].gd$when[0].startTime.substr(11,2),
      smin:   entries[e].gd$when[0].startTime.substr(14,2),
      ehr:    entries[e].gd$when[0].endTime.substr(11,2),
      emin:   entries[e].gd$when[0].endTime.substr(14,2),
      title:  entries[e].title.$t
    });
  }

  centerCal.fillMonth();
  rightCal.fillMonth();
  leftCal.fillMonth();

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

//get all the data

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

/*
var clientId = '660311823487';

var apikey = 'AIzaSyAvwV-sCraZiJtOYjy8tOVJ8lTWH_R9cWA';

var scope = 'https://www.googleapis.com/auth/calendar.readonly';

function apiLoad()
{
  gapi.client.setApiKey(apikey);
  window.setTimeout(doAuth,1);
//  gapi.client.load('calendar', 'v3', clientLoad);
}

function doAuth()
{
  gapi.auth.authorize({client_id: clientId, scope: scope, immediate: false},
                      handleAuthResult);
}

function handleAuthResult(authResult)
{
  alert('result');
}

function clientLoad()
{
//  var request = gapi.client.plus.calendar.get({
  alert('meh');
}
*/
