Dashmix.onLoad(() => {
    Dashmix.helpers('jq-select2')
    const masp = $("#masp").text().split('-')[1];
    const table = $("#size-table").DataTable({
            lengthChange: false,
            pageLength: 3,
            searching: false,
            info: false,
            paging: false,
            autoWidth: false,
            columnDefs: [
                { orderable: false, targets: 3 }
            ]
        });
        
    table.column(3).visible(false);

    $("#table-div .tensize").each(function (index, value) {
        const currName = table.cell(index, 1).data();
        $(this).data('prev-value', currName);
    });

    $("#table-div .soluong").each(function (index, value) {
        const currStock = table.cell(index, 2).data();
        $(this).data('prev-value', currStock);
    });

    let isEditMode = false;
    const isCreate = $('#prod-form').data('id');
    if (isCreate == 0)
    { 
        console.log('create');
        $('#edit-btn').prop('hidden', true);
        $('#save-btn').text('Tạo mới');
        $("#img-panel").addClass("invisible");
    }

    $(document).ready(function() {
        //Thông tin sản phẩm trước sửa
        $("#tensp").data('prev-val', $("#tensp").val());
        $("#mota").data('prev-val', $("#mota").val());
        $("#gioitinh").data('prev-val', $("#gioitinh").val());
        $("#mau").data('prev-val', $("#mau").val());
        $("#loai").data('prev-val', $("#loai").val());
        $("#hang").data('prev-val', $("#hang").val());
        $("#trangthai").data('prev-val', $("#trangthai").val());
        
        let initialData = {
            masp: $("#masp").text().split('-')[1],
            tensp: $("#tensp").data('prev-val'),
            motasp: $("#mota").data('prev-val'),
            gioitinh: $("#gioitinh").data('prev-val'),
            mausac: $("#mau").data('prev-val'),
            loai: $("#loai").data('prev-val'),
            hang: $("#hang").data('prev-val'),
            trangthai: $("#trangthai").data('prev-val'),
        }

        let initialSizeDataArray = [];
        table.rows().every( function ( rowIdx, tableLoop, rowLoop ) {
            let data = this.data();
            const sizeData = {
                masp: masp,
                masize: data[0],
                soLuong: data[2]
            }
            initialSizeDataArray.push(sizeData);
        });

        let oldId = [];
        initialSizeDataArray.forEach(function(value) {
            oldId.push(value.masize);
        })

        const allSizeFetch = $("#allSizeFetcher").text();
        const allSize = JSON.parse(allSizeFetch);

        const fields = $(".form-control, .form-select, .select2-selection");
        const save_btn = $("#save-btn");
        
        if (isCreate != 0)
        {
            fields.prop('disabled',true);
        }
        else {
            toggleEditModeRender();
            $("#size-table").on('change', 'select', function() {
                const row = table.row($(this).closest('tr')).index();
                const val = $(this).val()
                table.cell(row, 0).data(val);
                table.draw();
                renderSelect2();
            });
            
            $("#size-table").on("change", 'input', function() {
                const $row = $(this).closest("tr");
                const dtRow = table.row($row);
                const val = $(this).val()
                table.cell(dtRow.index(), 2).data(val).draw();
                renderStockInput();
                reCalcTotalStock();
            });
        }

        $("#edit-btn").on('click', function() {
            toggleEditModeRender();
            
            //Cập nhật ID + resort sau chọn
            $("#size-table").on('change', 'select', function() {
                const row = table.row($(this).closest('tr')).index();
                const val = $(this).val()
                table.cell(row, 0).data(val);
                table.draw();
                renderSelect2();
            });
            
            $("#size-table").on("change", 'input', function() {
                const $row = $(this).closest("tr");
                const dtRow = table.row($row);
                const val = $(this).val()
                table.cell(dtRow.index(), 2).data(val).draw();
                renderStockInput();
                reCalcTotalStock();
            });
            
            if (!isEditMode) {
                $("#tensp").val($("#tensp").data('prev-val'));
                $("#mota").val($("#mota").data('prev-val'));
                $("#gioitinh").val($("#gioitinh").data('prev-val'));
                $("#mau").val($("#mau").data('prev-val')).trigger('change');
                $("#loai").val($("#loai").data('prev-val')).trigger('change');
                $("#hang").val($("#hang").data('prev-val')).trigger('change');
                $("#trangthai").val($("#trangthai").data('prev-val'));
            }
        });

        let delArr = []
        $('#size-table').on('click', '.delete-sizestock', function() {
            const masize = $(this).closest('tr').find('th').text();
            const $row = $(this).closest("tr");
            const dtRow = table.row($row).remove().draw();
            renderSelect2();
            const obj = {
                masp: masp,
                masize: masize
            }
            delArr.push(obj);
        });

        $(document).on('click', '#add-size', function() {
            let optionsHTML = ``;
            allSize.forEach(function(size) {
                if(typeof table.row((idx, data) => data[0] === size.masize).index() !== "undefined")
                    optionsHTML += `<option disabled value="${size.masize}">${size.tensize}</option>`;
                else 
                    optionsHTML += `<option value="${size.masize}">${size.tensize}</option>`
            });

            const buttonHTML = `
                <button type="button" class="delete-sizestock btn btn-sm btn-outline-danger">
                    <i class="fa fa-fw fa-times"></i>
                </button>
            `

            const newRow = table.row.add(['&nbsp;', '', '0', buttonHTML]).draw().node();
            const td = $(newRow).find('td');
            $(td[0]).addClass("text-center fw-semibold");
            $(td[1]).addClass("fw-semibold text-primary tensize");
            $(td[2]).addClass("justify-content-center soluong");
            renderStockInput();
            renderSelect2();
        });

        $("#save-btn").on('click', function() {
            const data = {
                masp: $("#masp").text().split('-')[1],
                tensp: $("#tensp").val(),
                motasp: $("#mota").val(),
                gioitinh: $("#gioitinh").val(),
                mausac: $("#mau").val(),
                loai: $("#loai").val(),
                hang: $("#hang").val(),
                trangthai: $("#trangthai").val(),
            }
            console.log(data);

            let sizeDataArray = [];
            table.rows().every( function ( rowIdx, tableLoop, rowLoop ) {
                let data = this.data();
                const sizeData = {
                    masp: masp,
                    masize: data[0],
                    soLuong: data[2]
                }
                sizeDataArray.push(sizeData);
            } );
            console.log(sizeDataArray);
            console.log(oldId);
            if (isCreate == 0)
            {
                const required = ['tensp', 'gioitinh', 'loai', 'hang', 'trangthai', 'mausac'];
                let isValid = true;

                for (const field of required) {
                    const val = data[field];
                    if (val === null || val === undefined || String(val).trim() === "") {
                        isValid = false;
                        break; 
                    }
                }

                if (!isValid) {
                    alert("Vui lòng điền đầy đủ thông tin sản phẩm!");
                    return false;
                } else {
                    $.ajax({
                        url: '/QuanLyBanGiay_Php/admin/products/addNewProd',
                        type: 'POST',
                        data: { 
                            data: data
                        },
                        dataType: 'json',
                        success: function(response) {
                            if(response.status === 'success')
                                window.location.href = '/QuanLyBanGiay_Php/admin/products';
                            else
                                alert("Kiểm tra lại thông tin");
                        }
                    });
                    $.ajax({
                            url: '/QuanLyBanGiay_Php/admin/products/addNewSize',
                            type: 'POST',
                            data: {
                                oldId: oldId,
                                data: sizeDataArray
                            },
                            success: function(response) {
                                console.log(response);
                            }
                        });
                    }
            }
            else
            {
                if (JSON.stringify(data) == JSON.stringify(initialData))
                    console.log("No changes in info");
                else
                    $.ajax({
                        url: '/QuanLyBanGiay_Php/admin/products/updateInfo',
                        type: 'POST',
                        data: { 
                            data: data
                        },
                        success: function(response) {
                            console.log(response);
                        }
                    });
                if (JSON.stringify(sizeDataArray) == JSON.stringify(initialSizeDataArray))
                    console.log("No changes in sizes");
                else
                {
                    $.ajax({
                        url: '/QuanLyBanGiay_Php/admin/products/addNewSize',
                        type: 'POST',
                        data: {
                            oldId: oldId,
                            data: sizeDataArray
                        },
                        success: function(response) {
                            console.log(response);
                        }
                    });
                
                    $.ajax({
                        url: '/QuanLyBanGiay_Php/admin/products/updateSizeAndStock',
                        type: 'POST',
                        data: {
                            oldId: oldId,
                            data: sizeDataArray
                        },
                        success: function(response) {
                            console.log(response);
                        }
                    });
                }
                if (delArr.length != 0)
                $.ajax({
                    url: '/QuanLyBanGiay_Php/admin/products/deleteSizeAndStock',
                    type: 'POST',
                    data: {
                        data: delArr,
                    },
                    success: function(response)
                    {
                        console.log(response);
                    }
                })

                console.log(data);
                initialSizeDataArray = sizeDataArray;
                initialData = data;
                toggleEditModeRender();
            }
        });

        $('#add-image').on('change', function() {
            const fileInput = this; 
            
            if (fileInput.files.length === 0) return;

            const formData = new FormData();
            formData.append('masp', masp);
            for (let i = 0; i < fileInput.files.length; i++) {
                formData.append('images[]', fileInput.files[i]);
            }

            const $icon = $('label[for="add-image"] i');
            $icon.removeClass('fa-plus').addClass('fa-spinner fa-spin');

            $.ajax({
                url: `/QuanLyBanGiay_Php/admin/products/upload`,
                type: 'POST',
                data: formData,
                processData: false, 
                contentType: false, 
                dataType: 'json',
                success: function(response) {
                    if (response.status === 'success') {
                        const gallery = $('.js-gallery');
                        
                        response.files.forEach(function(filePath) {
                            const newHtml = `
                                <div class="col-lg-2 border border-3 rounded-4 animated fadeIn p-0 overflow-hidden me-4">
                                    <div class="options-container fx-item-zoom-in">
                                        <img class="img-fluid options-item" style="aspect-ratio: 1/1; object-fit: cover" src="/QuanLyBanGiay_Php/${filePath}" alt="Product Image">
                                        <div class="options-overlay align-items-start" style="top: 10px; right: 10px; bottom: 0; left: 10px">
                                            <div class="options-overlay-content d-inline-flex w-100 justify-content-between">
                                                <a class="set-banner fs-5 ps-2 pe-2 bg-primary text-white rounded" style="cursor: pointer"><strong>Set Banner</strong></a>
                                                <a class="delete btn btn-sm btn-secondary d-flex align-items-center" style="cursor: pointer">
                                                    <i class="fa fa-fw fa-times"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>`;
                            gallery.append(newHtml);
                        });
                    } else {
                        alert('Upload failed: ' + response.message);
                    }
                },
                error: function() {
                    alert('An error occurred during upload.');
                },
                complete: function() {
                    $icon.removeClass('fa-spinner fa-spin').addClass('fa-plus');
                    $('#add-image').val(''); 
                }
            });
        });

        function toggleEditModeRender() {
            isEditMode = !isEditMode;
            //Bật borders cho các field
            fields.prop('disabled', !isEditMode);
            fields.toggleClass('border border-2 border-info rounded');
            save_btn.toggleClass('invisible');
            $("#table-div").toggleClass('border border-2 border-info rounded')
            table.column(3).visible(isEditMode);
            $("#totalStock").toggleClass("ms-1 me-3");
            if (isEditMode)
                $("#add-size").attr('hidden', false).parent().addClass('mb-3');
            else 
                $("#add-size").attr('hidden', true).parent().removeClass('mb-3');
            //Chuyển ô kích thước thành select2 và số lượng thành input
            renderSelect2();
            renderStockInput();
        }

        function renderStockInput(){
            $("#table-div .soluong").each(function(index, value) {
                const $cell = $(this);
                const $row = $cell.closest('tr');
                const dtRow = table.row($row);
                if (isEditMode) {
                    const currStock = dtRow.data()[2];
                    $(this).html(`
                        <input type="number" class="form-control" style="width: 100%; text-align: center;" value="${currStock}">
                    `);
                } else {
                    const currStock = $(this).data('prev-value');
                    $(this).html(`
                        ${currStock}
                    `);
                }
            })
        }

        function reCalcTotalStock()
        { 
            let totalStock = 0;
            $(".soluong > input").each(function(index, value) {
                totalStock += parseInt($(value).val());
            })
            $('#totalStock').text(totalStock);
        }

        function renderSelect2() {
            let optionsHTML = ``;
            allSize.forEach(function(size) {
                if(typeof table.row((idx, data) => data[0] === size.masize).index() !== "undefined")
                    optionsHTML += `<option disabled value="${size.masize}">${size.tensize}</option>`;
                else 
                    optionsHTML += `<option value="${size.masize}">${size.tensize}</option>`
            });

            $("#table-div .tensize").each(function () {
                const $cell = $(this);
                const $row = $cell.closest('tr');
                const dtRow = table.row($row);
                if (isEditMode) {
                    const currVal = dtRow.data()[0];
                    $(this).html(`
                        <div class="block m-0">
                            <select class="js-select2 form-select" style="width: 100%" data-placeholder="Chọn size">
                                ${optionsHTML}
                            </select>
                        </div>
                    `);
                    $(this).find("select").val(currVal);
                    $(this).find(".js-select2").select2();
                }
                else {
                    const currName = $(this).data('prev-value');
                    if (typeof currName ==="undefined"){ 
                        table.row($(this).closest('tr').index()).remove().draw();
                    }
                    else {
                        $(this).html(`
                            ${currName}    
                        `);
                    }
                }
            });
        }
    });

    initBanner();
    function initBanner()
    { 
        $(".is-banner").addClass("border border-primary rounded");
        const setBanner = $(".is-banner").find('.set-banner');
        setBanner.children().text('Banner');
        setBanner.removeClass("bg-primary");
        setBanner.addClass("bg-info");
        setBanner.css('pointer-events', 'none');
    }

    function terminateBanner()
    {
        $(".is-banner").removeClass("border border-primary rounded");
        const setBanner = $(".is-banner").find('.set-banner');
        setBanner.children().text('Set Banner');
        setBanner.removeClass("bg-info");
        setBanner.addClass("bg-primary");
        setBanner.css('pointer-events', '');
        $(".is-banner").removeClass("is-banner");
    }

    $(document).on('click', '.set-banner', function() {
        const btn = $(this);
        const imgpath = $(this).closest(".options-container").find('img').attr('src');
        const cleanPath = imgpath.replace('/QuanLyBanGiay_Php/', '');
        $.ajax({
            url: '/QuanLyBanGiay_Php/admin/products/setBanner',
            type: 'POST',
            data: { 
                path: cleanPath, 
                masp: masp 
            },
            success: function(response) {
                if (response.status === 'success') {
                    terminateBanner();
                    btn.closest(".options-container").parent().addClass('is-banner');
                    initBanner();
                }
            }
        });
    });
    
    $(document).on('click', '.delete', function() {
        const btn = $(this);
        const imgpath = $(this).closest(".options-container").find('img').attr('src');
        const cleanPath = imgpath.replace('/QuanLyBanGiay_Php/', '');
        $.ajax({
            url: '/QuanLyBanGiay_Php/admin/products/deleteImage',
            type: 'POST',
            data: { 
                path: cleanPath, 
                masp: masp 
            },
            success: function(response) {
                if (response.status === 'success') {
                    btn.closest(".options-container").parent().addClass("fadeOut");
                    setTimeout(function() {
                        btn.closest(".options-container").parent().remove();
                    }, 1000);
                }
            }
        });
    });
});