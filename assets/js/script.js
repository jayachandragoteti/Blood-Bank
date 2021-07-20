startTime();
function startTime() {
  const today = new Date();
  let h = today.getHours();
  let m = today.getMinutes();
  let s = today.getSeconds();
  var n = today.getFullYear();
  var j = today.getMonth();
  var k = today.getDate();
  m = checkTime(m);
  s = checkTime(s);
  document.getElementById('datetime').innerHTML =
    k + '-' + j + '-' + n + ' ' + h + ':' + m + ':' + s;
  setTimeout(startTime, 1000);
}

function checkTime(i) {
  if (i < 10) {
    i = '0' + i;
  } // add zero in front of numbers < 10
  return i;
}
