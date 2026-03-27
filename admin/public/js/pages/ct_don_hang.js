/*!
 * dashmix - v5.5.0
 * @author pixelcave - https://pixelcave.com
 * Copyright (c) 2022
 */
Dashmix.onLoad(() =>
    class {
        static initActions() {

            // Cập nhật trạng thái đơn hàng
            $(document).on('click', '.btn-update-status', function () {
                const id = $(this).data('id');
                console.log(id);
                const status = $(this).data('status');
                const message = $(this).data('confirm');

                let swalBlock = Swal.mixin({
                    buttonsStyling: !1,
                    target: "#page-container",
                    customClass: {
                        confirmButton: "btn btn-warning m-1",
                        cancelButton: "btn btn-secondary m-1",
                        input: "form-control",
                    },
                });

                swalBlock.fire({
                    title: 'Xác nhận?',
                    text: message,
                    icon: 'warning',
                    showCancelButton: !0,
                    confirmButtonText: 'Đồng ý',
                    cancelButtonText: 'Huỷ',
                    html: !1,
                    preConfirm: (e) =>
                        new Promise((resolve) => {
                            setTimeout(() => { resolve(); }, 50);
                        }),
                }).then(function (t) {
                    if (t.value == true) {
                        $.ajax({
                            type: 'POST',
                            url: './updateStatus',
                            data: { id: id, status: status },
                            dataType: 'json',
                            success: function (res) {
                                if (res.success) {
                                    swalBlock.fire('Thành công!', 'Đơn hàng đã được cập nhật.', 'success').then(function () {
                                        location.reload();
                                    });
                                } else {
                                    swalBlock.fire('Lỗi!', 'Không thể cập nhật trạng thái.', 'error');
                                }
                            },
                            error: function () {
                                swalBlock.fire('Lỗi!', 'Lỗi kết nối máy chủ.', 'error');
                            }
                        });
                    } else {
                        swalBlock.fire('Đã huỷ', 'Không có thay đổi nào được thực hiện.', 'error');
                    }
                });
            });
            // END Cập nhật trạng thái

        }

        static init() {
            this.initActions();
        }
    }.init()
);