var now;
var centerDate;

var leftCal;
var centerCal;
var rightCal;

var eventsObj = {};

var eventsReceived = false;

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
  };
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
  };
}


function build_cal_frame(pos, calObj)
{
  var cal = $("<div>")
              .addClass("cal_frame")
              .css({top: "7px", left: (pos*720+7)+"px"})
              .appendTo($("#calendar_canvas"));

  calObj.framediv = cal[0];

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
                       .click(function ()
                         {
                           openOverlay();
                           populateOverlay(this.dayparent);
                         })
                       .append(
                         $("<div>")
                           .addClass("datenum"));

        newDay[0].dayparent = null;

        $(this).append(newDay);
        calObj.days.push({$div: newDay, date: undefined, events: []});
      }
    }
  );

  return cal;
}

function openOverlay()
{
  var left = $(window).width()/2 - 300;
  if (left < 0) left = 0;

  var top = $(window).height()/2 - 200;
  if (top < 0) top = 0;
 
  $(".veil")
    .fadeIn(200);
  $(".cal_overlay")
    .css({top: top + "px", left: left + "px"})
    .fadeIn(200);
}

function populateOverlay(dayObj)
{
  $('.cal_overlay_title')
    .html(MONTH_NAMES[dayObj.date.getMonth()] + ' ' + 
          (dayObj.date.getDate()) + ', ' + 
          dayObj.date.getFullYear());

  if (dayObj.events.length == 0) 
  {
    $(".cal_overlay_content")
      .append($('<div>')
                .addClass('event_no_content')
                .html('No events found'));
  }
  else
  {
    var $div, $desc, $more;
    for (var ii = 0; ii < dayObj.events.length; ii++)
    {
      $(".cal_overlay_content")
        .append(($div = buildEventDesc(dayObj.events[ii])));

      $desc = $div.find(".event_desc");
      if (($desc.length > 0) && jq_isOverflowed($desc))
      {
        $desc.append(($more = $('<span>').addClass('event_desc_more')
                                         .html('Show more')));
      }
    }
  }
}

function buildEventDesc(e)
{
  var $div, $title, $timeloc_wrap, $timing, $loc, $link_wrap, $fb_link, $gc_link, $desc, $more;

  $div = 
    $('<div>')
      .addClass('event_desc_wrap')
      .append(($title =  $('<div>').addClass('event_title')))
      .append(($link_wrap = $('<span>').addClass('event_link_wrap')));
      
  $link_wrap.append(($gc_link =  $('<a>')
                             .addClass('event_gc_link')
                             .attr('href', e.link)
                             .attr('target', '_blank')
                             .html('Google Cal.')))
            .append(($fb_link =  $('<a>').addClass('event_fb_link')));

  $fb_link.html("Facebook");
  if (haveFbLink(e))
  {
    var fb_s = /http[s]?:\/\/www.facebook.com\/events\/[0-9]*[\/]?/;
    var fblink = fb_s.exec(e.desc);
    $fb_link.attr("href", fblink);
  }
  else
  {
    $fb_link.addClass('nolink');
  }

  $div.append(($timeloc_wrap = $('<div>').addClass('event_timeloc_wrap')));
  $timeloc_wrap.append(($timing =  $('<span>').addClass('event_time')));

  $title.html(e.title);
  $timing.html(e.getTimeBoundsString());

  if (e.loc) $timeloc_wrap.append($('<span>').addClass('event_loc')
                                             .html(e.loc));

  var new_desc = e.desc.replace(/\n\nhttp[s]?:\/\/www.facebook.com\/events\/[0-9]*[\/]?/, '');

  if (new_desc) $div.append(($desc = $('<div>').addClass('event_desc')
                                               .html(new_desc)));

  return $div;
}

function haveFbLink(e)
{
  var fb_s = /facebook.com/;
  
  return fb_s.test(e.desc);
}

function closeOverlay()
{
  $(".veil").fadeOut(200);
  $(".cal_overlay").fadeOut(200, 
    // Remove on fade complete
    function () {
      $('.cal_overlay_content').children().remove();
  });
}

function slide_cal_left()
{
  centerDate = centerDate.plusMonth();

  $(".cal_frame.cal_left").remove();

  leftCal = centerCal;
  centerCal = rightCal;

  $(".cal_frame.cal_center")
    .animate({top: "7px", left: "-713px"}, {duration: 500, queue: false})
    .addClass("cal_left")
    .removeClass("cal_center");

  $(".cal_frame.cal_right")
    .animate({top: "7px", left: "7px"}, {duration: 500, queue: false})
    .addClass("cal_center")
    .removeClass("cal_right");

  rightCal = new CalObject();
  build_cal_frame(1, rightCal).addClass("cal_right");

  rightCal.setMonth(centerDate.plusMonth());
  if (eventsReceived) rightCal.fillMonth();

}

