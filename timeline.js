 var tl;
 function onLoad() {
    var eventSource = new Timeline.DefaultEventSource();
    var bandInfos = [
    Timeline.createBandInfo({
        eventSource:    eventSource,
        date:           "Jan 15 2009 00:00:00 GMT",
        width:          "70%",
        intervalUnit:   Timeline.DateTime.WEEK, 
        intervalPixels: 200
    }),
    Timeline.createBandInfo({
        overview:       true,
        date:           "Feb 01 2009 00:00:00 GMT",
        eventSource: eventSource,
        width:          "30%", 
        intervalUnit:   Timeline.DateTime.MONTH, 
        intervalPixels: 75
      })
    ];
    bandInfos[1].syncWith = 0;
    bandInfos[1].highlight = true;
    
    tl = Timeline.create(document.getElementById("pmtimeline"), bandInfos);
    
    tl.loadJSON('timeline.php', function(json, url) { eventSource.loadJSON(json, url); });
  }
 
  var resizeTimerID = null;
  function onResize() {
      if (resizeTimerID == null) {
          resizeTimerID = window.setTimeout(function() {
              resizeTimerID = null;
              tl.layout();
          }, 500);
      }
 }
