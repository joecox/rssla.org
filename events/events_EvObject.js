var TIMING_TYPE_NORMAL = 0;
var TIMING_TYPE_ALLDAY = 1;

function EvObject(e)
{
   if (e.gd$when[0].startTime.length == 10)
   {
      //all-day or multi-day event
      this.timing_type = TIMING_TYPE_ALLDAY;

      this.sdate = new Date(e.gd$when[0].startTime.substr(0,4),
                            e.gd$when[0].startTime.substr(5,2) - 1,
                            e.gd$when[0].startTime.substr(8,2));

      this.edate = new Date(e.gd$when[0].endTime.substr(0,4),
                            e.gd$when[0].endTime.substr(5,2) - 1,
                            e.gd$when[0].endTime.substr(8,2));
   }
   else
   {
      //partial day event
      this.timing_type = TIMING_TYPE_NORMAL;

      //this.sdate is the start time of the event
      this.sdate = new Date(e.gd$when[0].startTime.substr(0,4),
                            e.gd$when[0].startTime.substr(5,2) - 1,
                            e.gd$when[0].startTime.substr(8,2),
                            e.gd$when[0].startTime.substr(11,2),
                            e.gd$when[0].startTime.substr(14,2));
 
      //this.edate is the end time of the event
      this.edate = new Date(e.gd$when[0].endTime.substr(0,4),
                            e.gd$when[0].endTime.substr(5,2) - 1,
                            e.gd$when[0].endTime.substr(8,2),
                            e.gd$when[0].endTime.substr(11,2),
                            e.gd$when[0].endTime.substr(14,2));
   }
  
  this.title =  e.title.$t;
  this.loc =    e.gd$where[0].valueString;
  this.desc =   e.content.$t;
  this.link =   e.link[0].href;
}

EvObject.prototype.getSortMetric =
function ()
{
   if (this.timing_type == TIMING_TYPE_ALLDAY)
      return -1;
   else
      return this.sdate;
}

EvObject.prototype.getTimePrefixString =
function ()
{
   if (this.timing_type == TIMING_TYPE_NORMAL)
   {
      return this.sdate.timeStr() + "- ";
   }
   else // All-day event- no prefix
   {
      return "";
   }
}


EvObject.prototype.getTimeBoundsString =
function ()
{
   if (this.timing_type == TIMING_TYPE_NORMAL)
   {
      return this.sdate.timeStr() + " - " + this.edate.timeStr();
   }
   else // All-day event- no prefix
   {
      return "All Day";
   }
}
