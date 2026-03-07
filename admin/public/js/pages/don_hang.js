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
            });

            // Cấu hình ngôn ngữ mặc định
            jQuery.extend(!0, jQuery.fn.dataTable.defaults, {
                language: {
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
                pageLength: 10,
                lengthChange: false,
                autoWidth: false
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
                pageLength: 10,
                lengthMenu: [[5, 10, 20], [5, 10, 20]],
                autoWidth: !1,
                responsive: !0,
                order: [[1]],
                dom: "<'row'<'col-sm-12 col-md-3'<'#status-filter-place'>><'col-sm-12 col-md-6'<'#date-filter-box'>><'col-sm-12 col-md-3'f>><'row'<'col-sm-12'tr>><'row mt-3'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
                ajax: {
                    url: './don_hang/getData',
                    dataSrc: ''
                },
                columns: [
                    {
                        data: null,
                        className: 'text-center',
                        orderable: false,
                        render: function (data, type, row) {
                            return `
                                <div class="form-check d-inline-block">
                                    <input class="form-check-input js-check-row" type="checkbox" value="${row.madh}" id="row_${row.madh}" name="row_${row.madh}">
                                    <label class="form-check-label" for="row_${row.madh}"></label>
                                </div>
                            `;
                        }
                    },

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
                        data: 'hoten',
                        className: 'text-center',
                        render: function (data) {
                            return `
                                <div class="fw-semibold">${data}</div>
                            `;
                        }
                    },
                    {
                        data: 'tongtien',
                        render: function (data) {
                            return new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' }).format(data);
                        }
                    },
                    {
                        data: 'thoigiantao',
                        className: 'text-center',
                        render: function (data, type) {
                            if (!data) return '';

                            let parts = data.split(' ');
                            let dateParts = parts[0].split('-'); // Ngày
                            let timePart = parts[1] || ''; // Giờ

                            // Format date
                            let formattedDate = `${dateParts[2]}-${dateParts[1]}-${dateParts[0]}`;

                            // Nếu lọc thì dùng dữ liệu gốc
                            if (type === 'sort' || type === 'filter') {
                                return data;
                            }

                            return `
                                <div class="fw-bold text-primary">${formattedDate}</div>
                                <div class="text-muted fs-sm">${timePart}</div>
                            `;
                        }
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
                        render: function (data, type) {
                            let statusMap = {
                                0: { text: "Chưa xử lý", class: "bg-warning" },
                                1: { text: "Đã xác nhận", class: "bg-info" },
                                2: { text: "Đã giao thành công", class: "bg-success" },
                                3: { text: "Đã hủy", class: "bg-danger" }
                            };
                            let status = statusMap[data] || { text: "N/A", class: "bg-secondary" };
                            if (type === 'filter') return status.text;
                            return `<span class="badge ${status.class}">${status.text}</span>`;
                        }
                    },
                    {
                        data: 'madh',
                        className: 'text-center',
                        orderable: false,
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

            // Lọc trạng thái
            jQuery("#status-filter-place").html(`
                <select class="form-select" id="filter-status">
                    <option value="">Tất cả trạng thái</option>
                    <option value="Chưa xử lý">Chưa xử lý</option>
                    <option value="Đã xác nhận">Đã xác nhận</option>
                    <option value="Đã giao thành công">Đã giao thành công</option>
                    <option value="Đã hủy">Đã hủy</option>
                </select>
            `);
            $('#filter-status').on('change', function () {
                let val = $(this).val();
                userTable.column(7).search(val ? `^${val}$` : '', true, false).draw();

                const $bulkSelect = $('#bulk-status-select');
                $bulkSelect.empty().append('<option value="">Chọn thao tác</option>');

                // Ẩn/Hiện checkbox (cột 0)
                if (val === "Chưa xử lý") {
                    userTable.column(0).visible(true);
                    // "Chưa xử lý" : Xác nhận, Hủy
                    $bulkSelect.append(`
                        <option value="1">Xác nhận đơn hàng</option>
                        <option value="3">Huỷ đơn</option>
                    `);
                } else if (val === "Đã xác nhận") {
                    userTable.column(0).visible(true);
                    // "Đã xác nhận" : Giao thành công, Hủy
                    $bulkSelect.append(`
                        <option value="2">Giao hàng thành công</option>
                        <option value="3">Huỷ đơn</option>
                    `);
                } else {
                    userTable.column(0).visible(false);
                }
            });
            // END Lọc trạng thái

            // Lọc khoảng thời gian
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
                if (settings.nTable.id !== 'user-table' && !$(settings.nTable).hasClass('js-dataTable-responsive')) {
                    return true;
                }

                let minStr = jQuery("#filter-from").val();
                let maxStr = jQuery("#filter-to").val();
                let tableDateTime = data[4];

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
            // END lọc khoảng thời gian

            // Checkbox
            // Default ẩn checkbox
            userTable.column(0).visible(false);

            function updateBulkActionUI() {
                let checkedRows = $('#user-table tbody .js-check-row:checked');
                let count = checkedRows.length;

                if (count > 0) {
                    $('#selected-count').text(count);
                    $('#bulk-action-bar').removeClass('d-none').addClass('d-flex animate__animated animate__fadeInDown');
                } else {
                    $('#bulk-action-bar').addClass('d-none').removeClass('d-flex');
                    $('#check-all').prop('checked', false);
                }
            }


            $('#user-table').on('click', '#check-all', function () { // Delegation
                /** .prop()
                 * Lấy giá trị thuộc tính của phần tử đầu tiên, Gán cho tất cả thực thể trong tập hợp
                 * 
                 * .prop( propertyName ): Lấy giá trị của thuộc tính.
                 * .prop( propertyName, value ): Thiết lập một giá trị cho thuộc tính.
                 * .prop( properties ): Thiết lập nhiều thuộc tính cùng lúc bằng một đối tượng (object).
                 * .prop( propertyName, function ): Thiết lập giá trị thông qua một hàm xử lý.
                 */
                let isChecked = $(this).prop('checked');
                let rows = userTable.rows({ page: 'current' }).nodes();
                $(rows).find('.js-check-row').prop('checked', isChecked);
                updateBulkActionUI();
            });

            /** Delegation
             * Áp dụng nổi bọt: <ul><a></a></ul> -> click mỗi a nhưng sau đó ul cũng bị click
             * .on( events [, selector ] [, data ], handler )
             * events, Kiểu DL: String. 1 hoặc nhiều sự kiện cách nhau 1 khoảng trắng
             * selector, Kiểu DL: String. Phần tử con nằm trong từng dòng của bảng
             * data, Kiểu DL: Anything. Truyền DL vào handler thông qua event.data
             * handler, Kiểu DL: Function. 
             */
            $('#user-table tbody').on('change', '.js-check-row', function () { // Delegation 
                let total = $('#user-table tbody .js-check-row').length;
                let checked = $('#user-table tbody .js-check-row:checked').length;

                $('#check-all').prop('checked', (total > 0 && total === checked));
                updateBulkActionUI();
            });

            /** Reset check-all
             * draw kích hoạt khi vẽ lại bảng trên trang, cùng thời điểm với drawCallback
             * function(e, settings)
             * - e, Kiểu DL: object jQuery
             * - settings, Kiểu DL: DataTables.Settings
             */
            userTable.on('draw', function () {
                $('#check-all').prop('checked', false);
                updateBulkActionUI();
            });

            // Đổi trạng thái multi
            $('#btn-apply-bulk').on('click', function () {
                let status = $('#bulk-status-select').val();
                let selectedIds = [];

                $('#user-table tbody .js-check-row:checked').each(function () {
                    selectedIds.push($(this).val());
                });

                if (!status) {
                    Dashmix.helpers('jq-notify', { type: 'warning', icon: 'fa fa-exclamation-triangle', message: 'Vui lòng chọn trạng thái!' });
                    return;
                }

                Swal.fire({
                    title: 'Xác nhận?',
                    text: `Bạn có chắc muốn đổi trạng thái ${selectedIds.length} đơn hàng đã chọn?`,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Đồng ý',
                    cancelButtonText: 'Hủy'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: './don_hang/updateBulkStatus',
                            type: 'POST',
                            data: {
                                ids: selectedIds,
                                status: status
                            },
                            success: function (res) {
                                userTable.ajax.reload();
                                Dashmix.helpers('jq-notify', { type: 'success', icon: 'fa fa-check', message: 'Cập nhật thành công!' });
                            },
                            error: function () {
                                Dashmix.helpers('jq-notify', { type: 'danger', icon: 'fa fa-times', message: 'Có lỗi xảy ra!' });
                            }
                        });
                    }
                });
            });
            // END Checkbox

        }

        static init() {
            this.initDataTables();
        }
    }.init()
);