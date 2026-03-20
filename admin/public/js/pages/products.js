let table;
let gioitinh = []; //filter gioi tinh
let trangthai = []; //filter trangthai
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
            table = jQuery('.js-dataTable-responsive').DataTable({
                pagingType: "full_numbers",
                pageLength: 7,
                dom: `
                    <'row justify-content-between'
                        <'col-lg justify-content-left d-flex'
                            <'col-lg-auto me-3'
                                <"#select-mode">
                            >
                            <'col-lg-auto me-3'
                                <"#filter-button">
                            >
                            <'col-lg-auto me-3'
                                <"#delete-button.invisible">
                            >
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
                order: [[1,'asc']],
                columns: [
                    {
                        data: null,
                        className: 'text-center',
                        orderable: false,
                        render: function (data, type, row) {
                            return `
                                <div class="form-check d-flex justify-content-center">
                                    <input class="form-check-input" type="checkbox" 
                                        style="cursor: pointer;" 
                                        value="${row.masp}" id="row_${row.masp}">
                                </div>
                            `;
                        }
                    },
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
                        render: function(data, type, row)
                        { 
                            let gender;
                            if (data == 1)
                                gender = "Nam";
                            else
                                gender = "Nữ"
                            if (type === 'filter' || type === 'sort') return data;
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
                        data: 'size',
                        render: function(data, type, row) {
                            if (data == null)
                            { 
                                return `Chưa có size`
                            }
                            return `${data}`
                        }
                    },
                    {
                        data:'trangthai',
                        className:'text-center',
                        render: function(data, type, row) {
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
                            if (type === 'filter' || type === 'sort') return data;
                            return `
                                <span class="badge ${bgcolor}" style="width: 100%">${status}</span>
                                `;
                        }
                    },
                    {
                        data: 'masp',
                        className:'text-center',
                        orderable: false,
                        render: function(data)
                        { 
                            return `
                                    <a type="button" class="btn btn-sm btn-alt-secondary" href="./products/${data}" title="Xem chi tiết sản phẩm">
                                        <i class="fa fa-fw fa-bars text-primary-darker"></i>
                                    </a>
                                    <button type="button" class="btn btn-sm btn-alt-secondary" data-id="${data}" title="Sửa">
                                        <i class="fa fa-fw fa-pen-to-square text-info"></i>
                                    </button>
                                    <button type="button" class="fast-delete btn btn-sm btn-alt-secondary" data-id="${data}" title="Xóa">
                                        <i class="fa fa-fw fa-times text-danger"></i>
                                    </button>
                            `
                        }
                    }
                ]
            });


            jQuery("#delete-button").html(`
                <button type="button" class="btn btn-hero btn-danger">
                    <i class="fa fa-times me-2"></i>Xóa
                </button>
            `);

            jQuery('#select-mode').html(`
                <button type="button" class="btn btn-hero btn-primary">Chế độ chọn</button>
            `);

            jQuery('#filter-button').html(`
                <button type="button" class="btn btn-hero btn-outline-primary dropdown-toggle h-100" data-bs-toggle="collapse" data-bs-target="#filter-box-target">
                    <i class="fa fa-filter me-2"></i>Bộ lọc
                </button>
            `);

            table.column(0).visible(false);

            $("#sp-table").on('click', '.fast-delete',function() {
                const arr = []
                const data = $(this).data();
                arr.push(data.id);
                $.post("./products/delete", {ids: arr})
                table.ajax.reload();
            });
        }

        static initFilterBox() {
            table.on('init', function () {
                let max_nhap = 0;
                const data = table.column(5).data().toArray();
                data.forEach(el => {
                    max_nhap = Math.max(el, max_nhap);
                });

                let max_profit = 0;
                const data1 = table.column(6).data().toArray();
                data1.forEach(el => {
                    max_profit = Math.max(el, max_profit);
                });
            
            jQuery('#filter-box-target').html(`
                <div class="ms-1 me-1 border rounded">
                    <div class="mt-4 ms-3 me-5">
                        <div class="row mb-4 mt-3">
                            <span class="col-form-label col-lg-1">Loại</span>
                            <div class="col-lg-11">
                                <select id="filter-loai" class="js-select2 form-select" style="width:100%;" data-placeholder="Chọn loại" multiple>
                                </select> 
                            </div>
                        </div>

                        <div class="row mb-4 mt-3">
                            <span class="col-form-label col-lg-1">Giới tính</span>
                            <div id="filter-gioitinh" class="col-lg-11">
                                <button type="button" class="col-lg-2 btn btn-sm me-3" value="1">Nam</button>
                                <button type="button" class="col-lg-2 btn btn-sm me-3" value="0">Nữ</button>
                            </div> 
                        </div>

                        <div class="row mb-4 mt-3">
                            <span class="col-form-label col-lg-1">Hãng</span>
                            <div class="col-lg-11">
                                <select id="filter-hang" class="js-select2 form-select" style="width:100%;" data-placeholder="Chọn hãng" multiple>
                                </select> 
                            </div>
                        </div>

                        <div class="row mb-4 mt-3">
                            <span class="col-form-label col-lg-1">Màu</span>
                            <div class="col-lg-11">
                                <select id="filter-mau" class="js-select2 form-select" style="width:100%;" data-placeholder="Chọn Màu" multiple>
                                </select> 
                            </div>
                        </div>

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

                        <div class="row mb-4 mt-3">
                            <span class="col-form-label col-lg-1">Trạng thái</span>
                            <div id="filter-trangthai" class="col-lg-11">
                                <button type="button" class="col-lg-2 btn btn-sm me-3" value="1">Đang kinh doanh</button>
                                <button type="button" class="col-lg-2 btn btn-sm me-3" value="0">Ngừng bán</button>
                            </div> 
                        </div>

                        <div class="row justify-content-end mb-4 mt-3">
                            <a id="reset-filter" href="#sp-table" class="col-lg-1 me-4 btn btn-outline-danger">
                                <i class="fa fa-rotate-left me-2"></i>Đặt lại</a>
                            <a id="apply-filter" href="#sp-table" class="col-lg-1 btn btn-outline-info">
                                <i class="fa fa-check me-2"></i>Áp dụng</a>
                        </div>
                    </div>
                </div> 
            `);
            
            Dashmix.helpers("jq-select2");
            Dashmix.helpers("jq-rangeslider");

            $.when(
                $.getJSON("./categories/getData"),
                $.getJSON("./brands/getData"),
                $.getJSON("./colors/getData"),
            ).done(function(categories, brands, colors) {
                categories[0].forEach(el =>
                    {
                        $("#filter-loai").append(`
                            <option value="${el.tenloai}">${el.tenloai}</option>
                            `);
                    }
                )

                brands[0].forEach(el =>
                    {
                        $("#filter-hang").append(`
                            <option value="${el.tenhang}">${el.tenhang}</option>
                            `);
                    }
                )

                colors[0].forEach(el =>
                    {
                        $("#filter-mau").append(`
                            <option value="${el.tenmau}">${el.tenmau}</option>
                            `);
                    }
                )

                $("#filter-box-target").find(".btn").attr("data-toggle", "click-ripple");
                $("#filter-box-target").find(".btn").addClass('border-dark');

                $("#filter-box-target").on("click", ".btn", function() {
                    if ($(this).attr("id") != "reset-filter" && $(this).attr("id") != "apply-filter") {
                        $(this).toggleClass("btn-primary");
                        $(this).toggleClass("border-dark")
                        $(this).toggleClass("border-primary")
                    }
                });
                Dashmix.helpers("dm-ripple");

                $("#filter-gioitinh").on('click', '.btn', function() {
                    const val = $(this).val();
                    if (gioitinh.indexOf(val) == -1)
                    { 
                        gioitinh.push(val);
                    }
                    else
                    {
                        gioitinh.splice(gioitinh.indexOf(val), 1);
                    }
                });

                $("#filter-trangthai").on('click', '.btn', function() {
                    const val = $(this).val();
                    if (trangthai.indexOf(val) == -1)
                    { 
                        trangthai.push(val);
                    }
                    else
                    {
                        trangthai.splice(trangthai.indexOf(val), 1);
                    }
                });
            });
            
            $("#reset-filter").on('click', function() {
                gioitinh = [];
                trangthai = [];
                $("#filter-box-target").find(".btn").removeClass("btn-primary border-primary").addClass("border-dark");

                $("#filter-loai, #filter-hang, #filter-mau").val('').trigger('change')
                const slider1 = $("#filter-gianhap").data('ionRangeSlider');
                slider1.reset();

                const slider2 = $("#filter-loinhuan").data('ionRangeSlider');
                slider2.reset();

                $.fn.dataTable.ext.search = [];
                table.columns().search('');
                table.draw();
            });

            $("#apply-filter").on('click', function() {
                $.fn.dataTable.ext.search = [];
                const loai = ($("#filter-loai").select2('val')).join('|'); //col 2
                const hang = ($('#filter-hang').select2('val')).join('|'); // col 6
                const mau = ($('#filter-mau').select2('val')).join('|'); // col 7
                const gt = gioitinh.join('');
                const tt = trangthai.join('');

                const min_nhap = $("#filter-gianhap").data("from"); //col 4
                const max_nhap = $("#filter-gianhap").data("to");

                const min_profit = $("#filter-loinhuan").data("from"); //col 5
                const max_profit = $("#filter-loinhuan").data("to");

                $.fn.dataTable.ext.search.push(function (settings, data, dataIndex) {
                    if (
                        (isNaN(min_nhap) && isNaN(max_nhap)) ||
                        (isNaN(min_nhap) && data[5] <= max_nhap) ||
                        (min_nhap <= data[5] && isNaN(max_nhap)) ||
                        (min_nhap <= data[5] && data[5] <= max_nhap) // Giá nhập
                    ) {
                        return true;
                    }
                    return false;
                });

                $.fn.dataTable.ext.search.push(function (settings, data, dataIndex) {
                    if (
                        (isNaN(min_profit) && isNaN(max_profit)) ||
                        (isNaN(min_profit) && data[6] <= max_profit) ||
                        (min_profit <= data[6] && isNaN(max_profit)) ||
                        (min_profit <= data[6] && data[6] <= max_profit) // Lợi nhuận
                    ) {
                        return true;
                    }
                    return false;
                });

                if (loai.length != 0) table.column(3).search("^(" + loai + ")$", true, false);
                if (hang.length != 0) table.column(7).search("^(" + hang + ")$", true, false);
                if (mau.length != 0) table.column(8).search("^(" + mau + ")$", true, false);
                if (gioitinh.length != 0) table.column(4).search("^([" + gt + "])$", true, false);
                if (trangthai.length != 0) table.column(10).search("^([" + tt + "])$", true, false);
                table.draw();
            });
            //Fix placeholder
            $(".select2-container--default .select2-search--inline .select2-search__field").css('width', "initial !important");
        });
        }
        
        static interaction()
        {
            let ids_arr = [];
            $("#select-mode").on("click", ".btn", function() {
                const isVisible = table.column(0).visible();
                table.column(0).visible(!isVisible);
                $("#sp-table tbody .form-check-input").prop('checked', false);
                $("#check-all").prop('checked', false);
                ids_arr = [];
                toggleUI(ids_arr);
            });

            $("#sp-table").on("click", "#check-all", function() {
                const isChecked = $(this).prop('checked');
                $("#sp-table tbody .form-check-input").prop('checked', isChecked);
                isChecked ? ids_arr = table.column(1).data().toArray() : ids_arr = [];
                toggleUI(ids_arr);
            });

            $("#sp-table").on('click', 'tbody .form-check-input',function() {
                $(this).prop('checked') ? ids_arr.push($(this).val()) : ids_arr.splice(ids_arr.indexOf($(this).val()), 1);
                if (ids_arr.length == table.column(0).rows().count())
                    $("#check-all").prop('checked', true);
                else
                    $("#check-all").prop('checked', false);
                toggleUI(ids_arr);
            });

            table.on('draw', function() {
                $("#sp-table tbody .form-check-input").each(function () {
                    if (ids_arr.indexOf($(this).val()) != -1)
                        $(this).prop('checked', true);
                    else
                        $(this).prop('checked', false);
                })
            });

            $("#status-dropdown-item").on('click', 'a', function() {
                $("#status-dropdown").text($(this).text());
            });

            $("#delete-button").on('click', function() {
                    if (ids_arr.length != 0) $.post("./products/delete", {ids: ids_arr});
                    table.ajax.reload();
                });

            function toggleUI(arr)
            {
                if (arr.length != 0) {
                    $("#delete-button").removeClass("invisible");
                }
                else {
                    $("#delete-button").addClass("invisible");
                    $("#status-dropdown").text("Đổi trạng thái");       
                }
            }
        }

        static init() {
            this.initDataTables();
            this.initFilterBox();
            this.interaction();
        }
    }.init()
)