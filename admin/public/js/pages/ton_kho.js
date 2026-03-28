let saphet_value = parseInt(localStorage.getItem('saphet')) ?? 0;
Dashmix.onLoad(() =>
    class {
        static initDataTables() {
            $('#saphet').val(saphet_value);
            $(document).on('change', '#saphet', function() {
                if ($(this).val() != saphet_value)
                { 
                    localStorage.setItem('saphet', $(this).val())
                    saphet_value = $(this).val();
                }
            });

            $(document).on('keydown', '#saphet', function(e) {
                if (e.which == 13)
                { 
                    $(this).blur();
                }
            });

            // Override a few default classes
            jQuery.extend(jQuery.fn.dataTable.ext.classes, {
                sWrapper: "dataTables_wrapper dt-bootstrap5",
                sFilterInput: "form-control",
                sLengthSelect: "form-select"
            });

            // Override a few defaults
            jQuery.extend(true, jQuery.fn.dataTable.defaults, {
                language: {
                    lengthMenu: "_MENU_",
                    search: "_INPUT_",
                    searchPlaceholder: "Search..",
                    info: "Page <strong>_PAGE_</strong> of <strong>_PAGES_</strong>",
                    paginate: {
                        first: '<i class="fa fa-angle-double-left"></i>',
                        previous: '<i class="fa fa-angle-left"></i>',
                        next: '<i class="fa fa-angle-right"></i>',
                        last: '<i class="fa fa-angle-double-right"></i>'
                    }
                }
            });

            // Override buttons default classes
            jQuery.extend(true, jQuery.fn.DataTable.Buttons.defaults, {
                dom: {
                    button: {
                        className: 'btn btn-sm btn-primary'
                    },
                }
            });

            // Init full extra DataTable
            const table = jQuery('.js-dataTable-responsive').DataTable({
                pagingType: "full_numbers",
                pageLength: 7,
                dom: `
                    <'row'
                        <'col-sm-12 col-md-2'
                            <"#status-filter">
                        >
                        <'col-sm-12 col-md-6'
                            <"#filter-date">
                        >
                        <'col-sm-12 col-md-4'
                            f
                        >
                    >
                    <'row'<tip>>
                `,
                autoWidth: false,
                responsive: true,
                ajax: {
                    url: './ton_kho/getAllStock',
                    dataSrc: ''
                },
                order: [[1, 'asc']],
                columns: [
                    {
                        data: 'masp',
                        className: 'text-center',
                        type: 'num',
                        render: function (data, type) {
                            if (type === 'sort' || type === 'type') {
                                return parseInt(data);
                            }
                            return `
                                <a class="fw-semibold">
                                    <strong>SP-${data}</strong>
                                </a>
                            `;
                        }
                    },
                    {
                        data: 'tensp',
                        render: function (data) {
                            return `
                            <span class="fw-semibold">
                                <strong>${data}</strong>
                            </span>
                            `;
                        }
                    },
                    {
                        data: 'tenloai'
                    },
                    {
                        data: 'tong_soluong',
                        className: 'text-center'
                    },
                    {
                        data: 'tong_soluong',
                        className: 'text-center',
                        render: function(data) {
                            if (parseInt(data) == 0)
                                return `Hết hàng`
                            else if (parseInt(data) < saphet_value)
                                return `Sắp hết`
                            else
                                return `Còn hàng`
                        }
                    },
                    {
                        data: 'masp',
                        className: 'text-center',
                        orderable: false,
                        render: function (data, type, row) {
                            return `
                                <button type="button" class="detail btn btn-sm btn-alt-secondary" data-id="${data}" data-bs-toggle="modal" data-bs-target="#modal-${data}" title="Chi tiết">
                                    <i class="fa fa-fw fa-bars"></i>
                                </button>
                                <div class="modal" id="modal-${data}" tabindex="-1" role="dialog" aria-labelledby="modal-default-vcenter" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <div class="block-content pt-2 pb-3">
                                                    <div class="row text-start">
                                                        <h4 class="modal-title col-lg-10">Chi tiết số lượng tồn sản phẩm</h4>
                                                        <button type="button col-lg-2" class="mt-1 btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="row text-start mt-1">
                                                        <h7 class="m-0">Mã sản phẩm: <strong class="text-primary">SP-${data}</strong></h7>
                                                        <h7 class="m-0">Tên sản phẩm: <strong class="text-primary">${row.tensp}</strong></h7>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-body p-0">
                                                <div class="block-content p-1">
                                                    <table id="sp-table-${data}" class="table table-vcenter">
                                                        <thead>
                                                        <tr>                                                        
                                                            <th>Size</th>
                                                            <th>Số lượng</th>
                                                            <th>Trạng thái</th>
                                                        </tr>
                                                        </thead>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="modal-footer border-top-0">
                                                <button type="button" class="btn btn-sm btn-alt-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-sm btn-primary" data-bs-dismiss="modal">Done</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            `
                        }
                    }
                ]
            });

            $(document).on('shown.bs.modal', '.modal', function (e) {
                const modal = $(e.target);
                const productId = modal.attr('id').replace('modal-', ''); // Extracts the ID
                const tableId = `#sp-table-${productId}`;

                if (!$.fn.DataTable.isDataTable(tableId)) {
                    $(tableId).DataTable({
                        ajax: {
                            url: `./ton_kho/getStockById`, 
                            dataSrc: '',
                            data: {
                            id: productId
                            },
                        },
                        columns: [
                            { data: 'tensize', className: 'text-center' },
                            { data: 'soluong', className: 'text-center' },
                            { 
                                data: 'soluong', 
                                className: 'text-center',
                                render: function(data) {
                                    if (parseInt(data) == 0)
                                        return `Hết hàng`
                                    else if (parseInt(data) < saphet_value)
                                        return `Sắp hết`
                                    else
                                        return `Còn hàng`
                                }
                            }
                        ],
                        paging: false,
                        searching: false,
                        info: false,
                        autoWidth: false,
                        responsive: true,
                        language: {
                            emptyTable: "Không có dữ liệu tồn kho"
                        }
                    });
                } else {
                    // 3. If user opens the same modal again, just refresh the data
                    $(tableId).DataTable().ajax.reload();
                }
            });

            jQuery("#status-filter").html(`
                <select class="form-select" id="filter-status">
                    <option value="">Tất cả trạng thái</option>
                    <option value="0">Còn hàng</option>
                    <option value="1">Sắp hết</option>
                    <option value="2">Hết hàng</option>
                </select>
            `);

            $("#status-filter").children().css('cursor', 'pointer');

            $(document).on('change', '#filter-status', function() {
                table.draw();
            });
            
            $("#filter-date").html(`
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
                    <button class="btn btn-light" type="button" id="btn-reset-filter">
                        <i class="fa fa-rotate-left"></i>
                    </button>
                </div>
            `);

            $(document).on('click', '#btn-reset-filter', function() {
                fromPicker.clear();
                toPicker.clear();
                
                toPicker.set('minDate', null);
                fromPicker.set('maxDate', null);

                $('#filter-status').val('');
                table.draw(); 
            });

            
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
                    // Nằm giữa Từ và Đến thì thêm class inRange
                    // class inRange, startRange, endRange có sẵn của Flatpickr
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
                    table.draw();
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
                    table.draw();
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

            $.fn.dataTable.ext.search.push(function (settings, data, dataIndex) {
                if (settings.nTable.id !== 'table' && !$(settings.nTable).hasClass('js-dataTable-responsive')) {
                    return true;
                }

                const filterVal = $('#filter-status').val();
                if (filterVal === "") return true;

                const stockCount = parseInt(data[2]) || 0;
                
                if (filterVal === "0") {
                    return stockCount >= saphet_value;
                } else if (filterVal === "1") {
                    return stockCount > 0 && stockCount < saphet_value;
                } else if (filterVal === "2") {
                    return stockCount === 0;
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
        }

        static init() {
            this.initDataTables();
        }
    }.init()
);