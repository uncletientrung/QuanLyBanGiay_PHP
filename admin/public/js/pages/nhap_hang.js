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
                    info: "Trang <strong>_PAGE_</strong> / <strong>_PAGES_</strong>",
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

            // HTML cho bộ lọc ngày tháng
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

            const nhapHangTable = jQuery("#nhaphang-table").DataTable({
                pagingType: "full_numbers",
                autoWidth: !1,
                responsive: !0,
                order: [[0, 'desc']],
                dom: "<'row'<'col-sm-12 col-md-3'<'#status-filter-place'>><'col-sm-12 col-md-6'<'#date-filter-box'>><'col-sm-12 col-md-3'f>><'row'<'col-sm-12'tr>><'row mt-3'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
                ajax: {
                    url: './nhap_hang/getData',
                    dataSrc: ''
                },
                columns: [
                    {
                        data: 'mapn',
                        className: 'text-center',
                        render: function (data) {
                            return `<strong>PN-${data}</strong>`;
                        }
                    },
                    {
                        data: 'tenadmin',
                        defaultContent: 'N/A',
                        className: 'text-center'
                    },
                    {
                        data: 'tenncc',
                        defaultContent: 'N/A',
                        className: 'text-center'
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
                        data: 'tongtien',
                        className: 'text-center fw-bold',
                        render: function (data) {
                            return new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' }).format(data);
                        }
                    },
                    {
                        data: 'trangthai',
                        className: 'text-center',
                        render: function (data, type) {
                            let statusMap = {
                                1: { text: "Hoàn tất", class: "bg-success" },
                                0: { text: "Phiếu tạm", class: "bg-warning" }
                            };
                            let status = statusMap[data] || { text: "N/A", class: "bg-secondary" };
                            if (type === 'filter') return status.text;
                            return `<span class="badge ${status.class}">${status.text}</span>`;
                        }
                    },
                    {
                        data: null,
                        className: 'text-center',
                        orderable: false,
                        render: function (data) {
                            const id = data.mapn;
                            const isHoanTat = data.trangthai == 1;

                            const btnSua = isHoanTat
                                ? `<a class="btn btn-sm btn-alt-secondary disabled" title="Không thể sửa phiếu đã hoàn tất" style="opacity:.45; cursor:not-allowed;">
                   <i class="fa fa-fw fa-pen-to-square text-info"></i>
               </a>`
                                : `<a class="btn btn-sm btn-alt-secondary" href="./nhap_hang/${id}" title="Sửa">
                   <i class="fa fa-fw fa-pen-to-square text-info"></i>
               </a>`;

                            return `
            <a class="btn btn-sm btn-alt-secondary btn-view-nhaphang" data-id="${id}" title="Xem chi tiết">
                <i class="fa fa-fw fa-eye text-info"></i>
            </a>
            ${btnSua}
            <button type="button" class="btn btn-sm btn-alt-secondary btn-delete-nhaphang" data-id="${id}" title="Xoá">
                <i class="fa fa-fw fa-times text-danger"></i>
            </button>
        `;
                        }
                    }
                ]
            });

            // Thêm bộ lọc trạng thái
            jQuery("#status-filter-place").html(`
                <select class="form-select" id="filter-status" style="width: 200px;">
                    <option value="">Tất cả trạng thái</option>
                    <option value="Hoàn tất">Hoàn tất</option>
                    <option value="Phiếu tạm">Phiếu tạm</option>
                </select>
            `);

            // Lọc theo trạng thái
            $('#filter-status').on('change', function () {
                let val = $(this).val();
                nhapHangTable.column(5).search(val ? `^${val}$` : '', true, false).draw();
            });

            // Thêm bộ lọc ngày tháng
            jQuery("#date-filter-box").html(dateRangeHtml);

            const baseFpConfig = {
                enableTime: true,
                time_24hr: true,
                dateFormat: "d-m-Y H:i",
                allowInput: true
            };

            // Highlight giữa 2 khoảng thời gian
            function applyRangeHighlight(calendarContainer, fromDate, toDate) {
                calendarContainer.querySelectorAll(".flatpickr-day").forEach(function (d) {
                    d.classList.remove("inRange", "startRange", "endRange");
                    const dDate = d.dateObj;
                    if (!dDate || !fromDate) return;
                    const cmp = toDate || fromDate;
                    if (dDate > fromDate && dDate < cmp) d.classList.add("inRange");
                    if (dDate.toDateString() === fromDate.toDateString()) d.classList.add("startRange");
                    if (dDate.toDateString() === cmp.toDateString()) d.classList.add("endRange");
                });
            }

            var fromPicker = flatpickr("#filter-from", {
                ...baseFpConfig,
                onDayCreate: function (dObj, dStr, fp, dayElem) {
                    const from = fp.selectedDates[0];
                    const to = toPicker ? toPicker.selectedDates[0] : null;
                    if (!from) return;
                    const end = to || from;
                    const d = dayElem.dateObj;
                    if (d > from && d < end) dayElem.classList.add("inRange");
                    if (d.toDateString() === from.toDateString()) dayElem.classList.add("startRange");
                    if (d.toDateString() === end.toDateString()) dayElem.classList.add("endRange");
                },
                onChange: function (selectedDates) {
                    const fromDate = selectedDates[0];
                    const toDate = toPicker.selectedDates[0];
                    if (fromDate && toPicker) {
                        toPicker.set('minDate', fromDate);
                        if (!toDate || fromDate > toDate) {
                            toPicker.setDate(fromDate, false);
                        }
                        toPicker.redraw();
                    }
                    nhapHangTable.draw();
                }
            });

            var toPicker = flatpickr("#filter-to", {
                ...baseFpConfig,
                onDayCreate: function (dObj, dStr, fp, dayElem) {
                    const from = fromPicker.selectedDates[0];
                    const to = fp.selectedDates[0];
                    if (!from) return;
                    const end = to || from;
                    const d = dayElem.dateObj;
                    if (d > from && d < end) dayElem.classList.add("inRange");
                    if (d.toDateString() === from.toDateString()) dayElem.classList.add("startRange");
                    if (d.toDateString() === end.toDateString()) dayElem.classList.add("endRange");
                },
                onChange: function (selectedDates) {
                    const toDate = selectedDates[0];
                    const fromDate = fromPicker.selectedDates[0];
                    if (toDate && (!fromDate || toDate < fromDate)) {
                        fromPicker.setDate(toDate, false);
                        fromPicker.redraw();
                    }
                    fromPicker.redraw();
                    nhapHangTable.draw();
                },
                onReady: function (selectedDates, dateStr, fp) {
                    fp.calendarContainer.addEventListener("mouseover", function (e) {
                        const dayElem = e.target.closest(".flatpickr-day");
                        if (!dayElem || !fromPicker.selectedDates[0]) return;
                        applyRangeHighlight(fp.calendarContainer, fromPicker.selectedDates[0], dayElem.dateObj);
                    });
                    fp.calendarContainer.addEventListener("mouseleave", function () {
                        applyRangeHighlight(fp.calendarContainer, fromPicker.selectedDates[0], fp.selectedDates[0]);
                    });
                }
            });

            // Custom filter cho khoảng thời gian
            $.fn.dataTable.ext.search.push(function (settings, data, dataIndex) {
                if (settings.nTable.id !== 'nhaphang-table') {
                    return true;
                }

                let minStr = jQuery("#filter-from").val();
                let maxStr = jQuery("#filter-to").val();
                let tableDateTime = data[3]; // Cột thời gian tạo (index 3)

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

            // Xem chi tiết phiếu nhập
            $(document).on("click", ".btn-view-nhaphang", function () {
                const id = $(this).data("id");

                $.post("./nhap_hang/getDetail", { id: id }, function (res) {
                    if (!res.phieu) return;

                    const p = res.phieu;

                    $("#detail-mapn").val("PN-" + p.mapn);
                    $("#detail-tenadmin").val(p.tenadmin || "N/A");
                    $("#detail-tenncc").val(p.tenncc || "N/A");
                    $("#detail-thoigiantao").val(p.thoigiantao || "");

                    // Trạng thái
                    const ttMap = {
                        1: '<span class="badge bg-success">Hoàn tất</span>',
                        0: '<span class="badge bg-warning text-dark">Phiếu tạm</span>'
                    };
                    $("#detail-trangthai").html(ttMap[p.trangthai] || '<span class="badge bg-secondary">N/A</span>');

                    // Chi tiết sản phẩm
                    let rows = '';
                    let tongTien = 0;
                    res.chiTiet.forEach((ct, i) => {
                        const thanhtien = ct.soluong * ct.dongia;
                        tongTien += thanhtien;
                        rows += `
                <tr>
                    <td class="text-center">${i + 1}</td>
                   <td class="text-center">SP-${ct.masp}</td>
                    <td class="fw-semibold">${ct.tensp}</td>
                    <td class="text-center">${Number(ct.dongia).toLocaleString('vi-VN')} ₫</td>
                    <td class="text-center">${ct.soluong}</td>
                    <td class="text-center fw-semibold text-primary">${thanhtien.toLocaleString('vi-VN')} ₫</td>
                </tr>
            `;
                    });

                    if (rows === '') {
                        rows = '<tr><td colspan="6" class="text-center text-muted py-3">Không có sản phẩm</td></tr>';
                    }

                    $("#detail-chitiet-body").html(rows);
                    $("#detail-tongtien").text(tongTien.toLocaleString('vi-VN') + ' ₫');

                    $("#modal-chitiet-phieunhap").modal("show");
                }, 'json');
            });

            // Xử lý xóa phiếu nhập
            $(document).on("click", ".btn-delete-nhaphang", function (e) {
                e.preventDefault();
                let id = $(this).data("id");

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
                    text: "Phiếu nhập PN-" + id + " và toàn bộ chi tiết bên trong sẽ bị xoá vĩnh viễn!",
                    icon: "warning",
                    showCancelButton: !0,
                    confirmButtonText: "Vâng, xóa ngay!",
                    cancelButtonText: "Huỷ",
                    html: !1,
                    preConfirm: (e) =>
                        new Promise((resolve) => {
                            setTimeout(() => {
                                resolve();
                            }, 50);
                        }),
                }).then((t) => {
                    if (t.value == true) {
                        $.ajax({
                            type: "post",
                            url: "./nhap_hang/delete",
                            data: {
                                id: id,
                            },
                            dataType: "json",
                            success: function (response) {
                                if (response.success) {
                                    swalBlock.fire("Đã xoá!", "Phiếu nhập và các chi tiết liên quan đã được xóa sạch.", "success");

                                    nhapHangTable.ajax.reload(function () {
                                        let info = nhapHangTable.page.info();
                                        if (info.recordsDisplay > 0 && info.start >= info.recordsDisplay) {
                                            nhapHangTable.page('previous').draw('page');
                                        }
                                    }, false);
                                } else {
                                    swalBlock.fire("Lỗi!", "Không thể xoá phiếu nhập này khỏi cơ sở dữ liệu.", "error");
                                }
                            },
                            error: function () {
                                swalBlock.fire("Lỗi!", "Lỗi kết nối máy chủ. Vui lòng kiểm tra Route/Controller.", "error");
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
        }
    }.init()
);