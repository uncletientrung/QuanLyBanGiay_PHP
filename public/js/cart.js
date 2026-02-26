document.querySelectorAll('.btn-plus, .btn-minus').forEach(btn => {
    btn.addEventListener('click', function () {
        const masp = this.dataset.masp; // bằng với data-masp bên View
        const soluong = this.dataset.soluong;
        const action = this.classList.contains('btn-plus') ? 'plus' : 'minus';

        fetch(ROOT_URL + 'cart/update', {
            method: 'POST',
            headers: {'Content-Type': 'application/x-www-form-urlencoded'},
            body: `masp=${masp}&soluong=${soluong}&action=${action}`
        })
        .then(res => res.json())
        .then(data => {
            if (data.success) {
                location.reload();
            }
        });
    });
});