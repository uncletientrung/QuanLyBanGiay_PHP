Dashmix.onLoad(() => {
    class NhapHangAdd {
        static selectedProducts = {};
        static isEdit = false;
        static mapn = null;

        static initSearch() {
            jQuery('#product-search').on('input', function () {
                const q = $(this).val().toLowerCase().trim();
                let found = 0;
                jQuery('.product-item').each(function () {
                    const name = $(this).data('tensp').toLowerCase();
                    const visible = !q || name.includes(q);
                    $(this).toggleClass('d-none', !visible);
                    if (visible) found++;
                });
                jQuery('#no-product-found').toggleClass('d-none', found > 0);
            });
        }

        static initFlatpickr() {
            if (typeof flatpickr !== 'undefined') {
                const fp = flatpickr('#ngaynhap', {
                    enableTime: true,
                    dateFormat: "Y-m-d H:i",
                    time_24hr: true,
                    onChange: (selectedDates) => {
                        this.validateDate(selectedDates[0]);
                    },
                    onReady: (selectedDates) => {
                        this.validateDate(selectedDates[0]);
                    }
                });

                if (fp.selectedDates.length > 0) {
                    this.validateDate(fp.selectedDates[0]);
                }
            }
        }

        static validateDate(selectedDate) {
            if (!selectedDate) return;
            const now = new Date();
            const btnHoanThanh = jQuery('#btn-hoan-thanh');

            if (selectedDate.getTime() > now.getTime()) {
                btnHoanThanh.prop('disabled', true);
                btnHoanThanh.attr('title', 'Không thể hoàn thành phiếu nhập ở thời gian tương lai');
                btnHoanThanh.addClass('btn-secondary').removeClass('btn-primary');
            } else {
                btnHoanThanh.prop('disabled', false);
                btnHoanThanh.removeAttr('title');
                btnHoanThanh.addClass('btn-primary').removeClass('btn-secondary');
                jQuery('#date-warning').remove();
            }
        }

        // Fetch sizes của sản phẩm từ server
        static fetchSizes(masp, callback) {
            $.get('../sizes/getDataByProd', { id: masp }, function (res) {
                callback(Array.isArray(res) ? res : []);
            }, 'json').fail(() => callback([]));
        }

        static initAddProduct() {
            jQuery(document).on('click', '.btn-add-product', function () {
                const masp = $(this).data('masp');
                const tensp = $(this).data('tensp');
                const gianhap = parseInt($(this).data('gianhap')) || 0;

                NhapHangAdd.fetchSizes(masp, function (sizes) {
                    if (!sizes.length) {
                        Swal.fire('Thông báo', 'Sản phẩm này chưa có size nào!', 'warning');
                        return;
                    }

                    const options = sizes.map(s =>
                        `<option value="${s.masize}" data-tensize="${s.tensize}">
                            ${s.tensize} &nbsp;·&nbsp; Tồn: ${s.soluong}
                         </option>`
                    ).join('');

                    Swal.fire({
                        title: `<span class="fs-5">${tensp}</span>`,
                        html: `
                            <label class="form-label fw-semibold mb-1">Chọn size muốn nhập:</label>
                            <select id="swal-size" class="form-select">
                                ${options}
                            </select>`,
                        showCancelButton: true,
                        confirmButtonText: '<i class="fa fa-plus me-1"></i> Thêm vào phiếu',
                        cancelButtonText: 'Hủy',
                        customClass: {
                            confirmButton: 'btn btn-primary m-1',
                            cancelButton: 'btn btn-secondary m-1'
                        },
                        buttonsStyling: false,
                        preConfirm: () => {
                            const sel = document.getElementById('swal-size');
                            return {
                                masize: parseInt(sel.value),
                                tensize: sel.options[sel.selectedIndex].dataset.tensize
                            };
                        }
                    }).then(result => {
                        if (!result.isConfirmed) return;

                        const { masize, tensize } = result.value;
                        const key = `${masp}_${masize}`;

                        if (NhapHangAdd.selectedProducts[key]) {
                            // Đã có dòng này → tăng số lượng
                            NhapHangAdd.selectedProducts[key].soluong += 1;
                            const rowId = NhapHangAdd.rowId(key);
                            jQuery(`#${rowId} .qty-input`).val(
                                NhapHangAdd.selectedProducts[key].soluong
                            );
                        } else {
                            NhapHangAdd.selectedProducts[key] = {
                                masp, tensp, masize, tensize,
                                soluong: 1,
                                dongia: gianhap
                            };
                            NhapHangAdd.addRow(key);
                        }
                        NhapHangAdd.updateUI();
                    });
                });
            });
        }

        static rowId(key) {
            return 'sp-row-' + key.replace('_', '-');
        }

        static addRow(key) {
            const p = NhapHangAdd.selectedProducts[key];
            const rowId = NhapHangAdd.rowId(key);
            const safeKey = key;

            // QUAN TRỌNG: Ép kiểu Number trước khi toLocaleString để hiện dấu chấm
            const formattedPrice = Number(p.dongia).toLocaleString('vi-VN');

            const html = `
                <tr id="${rowId}">
                    <td class="text-center row-index"></td>
                    <td>
                        <div class="fw-semibold">${p.tensp}</div>
                        <div class="fs-xs text-muted">SP-${p.masp}</div>
                    </td>
                    <td class="text-center">
                        <span class="badge bg-info text-dark px-2 py-1">${p.tensize}</span>
                    </td>
                    <td>
                        <input type="number"
                            class="form-control form-control-sm qty-input text-center"
                            value="${p.soluong}" min="1"
                            data-key="${safeKey}">
                    </td>
                    <td>
                        <input type="text"
                            class="form-control form-control-sm price-input text-center"
                            value="${formattedPrice}" 
                            data-key="${safeKey}">
                    </td>
                    <td class="text-end fw-semibold row-total" id="rowtotal-${rowId}">0 ₫</td>
                    <td class="text-center">
                        <button class="btn btn-sm btn-alt-danger btn-remove-product"
                            data-key="${safeKey}">
                            <i class="fa fa-times"></i>
                        </button>
                    </td>
                </tr>`;

            jQuery('#selected-products-body').append(html);
            jQuery('#empty-row').addClass('d-none');
        }

        static updateUI() {
            let grandTotal = 0, count = 0;

            Object.keys(NhapHangAdd.selectedProducts).forEach((key, index) => {
                const p = NhapHangAdd.selectedProducts[key];
                const rowTotal = p.soluong * p.dongia;
                grandTotal += rowTotal;
                count++;

                const rowId = NhapHangAdd.rowId(key);
                jQuery(`#${rowId} .row-index`).text(index + 1);
                jQuery(`#rowtotal-${rowId}`).text(rowTotal.toLocaleString('vi-VN') + ' ₫');
            });

            jQuery('#total-amount').text(grandTotal.toLocaleString('vi-VN') + ' ₫');
            jQuery('#item-count').text(`${count} sản phẩm`);

            if (count === 0) jQuery('#empty-row').removeClass('d-none');
        }

        static initEvents() {
            // Sửa số lượng / đơn giá
            jQuery(document).on('input', '.qty-input, .price-input', function () {
                const key = $(this).data('key');
                if ($(this).hasClass('qty-input')) {
                    let val = parseInt($(this).val()) || 0;
                    if (val < 1) { val = 1; $(this).val(1); }
                    NhapHangAdd.selectedProducts[key].soluong = val;
                }
                else {
                    let inputVal = $(this).val();
                    let rawVal = inputVal.replace(/\D/g, "");
                    let numericVal = parseInt(rawVal) || 0;
                    NhapHangAdd.selectedProducts[key].dongia = numericVal;
                    $(this).val(numericVal === 0 ? "" : numericVal.toLocaleString('vi-VN'));
                }

                NhapHangAdd.updateUI();
            });

            // Xóa dòng
            jQuery(document).on('click', '.btn-remove-product', function () {
                const key = $(this).data('key');
                const rowId = NhapHangAdd.rowId(key);
                delete NhapHangAdd.selectedProducts[key];
                jQuery(`#${rowId}`).remove();
                NhapHangAdd.updateUI();
            });
        }

        // Load dữ liệu khi đang ở chế độ sửa phiếu
        static loadEditData() {
            if (typeof editProducts === 'undefined' || !editProducts || !editProducts.length) return;

            NhapHangAdd.isEdit = true;
            NhapHangAdd.mapn = $('#mapn').val();

            editProducts.forEach(product => {
                const masp = product.masp;
                const masize = product.masize;
                const tensize = product.tensize || ('Size ' + masize);
                const key = `${masp}_${masize}`;

                NhapHangAdd.selectedProducts[key] = {
                    masp,
                    tensp: product.tensp,
                    masize,
                    tensize,
                    soluong: product.soluong,
                    dongia: product.dongia
                };
                NhapHangAdd.addRow(key);
            });
            NhapHangAdd.updateUI();
        }

        static savePhieuNhap(trangthai) {
            const ngaynhap = $('#ngaynhap').val();
            const mancc = $('#mancc').val();

            if (!ngaynhap) {
                Swal.fire('Lỗi', 'Vui lòng chọn ngày nhập', 'error');
                return;
            }

            if (!mancc) {
                Swal.fire('Lỗi', 'Vui lòng chọn nhà cung cấp', 'error');
                return;
            }

            const products = Object.values(NhapHangAdd.selectedProducts).map(p => ({
                masp: parseInt(p.masp),
                masize: parseInt(p.masize),
                soluong: p.soluong,
                dongia: p.dongia
            }));

            if (!products.length) {
                Swal.fire('Lỗi', 'Vui lòng thêm ít nhất một sản phẩm', 'error');
                return;
            }

            const payload = {
                mapn: NhapHangAdd.mapn ? parseInt(NhapHangAdd.mapn) : null,
                ngaynhap,
                mancc: parseInt(mancc),
                trangthai,
                products
            };

            const url = NhapHangAdd.isEdit ? '../nhap_hang/update' : '../nhap_hang/add';
            const successMsg = NhapHangAdd.isEdit ? 'Cập nhật phiếu nhập thành công!' : 'Tạo phiếu nhập thành công!';

            $.ajax({
                url,
                type: 'POST',
                contentType: 'application/json',
                data: JSON.stringify(payload),
                success(response) {
                    if (response.success) {
                        Swal.fire('Thành công', successMsg, 'success').then(() => {
                            window.location.href = '../nhap_hang';
                        });
                    } else {
                        Swal.fire('Lỗi', response.message || 'Có lỗi xảy ra', 'error');
                    }
                },
                error() {
                    Swal.fire('Lỗi', 'Có lỗi xảy ra khi kết nối server', 'error');
                }
            });
        }

        static init() {
            this.initFlatpickr();
            this.initSearch();
            this.initAddProduct();
            this.initEvents();
            this.loadEditData();

            $('#btn-hoan-thanh').on('click', () => this.savePhieuNhap(1));
            $('#btn-luu-tam').on('click', () => this.savePhieuNhap(0));
        }
    }

    NhapHangAdd.init();
});