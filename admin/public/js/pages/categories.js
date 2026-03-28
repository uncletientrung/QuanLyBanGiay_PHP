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
            const table = jQuery('.js-dataTable-full-pagination').DataTable({
                pagingType: "full_numbers",
                pageLength: 10,
                dom: '<ftip>',
                autoWidth: false,
                ajax: {
                    url: './categories/getData',
                    dataSrc: ''
                },
                columns: [
                    {
                        data:'maloai',
                        className: 'text-center',
                        type:'num'
                    },
                    {
                        data:'tenloai'
                    },
                    {
                        data:'maloai',
                        className: 'text-center',
                        orderable: false,
                        render: function(data, type, row) {
                            return `
                                <button type="button" class="btn btn-sm btn-alt-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-fw fa-pen-to-square text-info"></i>
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdown-content-hero-primary">
                                    <div class="mb-2">
                                        <label class="form-label" for="tenloai">Tên</label>
                                        <input type="text" class="form-control" name="tenloai" id="edit-name-${data}" placeholder="Nhập tên loại mới" data-init="${row.tenloai}" value="${row.tenloai}">
                                    </div>
                                    <div class="block-content p-0 d-flex justify-content-end">
                                        <button type="button" data-id="${data}" class="btn-edit btn btn-primary">Sửa</button>
                                    </div>
                                </div>
                                <button class="btn btn-sm btn-alt-secondary btn-delete" data-id="${data}" title="Xoá">
                                    <i class="fa fa-fw fa-times text-danger"></i>
                                </button>
                            `
                        }
                    }
                ]
            });

            $(document).on('click', '#add', function() {
                const tenloai = $('#tenloai').val();
                if ($('#tenloai').val() != '')
                {
                    $.ajax({
                        url: './categories/add',
                        method:'POST',
                        data: {
                            tenloai: tenloai
                        },
                        success: function(response) {
                            if(response.status == 'success')
                            {
                                table.ajax.reload(null, false);
                            }
                        }
                    })
                }
            });

            $(document).on('click', '.btn-delete', function() {
                const id = $(this).data('id');
                $.ajax({
                        url: './categories/delete',
                        method:'POST',
                        data: {
                            id: id
                        },
                        success: function(response) {
                            if(response.status == 'success')
                            {
                                table.ajax.reload(null, false);
                            }
                        }
                    })
            })

            $(document).on('click', '.btn-edit', function() {
                const id = $(this).data('id');
                const tenloai = $(`#edit-name-${id}`).val();
                const initName = $(`#edit-name-${id}`).data('init');
                if (tenloai != initName)
                { 
                    $.ajax({
                        url: './categories/update',
                        method:'POST',
                        data: {
                            id: id,
                            tenloai: tenloai
                        },
                        success: function(response) {
                            if(response.status == 'success')
                            {
                                table.ajax.reload(null, false);
                            }
                        }
                    })
                }
            })
        }

        static init() {
            this.initDataTables();
        }
    }.init()
);