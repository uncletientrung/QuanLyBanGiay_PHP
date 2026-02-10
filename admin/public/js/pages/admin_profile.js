class pageProfileAdmin {
    static initValidation() {
        Dashmix.helpers('jq-validation');

        jQuery('.js-validation-profile').validate({
            rules: {
                'hoten': {
                    required: true,
                    minlength: 2
                },
                'email': {
                    required: true,
                    emailWithDot: true
                },
                'sdt': {
                    required: true,
                    digits: true,
                    minlength: 10,
                    maxlength: 11
                }
            },
            messages: {
                'hoten': {
                    required: 'Vui lòng nhập họ tên',
                    minlength: 'Họ tên phải có ít nhất 2 ký tự'
                },
                'email': {
                    required: 'Vui lòng nhập địa chỉ Email',
                    emailWithDot: 'Vui lòng nhập đúng định dạng Email'
                },
                'sdt': {
                    required: 'Vui lòng nhập số điện thoại',
                    digits: 'Số điện thoại chỉ bao gồm các chữ số',
                    minlength: 'Số điện thoại không hợp lệ',
                    maxlength: 'Số điện thoại không hợp lệ'
                }
            }
        });

        jQuery('.js-validation-password').validate({
            rules: {
                'dm-profile-edit-password': {
                    required: true
                },
                'dm-profile-edit-password-new': {
                    required: true,
                    minlength: 3
                },
                'dm-profile-edit-password-new-confirm': {
                    required: true,
                    equalTo: '#dm-profile-edit-password-new'
                }
            },
            messages: {
                'dm-profile-edit-password': {
                    required: 'Vui lòng nhập mật khẩu hiện tại'
                },
                'dm-profile-edit-password-new': {
                    required: 'Vui lòng nhập mật khẩu mới',
                    minlength: 'Mật khẩu mới phải từ 3 ký tự trở lên'
                },
                'dm-profile-edit-password-new-confirm': {
                    required: 'Vui lòng xác nhận lại mật khẩu mới',
                    equalTo: 'Mật khẩu xác nhận không khớp'
                }
            }
        });
    }

    /*
     * Init functionality
     */
    static init() {
        this.initValidation();
    }
}

// Initialize when page loads
Dashmix.onLoad(() => pageProfileAdmin.init());