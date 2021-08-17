function display_c() {
    var refresh = 1000; // Refresh rate in milli seconds
    mytime = setTimeout('display_ct()', refresh)
  }

  function display_ct() {
    var timex = new Date();
    var time = timex.getHours() + ":" + timex.getMinutes() + ":" + timex.getSeconds();
    document.getElementById('ct').innerHTML = time;
    display_c();
  }


  var today = new Date();
  var month = new Array();
  month[0] = "January"; month[1] = "February"; month[2] = "March"; month[3] = "April"; month[4] = "May"; month[5] = "June";
  month[6] = "July"; month[7] = "August"; month[8] = "September"; month[9] = "October"; month[10] = "November"; month[11] = "December";
  var date = today.getDate() + ' ' + (month[today.getMonth()]) + ' , ' + today.getFullYear();
  jQuery(document).ready(function () { display_ct(); jQuery(".date-text").text(date); });