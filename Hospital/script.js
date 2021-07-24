/*******************************************************************************/
/*******************************************************************************/
ajaxHomePageCall();
// ========== Ajax Page Calls ==========
// Home Page Call
function ajaxHomePageCall() {
  $.ajax({
    url: './pages/HospitalProfile.php',
    success: function (response) {
      $('.ajax-main-content').html(response);
    },
  });
}
// Available Blood Page Call
function ajaxAvailableBloodPageCall() {
  $.ajax({
    url: './pages/availableBlood.php',
    success: function (response) {
      $('.ajax-main-content').html(response);
      AvailableBloodDetails();
      setInterval(function () {
        AvailableBloodDetails();
      }, 10000);
    },
  });
}
// Add Blood Call
function ajaxAddBloodPageCall() {
  $.ajax({
    url: './pages/addBloodInfo.php',
    success: function (response) {
      $('.ajax-main-content').html(response);
    },
  });
}
// Requests Page Call
function ajaxBloodRequestsPageCall() {
  $.ajax({
    url: './pages/bloodRequests.php',
    success: function (response) {
      $('.ajax-main-content').html(response);
      BloodRequestsDetails();
      setInterval(function () {
        BloodRequestsDetails();
      }, 10000);
    },
  });
}
// Change Password Page Call
function ajaxChangePasswordPageCall() {
  $.ajax({
    url: './pages/changePassword.php',
    success: function (response) {
      $('.ajax-main-content').html(response);
    },
  });
}
// ========== End Ajax Page Calls ==========
/*******************************************************************************/
/*******************************************************************************/
// ========== Hospital ==========
// Available Blood Details
function AvailableBloodDetails() {
  var formData = {
    bloodGroup: $('#bloodGroup').val(),
    AvailableBloodDetails: 'AvailableBloodDetails',
  };
  $.ajax({
    type: 'POST',
    url: './backScript.php',
    data: formData,
    success: function (response) {
      $('.AvailableBloodResponse').html(response);
    },
  });
}
// Update Quantity
function UpdateQuantity(UpdateQuantitySno) {
  $('.alert-bell').removeClass('d-none');
  $('.Available-Blood-Detail-Alerts').html('Loading...');
  var formData = {
    UpdateQuantity: 'UpdateQuantity',
    Quantity: $('#updateQuantity').val(),
    UpdateQuantitySno: UpdateQuantitySno,
  };
  if (formData.Quantity == '' || formData.UpdateQuantitySno == '') {
    $('.alert-bell').removeClass('d-none');
    $('.Available-Blood-Detail-Alerts').html('Enter Quantity');
  } else {
    $.ajax({
      type: 'POST',
      url: './backScript.php',
      data: formData,
      success: function (response) {
        $('.alert-bell').removeClass('d-none');
        $('.Available-Blood-Detail-Alerts').html(response);
      },
    });
  }
}
// Delete Quantity
function DeleteQuantity(DeleteQuantitySno) {
  $('.alert-bell').removeClass('d-none');
  $('.Available-Blood-Detail-Alerts').html('Loading...');
  var formData = {
    DeleteQuantity: 'DeleteQuantity',
    DeleteQuantitySno: DeleteQuantitySno,
  };
  $.ajax({
    type: 'POST',
    url: './backScript.php',
    data: formData,
    success: function (response) {
      $('.alert-bell').removeClass('d-none');
      $('.Available-Blood-Detail-Alerts').html(response);
    },
  });
}

// Blood Requests Details
function BloodRequestsDetails() {
  var formData = {
    bloodGroup: $('#bloodGroup').val(),
    ShowRows: $('#ShowRows').val(),
    BloodRequestsResponse: 'BloodRequestsResponse',
  };
  $.ajax({
    type: 'POST',
    url: './backScript.php',
    data: formData,
    success: function (response) {
      $('.BloodRequestsResponse').html(response);
    },
  });
}
// Allot Blood
function AllotBlood(RequestID) {
  $('.alert-bell').removeClass('d-none');
  $('.Available-Blood-Detail-Alerts').html('Loading...');
  var formData = {
    AllotBlood: 'AllotBlood',
    RequestID: RequestID,
  };
  $.ajax({
    type: 'POST',
    url: './backScript.php',
    data: formData,
    success: function (response) {
      $('.alert-bell').removeClass('d-none');
      $('.Available-Blood-Detail-Alerts').html(response);
    },
  });
}
// Add Blood Group
function AddBloodGroup() {
  $('.alert-bell').removeClass('d-none');
  $('.Add-Blood-Detail-Alerts').html('Loading...');
  var formData = {
    bloodGroup: $('#bloodGroup').val(),
    Quantity: $('#Quantity').val(),
    AddBloodGroup: 'AddBloodGroup',
  };
  if (
    formData.bloodGroup == '' ||
    formData.Quantity == '' ||
    formData.AddBloodGroup == ''
  ) {
    $('.alert-bell').removeClass('d-none');
    $('.Add-Blood-Detail-Alerts').html('All fields must be filled!');
  } else {
    $.ajax({
      type: 'POST',
      url: './backScript.php',
      data: formData,
      success: function (response) {
        $('.alert-bell').removeClass('d-none');
        $('.Add-Blood-Detail-Alerts').html(response);
      },
    });
  }
}

// Change Password
function ChangePassword() {
  $('.alert-bell').removeClass('d-none');
  $('.Change-Password-Alerts').html('Loading...');
  var formData = {
    oldPassword: $('#oldPassword').val(),
    newPassword: $('#newPassword').val(),
    confirmPassword: $('#confirmPassword').val(),
    ChangePassword: 'ChangePassword',
  };
  if (
    formData.oldPassword == '' ||
    formData.newPassword == '' ||
    formData.confirmPassword == '' ||
    formData.ChangePassword == ''
  ) {
    $('.alert-bell').removeClass('d-none');
    $('.Change-Password-Alerts').html('All fields must be filled!');
  } else {
    $.ajax({
      type: 'POST',
      url: './backScript.php',
      data: formData,
      success: function (response) {
        $('.alert-bell').removeClass('d-none');
        $('.Change-Password-Alerts').html(response);
      },
    });
  }
}
