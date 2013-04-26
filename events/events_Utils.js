/* CONSTANTS ****************************************************************/
var DAY_WIDTH = 100;
var DAY_HEIGHT = 80;
var SIDE_DELTA = 2;

var DAY_HEADING = ["SUN",
                   "MON",
                   "TUE",
                   "WED",
                   "THU",
                   "FRI",
                   "SAT"];

var MONTH_NAMES = ["JANUARY",
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




/* ADDING METHODS TO Date ****************************************************/
Date.prototype.daysIn = function ()
{
  return (new Date(this.getFullYear(), this.getMonth()+1, 0)).getDate();
};

Date.prototype.timeStr = function ()
{
  var hr = this.getHours();
  var pm = false;

  if (hr > 12)
  {
    hr -= 12;
    pm = true;
  }
  else if (hr == 12)
  {
    pm = true;
  }
  else if (hr == 0)
  {
    hr = 12;
  }

  var min = this.getMinutes().toString();
  if (min.length == 1)
  {
    min = "0".concat(min);
  }

  return hr + ":" + min + (pm ? "p" : "a");
};

Date.prototype.getYearMonth = function ()
{
  return ((this.getFullYear())*12 + this.getMonth());
}

Date.prototype.plusMonth = function ()
{
  if (this.getMonth() == 11)
  {
    return new Date(this.getFullYear()+1, 0, this.getDate(), this.getHours(),
                    this.getMinutes(), this.getMilliseconds());
  }
  else
  {
    return new Date(this.getFullYear(), this.getMonth()+1, this.getDate(), 
                    this.getHours(), this.getMinutes(), 
                    this.getMilliseconds());
  }
}

Date.prototype.minusMonth = function ()
{
  if (this.getMonth() == 0)
  {
    return new Date(this.getFullYear()-1, 11, this.getDate(), this.getHours(),
                    this.getMinutes(), this.getMilliseconds());
  }
  else
  {
    return new Date(this.getFullYear(), this.getMonth()-1, this.getDate(), 
                    this.getHours(), this.getMinutes(), 
                    this.getMilliseconds());
  }
}
  


