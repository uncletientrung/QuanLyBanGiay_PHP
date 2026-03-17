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

            
            // Init full extra DataTable
            jQuery('.js-dataTable-responsive').DataTable({
                pagingType: "full_numbers",
                pageLength: 7,
                dom: '<ftip>',
                autoWidth: false,
                responsive: true,
                ajax: {
                    url: './products/getData',
                    dataSrc: ''
                },
                columns: [
                    {
                        data:'masp',
                        className: 'text-center',
                        type:'num',
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
                        data:'tensp',
                        render: function(data) {
                            return `
                            <span class="fw-semibold">
                                <strong>${data}</strong>
                            </span>
                            `;
                        }
                    },
                    {
                        data:'tenloai',
                    },
                    {
                        data:'gioitinh',
                        className:'text-center',
                        render: function(data)
                        { 
                            let gender;
                            if (data == 1)
                                gender = "Nam";
                            else
                                gender = "Nữ"
                            return `
                                <a>${gender}</a>
                            `
                        }
                    },
                    {
                        data:'gianhap',
                        render: DataTable.render.number(null, null, null, null, ' đồng')
                    },
                    {
                        data:'tyleloinhuan',
                        className:'text-center'
                    },
                    {
                        data:'tenhang',
                    },
                    {
                        data:'tenmau',
                    },
                    {
                        data:'trangthai',
                        className:'text-center',
                        render: function(data) {
                            let status;
                            let bgcolor;
                            if (data == 0) {
                                status = "Ngừng bán";
                                bgcolor = "bg-danger";
                            }
                            else {
                                status = "Đang kinh doanh"
                                bgcolor = "bg-success";
                            }
                            return `
                                <span class="badge ${bgcolor}" style="width: 100%">${status}</span>
                                `;
                        }
                    },
                    {
                        data: 'masp',
                        className:'text-center',
                        render: function(data)
                        { 
                            return `
                                    <a type="button" class="btn btn-sm btn-alt-secondary" href="./products/${data}" title="Xem mô tả sản phẩm">
                                        <i class="fa fa-fw fa-bars text-primary-darker"></i>
                                    </a>
                                    <button type="button" class="btn btn-sm btn-alt-secondary" data-id="${data}" title="Sửa">
                                        <i class="fa fa-fw fa-pen-to-square text-info"></i>
                                    </button>
                                    <button type="button" class="btn btn-sm btn-alt-secondary" data-id="${data}" title="Xóa">
                                        <i class="fa fa-fw fa-times text-danger"></i>
                                    </button>
                            `
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