function slide_cal_right()
{
  centerDate = centerDate.minusMonth();

  $(".cal_frame.cal_right").remove();

  rightCal = centerCal;
  centerCal = leftCal;

  $(".cal_frame.cal_center")
    .animate({top: "7px", left: "727px"}, {duration: 500, queue: false})
    .addClass("cal_right")
    .removeClass("cal_center");

  $(".cal_frame.cal_left")
    .animate({top: "7px", left: "7px"}, {duration: 500, queue: false})
    .addClass("cal_center")
    .removeClass("cal_left");

  leftCal = new CalObject();
  build_cal_frame(-1, leftCal).addClass("cal_left");

  leftCal.setMonth(centerDate.minusMonth());
  if (eventsReceived) leftCal.fillMonth();

}

function gotEvents(data)
{
  eventsReceived = true;
  var entries = data.feed.entry;
  var newEv;
  var dateIter;
  var ym;

  /* for each event ... */
  for (var e = 0; e < entries.length; e++)
  {
    newEv = new EvObject(entries[e]);

    /* for each month that event spans... */
    for (dateIter = newEv.sdate; 
         +dateIter <= +newEv.edate; 
         dateIter = dateIter.plusMonth())
    {
      ym = dateIter.getYearMonth();

      if (!eventsObj.hasOwnProperty(ym))
      {
        eventsObj[ym] = [];
      }
    
      /* add a reference to the event in that month's field in the 
       *  eventsObj structure. */
      eventsObj[ym].push(newEv);
    }
  }

  centerCal.fillMonth();
  rightCal.fillMonth();
  leftCal.fillMonth();

}

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

function cal_init()
{
  $("body").append('<script id="events" type="text/javascript" charset="utf-8" src="https://www.google.com/calendar/feeds/u0s3n2gjmha0e30f1v13houo0o%40group.calendar.google.com/public/full?alt=json-in-script&callback=gotEvents"><\/script>');
  // $("body").append('<script id="events" type="text/javascript" charset="utf-8" src="https://www.google.com/calendar/feeds/be54mp8uk3gukb8sqoum9ida7c%40group.calendar.google.com/public/full?alt=json-in-script&callback=gotEvents"><\/script>');

  now = new Date();
  now = new Date(now.getFullYear(), now.getMonth(), now.getDate());
  centerDate = now;

  leftCal = new CalObject();
  centerCal = new CalObject();
  rightCal = new CalObject();

  build_cal_frame(0, centerCal).addClass("cal_center");
  build_cal_frame(-1, leftCal).addClass("cal_left");
  build_cal_frame(1, rightCal).addClass("cal_right");

  centerCal.setMonth(now);
  leftCal.setMonth(now.minusMonth());
  rightCal.setMonth(now.plusMonth());
}

function cal_clean()
{
  eventsObj = {};
  $("script#events").remove();

  $(centerCal.titlediv).remove();
  $(centerCal.framediv).remove();
  $(centerCal).remove();

  $(leftCal.titlediv).remove();
  $(leftCal.framediv).remove();
  $(leftCal).remove();

  $(rightCal.titlediv).remove();
  $(rightCal.framediv).remove();
  $(rightCal).remove();
}

function buildUIHandlers()
{
  $("#cal_goto_today").bind({
    click: function () 
    {
      cal_clean();
      cal_init();
    }
  });

  $(".cal_overlay_content").on("click", ".event_desc_more", function ()
  {
    var $event, $desc;
    $event = $(this).closest(".event_desc_wrap");
    $desc = $event.find(".event_desc");

    if ($(this).hasClass("expanded"))
    {
      $(this).html('Show more')
             .removeClass('expanded');

      $desc.removeClass('expanded');

      var desc = $desc.html();
      desc = desc.toString().replace(/\<br\>/g, "\r\n");
      $desc.html(desc);
    }
    else
    {
      $(this).html('Show less')
             .addClass('expanded');

      $desc.addClass('expanded');

      var desc = $desc.html();
      desc = desc.toString().replace(/\n/g, "<br />");
      $desc.html(desc);
    }
  });
}

$(document).ready(function ()
{
  cal_init();
  buildUIHandlers();
});
