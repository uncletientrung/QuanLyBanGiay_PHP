<!-- Header (giữ nguyên) -->
<div class="container-fluid page-header py-4">
    <h1 class="text-center text-white display-6">Chi Tiết Đơn Hàng #<?= $madh ?></h1>
    <ol class="breadcrumb justify-content-center mb-0">
        <li class="breadcrumb-item"><a href="<?= ROOT_URL ?>">Trang chủ</a></li>
        <li class="breadcrumb-item"><a href="<?= ROOT_URL ?>my-orders">Đơn hàng của tôi</a></li>
        <li class="breadcrumb-item active text-white">#<?= $madh ?></li>
    </ol>
</div>

<!-- Order Detail gọn - giống checkout -->
<div class="container py-5">
    <div class="row g-4">

        <!-- Cột trái: Info nhận hàng + Phương thức thanh toán + Trạng thái (tất cả trong 1 khối) -->
        <div class="col-lg-5">
            <div class="checkout-section bg-light rounded-3 p-4">
                <h4 class="mb-4 fw-bold text-navy">Thông tin nhận hàng</h4>
                <p class="mb-2"><strong>Trung</strong></p>
                <p class="mb-2">SĐT: 0123 456 789</p>
                <p class="mb-4">Địa chỉ: 123 Đường ABC, Quận 1, TP. Hồ Chí Minh</p>

                <h5 class="mb-3 fw-bold text-navy">Phương thức thanh toán</h5>
                <p class="mb-4">Thanh toán khi nhận hàng (COD)</p>

                <!-- Trạng thái đơn hàng - nằm trong cùng khung -->
                <h5 class="mb-3 fw-bold text-navy">Trạng thái đơn hàng</h5>
                <div class="d-flex justify-content-between text-center small">
                    <div>
                        <div class="step-circle bg-navy text-white mb-1">✓</div>
                        <p class="mb-0 fw-bold">Chờ xác nhận</p>
                    </div>
                    <div class="flex-fill align-self-center"><hr class="my-0 bg-secondary"></div>
                    <div>
                        <div class="step-circle bg-light border border-navy text-navy mb-1">2</div>
                        <p class="mb-0">Xử lý</p>
                    </div>
                    <div class="flex-fill align-self-center"><hr class="my-0 bg-secondary"></div>
                    <div>
                        <div class="step-circle bg-light border border-navy text-navy mb-1">3</div>
                        <p class="mb-0">Đang giao</p>
                    </div>
                    <div class="flex-fill align-self-center"><hr class="my-0 bg-secondary"></div>
                    <div>
                        <div class="step-circle bg-light border border-navy text-navy mb-1">4</div>
                        <p class="mb-0">Đã giao</p>
                    </div>
                </div>
                <small class="text-muted mt-3 d-block">Cập nhật lần cuối: 12/03/2026 09:45</small>
            </div>
        </div>

        <!-- Cột phải: Sản phẩm + Tổng tiền -->
        <div class="col-lg-7">
            <div class="order-summary bg-white border border-secondary-subtle rounded-3 p-4">
                <h4 class="mb-4 fw-bold text-navy">Sản phẩm đã đặt</h4>

                <div class="table-responsive">
                    <table class="table table-borderless">
                        <thead class="bg-light">
                            <tr>
                                <th>Sản phẩm</th>
                                <th>Tên</th>
                                <th>SL</th>
                                <th>Thành tiền</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Row ví dụ - bạn loop PHP -->
                            <tr>
                                <td><img src="path/to/product1.jpg" style="width:60px;height:60px;object-fit:cover;border-radius:6px;" alt=""></td>
                                <td>
                                    Áo Nike Dri-FIT<br>
                                    <small class="text-muted">Size: L - Màu: Đen</small>
                                </td>
                                <td>2</td>
                                <td class="fw-bold text-danger">1.960.000₫</td>
                            </tr>
                            <tr>
                                <td><img src="path/to/product2.jpg" style="width:60px;height:60px;object-fit:cover;border-radius:6px;" alt=""></td>
                                <td>
                                    Giày Air Jordan 1 High<br>
                                    <small class="text-muted">Size: 42 - Màu: Trắng</small>
                                </td>
                                <td>1</td>
                                <td class="fw-bold text-danger">3.200.000₫</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <hr class="my-4">

                <div class="d-flex justify-content-between mb-2">
                    <span>Tổng tiền hàng:</span>
                    <span class="fw-bold">5.160.000₫</span>
                </div>
                <div class="d-flex justify-content-between mb-2">
                    <span>Phí vận chuyển:</span>
                    <span class="text-success">Miễn phí</span>
                </div>
                <div class="d-flex justify-content-between fs-5 fw-bold">
                    <span>Tổng thanh toán:</span>
                    <span class="text-danger">5.160.000₫</span>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- CSS (thêm hoặc cập nhật vào file CSS của bạn) -->
<style>
    .text-navy { color: var(--navy) !important; }
    .step-circle {
        width: 32px;
        height: 32px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 14px;
        font-weight: bold;
        margin: 0 auto 4px;
    }
    .checkout-section,
    .order-summary {
        box-shadow: 0 2px 10px rgba(0,0,0,0.05);
    }
</style>