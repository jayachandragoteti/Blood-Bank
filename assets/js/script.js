startTime();
const date = new Date();
const month = date.toLocaleString('default', {
  month: 'long',
});
document.getElementById('dateYear').innerHTML =
  date.getDay() + ' ' + month + ' ' + date.getFullYear();

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
  document.getElementById('datetime').innerHTML = h + ':' + m + ':' + s;
  setTimeout(startTime, 1000);
}

function checkTime(i) {
  if (i < 10) {
    i = '0' + i;
  } // add zero in front of numbers < 10
  return i;
}

$('.HospitalRegistrationButton').click(function () {
  $('.HospitalRegistrationForm').show();
  $('.ReceiverRegistrationForm').hide();
  $('.HospitalRegistrationButton').prop('disabled', true);
  $('.ReceiverRegistrationButton').prop('disabled', false);
});

$('.ReceiverRegistrationButton').click(function () {
  $('.ReceiverRegistrationForm').show();
  $('.HospitalRegistrationForm').hide();
  $('.HospitalRegistrationButton').prop('disabled', false);
  $('.ReceiverRegistrationButton').prop('disabled', true);
});
