/*
 *  Document   : op_auth_signin.js
 *  Author     : pixelcave
 *  Description: Custom JS code used in Sign In Page
 */

class pageAuthSignIn {
  /*
   * Init Sign In Form Validation, for more examples you can check out https://github.com/jzaefferer/jquery-validation
   *
   */
  static initValidation() {
    // Load default options for jQuery Validation plugin
    Dashmix.helpers('jq-validation');

    // Init Form Validation
    jQuery('.js-validation-signin').validate({
      rules: {
        'login-email': {
          required: true,
          emailWithDot: true
        },
        'login-password': {
          required: true,
          minlength: 3
        }
      },
      messages: {
        'login-email': {
          required: 'Vui lòng nhập địa chỉ Email',
          emailWithDot: 'Vui lòng nhập đúng định dạng Email'
        },
        'login-password': {
          required: 'Vui lòng nhập mật khẩu',
          minlength: 'Mật khẩu phải lớn hơn 3 ký tự'
        }
      }
    });
  }

  /*
   * Init functionality
   *
   */
  static init() {
    this.initValidation();
  }
}

// Initialize when page loads
Dashmix.onLoad(() => pageAuthSignIn.init());

$(".js-validation-signin").submit(function (e) {
  e.preventDefault();

  if ($(this).valid()) {
    $.ajax({
      type: "POST",
      url: "signin",
      data: {
        email: $("#login-email").val(),
        password: $("#login-password").val(),
      },
      dataType: "json",
      success: function (response) {
        if (response.status === "success") {
          location.href = "../dashboard";
        } else {
          Dashmix.helpers("jq-notify", {
            type: "danger",
            icon: "fa fa-times-circle me-1",
            message: response.message,
          });
        }
      },
      error: function () {
        Dashmix.helpers("jq-notify", {
          type: "danger",
          message: "Có lỗi xảy ra, vui lòng thử lại!",
        });
      }
    });
  }
});