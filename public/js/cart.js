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