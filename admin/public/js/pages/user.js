/*!
 * dashmix - v5.5.0
 * @author pixelcave - https://pixelcave.com
 * Copyright (c) 2022
 */
Dashmix.onLoad(() =>
    class {
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

            jQuery(".js-dataTable-responsive").DataTable({
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
        }

        static init() {
            this.initDataTables();
        }
    }.init()
);