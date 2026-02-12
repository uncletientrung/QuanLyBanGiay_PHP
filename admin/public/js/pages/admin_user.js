/*!
 * dashmix - v5.5.0
 * @author pixelcave - https://pixelcave.com
 * Copyright (c) 2022
 */
Dashmix.onLoad(() =>
    class {
        static initDataTables() {
            // Cấu hình class bootstrap 5 cho DataTable
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
                    searchPlaceholder: "Search..",
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

            // Đây là cái bạn đang dùng trong file user.php
            jQuery(".js-dataTable-responsive").DataTable({
                pagingType: "full_numbers",
                pageLength: 5,
                lengthMenu: [[5, 10, 20], [5, 10, 20]],
                autoWidth: !1,
                responsive: !0,
            });
        }

        static init() {
            this.initDataTables();
        }
    }.init()
);