Dashmix.onLoad(() => {
    Dashmix.helpers('jq-select2')
    const masp = $("#masp").text().split('-')[1];
    const table = $("#size-table").DataTable({
            lengthChange: false,
            pageLength: 3,
            searching: false,
            info: false,
            paging: false,
            columnDefs: [
                { orderable: false, targets: 3 }
            ]
        });
        
    table.column(3).visible(false);

    $("#table-div .tensize").each(function (index, value) {
        const currName = table.cell(index, 1).data();
        
        $(this).data('prev-value', currName);
    });

    $(document).ready(function() {
        //Thông tin sản phẩm trước sửa
        $("#tensp").data('prev-val', $("#tensp").val());
        $("#gianhap").data('prev-val', $("#gianhap").val());
        $("#loinhuan").data('prev-val', $("#loinhuan").val());
        $("#mota").data('prev-val', $("#mota").val());
        $("#gioitinh").data('prev-val', $("#gioitinh").val());
        $("#mau").data('prev-val', $("#mau").val());
        $("#loai").data('prev-val', $("#loai").val());
        $("#hang").data('prev-val', $("#hang").val());
        $("#trangthai").data('prev-val', $("#trangthai").val());
        
        const initialData = {
            masp: $("#masp").text().split('-')[1],
            tensp: $("#tensp").data('prev-val'),
            gianhap: $("#gianhap").data('prev-val'),
            tyleloinhuan: $("#loinhuan").data('prev-val'),
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
                masize: data[0],
                soLuong: data[2]
            }
            initialSizeDataArray.push(sizeData);
        });

        const allSizeFetch = $("#allSizeFetcher").text();
        const allSize = JSON.parse(allSizeFetch);

        const fields = $(".form-control, .form-select, .select2-selection");
        const save_btn = $("#save-btn");
        
        fields.prop('disabled',true);

        let isEditMode = false;
        let tableInit = 0;
        $("#edit-btn").on('click', function() {
            isEditMode = !isEditMode;
            //Bật borders cho các field
            fields.prop('disabled', !isEditMode);
            fields.toggleClass('border border-2 border-info rounded');
            save_btn.toggleClass('invisible');
            $("#table-div").toggleClass('border border-2- border-info rounded')
            table.column(3).visible(isEditMode);

            //Chuyển ô kích thước thành select2 và chuyển lại
            renderSelect2();
            
            //Cập nhật ID + resort sau chọn
            $("#size-table").on('change', 'select', function() {
                const row = table.row((idx, data) => data[0] === $(this).val());
                const val = $(this).val()
                table.cell(row.index(), 0).data(val).draw();
                renderSelect2();
            });
            
            if (!isEditMode) {
                $("#tensp").val($("#tensp").data('prev-val'));
                $("#gianhap").val($("#gianhap").data('prev-val'));
                $("#loinhuan").val($("#loinhuan").data('prev-val'));
                $("#mota").val($("#mota").data('prev-val'));
                $("#gioitinh").val($("#gioitinh").data('prev-val'));
                $("#mau").val($("#mau").data('prev-val')).trigger('change');
                $("#loai").val($("#loai").data('prev-val')).trigger('change');
                $("#hang").val($("#hang").data('prev-val')).trigger('change');
                $("#trangthai").val($("#trangthai").data('prev-val'));
            }
        });

        $("#save-btn").on('click', function() {
            const data = {
                masp: $("#masp").text().split('-')[1],
                tensp: $("#tensp").val(),
                gianhap: $("#gianhap").val(),
                tyleloinhuan: $("#loinhuan").val(),
                motasp: $("#mota").val(),
                gioitinh: $("#gioitinh").val(),
                mausac: $("#mau").val(),
                loai: $("#loai").val(),
                hang: $("#hang").val(),
                trangthai: $("#trangthai").val(),
            }

            let sizeDataArray = [];
            table.rows().every( function ( rowIdx, tableLoop, rowLoop ) {
                let data = this.data();
                const sizeData = {
                    masize: data[0],
                    soLuong: data[2]
                }
                sizeDataArray.push(sizeData);
            } );

            if (JSON.stringify(data) == JSON.stringify(initialData))
                console.log("No changes in info");
            if (JSON.stringify(sizeDataArray) == JSON.stringify(initialSizeDataArray))
                console.log("No changes in sizes");
        });
        
        function renderSelect2() {
            let optionsHTML = `<option></option>`;
            allSize.forEach(function(size) {
                if(typeof table.row((idx, data) => data[0] === size.masize).index() !== "undefined")
                    optionsHTML += `<option disabled value="${size.masize}">${size.tensize}</option>`;
                else 
                    optionsHTML += `<option value="${size.masize}">${size.tensize}</option>`
            });

            $("#table-div .tensize").each(function (index, value) {
                if (isEditMode) {
                    const currVal = table.cell(index, 0).data();
                    $(this).html(`
                        <div class="block m-0">
                            <select class="js-select2 form-select" style="width: 100%">
                                ${optionsHTML}
                            </select>
                        </div>
                    `);

                    $(this).find("select").val(currVal);
                    $(this).find(".js-select2").select2();
                }
                else {
                    const currName = $(this).data('prev-value');
                    $(this).html(`
                        ${currName}    
                    `);
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
});