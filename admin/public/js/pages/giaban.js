Dashmix.onLoad(() =>
    class {
        static initDataTables() {
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

            const table = jQuery('.js-dataTable-responsive').DataTable({
                pagingType: "full_numbers",
                pageLength: 7,
                dom: `
                    <'row justify-content-between'
                        <'col-lg justify-content-left d-flex ms-3'
                            <"#filter-button">
                        >
                        <'col-lg'
                            f
                        >
                    >
                    <'row mt-3 mb-3'
                        <"#filter-box-target.collapse">
                    >
                    <'row'<tip>>
                `,
                autoWidth: false,
                responsive: true,
                ajax: {
                    url: './products/getData',
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
                        data: 'gianhap',
                        render: function (data) {
                            let formattedNumber = new Intl.NumberFormat('vi-VN').format(data);
                            return `
                                <span class="badge bg-info-light text-info fs-6 fw-bold">${formattedNumber} đồng</span>
                            `
                        }
                    },
                    {
                        data: 'tyleloinhuan',
                        className: 'text-center',
                        render: function (data) {
                            return `
                                <span class="badge bg-info fw-bold">${data} %</span>
                            `
                        }
                    },
                    {
                        data: null,
                        render: function (data, type, row) {
                            let result = parseFloat(row.gianhap) * (1 + parseFloat(row.tyleloinhuan) / 100);
                            if (type == 'sort' || type == 'type')
                                return result
                            let formattedNumber = new Intl.NumberFormat('vi-VN').format(result);
                            return `
                                <span class="badge bg-warning-light text-warning fs-6 fw-bold">${formattedNumber} đồng</span>
                            `
                        }
                    },
                    {
                        data: null,
                        className: 'text-center',
                        orderable: false,
                        render: function (data, type, row) {
                            const modalId = `modal-block-${row.masp}`;
                            return `
                                <button type="button" class="m-0 btn btn-sm btn-outline-primary push" data-bs-toggle="modal" data-bs-target="#${modalId}"><i class="fa fa-fw fa-pen-to-square"></i></button>
                                <div class="modal fade" id="${modalId}" tabindex="-1" role="dialog" aria-labelledby="modal-block-fadein" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="block block-rounded block-themed block-transparent mb-0">
                                            <div class="block-header bg-primary-dark">
                                                <h3 class="block-title">Điều chỉnh giá</h3>
                                                <div class="block-options">
                                                <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
                                                    <i class="fa fa-fw fa-times"></i>
                                                </button>
                                                </div>
                                            </div>
                                            <div class="block-content">
                                                <div class="mb-3">
                                                    <label class="form-label text-start d-block" for="newloinhuan">Lợi nhuận</label>
                                                    <input type="number" class="form-control" name="newloinhuan" id="newloinhuan" data-product-id="${row.masp}" data-initial-value="${row.tyleloinhuan}" value="${row.tyleloinhuan}">
                                                </div>
                                            </div>
                                            <div class="block-content block-content-full text-end bg-body">
                                                <button type="button" class="btn btn-sm btn-alt-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-sm btn-primary updateLoiNhuan" data-bs-dismiss="modal">Done</button>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            `
                        }
                    },
                ]
            });

            jQuery('#filter-button').html(`
            <button type="button" class="btn btn-hero btn-outline-primary dropdown-toggle h-100" data-bs-toggle="collapse" data-bs-target="#filter-box-target">
                <i class="fa fa-filter me-2"></i>Bộ lọc
            </button>
        `);
            table.on('init', function () {
                let max_nhap = 0;
                const data = table.column(2).data().toArray();
                data.forEach(el => {
                    max_nhap = Math.max(el, max_nhap);
                });

                let max_profit = 0;
                const data1 = table.column(3).data().toArray();
                data1.forEach(el => {
                    max_profit = Math.max(el, max_profit);
                });

                jQuery('#filter-box-target').html(`
                <div class="ms-1 me-1 border rounded">
                    <div class="mt-4 ms-3 me-5">
                        <div class="row mb-4 mt-3">
                            <span class="col-form-label col-lg-1 pt-4">Giá nhập</span>
                            <div class="col-lg-11">
                                <input type="text" id="filter-gianhap" class="js-rangeslider" data-type="double" data-grid="true" data-prettify-separator="," data-min="0" data-max="${max_nhap}" data-step="20000" data-postfix=" đồng">                            
                            </div>
                        </div>

                        <div class="row mb-4 mt-3">
                            <span class="col-form-label col-lg-1 pt-4">Lợi nhuận</span>
                            <div class="col-lg-11">
                                <input type="text" id="filter-loinhuan" class="js-rangeslider" data-type="double" data-grid="true" data-prettify-separator="," data-min="0" data-max="${max_profit}" data-postfix="%">                            
                            </div>
                        </div>

                        <div class="row justify-content-end mb-4 mt-3">
                            <div class="col-auto">
                                <a id="reset-filter" href="#sp-table" class="btn btn-outline-danger me-2">
                                    <i class="fa fa-rotate-left me-2"></i>Đặt lại
                                </a>
                                <a id="apply-filter" href="#sp-table" class="btn btn-outline-info">
                                    <i class="fa fa-check me-2"></i>Áp dụng
                                </a>
                            </div>
                        </div>
                    </div>
                </div> 
            `);

                Dashmix.helpers("jq-rangeslider");

                $("#reset-filter").on('click', function () {
                    const slider1 = $("#filter-gianhap").data('ionRangeSlider');
                    slider1.reset();

                    const slider2 = $("#filter-loinhuan").data('ionRangeSlider');
                    slider2.reset();

                    $.fn.dataTable.ext.search = [];
                    table.draw();
                });

                $("#apply-filter").on('click', function () {
                    $.fn.dataTable.ext.search = [];

                    const min_nhap = $("#filter-gianhap").data("from"); //col 4
                    const max_nhap = $("#filter-gianhap").data("to");

                    const min_profit = $("#filter-loinhuan").data("from"); //col 5
                    const max_profit = $("#filter-loinhuan").data("to");

                    $.fn.dataTable.ext.search.push(function (settings, data, dataIndex) {
                        if (
                            (isNaN(min_nhap) && isNaN(max_nhap)) ||
                            (isNaN(min_nhap) && data[5] <= max_nhap) ||
                            (min_nhap <= data[2] && isNaN(max_nhap)) ||
                            (min_nhap <= data[2] && data[2] <= max_nhap) // Giá nhập
                        ) {
                            return true;
                        }
                        return false;
                    });

                    $.fn.dataTable.ext.search.push(function (settings, data, dataIndex) {
                        if (
                            (isNaN(min_profit) && isNaN(max_profit)) ||
                            (isNaN(min_profit) && data[6] <= max_profit) ||
                            (min_profit <= data[3] && isNaN(max_profit)) ||
                            (min_profit <= data[3] && data[3] <= max_profit) // Lợi nhuận
                        ) {
                            return true;
                        }
                        return false;
                    });

                    table.draw();
                });

                $(document).on('click', '.updateLoiNhuan', function () {
                    const $button = $(this);
                    const $modal = $button.closest('.modal-content');
                    const $input = $modal.find('input[name="newloinhuan"]');

                    const productId = $input.data('product-id');
                    const initialValue = $input.data('initial-value');
                    const newValue = $input.val();

                    if (newValue == initialValue) {
                        console.log("No changes detected for SP-" + productId);
                        return;
                    }

                    // If we reached here, the value HAS changed
                    $.ajax({
                        url: './gia_ban/updateLoiNhuan',
                        type: 'POST',
                        data: {
                            productId: productId,
                            newValue: newValue,
                        },
                        success: function (response) {
                            if (response.status == 'success') {
                                console.log('response');
                                table.ajax.reload(null, false);
                            }
                            console.log(response);
                        }
                    })
                });
            });
        }

        static init() {
            this.initDataTables();
        }
    }.init()
)