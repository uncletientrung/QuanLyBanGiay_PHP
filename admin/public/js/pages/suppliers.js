Dashmix.onLoad(() =>
    class {
        static initDataTables() {
            Dashmix.helpers('jq-validation');

            $('#form-nhacungcap').validate({
                rules: {
                    'ten-nhacungcap': {
                        required: true
                    },
                    'sdt-nhacungcap': {
                        required: true,
                        minlength: 10,
                        digits:true,
                    },
                    'diachi-nhacungcap': {
                        required: true
                    }
                },
                messages: {
                    'ten-nhacungcap': 'Vui lòng nhập tên nhà cung cấp',
                    'sdt-nhacungcap': {
                        required: 'Vui lòng nhập số điện thoại',
                        digits: 'Số điện thoại chỉ được chứa số',
                        minlength: 'Số điện thoại phải có ít nhất 10 số'
                    },
                    'diachi-nhacungcap': 'Vui lòng nhập địa chỉ'
                },
                submitHandler: function(form) {
                    const id = $('#mancc').val();
                    const isEdit = id !== "";

                    const tenncc = "Công ty " + $('#ten-nhacungcap').val().trim();
                    const isDuplicate = table.data().toArray().some(row =>{
                        if (isEdit && row.id == id) return false; 
                        return row.tenncc.toLowerCase() === tenncc.toLowerCase();
                    });
                    
                    if (isDuplicate) {
                        Swal.fire('Trùng lặp', `${tenncc} đã có trong hệ thống!`, 'error');
                        return;
                    }

                    const rawVal = $('#sdt-nhacungcap').val();
                    let formattedVal = '';
                    if (rawVal.length <= 3) {
                        formattedVal = rawVal;
                    } else if (rawVal.length <= 7) {
                        formattedVal = rawVal.replace(/(\d{3})(\d+)/, '$1 $2');
                    } else {
                        formattedVal = rawVal.replace(/(\d{3})(\d{4})(\d+)/, '$1 $2 $3');
                    }
                    $('#sdt-nhacungcap').val(formattedVal);

                    const actionUrl = isEdit ? './suppliers/update' : './suppliers/add';
                    const successMsg = isEdit ? 'Đã cập nhật thông tin!' : 'Đã thêm nhà cung cấp!';

                    const formData = $(form).serialize();

                    $.ajax({
                        url: actionUrl,
                        type: 'POST',
                        data: formData,
                        success: function(response) {
                            Swal.fire('Thành công', successMsg, 'success');
                            $('#add-supplier').modal('hide'); 
                            form.reset();
                            table.ajax.reload(null, false);
                        },
                        error: function() {
                            Swal.fire('Lỗi', 'Không thể kết nối máy chủ', 'error');
                        }
                    });
                }
            });
            
            $('#form-nhacungcap input').on('blur', function() {
                $(this).val($.trim($(this).val()));
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
            const table = jQuery('.js-dataTable-full-pagination').DataTable({
                pagingType: "full_numbers",
                pageLength: 7,
                dom: '<ftip>',
                autoWidth: false,
                ajax: {
                    url: './suppliers/getData',
                    dataSrc: ''
                },
                columns: [
                    {
                        data:'mancc',
                        className: 'text-center',
                        type:'num'
                    },
                    {
                        data: null,
                        render: function(data, type, row) {
                            return `
                                <div class="fw-semibold text-primary">${row.tenncc || 'N/A'}</div>
                                <div class="text-muted small">${row.sdt || ''}</div>
                            `;
                        }
                    },
                    {
                        data:'diachi',
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
                        data: 'mancc',
                        className: 'text-center',
                        orderable: false,
                        render: function(data, type, row) {
                            const isHidden = (row.trangthai == 0); 
                            
                            return `
                                <button type="button" class="btn btn-sm btn-alt-secondary btn-edit-user">
                                    <i class="fa fa-fw fa-pen-to-square text-info"></i>
                                </button>
                                
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
                            url: './suppliers/delete',
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
                    title: 'Hiển thị lại nhà cung cấp?',
                    text: "Nhà cung cấp này sẽ xuất hiện lại để chọn trong phiếu nhập",
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
                            url: './suppliers/show',
                            method: 'POST',
                            data: { id: id },
                            dataType: 'json',
                            success: function(response) {
                                if (response.status === 'success') {
                                    Dashmix.helpers('jq-notify', { 
                                        type: 'success', 
                                        icon: 'fa fa-check me-1', 
                                        message: 'Đã hiển thị nhà cung cấp thành công!' 
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

            $(document).on("click", ".btn-edit-user", function () {
                let id = $(this).data("id");
                let rowData = table.row($(this).closest('tr')).data();

                $("#form-nhacungcap").validate().resetForm();
                $('#mancc').val(rowData.mancc);
                $('#ten-nhacungcap').val(rowData.tenncc);
                $('#sdt-nhacungcap').val(rowData.sdt);
                $('#diachi-nhacungcap').val(rowData.diachi);
                $('#add-supplier').modal('show');    
            });
        }

        static init() {
            this.initDataTables();
        }
    }.init()
);