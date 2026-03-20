<!-- Page JS Plugins CSS -->
<?php $dm->get_css('js/plugins/sweetalert2/sweetalert2.min.css'); ?>

<!-- Page Content -->
<div class="content">
    <div class="mb-3">
        <a class="btn btn-alt-primary" href="../don_hang">
            <i class="fa fa-chevron-left me-1"></i> Danh sách đơn hàng
        </a>
    </div>
    <div class="row">

        <!-- Left -->
        <div class="col-md-8">
            <div class="block block-rounded block-bordered">
                <!-- Header -->
                <div class="block-header block-header-default border-bottom">
                    <h3 class="block-title">Thông tin đơn hàng <b class="text-primary">DH-<?= $order['madh'] ?></b></h3>
                    <div class="block-options">
                        <span class="text-muted fs-sm">
                            <i class="fa fa-clock me-1"></i> <?= date('d/m/Y H:i:s', strtotime($order['thoigiantao'])) ?>
                        </span>
                    </div>
                </div>
                <!-- END Header -->

                <!-- Content -->
                <div class="block-content">

                    <!-- Section Products -->
                    <div class="mb-4">
                        <h4 class="fw-bold mb-3">Sản phẩm</h4>
                        <div class="table-responsive">
                            <table class="table table-bordered table-vcenter">
                                <thead class="bg-body-light">
                                    <tr class="fs-sm text-uppercase">
                                        <th class="text-center" style="width: 70px;">Mã</th>
                                        <th class="text-center" style="width: 80px;">Ảnh</th>
                                        <th class="text-center">Sản phẩm</th>
                                        <th class="text-center">Size</th>
                                        <th class="text-center">Màu sắc</th>
                                        <th class="text-center">Số lượng</th>
                                        <th class="text-center">Đơn giá</th>
                                        <th class="text-center">Thành tiền</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($items as $item): ?>
                                        <tr>
                                            <td class="text-center fw-bold text-primary"><?= $item['masp'] ?></td>
                                            <td class="text-center">
                                                <?php
                                                $imageSrc = !empty($item['path']) ? ROOT_URL . $item['path'] : ROOT_URL . NO_IMAGE;
                                                ?>
                                                <img src="<?= $imageSrc ?>" alt="<?= $item['tensp'] ?>"
                                                    style="width: 60px; height: 60px; object-fit: cover;"
                                                    class="rounded">
                                            </td>
                                            <td class="fw-semibold text-primary"><?= $item['tensp'] ?></td>
                                            <td class="text-center"><?= $item['tensize'] ?></td>
                                            <td class="text-center"><?= $item['tenmau'] ?></td>
                                            <td class="text-center fw-bold"><?= $item['soluong'] ?></td>
                                            <td class="text-end"><?= number_format($item['dongia'], 0, ',', '.') ?>đ</td>
                                            <td class="text-end fw-semibold"><?= number_format($item['dongia'] * $item['soluong'], 0, ',', '.') ?>đ</td>
                                        </tr>
                                    <?php endforeach; ?>

                                    <tr class="bg-body-light">
                                        <td colspan="7" class="text-end fw-bold text-uppercase">Tổng tiền:</td>
                                        <td class="text-end fw-bold text-primary fs-5">
                                            <?= number_format($order['tongtien'], 0, ',', '.') ?>đ
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- END Section Products -->

                    <!-- Section Statuses -->
                    <div class="py-3 border-top">

                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <div class="d-flex align-items-center">
                                <?php
                                $statusLabel = "";
                                $statusIcon = "";

                                switch ($order['trangthai']) {
                                    case -1:
                                        $statusLabel = "Đơn hàng đã hủy";
                                        $statusIcon = '<i class="fa fa-times text-danger me-2"></i>';
                                        break;
                                    case 0:
                                        $statusLabel = "Đơn hàng chờ xử lý";
                                        $statusIcon = '<i class="fa fa-times text-danger me-2"></i>';
                                        break;
                                    case 1:
                                        $statusLabel = "Đơn hàng đã xác nhận";
                                        $statusIcon = '<i class="fa fa-check text-success me-2"></i>';
                                        break;
                                    case 2:
                                        $statusLabel = "Đơn hàng đã hoàn thành";
                                        $statusIcon = '<i class="fa fa-check-double text-success me-2"></i>';
                                        break;
                                    default:
                                        $statusLabel = "Đơn hàng không xác định";
                                        $statusIcon = '<i class="fa fa-question-circle text-muted me-2"></i>';
                                }
                                ?>
                                <?= $statusIcon ?>
                                <span class="fw-bold text-uppercase fs-sm text-muted"><?= $statusLabel ?></span>
                            </div>

                            <?php if ($order['trangthai'] == 0): ?>
                                <button type="button" class="btn btn-primary btn-update-status"
                                    data-id="<?= $order['madh'] ?>"
                                    data-status="1"
                                    data-confirm="Xác nhận đơn hàng DH-<?= $order['madh'] ?>?">
                                    <i class="fa fa-check me-1"></i> Xác nhận đơn
                                </button>
                            <?php endif; ?>
                        </div>
                        <hr>

                        <div class="mb-3">
                            <div class="d-flex align-items-center mb-2">
                                <i class="fa fa-money-bill-wave text-primary me-2"></i>
                                <span class="fw-bold text-uppercase fs-sm text-muted">Thanh toán</span>
                            </div>
                            <div class="ms-4 ps-1 text-muted fs-sm">
                                Phương thức: <strong><?= $order['hinhthucthanhtoan'] ?></strong>
                            </div>
                        </div>
                        <hr>

                        <div class="mb-3">
                            <div class="d-flex align-items-center justify-content-between mb-2">
                                <div class="d-flex align-items-center">
                                    <i class="fa fa-truck text-info me-2"></i>
                                    <span class="fw-bold text-uppercase fs-sm text-muted">Giao hàng</span>
                                </div>
                                <?php if ($order['trangthai'] == 1): ?>
                                    <button type="button" class="btn btn-primary btn-update-status"
                                        data-id="<?= $order['madh'] ?>"
                                        data-status="2"
                                        data-confirm="Xác nhận đã giao thành công đơn hàng DH-<?= $order['madh'] ?>?">
                                        <i class="fa fa-truck me-1"></i> Xác nhận
                                    </button>
                                <?php endif; ?>
                            </div>
                            <div class="ms-4 ps-1 text-muted fs-sm">
                                <?php if ($order['trangthai'] == 2): ?>
                                    <strong class="text-success">Giao hàng thành công</strong>
                                <?php elseif ($order['trangthai'] == -1): ?>
                                    <strong class="text-danger">Đơn hàng đã hủy</strong>
                                <?php else: ?>
                                    <strong class="text-warning">Đang chờ giao hàng</strong>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <!-- END Section Statuses -->
                </div>
                <!-- END Content -->
            </div>
        </div>
        <!-- END Left -->

        <!-- Right -->
        <div class="col-md-4">
            <div class="block block-rounded block-bordered">
                <div class="block-header block-header-default border-bottom">
                    <h3 class="block-title fs-sm fw-bold text-center">Thông tin khách hàng</h3>
                </div>
                <div class="block-content py-3">
                    <div class="d-flex align-items-center mb-3">
                        <div>
                            <div class="fw-bold text-primary fs-lg"><?= $order['hoten'] ?></div>
                            <div class="fs-xs text-muted text-uppercase">
                                <i class="fa fa-venus-mars me-1"></i> <?= $order['gioitinh'] == 1 ? 'Nam' : 'Nữ' ?>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <div class="fs-sm mb-1 text-dark">
                            <i class="fa fa-phone me-2 text-muted"></i> <?= $order['sdt'] ?>
                        </div>
                        <div class="fs-sm text-primary">
                            <i class="fa fa-envelope me-2 text-muted"></i> <?= $order['email'] ?>
                        </div>
                    </div>

                    <hr>

                    <div class="mt-3">
                        <h4 class="fs-sm fw-bold text-uppercase mb-2">Địa chỉ nhận hàng</h4>
                        <div class="fs-sm text-muted lh-base">
                            <i class="fa fa-map-marker-alt me-2 text-danger"></i>
                            <?= $order['diachigiaohang'] ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php if ($order['trangthai'] != 2 && $order['trangthai'] != -1): ?>
                <button type="button" class="btn btn-danger w-100 mt-3 btn-update-status"
                    data-id="<?= $order['madh'] ?>"
                    data-status="-1"
                    data-confirm="Bạn có chắc muốn huỷ đơn hàng DH-<?= $order['madh'] ?>?">
                    <i class="fa fa-times me-1"></i> Huỷ đơn hàng
                </button>
            <?php endif; ?>
        </div>
        <!-- END Right -->
    </div>
</div>