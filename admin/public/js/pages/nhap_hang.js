Dashmix.onLoad(() =>
    class {
        static initDataTables() {
            jQuery.extend(jQuery.fn.dataTable.ext.classes, {
                sWrapper: "dataTables_wrapper dt-bootstrap5",
                sFilterInput: "form-control",
            });

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

            const nhapHangTable = jQuery("#nhaphang-table").DataTable({
                pagingType: "full_numbers",
                autoWidth: !1,
                responsive: !0,
                order: [[0, 'desc']],
                dom: "<'row'<'col-sm-12 col-md-6'<'#status-filter-place'>><'col-sm-12 col-md-6'f>><'row'<'col-sm-12'tr>><'row mt-3'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
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
                        render: function (data) {
                            if (!data) return '';
                            let d = data.split(' ');
                            let date = d[0].split('-').reverse().join('-');
                            return `<div class="fw-bold text-primary">${date}</div><div class="text-muted fs-sm">${d[1] || ''}</div>`;
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
                        render: function (data) {
                            let status = data == 1 ? { t: "Hoàn tất", c: "bg-success" } : { t: "Chưa xử lý", c: "bg-warning" };
                            return `<span class="badge ${status.c}">${status.t}</span>`;
                        }
                    },
                    {
                        data: 'mapn',
                        className: 'text-center',
                        orderable: false,
                        render: function (data) {
                            return `
                                <a class="btn btn-sm btn-alt-secondary" title="Xem chi tiết">
                                    <i class="fa fa-fw fa-eye text-info"></i>
                                </a>
                                <button type="button" class="btn btn-sm btn-alt-secondary btn-delete-nhaphang" data-id="${data}" title="Xoá">
                                    <i class="fa fa-fw fa-times text-danger"></i>
                                </button>
                            `;
                        }
                    }
                ]
            });

            jQuery("#status-filter-place").html(`
                <select class="form-select" id="filter-status" style="width: 200px;">
                    <option value="">Tất cả trạng thái</option>
                    <option value="Hoàn tất">Hoàn tất</option>
                    <option value="Chưa xử lý">Chưa xử lý</option>
                </select>
            `);

            $('#filter-status').on('change', function () {
                nhapHangTable.column(5).search($(this).val()).draw();
            });

            $(document).on("click", ".btn-delete-nhaphang", function () {
                let id = $(this).data("id");
                Swal.fire({
                    title: "Xác nhận xoá?",
                    text: "Phiếu nhập PN-" + id + " sẽ bị xoá vĩnh viễn!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Xoá ngay",
                    customClass: { confirmButton: "btn btn-danger m-1", cancelButton: "btn btn-secondary m-1" }
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.post("./nhap_hang/delete", { id: id }, function (res) {
                            if (res.success) {
                                Dashmix.helpers('jq-notify', { type: 'success', message: 'Đã xoá phiếu nhập!' });
                                nhapHangTable.ajax.reload();
                            }
                        }, 'json');
                    }
                });
            });
        }

        static init() {
            this.initDataTables();
        }
    }.init()
);