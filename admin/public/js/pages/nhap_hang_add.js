Dashmix.onLoad(() => {
    class NhapHangAdd {
        static selectedProducts = {};

        // Tìm kiếm sản phẩm trong kho
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
                flatpickr('#ngaynhap', {
                    enableTime: true,
                    dateFormat: "Y-m-d H:i",
                    time_24hr: true,
                    locale: "vn"
                });
            }
        }

        // Danh sách sản phẩm của phiếu
        static initAddProduct() {
            jQuery(document).on('click', '.btn-add-product', function () {
                const masp = $(this).data('masp');
                const tensp = $(this).data('tensp');
                const tonkho = parseInt($(this).data('tonkho')) || 0;
                const gianhap = parseInt($(this).data('gianhap')) || 0;

                if (tonkho <= 0) {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Không thể thêm!',
                        text: `Sản phẩm "${tensp}" đã hết hàng trong kho.`,
                        confirmButtonText: 'Đã hiểu',
                        customClass: {
                            confirmButton: 'btn btn-primary'
                        }
                    });
                    return;
                }

                if (NhapHangAdd.selectedProducts[masp]) {
                    NhapHangAdd.selectedProducts[masp].soluong += 1;
                    jQuery(`#sp-row-${masp} .qty-input`).val(NhapHangAdd.selectedProducts[masp].soluong);
                } else {
                    NhapHangAdd.selectedProducts[masp] = { tensp, gianhap, soluong: 1, dongia: gianhap };
                    NhapHangAdd.addRow(masp);
                }
                NhapHangAdd.updateUI();
            });
        }

        static addRow(masp) {
            const { tensp, soluong, dongia } = NhapHangAdd.selectedProducts[masp];
            const html = `
                <tr id="sp-row-${masp}">
                    <td class="text-center row-index"></td>
                    <td>
                        <div class="fw-semibold">${tensp}</div>
                        <div class="fs-xs text-muted">SP${String(masp).padStart(3, '0')}</div>
                    </td>
                    <td><input type="number" class="form-control form-control-sm qty-input text-center" value="${soluong}" min="1" data-masp="${masp}"></td>
                    <td><input type="number" class="form-control form-control-sm price-input text-center" value="${dongia}" min="0" data-masp="${masp}"></td>
                    <td class="text-end fw-semibold row-total" id="total-${masp}">0 ₫</td>
                    <td class="text-center">
                        <button class="btn btn-sm btn-alt-danger btn-remove-product" data-masp="${masp}"><i class="fa fa-times"></i></button>
                    </td>
                </tr>`;
            jQuery('#selected-products-body').append(html);
            jQuery('#empty-row').addClass('d-none');
        }

        static updateUI() {
            let grandTotal = 0;
            let count = 0;
            const keys = Object.keys(NhapHangAdd.selectedProducts);

            keys.forEach((masp, index) => {
                const p = NhapHangAdd.selectedProducts[masp];
                const rowTotal = p.soluong * p.dongia;
                grandTotal += rowTotal;
                count++;

                jQuery(`#sp-row-${masp} .row-index`).text(index + 1);
                jQuery(`#total-${masp}`).text(rowTotal.toLocaleString('vi-VN') + ' ₫');
            });

            jQuery('#total-amount').text(grandTotal.toLocaleString('vi-VN') + ' ₫');
            jQuery('#item-count').text(`${count} sản phẩm`);

            if (count === 0) jQuery('#empty-row').removeClass('d-none');
        }

        static initEvents() {
            jQuery(document).on('input', '.qty-input, .price-input', function () {
                const masp = $(this).data('masp');
                let val = parseInt($(this).val()) || 0;
                if ($(this).hasClass('qty-input')) {
                    if (val < 1) val = 1;
                    NhapHangAdd.selectedProducts[masp].soluong = val;
                } else {
                    if (val < 0) val = 0;
                    NhapHangAdd.selectedProducts[masp].dongia = val;
                }
                NhapHangAdd.updateUI();
            });

            jQuery(document).on('click', '.btn-remove-product', function () {
                const masp = $(this).data('masp');
                delete NhapHangAdd.selectedProducts[masp];
                jQuery(`#sp-row-${masp}`).remove();
                NhapHangAdd.updateUI();
            });
        }

        static init() {
            this.initFlatpickr();
            this.initSearch();
            this.initAddProduct();
            this.initEvents();
        }
    }
    NhapHangAdd.init();
});