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
                    search: `_INPUT_`,
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

            jQuery(".js-dataTable-simple").DataTable({
                pageLength: 5,
                lengthMenu: !1,
                searching: !1,
                autoWidth: !1,
                dom: "<'row'<'col-sm-12'tr>><'row'<'col-sm-6'i><'col-sm-6'p>>",
            });

            const dateRangeHtml = `
                <div class="input-group">
                    <span class="input-group-text input-group-text-alt">
                        <i class="fa-solid fa-calendar"></i>
                    </span>
                    <input type="text" class="form-control form-control-alt text-center" 
                           id="filter-from" name="filter-from" placeholder="Từ" 
                           aria-label="Lọc từ ngày" readonly>
                    
                    <span class="input-group-text input-group-text-alt">
                        <i class="fa fa-arrow-right"></i>
                    </span>
                    
                    <input type="text" class="form-control form-control-alt text-center" 
                           id="filter-to" name="filter-to" placeholder="Đến" 
                           aria-label="Lọc đến ngày" readonly>
                    <span class="input-group-text input-group-text-alt">
                        <i class="fa-solid fa-calendar"></i>
                    </span>
                </div>
            `;


            const userTable = jQuery(".js-dataTable-responsive").DataTable({
                pagingType: "full_numbers",
                pageLength: 5,
                lengthMenu: [[5, 10, 20], [5, 10, 20]],
                autoWidth: !1,
                responsive: !0,
                dom: "<'row'<'col-sm-12 col-md-2'l><'col-sm-12 col-md-6'<'#date-filter-box'>><'col-sm-12 col-md-4'f>><'row'<'col-sm-12'tr>><'row mt-3'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
                ajax: {
                    url: './don_hang/getData',
                    dataSrc: ''
                },
                columns: [
                    {
                        data: 'madh',
                        className: 'text-center',
                        type: 'num',
                        render: function (data, type) {
                            if (type === 'sort' || type === 'type') {
                                return parseInt(data);
                            }

                            return `
                                <a class="fw-semibold">
                                    <strong>DH-${data}</strong>
                                </a>
                            `;
                        }
                    },
                    {
                        data: 'makh',
                        className: 'text-center',
                        render: data => `KH-${data}`
                    },
                    {
                        data: 'tongtien',
                        render: function (data) {
                            return new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' }).format(data);
                        }
                    },
                    {
                        data: 'thoigiantao',
                        className: 'd-none d-sm-table-cell'
                    },
                    {
                        data: 'diachigiaohang',
                        className: 'd-none d-lg-table-cell',
                        defaultContent: "Chưa có"
                    },
                    {
                        data: 'hinhthucthanhtoan',
                        className: 'text-center',
                        render: function (data) {
                            return `<span class="fw-bold text-uppercase text-muted">${data || 'N/A'}</span>`;
                        }
                    },
                    {
                        data: 'trangthai',
                        className: 'text-center',
                        render: function (data) {
                            let statusClass = data == 1 ? "bg-success" : "bg-danger";
                            let statusText = data == 1 ? "Hoàn thành" : "Đã hủy";
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

            jQuery("#date-filter-box").html(dateRangeHtml);

            const baseFpConfig = {
                enableTime: true,
                time_24hr: true,
                dateFormat: "d-m-Y H:i",
                allowInput: true
            };

            const fromPicker = flatpickr("#filter-from", {
                ...baseFpConfig,
                onClose: function (selectedDates, dateStr) {
                    let toValue = jQuery("#filter-to").val();
                    if (dateStr && !toValue) {
                        toPicker.setDate(selectedDates[0]);
                    }
                    userTable.draw();
                }
            });

            const toPicker = flatpickr("#filter-to", {
                ...baseFpConfig,
                onClose: function (selectedDates, dateStr) {
                    let fromValue = jQuery("#filter-from").val();
                    if (dateStr && !fromValue) {
                        fromPicker.setDate(selectedDates[0]);
                    }
                    userTable.draw();
                }
            });

            $.fn.dataTable.ext.search.push(function (settings, data, dataIndex) {
                if (settings.nTable.id !== 'userTableID' && !$(settings.nTable).hasClass('js-dataTable-responsive')) {
                    return true;
                }

                let minStr = jQuery("#filter-from").val();
                let maxStr = jQuery("#filter-to").val();
                let tableDateTime = data[3];

                if (!minStr && !maxStr) return true;
                if (!tableDateTime) return false;

                const parseInputDate = (str) => {
                    if (!str) return null;
                    let [dmy, hm] = str.split(" ");
                    let [d, m, y] = dmy.split("-");
                    let [h, i] = hm ? hm.split(":") : [0, 0];
                    return new Date(y, m - 1, d, h, i).getTime();
                };

                let current = new Date(tableDateTime.replace(/-/g, "/")).getTime();
                let min = parseInputDate(minStr);
                let max = parseInputDate(maxStr);

                if (isNaN(current)) return true;

                if (
                    (min === null && current <= max) ||
                    (min <= current && max === null) ||
                    (min <= current && current <= max)
                ) {
                    return true;
                }
                return false;
            });
        }

        static init() {
            this.initDataTables();
        }
    }.init()
);