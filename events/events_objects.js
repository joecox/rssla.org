/* ADDING METHODS TO Date ****************************************************/
Date.prototype.daysIn = function ()
{
  return (new Date(this.getFullYear(), this.getMonth()+1, 0)).getDate();
};



function timeStr(hrstr, minstr)
{
  var hr = parseInt(hrstr);
  var pm = false;

  if (hr > 12)
  {
    hr -= 12;
    pm = true;
  }
  else if (hr == 0)
  {
    hr = 12;
  }

  return (hr.toString()) + ":" + minstr + (pm ? "p" : "a");
}
