/* ADDING METHODS TO Date ****************************************************/
Date.prototype.daysIn = function ()
{
  return (new Date(this.getFullYear(), this.getMonth()+1, 0)).getDate();
};


/* CalObject *****************************************************************/
function CalObject()
{
  //this.month and this.year are set with setMonth
  this.month = undefined;
  this.year = undefined;

  //this.framediv is the .cal_frame div assigned by build_cal_fram
  this.framediv = null;

  //this.titlediv is the .cal_title div assigned by build_cal_frame
  this.titlediv = null;

  //this.daydivs is an array of 42 .cal_day divs assigned by build_cal_frame
  this.daydivs = new Array();
}

CalObject.prototype.setMonth =
function (monyear)
{
  this.month = monyear.month;
  this.year = monyear.year;

  $(this.titlediv).html(MONTH_NAMES[monyear.month]);

  var startOfMonth = new Date(monyear.year, monyear.month, 1, 0, 0, 0, 0);
  var lastOfMonth = startOfMonth.daysIn();
  var date = 1;


};

function setMonth(cal_frame, monyear)
{
  cal_frame.children(".cal_title")
           .html(MONTH_NAMES[monyear.month]);

  var startOfMonth = new Date(monyear.year, monyear.month, 1, 0, 0, 0, 0);
  var lastOfMonth = startOfMonth.daysIn();
  var date = 1;
   
  console.log(startOfMonth.getDay());

  var next = cal_frame.find(".row0 .col"+startOfMonth.getDay());
  next.children(".datenum").html(date);
  date++;
  while ((next = next.next()).length)
  {
    next.children(".datenum").html(date);
    date++;
  }
            
}



