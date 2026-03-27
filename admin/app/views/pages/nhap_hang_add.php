<?php $dm->get_css('js/plugins/flatpickr/flatpickr.min.css'); ?>
<?php $dm->get_css('js/plugins/sweetalert2/sweetalert2.min.css'); ?>

<!-- Page Content -->
<div class="content">

    <div class="mb-3">
        <a class="btn btn-alt-primary" href="../nhap_hang">
            <i class="fa fa-chevron-left me-1"></i> Danh sách phiếu nhập
        </a>
    </div>

    <div class="row">

        <!-- LEFT: FORM -->
        <div class="col-lg-8">
            <div class="block block-rounded">
                <div class="block-header block-header-default">
                    <h3 class="block-title">
                        <i class="fa fa-file-alt me-2 text-primary"></i>
                        Tạo phiếu nhập mới
                    </h3>
                </div>
                <div class="block-content">

                    <div class="mb-4">
                        <label class="form-label fw-semibold">Mã phiếu nhập</label>
                        <input type="text" class="form-control" value="<?= htmlspecialchars($nextMaPN) ?>" readonly>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-semibold" for="ngaynhap">Ngày nhập <span class="text-danger">*</span></label>
                        <input type="text"
                            class="form-control"
                            id="ngaynhap"
                            name="ngaynhap"
                            placeholder="Chọn ngày và giờ"
                            value="<?= date('Y-m-d H:i') ?>">
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-semibold" for="mancc">
                            Nhà cung cấp <span class="text-danger">*</span>
                        </label>
                        <select class="form-select" id="mancc" name="mancc">
                            <option value="">Chọn nhà cung cấp</option>
                            <?php foreach ($suppliers as $ncc): ?>
                                <option value="<?= $ncc['mancc'] ?>"
                                    <?= (isset($phieu) && $phieu['mancc'] == $ncc['mancc']) ? 'selected' : '' ?>>
                                    <?= htmlspecialchars($ncc['tenncc']) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="mb-2">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h5 class="fw-bold mb-0">Danh sách sản phẩm</h5>
                            <span class="badge bg-primary" id="item-count">0 sản phẩm</span>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered table-vcenter">
                                <thead class="bg-body-light">
                                    <tr class="fs-sm text-uppercase">
                                        <th class="text-center" style="width:40px;">#</th>
                                        <th>Tên sản phẩm</th>
                                        <th class="text-center" style="width:100px;">Size</th>
                                        <th class="text-center" style="width:100px;">Số lượng</th>
                                        <th class="text-center" style="width:130px;">Đơn giá (đ)</th>
                                        <th class="text-end" colspan="2" style="width:165px; padding-right: 25px;">Thành tiền</th>
                                    </tr>
                                </thead>
                                <tbody id="selected-products-body">
                                    <tr id="empty-row">
                                        <td colspan="7" class="text-center text-muted py-4">
                                            <i class="fa fa-box-open fa-2x mb-2 d-block opacity-50"></i>
                                            Chưa có sản phẩm. Thêm từ danh sách bên phải.
                                        </td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr class="bg-body-light">
                                        <td colspan="5" class="text-end fw-bold text-uppercase">Tổng tiền hàng:</td>
                                        <td colspan="2" class="text-end fw-bold text-primary fs-5" id="total-amount" style="padding-right: 25px;">0 ₫</td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>

                    <div class="py-3 border-top d-flex gap-2 flex-wrap">
                        <button type="button" class="btn btn-primary" id="btn-hoan-thanh">
                            <i class="fa fa-check me-1"></i> Hoàn thành
                        </button>
                        <button type="button" class="btn btn-warning" id="btn-luu-tam">
                            <i class="fa fa-save me-1"></i> Lưu tạm
                        </button>
                    </div>

                </div>
            </div>
        </div>

        <!-- RIGHT: PRODUCT LIST -->
        <div class="col-lg-4">
            <div class="block block-rounded" style="position:sticky; top:80px;">
                <div class="block-header block-header-default">
                    <h3 class="block-title">
                        <i class="fa fa-boxes me-2 text-info"></i>
                        Sản phẩm trong kho
                    </h3>
                </div>
                <div class="block-content p-0">
                    <div class="p-3 border-bottom">
                        <input type="text" class="form-control" id="product-search"
                            placeholder="Tìm kiếm sản phẩm...">
                    </div>
                    <div id="product-list" style="max-height:520px; overflow-y:auto;">
                        <?php if (!empty($products)): ?>
                            <?php foreach ($products as $p): ?>
                                <div class="product-item d-flex align-items-center justify-content-between px-3 py-2 border-bottom"
                                    data-tensp="<?= htmlspecialchars($p['tensp']) ?>">
                                    <div class="flex-grow-1 me-2">
                                        <div class="fw-semibold"><?= htmlspecialchars($p['tensp']) ?></div>
                                        <div class="fs-xs text-muted">
                                            SP<?= str_pad($p['masp'], 3, '0', STR_PAD_LEFT) ?>
                                            &nbsp;·&nbsp;<?= number_format($p['gianhap'], 0, ',', '.') ?> ₫
                                            &nbsp;·&nbsp;Tồn: <strong><?= (int)$p['tong_kho'] ?></strong>
                                        </div>
                                    </div>
                                    <button type="button"
                                        class="btn btn-sm btn-success btn-add-product flex-shrink-0"
                                        data-masp="<?= $p['masp'] ?>"
                                        data-tensp="<?= htmlspecialchars($p['tensp']) ?>"
                                        data-gianhap="<?= (int)$p['gianhap'] ?>"
                                        data-tonkho="<?= (int)$p['tong_kho'] ?>">
                                        <i class="fa fa-plus"></i>
                                    </button>
                                </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <div class="text-center text-muted py-4">
                                Không có sản phẩm nào
                            </div>
                        <?php endif; ?>
                        <div id="no-product-found" class="text-center text-muted py-4 d-none">
                            Không tìm thấy sản phẩm
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<script>
    const editProducts = <?= isset($chiTiet) ? json_encode($chiTiet) : '[]' ?>;
    const isEditMode = <?= isset($isEdit) && $isEdit ? 'true' : 'false' ?>;
</script>

<?php if (isset($isEdit) && $isEdit): ?>
    <input type="hidden" id="mapn" value="<?= htmlspecialchars($phieu['mapn']) ?>">
<?php endif; ?>