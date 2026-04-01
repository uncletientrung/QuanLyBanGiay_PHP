Dashmix.onLoad(() =>
    class {
        static initDataTables() {
            jQuery.extend(jQuery.fn.dataTable.ext.classes, {
                sWrapper: "dataTables_wrapper dt-bootstrap5",
                sFilterInput: "form-control",
            });

            const table = jQuery("#table-thongke").DataTable({
                pagingType: "full_numbers",
                responsive: true,
                order: [[0, 'desc']],
                pageLength: 8,
                lengthChange: false,
                autoWidth: false,
                dom: "<'row'<'col-sm-12 col-md-3'><'col-sm-12 col-md-6'<'#date-filter-box'>><'col-sm-12 col-md-3'f>><'row'<'col-sm-12'tr>><'row mt-3'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
                ajax: {
                    url: './ton_kho/getThongKeNhapXuat',
                    data: function (d) {
                        d.from = jQuery("#thongke-filter-from").val();
                        d.to = jQuery("#thongke-filter-to").val();
                    },
                    dataSrc: function (json) {
                        // console.log("Thống kê Nhập - Xuất:", {
                        //     from: json._debug.parsed_from,
                        //     to: json._debug.parsed_to,
                        //     total_products: json._debug.total_products,
                        //     products_with_import: json.data.filter(r => r.tong_nhap > 0).length,
                        //     products_with_export: json.data.filter(r => r.tong_xuat > 0).length
                        // });
                        return json.data;
                    }
                },
                columns: [
                    {
                        data: 'masp',
                        className: 'text-center',
                        type: 'num',
                        render: function (data, type, row) {
                            if (type === 'sort' || type === 'type') {
                                return parseInt(data);
                            }
                            return `<span class="fw-bold">SP-${data}</span>`;
                        }
                    },
                    {
                        data: 'tensp',
                        className: 'fw-semibold',
                        render: (data) => `<div class="text-dark">${data}</div>`
                    },
                    {
                        data: 'tong_nhap',
                        className: 'text-center',
                        render: (data) => `<span class="badge bg-success fs-base">${data || 0}</span>`
                    },
                    {
                        data: 'tong_xuat',
                        className: 'text-center',
                        render: (data) => `<span class="badge bg-danger fs-base">${data || 0}</span>`
                    },
                    {
                        data: null,
                        className: 'text-center',
                        orderable: false,
                        render: (data) => `
                            <button type="button" class="btn btn-sm btn-alt-info btn-chitiet-thongke"
                                data-masp="${data.masp}"
                                data-tensp="${data.tensp}"
                                title="Xem chi tiết">
                                <i class="fa fa-fw fa-eye"></i>
                            </button>
                        `
                    }
                ]
            });

            $(document).on('click', '.btn-chitiet-thongke', function () {
                const masp = $(this).data('masp');
                const tensp = $(this).data('tensp');
                const from = jQuery("#thongke-filter-from").val();
                const to = jQuery("#thongke-filter-to").val();

                $('#modal-thongke-tensp').text('SP-' + masp + ' — ' + tensp);

                $('#tab-chitiet-nhap-btn').tab('show');
                $('#chitiet-nhap-body').html('<tr><td colspan="6" class="text-center text-muted py-3"><i class="fa fa-spinner fa-spin me-1"></i>Đang tải...<\/td>\/<tr>');
                $('#chitiet-xuat-body').html('<tr><td colspan="5" class="text-center text-muted py-3"><i class="fa fa-spinner fa-spin me-1"></i>Đang tải...<\/td>\/<tr>');

                $('#modal-thongke-chitiet').modal('show');

                $.ajax({
                    url: './ton_kho/getChiTietThongKe',
                    method: 'GET',
                    data: { masp: masp, from: from, to: to },
                    dataType: 'json',
                    success: function (res) {
                        if (!res.success) return;

                        const nhap = res.data.phieu_nhap;
                        let tongNhap = 0;
                        let rowsNhap = '';
                        nhap.forEach(function (r) {
                            tongNhap += parseInt(r.soluong);
                            rowsNhap += `
                            <tr>
                                <td class="text-center fw-bold">PN-${r.mapn}<\/td>
                                <td class="text-center">${r.thoigiantao}<\/td>
                                <td class="text-center">${r.tenadmin || 'N/A'}<\/td>
                                <td class="text-center">${r.tenncc || 'N/A'}<\/td>
                                <td class="text-center"><span class="badge bg-success">${r.soluong}<\/span><\/td>
                                <td class="text-center">${Number(r.dongia).toLocaleString('vi-VN')} ₫<\/td>
                            <\/tr>`;
                        });
                        if (!rowsNhap) rowsNhap = '<tr><td colspan="6" class="text-center text-muted py-3">Không có phiếu nhập<\/td><\/tr>';
                        $('#chitiet-nhap-body').html(rowsNhap);
                        $('#chitiet-tong-nhap').text(tongNhap);
                        $('#badge-tong-nhap').text(nhap.length);

                        const xuat = res.data.don_hang;
                        let tongXuat = 0;
                        let rowsXuat = '';
                        xuat.forEach(function (r) {
                            tongXuat += parseInt(r.soluong);
                            rowsXuat += `
                            <tr>
                                <td class="text-center fw-bold">DH-${r.madh}<\/td>
                                <td class="text-center">${r.thoigiantao}<\/td>
                                <td class="text-center">${r.tenkhachhang || 'N/A'}<\/td>
                                <td class="text-center"><span class="badge bg-danger">${r.soluong}<\/span><\/td>
                                <td class="text-center">${Number(r.dongia).toLocaleString('vi-VN')} ₫<\/td>
                            <\/tr>`;
                        });
                        if (!rowsXuat) rowsXuat = '<tr><td colspan="5" class="text-center text-muted py-3">Không có đơn hàng<\/td><\/tr>';
                        $('#chitiet-xuat-body').html(rowsXuat);
                        $('#chitiet-tong-xuat').text(tongXuat);
                        $('#badge-tong-xuat').text(xuat.length);
                    },
                    error: function () {
                        $('#chitiet-nhap-body').html('<tr><td colspan="6" class="text-center text-danger">Lỗi tải dữ liệu<\/td><\/tr>');
                        $('#chitiet-xuat-body').html('<tr><td colspan="5" class="text-center text-danger">Lỗi tải dữ liệu<\/td><\/tr>');
                    }
                });
            });

            const dateRangeHtml = `
                <div class="input-group">
                    <span class="input-group-text input-group-text-alt"><i class="fa-solid fa-calendar"><\/i><\/span>
                    <input type="text" class="form-control form-control-alt text-center"
                           id="thongke-filter-from" placeholder="Từ" readonly>
                    <span class="input-group-text input-group-text-alt"><i class="fa fa-arrow-right"><\/i><\/span>
                    <input type="text" class="form-control form-control-alt text-center"
                           id="thongke-filter-to" placeholder="Đến" readonly>
                    <span class="input-group-text input-group-text-alt"><i class="fa-solid fa-calendar"><\/i><\/span>
                    <button class="btn btn-light" type="button" id="btn-reset-filter">
                        <i class="fa fa-rotate-left"><\/i>
                    </button>
                <\/div>
            `;

            let fromPicker, toPicker;
            let fpInited = false;

            function applyRangeHighlight(calendarContainer, fromDate, toDate) {
                if (!calendarContainer || !fromDate) return;
                const end = toDate || fromDate;
                calendarContainer.querySelectorAll(".flatpickr-day").forEach(d => {
                    d.classList.remove("inRange", "startRange", "endRange");
                    const dd = d.dateObj;
                    if (!dd) return;
                    if (dd > fromDate && dd < end) d.classList.add("inRange");
                    if (dd.toDateString() === fromDate.toDateString()) d.classList.add("startRange");
                    if (dd.toDateString() === end.toDateString()) d.classList.add("endRange");
                });
            }

            function initFlatpickr() {
                if (fpInited) return;

                jQuery("#date-filter-box").html(dateRangeHtml);

                const baseFpConfig = {
                    enableTime: true,
                    time_24hr: true,
                    dateFormat: "d-m-Y H:i",
                    allowInput: false
                };

                fromPicker = flatpickr("#thongke-filter-from", {
                    ...baseFpConfig,
                    onChange: function (selectedDates) {
                        if (!fpInited) return;
                        if (selectedDates[0] && toPicker) {
                            toPicker.set('minDate', selectedDates[0]);
                        }
                        table.ajax.reload();
                    }
                });

                toPicker = flatpickr("#thongke-filter-to", {
                    ...baseFpConfig,
                    onChange: function () {
                        if (!fpInited) return;
                        table.ajax.reload();
                    },
                    onReady: function (sel, str, fp) {
                        fp.calendarContainer.addEventListener("mouseover", function (e) {
                            if (!fpInited) return;
                            const day = e.target.closest(".flatpickr-day");
                            if (!day || fromPicker.selectedDates.length === 0) return;
                            applyRangeHighlight(fp.calendarContainer, fromPicker.selectedDates[0], day.dateObj);
                        });
                        fp.calendarContainer.addEventListener("mouseleave", function () {
                            if (!fpInited) return;
                            if (fromPicker.selectedDates.length === 0) return;
                            applyRangeHighlight(fp.calendarContainer, fromPicker.selectedDates[0],
                                fp.selectedDates.length > 0 ? fp.selectedDates[0] : null);
                        });
                    }
                });

                fpInited = true;
            }

            $('#btab-thongke').on('shown.bs.tab', function () {
                table.columns.adjust().responsive.recalc();
                setTimeout(initFlatpickr, 100);
            });

            $(document).on('click', '#btn-reset-filter', function () {
                if (!fromPicker || !toPicker) return;
                fromPicker.clear();
                toPicker.clear();
                toPicker.set('minDate', null);
                table.ajax.reload();
            });
        }

        static init() {
            this.initDataTables();
        }
    }.init()
);