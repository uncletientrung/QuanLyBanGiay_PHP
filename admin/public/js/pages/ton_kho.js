let saphet_value = parseInt(localStorage.getItem('saphet')) ?? 0;
Dashmix.onLoad(() =>
    class {
        static initTongQuanTab() {
            $('#saphet').val(saphet_value);


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
                    searchPlaceholder: "Search...",
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
            const table = jQuery('#table').DataTable({
                pagingType: "full_numbers",
                pageLength: 7,
                dom: `
                    <'row'
                        <'w-auto pe-0'
                            <"#config">
                        >
                        <'col-sm-12 col-lg-2'
                            <"#status-filter">
                        >
                        <'col-sm-12 col-lg-4 p-0'
                            <"#canhbaohethang">
                        >
                        <'col-sm-12 col-lg'
                            f
                        >
                    >
                    <'row mt-3'<tip>>
                `,
                autoWidth: false,
                responsive: true,
                ajax: {
                    url: './ton_kho/getAllStock',
                    dataSrc: ''
                },
                language: {
                    emptyTable: "Không tìm thấy sản phẩm",
                    zeroRecords: "Không có sản phẩm thỏa bộ lọc"
                },
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
                        className: 'text-center',
                        render: function(data) {
                            return `<strong>${data}</strong>`
                        }
                    },
                    {
                        data: 'tong_soluong',
                        className: 'text-center',
                        render: function (data) {
                            if (parseInt(data) == 0)
                                return `<span class="badge bg-danger-light text-danger fs-6 w-50">Hết hàng</span>`
                            else if (parseInt(data) < saphet_value)
                                return `<span class="badge bg-warning-light text-warning fs-6 w-50">Sắp hết</span>`
                            else
                                return `<span class="badge bg-info-light text-info fs-6 w-50">Còn hàng</span>`;
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
                                <div class="modal fade" id="modal-${data}" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-lg">
                                        <div class="modal-content shadow-lg border-0">
                                            <div class="modal-header bg-light border-bottom-0 pb-0">
                                                <div class="w-100">
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <h5 class="modal-title fw-bold text-dark">
                                                            <i class="fa fa-boxes-stacked me-2 text-primary"></i>Chi tiết số lượng tồn
                                                        </h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="mt-3 mb-3 p-3 bg-white rounded border-start border-4 border-primary shadow-sm">
                                                        <div class="row">
                                                            <div class="col-sm-4">
                                                                <small class="text-muted d-block text-uppercase fw-semibold" style="font-size: 0.7rem;">Mã sản phẩm</small>
                                                                <span class="fw-bold">SP-${data}</span>
                                                            </div>
                                                            <div class="col-sm-8">
                                                                <small class="text-muted d-block text-uppercase fw-semibold" style="font-size: 0.7rem;">Tên sản phẩm</small>
                                                                <span class="fw-bold text-primary">${row.tensp}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="modal-body p-0">
                                                <div class="table-responsive">
                                                    <table id="sp-table-${data}" class="table table-hover table-vcenter mb-0">
                                                        <thead class="table-light">
                                                            <tr>
                                                                <th class="ps-4" style="width: 30%;">Size</th>
                                                                <th class="text-center" style="width: 30%;">Số lượng</th>
                                                                <th class="pe-4 text-end">Trạng thái</th>
                                                            </tr>
                                                        </thead>
                                                        </table>
                                                </div>
                                            </div>

                                            <div class="modal-footer bg-light border-top-0">
                                                <button type="button" class="btn btn-secondary px-4" data-bs-dismiss="modal">Đóng</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            `
                        }
                    }
                ]
            });

            $("#config").html(`
                <button type="button" class="btn btn-outline-primary dropdown-toggle" id="config-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-gear"></i>
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdown-dropleft-outline-dark">
                    <div class="block-content p-2">
                        <label for="saphet">Sản phẩm sắp hết hàng khi dưới:</label>
                        <input type="number" class="mt-3 form-control" id="saphet" name="saphet" value="${saphet_value}" placeholder="Nhập số lượng">
                    </div>
                </div>
            `);

            $("#canhbaohethang").html(`
                <div class="input-group">
                    <span class="input-group-text bg-light pe-none pe-3">Nhập số lượng hàng muốn xem:</span>
                    <input type="number" id="canhbao-input" class="form-control" placeholder="...">
                    <button type="button" id="reset-canhbao" class="btn btn-outline-secondary"><i class="fa fa-rotate-left"></i></button>
                </div>
            `);

            let activeFilter = 'none';
            
            $("#canhbaohethang").on('click', '#reset-canhbao', function (e) {
                activeFilter = 'none';
                $("#canhbao-input").val('');
                table.draw();
            });

            $("#canhbaohethang").on('input', '#canhbao-input', function (e) {
                activeFilter = 'warning';
                $("#filter-status").val('');
                table.draw();
            });

            $("#canhbaohethang").on('keydown', '#canhbao-input', function (e) {
                if (e.key === 'Enter') {
                    $(this).blur();
                }
            });

            $.fn.dataTable.ext.search.push(function(settings, data, dataIndex) {
                const stockCount = parseInt(data[3]) || 0;
                if (activeFilter === 'warning') {
                    const warningLimit = parseInt($("#canhbao-input").val()) || 0;
                    if (warningLimit === 0) return true;
                    return stockCount <= warningLimit;
                }

                if (activeFilter === 'status') {
                    const filterVal = $('#filter-status').val();
                    if (filterVal === "") return true;
                    
                    if (filterVal === "0") return stockCount > saphet_value;
                    if (filterVal === "1") return stockCount > 0 && stockCount <= saphet_value;
                    if (filterVal === "2") return stockCount === 0;
                }

                return true;
            });

            $(document).on('change', '#saphet', function() {
                if ($(this).val() != saphet_value)
                { 
                    localStorage.setItem('saphet', $(this).val())
                    saphet_value = $(this).val();
                    table.ajax.reload(null, false);
                    Dashmix.helpers('jq-notify', { 
                        type: 'success', 
                        icon: 'fa fa-check me-1', 
                        message: `Sản phẩm sẽ được đánh dấu sắp hết khi có số lượng dưới ${saphet_value}` 
                    });
                }
            });

            $(document).on('keydown', '#saphet', function (e) {
                if (e.which == 13) {
                    $(this).blur();
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
                activeFilter = 'status';
                $("#canhbao-input").val('');
                table.draw();
            });

            $(document).on('shown.bs.modal', '.modal', function (e) {
                const modal = $(e.target);
                const productId = modal.attr('id').replace('modal-', '');
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
                        dom: 'tip',
                        columns: [
                            { data: 'tensize', className: 'text-center' },
                            { data: 'soluong', className: 'text-center' },
                            {
                                data: 'soluong',
                                className: 'text-center',
                                render: function (data) {
                                    if (parseInt(data) == 0)
                                        return `<span class="badge bg-red">Hết hàng</span>`
                                    else if (parseInt(data) < saphet_value)
                                        return `<span class="badge bg-warning">Sắp hết</span>`
                                    else
                                        return `<span class="badge bg-info">Còn hàng</span>`
                                }
                            }
                        ],
                        paging: true,
                        pageLength: 5,
                        pagingType: 'simple_numbers',
                        searching: false,
                        info: false,
                        autoWidth: false,
                        responsive: true,
                        language: {
                            emptyTable: "Không có dữ liệu tồn kho"
                        }
                    });
                } else {
                    $(tableId).DataTable().ajax.reload();
                }
            });
        }

        static initTraCuuTab(){
            let hasId = false;
            let dateStr = '';
            let prodId = '';
            const picker = flatpickr("#datepicker-wrap", {
            wrap: true,
            dateFormat: "Y-m-d", // This is what .val() will return
            altFormat: "d/m/Y",  // This is what the user sees
            altInput: true,
            allowInput: false,
            onReady: function(selectedDates, dateStr, instance) {
                $(instance.altInput).css('cursor', 'pointer');
            }
            });
            
            $("#select-tracuu").select2({
                placeholder: "Chọn sản phẩm tra cứu",
                allowClear: true,
                width: '100%' // Crucial for Bootstrap grids
            });

            $.getJSON('./products/getIdAndName', function(data) {
                $('.select2').select2({
                    placeholder: 'Chọn sản phẩm...',
                    width: '100%',
                    data: data 
                });
            });

            const nhapTable = $('#nhap-tracuu-table').DataTable({
                dom: 'ftp',
                paging: true,
                pageLength: 5,
                pagingType: 'full_numbers',
                autoWidth: false,
                order: [[0, 'desc']],
                info: false,
                language: {
                    emptyTable: "Không có dữ liệu nhập cho sản phẩm này"
                },
                ajax: {
                    url: './ton_kho/getList',
                    type: 'GET',
                    data: function (d) {
                        d.id = $('#select-tracuu').val();
                        d.date = $('#datepicker-wrap input').val();
                        d.table = 'nhap';
                    },
                    beforeSend: function(jqXHR, settings) {
                        if (!hasId) {
                            jqXHR.abort();
                            return false;
                        }
                    },
                    dataType: 'json',
                    dataSrc: ""
                },
                    columns: [
                        {
                            data: 'mapn',
                            className: 'text-center',
                            render: function(data, type, row) {
                                if (type === 'display') {
                                return `<strong class="text-primary">PN-${data}</strong>`;
                                }
                                return data;
                            }
                        },
                        {
                            data: 'thoigiantao',
                        },
                        {
                            data: 'soluong',
                            className: 'text-center'
                        }
                    ],
                footerCallback: function (row, data, start, end, display) {
                    var api = this.api();

                    var intVal = function (i) {
                        return typeof i === 'string' ?
                            i.replace(/[\$,]/g, '') * 1 :
                            typeof i === 'number' ?
                                i : 0;
                    };

                    var total = api
                        .column(2)
                        .data()
                        .reduce(function (a, b) {
                            return intVal(a) + intVal(b);
                        }, 0);

                    $(api.column(2).footer()).html(total);
                },
            });

            const xuatTable = $('#xuat-tracuu-table').DataTable({
                dom: 'ftp',
                paging: true,
                pageLength: 5,
                pagingType: 'full_numbers',
                autoWidth: false,
                order: [[0, 'desc']],
                info: false,
                language: {
                    emptyTable: "Không có dữ liệu xuất cho sản phẩm này"
                },
                ajax: {
                    url: './ton_kho/getList',
                    type: 'GET',
                    data: function (d) {
                        d.id = $('#select-tracuu').val();
                        d.date = $('#datepicker-wrap input').val();
                        d.table = 'xuat';
                    },
                    beforeSend: function(jqXHR, settings) {
                        if (!hasId) {
                            jqXHR.abort();
                            return false;
                        }
                    },
                    dataType: 'json',
                    dataSrc: ""
                },
                columns: [
                    {
                        data: 'madh',
                        className: 'text-center',
                        render: function(data, type, row) {
                            if (type === 'display') {
                            return `<strong class="text-primary">DH-${data}</strong>`
                            }
                            return data;
                        }
                    },
                    {
                        data: 'thoigiantao',
                    },
                    {
                        data: 'soluong',
                        className: 'text-center'
                    }
                ],
                footerCallback: function (row, data, start, end, display) {
                    var api = this.api();

                    var intVal = function (i) {
                        return typeof i === 'string' ?
                            i.replace(/[\$,]/g, '') * 1 :
                            typeof i === 'number' ?
                                i : 0;
                    };

                    var total = api
                        .column(2)
                        .data()
                        .reduce(function (a, b) {
                            return intVal(a) + intVal(b);
                        }, 0);

                    $(api.column(2).footer()).html(total);
                },
            });

            $("#tracuu-btn").on('click', function() {
                dateStr = $('#datepicker-wrap input').val();
                prodId= $('#select-tracuu').val();
                let prodName = $('#select-tracuu option:selected').text().trim();
                let message = "";
                if (!dateStr && !prodId) {
                    message = "Vui lòng chọn ngày và sản phẩm.";
                } else if (!dateStr) {
                    message = "Vui lòng chọn ngày tra cứu.";
                } else if (!prodId) {
                    message = "Vui lòng chọn sản phẩm.";
                }

                if (message !== "") {
                    Swal.fire('Thông báo', message, 'info');
                    return;
                }

                hasId = true;
                $.ajax({
                    url: './ton_kho/getTotalStockByDateAndId',
                    type: 'GET',
                    data: {
                        id: prodId, 
                        date: dateStr 
                    },
                    dataType: 'json',
                    success: function(response) {
                        $("#tracuu-status-banner").addClass("visually-hidden");
                        $("#thongtin-tracuu").removeClass('visually-hidden');
                        $("#ma-tracuu").text("SP-" + prodId);
                        $("#ten-tracuu").text(prodName);
                        $("#slnhap-tracuu").html('<i class="fa fa-arrow-down me-1"></i> ' + response.tongnhap);
                        $("#slxuat-tracuu").html('<i class="fa fa-arrow-up me-1"></i> ' + response.tongxuat);
                        $("#ton-tracuu").text(response.tongsl);
                        
                        nhapTable.ajax.reload();
                        xuatTable.ajax.reload();
                    },
                });
            });
        }

        static init() {
            this.initTongQuanTab();
            this.initTraCuuTab();
        }
    }.init()
);