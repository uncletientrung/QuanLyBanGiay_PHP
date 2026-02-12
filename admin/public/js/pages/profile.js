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
                'current_password': {
                    required: true
                },
                'new_password': {
                    required: true,
                    minlength: 3
                },
                'confirm_password': {
                    required: true,
                    equalTo: '#dm-profile-edit-password-new'
                }
            },
            messages: {
                'current_password': {
                    required: 'Vui lòng nhập mật khẩu hiện tại'
                },
                'new_password': {
                    required: 'Vui lòng nhập mật khẩu mới',
                    minlength: 'Mật khẩu mới phải từ 3 ký tự trở lên'
                },
                'confirm_password': {
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

// Xử lý AJAX cho cập nhật Profile
$(".js-validation-profile").submit(function (e) {
    e.preventDefault();
    if ($(this).valid()) {
        $.ajax({
            type: "POST",
            url: $(this).attr('action'),
            data: $(this).serialize(),
            dataType: "json",
            success: function (res) {
                Dashmix.helpers("jq-notify", { type: res.status, icon: "fa fa-check me-1", message: res.message });
                if (res.status === "success") {
                    $(".fs-4.fw-bold.mb-1").text($("input[name='hoten']").val()); // Cập nhật tên trên giao diện
                }
            }
        });
    }
});

// Xử lý AJAX cho đổi mật khẩu
$(".js-validation-password").submit(function (e) {
    e.preventDefault();
    if ($(this).valid()) {
        $.ajax({
            type: "POST",
            url: $(this).attr('action'),
            data: $(this).serialize(),
            dataType: "json",
            success: function (res) {
                Dashmix.helpers("jq-notify", { type: res.status, icon: "fa fa-check me-1", message: res.message });
                if (res.status === "success") $(".js-validation-password")[0].reset();
            }
        });
    }
});