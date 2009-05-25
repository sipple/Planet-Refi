 var tl;
 function onLoad() {
    var eventSource = new Timeline.DefaultEventSource();
    var bandInfos = [
    Timeline.createBandInfo({
        eventSource:    eventSource,
        width:          "70%", 
        intervalUnit:   Timeline.DateTime.WEEK, 
        intervalPixels: 100
    }),
    Timeline.createBandInfo({
        overview:       true,
        eventSource: eventSource,
        width:          "30%", 
        intervalUnit:   Timeline.DateTime.MONTH, 
        intervalPixels: 200
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
