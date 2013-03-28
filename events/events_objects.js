/* ADDING METHODS TO Date ****************************************************/
Date.prototype.daysIn = function ()
{
  return (new Date(this.getFullYear(), this.getMonth()+1, 0)).getDate();
};


/* CalObject *****************************************************************/
function CalObject()
{
  //this.month, this.year, and this.ymstr are set with setMonth
  this.month = undefined;
  this.year = undefined;
  this.ymstr = undefined;

  //this.framediv is the .cal_frame div assigned by build_cal_fram
  this.framediv = null;

  //this.titlediv is the .cal_title div assigned by build_cal_frame
  this.titlediv = null;

  //this.daydivs is an array of 42 {$div, events[]} objects 
  // assigned by build_cal_frame
  this.days = new Array();

  //this.dayone is the index of the first day of the month.  This is useful for
  // providing an offset into the this.days array. Assigned by setMonth
  this.dayone = undefined;
}

CalObject.prototype.setMonth =
function (monyear)
{
  this.month = monyear.month;
  this.year = monyear.year;
  var monstr = (monyear.month+1).toString();
  if (monstr.length < 2) monstr = "0".concat(monstr);
  this.ymstr = (this.year.toString()).concat(monstr);

  $(this.titlediv).html(MONTH_NAMES[monyear.month]);

  var month = new Date(monyear.year, monyear.month, 1, 0, 0, 0, 0);
  var firstOfMonthDay = month.getDay();
  this.dayone = firstOfMonthDay;
  var lastOfMonth = month.daysIn();
  var date = 1;

  for (var ii = firstOfMonthDay; ii < 42 && date < lastOfMonth; ii++, date++)
  {
    this.days[ii].$div.children(".datenum").html(date);
  }

};

CalObject.prototype.fillMonth = 
function ()
{
  if (!eventsObj.hasOwnProperty(this.ymstr))
  {
    return;  // no events for this month
  }

  var calEv;
  var day;
  for (var ii = 0; ii < eventsObj[this.ymstr].length; ii++)
  {
    calEv = eventsObj[this.ymstr][ii];
    day = this.days[(new Number(calEv.date)) + this.dayone];
    day.events.push(calEv);
  }

  for (var ii = 0; ii < 42; ii++)
  {
    this.days[ii].events.sort(
      function (a, b)
      {
        return (a.shr - b.shr || a.smin - b.smin);
      });

    var calEv;
    for (var jj = 0; jj < this.days[ii].events.length; jj++)
    {
      calEv = this.days[ii].events[jj];
      this.days[ii].$div.append($('<div>')
                        .addClass("cal_event")
                        .html(calEv.shr + ":" + calEv.smin + "- " + calEv.title)
                        .css({top: 22+jj*18 + "px"}));
    }
  }

};


