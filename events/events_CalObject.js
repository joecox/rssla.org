function CalObject()
{
  //this.month, this.year, and this.ymstr are set with setMonth
  this.month = undefined;
  this.year = undefined;
  this.sdate = undefined;
  this.ym = undefined;

  //this.framediv is the .cal_frame div assigned by build_cal_fram
  this.framediv = null;

  //this.titlediv is the .cal_title div assigned by build_cal_frame
  this.titlediv = null;

  //this.daydivs is an array of 42 {$div, date, events[]} objects 
  // assigned by build_cal_frame
  this.days = new Array();

  //this.dayzero is the index of the zeroeth day of the month.  This is useful 
  // for providing an offset into the this.days array. Assigned by setMonth
  this.dayzero = undefined;

  //these represent, inclusively, the dates in the previous month that appear
  // on this month's calendar
  this.prevBorderStart = undefined;
  this.prevBorderEnd = undefined;

  //this.nextBorderEnd is the last date of the next month that shows up on this
  // calendar
  this.nextBorderEnd = undefined;


  // Methods:
  // setMonth()
  // fillMonth()
}

CalObject.prototype.setMonth =
function (date)
{
  this.month = date.getMonth();
  this.year = date.getFullYear() 
  this.sdate = new Date(this.year, this.month, 1);
  this.ym = this.sdate.getYearMonth();

  $(this.titlediv).html(MONTH_NAMES[this.month]);

  var month = new Date(this.year, this.month, 1, 0, 0, 0, 0);
  var firstOfMonthDay = month.getDay();
  this.dayzero = firstOfMonthDay-1;
  var lastOfMonth = month.daysIn();

  var date = 1;
  
  /* set up this month */
  for (var ii = firstOfMonthDay; ii < 42 && date <= lastOfMonth; ii++, date++)
  {
    this.days[ii].$div
      .children(".datenum").html(date);
    this.days[ii].$div[0].dayparent = this.days[ii];
    this.days[ii].$div[0].dayparent.date = 
      new Date(this.year, this.month, date);
  }

  /* set up previous month */
  date = (new Date(this.year, this.month, 0)).getDate();
  this.prevBorderEnd = date;
  month = (new Date(this.year, this.month, 1)).minusMonth();
  for (var ii = firstOfMonthDay-1; ii >= 0; ii--, date--)
  {
    this.days[ii].$div
      .addClass('notthismonth')
      .children(".datenum").html(date);

    
    this.days[ii].$div[0].dayparent = this.days[ii];
    this.days[ii].date = new Date(month.setDate(date));
  }
  this.prevBorderStart = date+1;

  /* set up next month */
  date = 1;
  month = (new Date(this.year, this.month, 1)).plusMonth();
  for (var ii = lastOfMonth+firstOfMonthDay; ii < 42; ii++, date++)
  {
    this.days[ii].$div
      .addClass('notthismonth')
      .children(".datenum").html(date);

    this.days[ii].$div[0].dayparent = this.days[ii];
    this.days[ii].date = new Date(month.setDate(date));
  }
  this.nextBorderEnd = date - 1;

};


CalObject.prototype.fillMonth = 
function ()
{
  var calEv;
  var day;

  /* Link events to days this month... */
  if (eventsObj.hasOwnProperty(this.ym))
  {
    for (var ii = 0; ii < eventsObj[this.ym].length; ii++)
    {
      calEv = eventsObj[this.ym][ii];
      day = this.days[calEv.sdate.getDate() + this.dayzero];
      day.events.push(calEv);
    }
  }

  /* ...and for the few previous month border days... */
  if (eventsObj.hasOwnProperty(this.ym-1)) 
  { 
    for (var ii = 0; ii < eventsObj[this.ym-1].length; ii++)
    {
      calEv = eventsObj[this.ym-1][ii];
      if ((calEv.sdate.getDate() >= this.prevBorderStart) &&
          (calEv.sdate.getDate() <= this.prevBorderEnd))
      {
        day = this.days[calEv.sdate.getDate() - this.prevBorderStart];
        day.events.push(calEv);
      }
    }
  }

  /* ...and for the few next month border days. */
  if (eventsObj.hasOwnProperty(this.ym+1)) 
  { 
    for (var ii = 0; ii < eventsObj[this.ym+1].length; ii++)
    {
      calEv = eventsObj[this.ym+1][ii];
      if (calEv.sdate.getDate() <= this.nextBorderEnd)
      {
        day = this.days[calEv.sdate.getDate() + this.dayzero +
                        this.sdate.daysIn()];
        day.events.push(calEv);
      }
    }
  }




  for (var ii = 0; ii < 42; ii++)
  {
    this.days[ii].events.sort(
      function (a, b)
      {
        return (a.sdate - b.sdate);
      });

    var calEv;
    for (var jj = 0; 
         jj < this.days[ii].events.length && 
         ((jj < 2) || (this.days[ii].events.length == 3)); 
         jj++)
    {
      calEv = this.days[ii].events[jj];
      this.days[ii].$div.append(
          $('<div>')
            .addClass("cal_event")
            .css({top: 22+jj*18 + "px"})
            .append(
                $('<span>')
                  .addClass("time")
                  .html(calEv.sdate.timeStr() + "- ")
                )
            .append(
                $('<span>')
                  .addClass("title")
                  .html(calEv.title)
                )
        );
    }

    if (this.days[ii].events.length > 3)
    {
      this.days[ii].$div.append(
          $('<div>')
            .addClass("cal_event_more")
            .css({top: 22+jj*18 + "px"})
            .append(
                $('<span>')
                  .addClass("cal_event_more_text")
                  .html((this.days[ii].events.length - 2) + " more")
                )
        );
    }
  }
};
