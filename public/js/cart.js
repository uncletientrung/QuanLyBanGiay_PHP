// ========== HÀM AJAX DÙNG CHUNG ==========
function updateQuantity(masp, masize, action, quantity) {
  const inputEl = document.querySelector(`#quantity-${masp}-${masize}`);
  const oldVal = inputEl.value; // lưu lại để rollback nếu lỗi

  const params = new URLSearchParams({ masp, masize, action });
  if (action === "set") params.append("quantity", quantity);

  fetch(ROOT_URL + "cart/update", {
    method: "POST",
    headers: { "Content-Type": "application/x-www-form-urlencoded" },
    body: params.toString(),
  })
    .then((res) => res.json())
    .then((data) => {
      if (data.success) {
        // Cập nhật input
        inputEl.value = data.soluong_moi;

        // Cập nhật thành tiền của dòng
        const priceEl = document.querySelector(`#price-${masp}-${masize}`);
        if (priceEl) priceEl.innerText = data.thanhtien;

        // Cập nhật tổng giỏ hàng
        document.querySelector("#cart-total").innerText = data.tonggiohang;
        document.querySelector("#cart-total-final").innerText =
          data.tonggiohang;
      } else {
        alert(data.error);
        inputEl.value = oldVal; // rollback về giá trị cũ
      }
    })
    .catch(() => {
      alert("Có lỗi xảy ra, vui lòng thử lại.");
      inputEl.value = oldVal;
    });
}

// ========== NÚT CỘNG / TRỪ ==========
document.addEventListener("click", function (e) {
  const btn = e.target.closest(".btn-plus, .btn-minus");
  if (!btn) return;

  const masp = btn.dataset.masp;
  const masize = btn.dataset.masize;
  const action = btn.classList.contains("btn-plus") ? "plus" : "minus";

  updateQuantity(masp, masize, action, null);
});

// ========== NHẬP TAY VÀO INPUT ==========

// Chỉ cho nhập số (chặn ký tự không phải số)
document.addEventListener("keypress", function (e) {
  if (!e.target.classList.contains("qty-input")) return;
  if (!/[0-9]/.test(e.key)) e.preventDefault();
});

// Chặn paste ký tự không phải số
document.addEventListener("paste", function (e) {
  if (!e.target.classList.contains("qty-input")) return;
  const text = (e.clipboardData || window.clipboardData).getData("text");
  if (!/^\d+$/.test(text)) e.preventDefault();
});

// Khi rời khỏi input (blur) hoặc nhấn Enter → validate và gửi
document.addEventListener(
  "blur",
  function (e) {
    if (!e.target.classList.contains("qty-input")) return;
    handleQtyInput(e.target);
  },
  true,
); // useCapture = true để bắt được blur

document.addEventListener("keydown", function (e) {
  if (!e.target.classList.contains("qty-input")) return;
  if (e.key === "Enter") {
    e.preventDefault();
    e.target.blur(); // trigger blur để xử lý
  }
  // Chặn dấu trừ, dấu cộng, chữ e (input number quirk)
  if (["-", "+", "e", "E", "."].includes(e.key)) e.preventDefault();
});

function handleQtyInput(inputEl) {
  const masp = inputEl.dataset.masp;
  const masize = inputEl.dataset.masize;
  let val = parseInt(inputEl.value);

  // Nếu rỗng hoặc không phải số → reset về 1
  if (isNaN(val) || val < 1) {
    inputEl.value = 1;
    val = 1;
  }

  updateQuantity(masp, masize, "set", val);
}

// ========== XÓA SẢN PHẨM ==========
document.addEventListener("click", function (e) {
  const btn = e.target.closest(".btn-cart-delete");
  if (!btn) return;

  const masp = btn.dataset.masp;
  const masize = btn.dataset.masize;

  fetch(ROOT_URL + "cart/delete", {
    method: "POST",
    headers: { "Content-Type": "application/x-www-form-urlencoded" },
    body: `masp=${masp}&masize=${masize}`,
  })
    .then((res) => res.json())
    .then((data) => {
      if (!data.success) return;

      // Xóa dòng khỏi bảng
      const row = document.getElementById(`cart-row-${masp}-${masize}`);
      if (row) row.remove();

      // Cập nhật tổng
      document.getElementById("cart-total").innerText = data.tonggiohang;
      document.getElementById("cart-total-final").innerText = data.tonggiohang;

      // Cập nhật badge số lượng trên icon giỏ hàng
      const cartCount = document.getElementById("cart-count");
      if (cartCount) {
        if (data.cartCount == 0) {
          cartCount.remove();
        } else {
          cartCount.innerText = data.cartCount;
        }
      }

      // Nếu giỏ trống → hiện thông báo
      if (data.empty) {
        document.getElementById("cart-body").innerHTML = `
          <tr>
            <td colspan="6">
              <div class="text-center py-5">
                <i class="fa fa-shopping-cart fa-4x text-muted mb-4"></i>
                <h4 class="text-muted mb-3">Không có sản phẩm</h4>
                <p class="text-muted mb-4">Hãy quay lại cửa hàng để chọn sản phẩm bạn yêu thích</p>
                <a href="${ROOT_URL}products" class="btn btn-primary px-4 py-2">
                  <i class="fa fa-arrow-left me-2"></i> Quay lại shop
                </a>
              </div>
            </td>
          </tr>
        `;
      }
    })
    .catch(() => alert("Có lỗi xảy ra khi xóa sản phẩm."));
});
document.getElementById('proceed-to-checkout')?.addEventListener('click', function(e) {
  e.preventDefault();

  // Optional: Disable nút ngay để tránh click lặp
  this.disabled = true;
  this.innerText = 'Đang kiểm tra...';

  fetch(ROOT_URL + 'cart/validate-for-checkout', {  // Route mới bạn tạo
    method: 'POST',
    headers: { 'Content-Type': 'application/json' },
    body: JSON.stringify({})  // Không cần body nếu chỉ check giỏ của user
  })
  .then(res => res.json())
  .then(data => {
    if (data.success) {
      window.location.href = ROOT_URL + 'chackout';  // Chữ "chackout" có lẽ typo, sửa thành checkout nếu cần
    } else {
      // Hiển thị lỗi (dùng modal hoặc alert)
      alert(data.error || 'Một số sản phẩm không đủ hàng. Vui lòng kiểm tra giỏ hàng!');
      // Optional: Reload giỏ để update qty nếu bạn adjust tự động
      // location.reload();
    }
  })
  .catch(err => {
    alert('Lỗi kết nối, vui lòng thử lại.');
  })
  .finally(() => {
    this.disabled = false;
    this.innerText = 'Tiến hành thanh toán';
  });
});