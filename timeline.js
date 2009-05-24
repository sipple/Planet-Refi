 var tl;
 function onLoad() {
    var eventSource = new Timeline.DefaultEventSource();
    var bandInfos = [
    Timeline.createBandInfo({
        eventsource:    eventSource,
        width:          "70%", 
        intervalUnit:   Timeline.DateTime.MONTH, 
        intervalPixels: 100
    }),
    Timeline.createBandInfo({
        width:          "30%", 
        intervalUnit:   Timeline.DateTime.YEAR, 
        intervalPixels: 200
      })
    ];
    bandInfos[1].syncWith = 0;
    bandInfos[1].highlight = true;
    
    eventSource1.loadJSON('timeline.php', url);
    
    tl = Timeline.create(document.getElementById("pmtimeline"), bandInfos);
    
    tl.loadJSON("cubism.js", function(json, url) {eventSource.loadJSON(json, url);});
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
