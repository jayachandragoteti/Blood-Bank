/*******************************************************************************/
/*******************************************************************************/
ajaxHomePageCall();
// ========== Ajax Page Calls ==========
// Home Page Call
function ajaxHomePageCall() {
  $.ajax({
    url: './pages/Home.php',
    success: function (response) {
      $('.ajax-main-content').html(response);
      $('.Home').addClass('active');
      $(
        '.Register,.MyRequests,.MyRequests,.ChangePassword,.Profile,.Login'
      ).removeClass('active');
      availableBlood();
      setInterval(function () {
        availableBlood();
      }, 30000);
    },
  });
}
// Register Page Call
function ajaxRegisterPageCall() {
  $.ajax({
    url: './pages/register.php',
    success: function (response) {
      $('.ajax-main-content').html(response);
      $('.Register').addClass('active');
      $(
        '.Home,.MyRequests,.MyRequests,.ChangePassword,.Profile,.Login'
      ).removeClass('active');
    },
  });
}
// My Requests Page Call
function ajaxMyRequestsPageCall() {
  $.ajax({
    url: './pages/myRequests.php',
    success: function (response) {
      $('.ajax-main-content').html(response);
      $('.MyRequests').addClass('active');
      $(
        '.Home,.Register,.MyRequests,.ChangePassword,.Profile,.Login'
      ).removeClass('active');
      myRequests();
      setInterval(function () {
        myRequests();
      }, 30000);
    },
  });
}
// Change Password Page Call
function ajaxChangePasswordPageCall() {
  $.ajax({
    url: './pages/changePassword.php',
    success: function (response) {
      $('.ajax-main-content').html(response);
      $('.ChangePassword').addClass('active');
      $('.Home,.Register,.MyRequests,.Profile,.Login').removeClass('active');
    },
  });
}
// Profile Page Call
function ajaxProfilePageCall() {
  $.ajax({
    url: './pages/profile.php',
    success: function (response) {
      $('.ajax-main-content').html(response);
      $('.Profile').addClass('active');
      $('.Home,.Register,.MyRequests,.ChangePassword,.Login').removeClass(
        'active'
      );
    },
  });
}
// Login Page Call
function ajaxLoginPageCall() {
  $.ajax({
    url: './pages/login.php',
    success: function (response) {
      $('.ajax-main-content').html(response);
      $('.Login').addClass('active');
      $('.Home,.Register,.MyRequests,.ChangePassword,.Profile').removeClass(
        'active'
      );
    },
  });
}
// ========== End Ajax Page Calls ==========

/*******************************************************************************/
/*******************************************************************************/

// ========== Receiver ==========

// Receiver Registration
function receiverRegistration() {
  var formData = {
    receiverName: $('#receiverName').val(),
    receiverEmail: $('#receiverEmail').val(),
    receiverContactNo: $('#receiverContactNo').val(),
    receiverAddress: $('#receiverAddress').val(),
    bloodGroup: $('#bloodGroup').val(),
    receiverPassword: $('#receiverPassword').val(),
    receiverConfirmPassword: $('#receiverConfirmPassword').val(),
    receiverRegistration: 'receiverRegistration',
  };
  if (
    formData.receiverName == '' ||
    formData.receiverEmail == '' ||
    formData.receiverContactNo == '' ||
    formData.receiverAddress == '' ||
    formData.bloodGroup == '' ||
    formData.receiverPassword == '' ||
    formData.receiverConfirmPassword == '' ||
    formData.receiverRegistration == ''
  ) {
    $('.alert-bell').removeClass('d-none');
    $('.Receiver-Registration-Alerts').html('All fields must be filled!');
  } else {
    $.ajax({
      type: 'POST',
      url: './backScript.php',
      data: formData,
      success: function (response) {
        $('.alert-bell').removeClass('d-none');
        $('.Receiver-Registration-Alerts').html(response);
      },
    });
  }
}

// Hospital Registration
function hospitalRegistration() {
  var formData = {
    HospitalName: $('#HospitalName').val(),
    HospitalContactNo: $('#HospitalContactNo').val(),
    HospitalEmail: $('#HospitalEmail').val(),
    HospitalCity: $('#HospitalCity').val(),
    HospitalPassword: $('#HospitalPassword').val(),
    HospitalConfirmPassword: $('#HospitalConfirmPassword').val(),
    HospitalRegistration: 'HospitalRegistration',
  };
  if (
    formData.HospitalName == '' ||
    formData.HospitalContactNo == '' ||
    formData.HospitalEmail == '' ||
    formData.HospitalCity == '' ||
    formData.HospitalPassword == '' ||
    formData.HospitalConfirmPassword == '' ||
    formData.HospitalRegistration == ''
  ) {
    $('.alert-bell').removeClass('d-none');
    $('.Hospital-Registration-Alerts').html('All fields must be filled!');
  } else if (formData.HospitalPassword != formData.HospitalConfirmPassword) {
    $('.alert-bell').removeClass('d-none');
    $('.Hospital-Registration-Alerts').html(
      'Password and confirm password should be same!'
    );
  } else {
    $.ajax({
      type: 'POST',
      url: './backScript.php',
      data: formData,
      success: function (response) {
        $('.alert-bell').removeClass('d-none');
        $('.Hospital-Registration-Alerts').html(response);
      },
    });
  }
}

