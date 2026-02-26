// Sửa
document.querySelectorAll('.btn-plus, .btn-minus').forEach(btn => {
    btn.addEventListener('click', function () {
        const masp = this.dataset.masp;
        const action = this.classList.contains('btn-plus') ? 'plus' : 'minus';

        fetch(ROOT_URL + 'cart/update', {
            method: 'POST',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
            body: `masp=${masp}&action=${action}`
        })
            .then(res => res.json())
            .then(data => {
                if (data.success) {
                    document.querySelector('#quantity-' + masp).value = data.soluong_moi;
                    document.querySelector('#price-' + masp).innerText = data.thanhtien;
                    document.querySelector('#cart-total').innerText = data.tonggiohang;
                    document.querySelector('#cart-total-final').innerText = data.tonggiohang;
                }
            });
    });
});
// Xóa
document.addEventListener('click', function (e) {
    const btn = e.target.closest('.btn-cart-delete');
    if (!btn) return;
    const masp = btn.dataset.masp;
    fetch(ROOT_URL + 'cart/delete', {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: `masp=${masp}`
    })
        .then(res => res.json())
        .then(data => {
            if (!data.success) return;
            const row = document.getElementById(`cart-row-${masp}`);
            if (row) row.remove();
            document.getElementById('cart-total').innerText = data.tonggiohang;
            document.getElementById('cart-total-final').innerText = data.tonggiohang;
            if (data.empty) {
                document.getElementById('cart-body').innerHTML = `
        <tr>
            <td colspan="6">
                <div class="text-center py-5">
                    <i class="fa fa-shopping-cart fa-4x text-muted mb-4"></i>
                    <h4 class="text-muted mb-3">
                        Không có sản phẩm
                    </h4>
                    <p class="text-muted mb-4">
                        Hãy quay lại cửa hàng để chọn sản phẩm bạn yêu thích
                    </p>
                    <a href="${ROOT_URL}products" class="btn btn-primary px-4 py-2">
                        <i class="fa fa-arrow-left me-2"></i>
                        Quay lại shop
                    </a>
                </div>
            </td>
        </tr>
    `;
            }

        })

});