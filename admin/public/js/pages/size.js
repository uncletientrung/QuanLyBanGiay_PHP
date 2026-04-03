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
                    url: './sizes/getData',
                    dataSrc: ''
                },
                columns: [
                    {
                        data:'masize',
                        className: 'text-center',
                        type:'num',
                        render: function(data, type, row) {
                            if (type === 'display') {
                            return `<strong class="text-primary">S-${data}</strong>`
                            }
                            return data;
                    }
                    },
                    {
                        data:'tensize',
                    },
                    {
                        data: 'trangthai',
                        className: "text-center",
                        render: function(data) {
                            if (data == 1)
                                return `
                                    <span class="badge bg-success fs-6" style="width: 60%">Hiện</span>
                                `;
                            else
                                return `
                                    <span class="badge bg-danger fs-6" style="width: 60%">Ẩn</span>
                                `;
                        }
                    },
                    {
                        data:'masize',
                        className: 'text-center',
                        orderable: false,
                        render: function(data, type, row) {
                            const isHidden = (row.trangthai == 0); 
                            
                            return ` 
                                <button class="btn btn-sm btn-alt-secondary btn-delete" 
                                        data-id="${data}" 
                                        title="${isHidden ? 'Đã bị ẩn' : 'Xoá'}" 
                                        ${isHidden ? 'disabled style="cursor: not-allowed; opacity: 0.5;"' : ''}>
                                    <i class="fa fa-fw fa-times ${isHidden ? 'text-muted' : 'text-danger'}"></i>
                                </button>
                                <button class="btn btn-sm btn-alt-secondary btn-show" 
                                        data-id="${data}" 
                                        title="Hiện" 
                                        ${!isHidden ? 'disabled style="cursor: not-allowed; opacity: 0.5;"' : ''}>
                                    <i class="fa fa-fw fa-check ${!isHidden ? 'text-muted' : 'text-primary'}"></i>
                                </button>
                            `;
                        }
                    }
                ]
            });

            
            $(document).on('click', '#add', function() {
                const sosize = $('#sosize').val().trim();
                const $btn = $(this);

                if (sosize === '') {
                    Swal.fire('Chú ý', 'Vui lòng nhập tên size!', 'warning');
                    return;
                }

                const isDuplicate = table.data().toArray().some(row => 
                    row.tensize === sosize
                );

                if (isDuplicate) {
                    Swal.fire('Trùng lặp', `Size "${sosize}" đã có trong hệ thống!`, 'error');
                    return;
                }

                Swal.fire({
                    title: 'Xác nhận thêm?',
                    text: `Bạn có chắc chắn muốn thêm size "${sosize}" không?`,
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Xác nhận',
                    cancelButtonText: 'Hủy'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $btn.prop('disabled', true).html('<i class="fa fa-spinner fa-spin"></i>');

                        $.ajax({
                            url: './sizes/add',
                            method: 'POST',
                            data: { sosize: sosize },
                            dataType: 'json',
                            success: function(response) {
                                if (response.status === 'success') {
                                    $('#sosize').val('');
                                    Dashmix.helpers('jq-notify', { 
                                        type: 'success', 
                                        icon: 'fa fa-check me-1', 
                                        message: 'Thêm size mới thành công!' 
                                    });
                                    table.ajax.reload(null, false);
                                } else {
                                    Swal.fire('Lỗi!', response.message, 'error');
                                }
                            },
                            error: function() {
                                Swal.fire('Lỗi!', 'Đã xảy ra lỗi hệ thống.', 'error');
                            },
                            complete: function() {
                                $btn.prop('disabled', false).text('Thêm');
                            }
                        });
                    }
                });
            });

            
            $(document).on('click', '.btn-delete', function() {
                const id = $(this).data('id');
                const $btn = $(this);

                Swal.fire({
                    title: 'Xác nhận xóa/ẩn?',
                    text: "Hành động này không thể hoàn tác",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Xác nhận',
                    cancelButtonText: 'Hủy'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: './sizes/delete',
                            method: 'POST',
                            data: { id: id },
                            dataType: 'json',
                            success: function(response) {
                                if (response.status === 'success') {
                                    Dashmix.helpers('jq-notify', { 
                                        type: 'success', 
                                        icon: 'fa fa-check me-1', 
                                        message: 'Đã xóa/ẩn trạng thái thành công!' 
                                    });
                                    table.ajax.reload(null, false);
                                } else {
                                    Swal.fire('Lỗi!', 'Không thể xóa: ', 'error');
                                }
                            },
                            error: function() {
                                Swal.fire('Lỗi!', 'Đã xảy ra lỗi hệ thống.', 'error');
                            }
                        });
                    }
                });
            });

            $(document).on('click', '.btn-show', function() {
                const id = $(this).data('id');
                const $btn = $(this);

                Swal.fire({
                    title: 'Hiển thị lại size?',
                    text: "Size này sẽ xuất hiện lại trên web bán hàng",
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Đồng ý',
                    cancelButtonText: 'Hủy'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $btn.prop('disabled', true).html('<i class="fa fa-spinner fa-spin"></i>');

                        $.ajax({
                            url: './sizes/show',
                            method: 'POST',
                            data: { id: id },
                            dataType: 'json',
                            success: function(response) {
                                if (response.status === 'success') {
                                    Dashmix.helpers('jq-notify', { 
                                        type: 'success', 
                                        icon: 'fa fa-check me-1', 
                                        message: 'Đã hiển thị size thành công!' 
                                    });
                                    table.ajax.reload(null, false);
                                } else {
                                    Swal.fire('Lỗi!', response.message, 'error');
                                    $btn.prop('disabled', false).html('<i class="fa fa-check"></i>');
                                }
                            },
                            error: function() {
                                Swal.fire('Lỗi!', 'Đã xảy ra lỗi hệ thống.', 'error');
                                $btn.prop('disabled', false).html('<i class="fa fa-check"></i>');
                            }
                        });
                    }
                });
            });
        }

        static init() {
            this.initDataTables();
        }
    }.init()
);