// User Login
function userLogin() {
  var formData = {
    loginEmail: $('#loginEmail').val(),
    loginPassword: $('#loginPassword').val(),
    LoginType: $('#LoginType').val(),
    UserLogin: 'UserLogin',
  };
  if (
    formData.loginEmail == '' ||
    formData.loginPassword == '' ||
    formData.LoginType == ''
  ) {
    $('.alert-bell').removeClass('d-none');
    $('.User-Login-Alerts').html('All fields must be filled!');
  } else {
    $.ajax({
      type: 'POST',
      url: './backScript.php',
      data: formData,
      success: function (response) {
        $('.alert-bell').removeClass('d-none');
        $('.User-Login-Alerts').html(response);
        if (response == 'loggedSuccessfully') {
          window.location.assign('index.php');
        }
      },
    });
  }
}
// User Login
function userLogin() {
  var formData = {
    loginEmail: $('#loginEmail').val(),
    loginPassword: $('#loginPassword').val(),
    LoginType: $('#LoginType').val(),
    UserLogin: 'UserLogin',
  };
  if (
    formData.loginEmail == '' ||
    formData.loginPassword == '' ||
    formData.LoginType == ''
  ) {
    $('.alert-bell').removeClass('d-none');
    $('.User-Login-Alerts').html('All fields must be filled!');
  } else {
    $.ajax({
      type: 'POST',
      url: './backScript.php',
      data: formData,
      success: function (response) {
        $('.alert-bell').removeClass('d-none');
        $('.User-Login-Alerts').html(response);
        if (response == 'loggedSuccessfully') {
          window.location.assign('index.php');
        }
      },
    });
  }
}
// Update Password
function UpdatePassword() {
  var formData = {
    oldPassword: $('#oldPassword').val(),
    newPassword: $('#newPassword').val(),
    confirmPassword: $('#confirmPassword').val(),
    UpdatePassword: 'UpdatePassword',
  };
  if (
    formData.oldPassword == '' ||
    formData.newPassword == '' ||
    formData.confirmPassword == ''
  ) {
    $('.alert-bell').removeClass('d-none');
    $('.User-Password-Alerts').html('All fields must be filled!');
  } else if (formData.newPassword != formData.confirmPassword) {
    $('.alert-bell').removeClass('d-none');
    $('.User-Password-Alerts').html(
      'Password and confirm password should be same'
    );
  } else if (formData.confirmPassword.length < 8) {
    $('.alert-bell').removeClass('d-none');
    $('.User-Password-Alerts').html(
      'Password should contain at least eight characters'
    );
  } else {
    $.ajax({
      type: 'POST',
      url: './backScript.php',
      data: formData,
      success: function (response) {
        $('.alert-bell').removeClass('d-none');
        $('.User-Password-Alerts').html(response);
      },
    });
  }
}
// My Requests
function myRequests() {
  $.ajax({
    type: 'POST',
    url: './backScript.php',
    data: { MyRequests: 'MyRequests' },
    success: function (response) {
      $('.myRequestsResponse').html(response);
    },
  });
}
// Available Blood
function availableBlood() {
  var City = $('#availableBloodCityFilter').val();
  var BloodGroup = $('#availableBloodGroupFilter').val();
  var Hospital = $('#availableBloodHospitalFilter').val();
  $.ajax({
    type: 'POST',
    url: './backScript.php',
    data: {
      AvailableBlood: 'AvailableBlood',
      City: City,
      BloodGroup: BloodGroup,
      Hospital: Hospital,
    },
    success: function (response) {
      $('.AvailableBloodResponse').html(response);
    },
  });
}
// Sample Request
function sampleRequest(availableBloodSno) {
  $.ajax({
    type: 'POST',
    url: './backScript.php',
    data: {
      SampleRequest: 'SampleRequest',
      availableBloodSno: availableBloodSno,
    },
    success: function (response) {
      $('.alert-bell').removeClass('d-none');
      $('.Sample-Request-Alerts').html(response);
    },
  });
}

// Update Receiver Profile
function updateReceiverProfile() {
  var formData = {
    ReceiverName: $('#ReceiverName').val(),
    ReceiverEmail: $('#ReceiverEmail').val(),
    ReceiverContactNo: $('#ReceiverContactNo').val(),
    ReceiverAddress: $('#ReceiverAddress').val(),
    UpdateReceiverProfile: 'UpdateReceiverProfile',
  };
  if (
    formData.ReceiverName == '' ||
    formData.ReceiverEmail == '' ||
    formData.ReceiverContactNo == '' ||
    formData.ReceiverAddress == '' ||
    formData.UpdateReceiverProfile == ''
  ) {
    $('.alert-bell').removeClass('d-none');
    $('.Update-Receiver-Profile-Alerts').html('All fields must be filled!');
  } else {
    $.ajax({
      type: 'POST',
      url: './backScript.php',
      data: formData,
      success: function (response) {
        $('.alert-bell').removeClass('d-none');
        $('.Update-Receiver-Profile-Alerts').html(response);
      },
    });
  }
}
// ========== End Receiver ==========

/*******************************************************************************/
/*******************************************************************************/
