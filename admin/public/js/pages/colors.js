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
                pageLength: 6,
                dom: '<ftip>',
                autoWidth: false,
                ajax: {
                    url: './colors/getData',
                    dataSrc: ''
                },
                columns: [
                    {
                        data:'mamau',
                        className: 'text-center',
                        type:'num',
                        render: function(data, type, row) {
                            if (type === 'display'){
                            return `<strong class="text-primary">M-${data}</strong>`}
                            return data;
                        }
                    },
                    {
                        data:'tenmau',
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
                        data:'mamau',
                        className: 'text-center',
                        orderable: false,
                        render: function(data, type, row) {
                            const isHidden = (row.trangthai == 0); 

                            return `
                                <button type="button" class="btn btn-sm btn-alt-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-fw fa-pen-to-square text-info"></i>
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdown-content-hero-primary">
                                    <div class="mb-2">
                                        <label class="form-label" for="tenmau">Tên</label>
                                        <input type="text" class="form-control" name="tenmau" id="edit-name-${data}" placeholder="Nhập tên màu mới" data-init="${row.tenmau}" value="${row.tenmau}">
                                    </div>
                                    <div class="block-content p-0 d-flex justify-content-end">
                                        <button type="button" data-id="${data}" class="btn-edit btn btn-primary">Sửa</button>
                                    </div>
                                </div>
                                    
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
                const tenmau = $('#tenmau').val().trim();
                const $btn = $(this);

                if (tenmau === '') {
                    Swal.fire('Chú ý', 'Vui lòng nhập tên màu!', 'warning');
                    return;
                }

                const isDuplicate = table.data().toArray().some(row => 
                    row.tenmau.toLowerCase() === tenmau.toLowerCase()
                );

                if (isDuplicate) {
                    Swal.fire('Trùng lặp', `Màu "${tenmau}" đã có trong hệ thống!`, 'error');
                    return;
                }

                Swal.fire({
                    title: 'Xác nhận thêm?',
                    text: `Bạn có chắc chắn muốn thêm màu "${tenmau}" không?`,
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
                            url: './colors/add',
                            method: 'POST',
                            data: { tenmau: tenmau },
                            dataType: 'json',
                            success: function(response) {
                                if (response.status === 'success') {
                                    $('#tenmau').val('');
                                    Dashmix.helpers('jq-notify', { 
                                        type: 'success', 
                                        icon: 'fa fa-check me-1', 
                                        message: 'Thêm màu mới thành công!' 
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
                            url: './colors/delete',
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
                    title: 'Hiển thị lại màu?',
                    text: "Màu này sẽ xuất hiện lại trên web bán hàng",
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
                            url: './colors/show',
                            method: 'POST',
                            data: { id: id },
                            dataType: 'json',
                            success: function(response) {
                                if (response.status === 'success') {
                                    Dashmix.helpers('jq-notify', { 
                                        type: 'success', 
                                        icon: 'fa fa-check me-1', 
                                        message: 'Đã hiển thị màu thành công!' 
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

            $(document).on('click', '.btn-edit', function() {
                const id = $(this).data('id');
                const $btn = $(this);
                const $input = $(`#edit-name-${id}`);
                const tenmau = $input.val().trim();
                const initName = $input.data('init');

                if (tenmau === '') {
                    Swal.fire('Chú ý', 'Tên màu không được để trống!', 'warning');
                    return;
                }

                if (tenmau !== initName) {
                    const isDuplicate = table.data().toArray().some(row => 
                        row.tenmau.toLowerCase() === tenmau.toLowerCase() && row.mahang != id
                    );

                    if (isDuplicate) {
                        Swal.fire('Trùng lặp', 'Tên màu này đã tồn tại ở một dòng khác!', 'error');
                        return;
                    }

                    $btn.prop('disabled', true).html('<i class="fa fa-spinner fa-spin"></i>');

                    $.ajax({
                        url: './colors/update',
                        method: 'POST',
                        data: { id: id, tenmau: tenmau },
                        dataType: 'json',
                        success: function(response) {
                            if (response.status === 'success') {
                                $input.data('init', tenmau);
                                Dashmix.helpers('jq-notify', { 
                                    type: 'success', 
                                    icon: 'fa fa-check me-1', 
                                    message: 'Cập nhật thành công!' 
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
                            $btn.prop('disabled', false).text('Sửa');
                        }
                    });
                } else {
                    Swal.fire('Thông tin', 'Bạn chưa thay đổi tên màu.', 'info');
                }
            });
        }

        static init() {
            this.initDataTables();
        }
    }.init()
);