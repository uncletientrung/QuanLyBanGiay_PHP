/*
 *  Document   : op_auth_signup.js
 *  Author     : pixelcave
 *  Description: Custom JS code used in Sign Up Page
 */

class pageAuthSignUp {
  /*
   * Init Sign Up Form Validation, for more examples you can check out https://github.com/jzaefferer/jquery-validation
   *
   */
  static initValidation() {
    // Load default options for jQuery Validation plugin
    Dashmix.helpers('jq-validation');

    // Init Form Validation
    jQuery('.js-validation-signup').validate({
      rules: {
        'signup-username': {
          required: true,
          minlength: 3
        },
        'signup-email': {
          required: true,
          emailWithDot: true
        },
        'signup-password': {
          required: true,
          minlength: 5
        },
        'signup-password-confirm': {
          required: true,
          equalTo: '#signup-password'
        }
      },
      messages: {
        'signup-username': {
          required: 'Vui lòng nhập tên đăng nhập',
          minlength: 'Tên đăng nhập phải có ít nhất 3 ký tự'
        },
        'signup-email': {
          required: 'Vui lòng nhập địa chỉ Email',
          emailWithDot: 'Vui lòng nhập đúng định dạng Email'
        },
        'signup-password': {
          required: 'Vui lòng cung cấp mật khẩu',
          minlength: 'Mật khẩu phải có ít nhất 5 ký tự'
        },
        'signup-password-confirm': {
          required: 'Vui lòng xác nhận lại mật khẩu',
          minlength: 'Mật khẩu xác nhận phải có ít nhất 5 ký tự',
          equalTo: 'Mật khẩu xác nhận không khớp'
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
Dashmix.onLoad(() => pageAuthSignUp.init());
