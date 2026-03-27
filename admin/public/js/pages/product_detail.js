Dashmix.onLoad(() => {
    Dashmix.helpers('jq-select2');

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

    $(document).ready(function() {
        const allSizeFetch = $("#allSizeFetcher").text();
        const allSize = JSON.parse(allSizeFetch);

        const fields = $(".form-control, .form-select");
        const save_btn = $("#save-btn");
        
        fields.prop('disabled',true);

        let isEditMode = false;
        $("#edit-btn").on('click', function() {
            isEditMode = !isEditMode;

            //Bật borders cho các field
            fields.prop('disabled', !isEditMode);
            $(".select2-selection").toggleClass('border border-2 border-info rounded');
            fields.toggleClass('border border-2 border-info rounded');
            save_btn.toggleClass('invisible');
            $("#table-div").toggleClass('border border-2 border-info rounded')
            table.column(3).visible(isEditMode);

            //Chuyển ô kích thước thành select2 và chuyển lại
            let optionsHTML = `<option></option>`;
            allSize.forEach(function(size) {
                optionsHTML += `<option value="${size.tensize}">${size.tensize}</option>`;
            });

            $("#table-div .tensize").each(function () {
                if (isEditMode) {
                    const currVal = $(this).text().trim();
                    $(this).html(`
                        <div class="block m-0">
                            <select class="js-select2 form-select" style="width: 100%">
                                ${optionsHTML}
                            </select>
                        </div>
                    `);

                    $(this).data('prev-value', currVal);

                    $(this).find("select").val(currVal).trigger("change");
                    $(this).find(".js-select2").select2();
                }
                else {
                    const currVal = $(this).data('prev-value');
                    $(this).html(`
                        ${currVal}    
                    `);
                }
            });
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
            alert(Object.values((data)));
        });
    })
})