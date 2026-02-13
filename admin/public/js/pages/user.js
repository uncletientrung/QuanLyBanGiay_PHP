/*!
 * dashmix - v5.5.0
 * @author pixelcave - https://pixelcave.com
 * Copyright (c) 2022
 */
Dashmix.onLoad(() =>
    class {
        static initValidation() {
            Dashmix.helpers('jq-validation');

            jQuery('#form-user').validate({
                rules: {
                    'hoten': {
                        required: true,
                        minlength: 2
                    },
                    'email': {
                        required: true,
                        email: true
                    },
                    'sdt': {
                        required: true,
                        digits: true,
                        minlength: 10,
                        maxlength: 11
                    },
                    'matkhau': {
                        required: function () {
                            return $("#user_id").val() === "";
                        },
                        minlength: 3
                    }
                },
                messages: {
                    'hoten': {
                        required: 'Vui lòng nhập họ tên khách hàng',
                        minlength: 'Họ tên phải có ít nhất 2 ký tự'
                    },
                    'email': {
                        required: 'Vui lòng nhập địa chỉ Email',
                        email: 'Định dạng Email không hợp lệ'
                    },
                    'sdt': {
                        required: 'Vui lòng nhập số điện thoại',
                        digits: 'Số điện thoại chỉ được chứa chữ số',
                        minlength: 'Số điện thoại tối thiểu 10 số',
                        maxlength: 'Số điện thoại tối đa 11 số'
                    },
                    'matkhau': {
                        required: 'Vui lòng nhập mật khẩu cho tài khoản mới',
                        minlength: 'Mật khẩu phải từ 3 ký tự trở lên'
                    }
                }
            });
        }

        static initDataTables() {
            jQuery.extend(jQuery.fn.dataTable.ext.classes, {
                sWrapper: "dataTables_wrapper dt-bootstrap5",
                sFilterInput: "form-control",
                sLengthSelect: "form-select",
            });

            // Cấu hình ngôn ngữ mặc định
            jQuery.extend(!0, jQuery.fn.dataTable.defaults, {
                language: {
                    lengthMenu: "_MENU_",
                    search: "_INPUT_",
                    searchPlaceholder: "Tìm kiếm..",
                    info: "Page <strong>_PAGE_</strong> of <strong>_PAGES_</strong>",
                    paginate: {
                        first: '<i class="fa fa-angle-double-left"></i>',
                        previous: '<i class="fa fa-angle-left"></i>',
                        next: '<i class="fa fa-angle-right"></i>',
                        last: '<i class="fa fa-angle-double-right"></i>',
                    },
                },
            });

            // Cấu hình Buttons mặc định
            jQuery.extend(!0, jQuery.fn.DataTable.Buttons.defaults, {
                dom: {
                    button: {
                        className: "btn btn-sm btn-primary",
                    },
                },
            });

            // Khởi tạo các loại Table khác nhau
            jQuery(".js-dataTable-full").DataTable({
                pageLength: 5,
                lengthMenu: [[5, 10, 20], [5, 10, 20]],
                autoWidth: !1,
            });

            jQuery(".js-dataTable-buttons").DataTable({
                pageLength: 5,
                lengthMenu: [[5, 10, 20], [5, 10, 20]],
                autoWidth: !1,
                buttons: ["copy", "csv", "excel", "pdf", "print"],
                dom: "<'row'<'col-sm-12'<'text-center bg-body-light py-2 mb-2'B>>><'row'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'f>><'row'<'col-sm-12'tr>><'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
            });

            jQuery(".js-dataTable-full-pagination").DataTable({
                pagingType: "full_numbers",
                pageLength: 5,
                lengthMenu: [[5, 10, 20], [5, 10, 20]],
                autoWidth: !1,
            });

            jQuery(".js-dataTable-simple").DataTable({
                pageLength: 5,
                lengthMenu: !1,
                searching: !1,
                autoWidth: !1,
                dom: "<'row'<'col-sm-12'tr>><'row'<'col-sm-6'i><'col-sm-6'p>>",
            });

            const userTable = jQuery(".js-dataTable-responsive").DataTable({
                pagingType: "full_numbers",
                pageLength: 5,
                lengthMenu: [[5, 10, 20], [5, 10, 20]],
                autoWidth: !1,
                responsive: !0,
                dom: "<'row'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'f>><'row'<'col-sm-12'tr>><'row mt-3'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
                ajax: {
                    url: './user/getData',
                    dataSrc: ''
                },
                columns: [
                    {
                        data: 'makh',
                        className: 'text-center',
                        type: 'num',
                        render: function (data) {
                            return `
                                <a class="fw-semibold">
                                    <strong>KH-${data}</strong>
                                </a>
                            `;
                        }
                    },
                    {
                        data: null,
                        render: function (data, type, row) {
                            return `
                                <div class="fw-semibold text-primary">${row.hoten || 'N/A'}</div>
                                <div class="text-muted small">${row.email || ''}</div>
                            `;
                        }
                    },
                    {
                        data: 'sdt',
                        defaultContent: "N/A",
                        className: 'd-none d-sm-table-cell'
                    },
                    {
                        data: 'diachi',
                        defaultContent: "N/A",
                        className: 'd-none d-lg-table-cell'
                    },
                    {
                        data: 'gioitinh',
                        className: 'text-center',
                        render: function (data) {
                            return data == 1 ? 'Nam' : 'Nữ';
                        }
                    },
                    {
                        data: 'trangthai',
                        className: 'text-center',
                        render: function (data) {
                            let statusClass = data == 1 ? "bg-success" : "bg-danger";
                            let statusText = data == 1 ? "Hoạt động" : "Bị khoá";
                            return `<span class="badge ${statusClass}">${statusText}</span>`;
                        }
                    },
                    {
                        data: 'makh',
                        className: 'text-center',
                        render: function (data) {
                            return `
                                <a class="btn btn-sm btn-alt-secondary btn-edit-user" data-id="${data}" href="javascript:void(0)">
                                    <i class="fa fa-fw fa-pen-to-square text-info"></i>
                                </a>
                                <a class="btn btn-sm btn-alt-secondary btn-delete-user" data-id="${data}" href="javascript:void(0)">
                                    <i class="fa fa-fw fa-times text-danger"></i>
                                </a>
                            `;
                        }
                    }
                ]
            });

            // Model Thêm
            $("#btn-add-modal").on("click", function () {
                $("#form-user")[0].reset();
                $("#user_id").val("");
                $("#form-user").validate().resetForm();
                $("#form-user").find(".is-invalid").removeClass("is-invalid");
                $("#modal-title").text("Thêm khách hàng");
                $("#modal-user").modal("show");
            });

            // Thêm / Sửa
            $("#form-user").on("submit", function (e) {
                e.preventDefault();

                if ($(this).valid()) {
                    let id = $("#user_id").val();
                    let url = id ? './user/update' : './user/add'; // Có id -> sửa : thêm

                    let formData = {
                        id: id,
                        hoten: $("#hoten").val(),
                        email: $("#email").val(),
                        sdt: $("#sdt").val(),
                        diachi: $("#diachi").val(),
                        matkhau: $("#matkhau").val(),
                        gioitinh: $("input[name='gioitinh']:checked").val(),
                        trangthai: $("#trangthai").is(":checked") ? 1 : 0
                    };

                    $.post(url, formData, function (res) {
                        if (res.success) {
                            Dashmix.helpers('jq-notify', { type: 'success', icon: 'fa fa-check me-1', message: 'Cập nhật thành công!' });
                            $("#modal-user").modal("hide");
                            userTable.ajax.reload();
                        } else {
                            Dashmix.helpers('jq-notify', { type: 'danger', icon: 'fa fa-times me-1', message: 'Có lỗi xảy ra!' });
                        }
                    }, 'json');
                }
            });

            // Modal Sửa
            $(document).on("click", ".btn-edit-user", function () {
                let id = $(this).data("id");

                $("#form-user").validate().resetForm();
                $("#form-user").find(".is-invalid").removeClass("is-invalid");

                $.post("./user/getDetail", { id: id }, function (data) {
                    // Đổ dữ liệu vào form
                    $("#user_id").val(data.makh);
                    $("#hoten").val(data.hoten);
                    $("#email").val(data.email);
                    $("#sdt").val(data.sdt);
                    $("#diachi").val(data.diachi);
                    $("#matkhau").val(data.matkhau);
                    $(`input[name='gioitinh'][value='${data.gioitinh}']`).prop("checked", true);
                    $("#trangthai").prop("checked", data.trangthai == 1);

                    $("#modal-title").text("Chỉnh sửa khách hàng");
                    $("#modal-user").modal("show");
                }, 'json');
            });

            // Xoá
            $(document).on("click", ".btn-delete-user", function (e) {
                e.preventDefault();
                var trid = $(this).data("id");

                let swalBlock = Swal.mixin({
                    buttonsStyling: !1,
                    target: "#page-container",
                    customClass: {
                        confirmButton: "btn btn-danger m-1",
                        cancelButton: "btn btn-secondary m-1",
                        input: "form-control",
                    },
                });

                swalBlock.fire({
                    title: "Bạn có chắc chắn?",
                    text: "Dữ liệu người dùng này sẽ bị xoá vĩnh viễn!",
                    icon: "warning",
                    showCancelButton: !0,
                    confirmButtonText: "Vâng, tôi chắc chắn!",
                    cancelButtonText: "Huỷ",
                    html: !1,
                    preConfirm: (e) =>
                        new Promise((e) => {
                            setTimeout(() => {
                                e();
                            }, 50);
                        }),
                }).then((t) => {
                    if (t.value == true) {
                        $.ajax({
                            type: "post",
                            url: "./user/delete",
                            data: {
                                id: trid,
                            },
                            dataType: "json",
                            success: function (response) {
                                if (response.success) {
                                    swalBlock.fire("Đã xoá!", "Xóa khách hàng thành công!", "success");
                                    userTable.ajax.reload(function () {
                                        // Sau khi load lại, kiểm tra xem trang hiện tại có record nào không
                                        // info.recordsDisplay là tổng số record sau khi lọc/xóa
                                        // info.start là chỉ số bắt đầu của trang hiện tại
                                        let info = userTable.page.info();

                                        // Nếu vị trí bắt đầu của trang hiện tại lớn hơn hoặc bằng tổng số record
                                        // nghĩa là trang này đã trống hoàn toàn
                                        if (info.recordsDisplay > 0 && info.start >= info.recordsDisplay) {
                                            userTable.page('previous').draw('page');
                                        }
                                    }, false);
                                } else {
                                    swalBlock.fire("Lỗi!", "Không thể xoá khách hàng này.", "error");
                                }
                            },
                            error: function () {
                                swalBlock.fire("Lỗi!", "Lỗi kết nối máy chủ.", "error");
                            }
                        });
                    } else {
                        swalBlock.fire("Đã huỷ", "Dữ liệu vẫn an toàn", "error");
                    }
                });
            });
        }

        static init() {
            this.initDataTables();
            this.initValidation();
        }
    }.init()
);