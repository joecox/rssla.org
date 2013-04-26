function EvObject(e)
{
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
  
  this.title =  e.title.$t;
  this.loc =    e.gd$where[0].valueString;
  this.desc =   e.content.$t;
  this.link =   e.link[0].href;
}




