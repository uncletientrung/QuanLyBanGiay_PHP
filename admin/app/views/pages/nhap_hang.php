<!-- Page JS Plugins CSS -->
<?php $dm->get_css('js/plugins/flatpickr/flatpickr.min.css'); ?>
<?php $dm->get_css('js/plugins/datatables-bs5/css/dataTables.bootstrap5.min.css'); ?>
<?php $dm->get_css('js/plugins/datatables-buttons-bs5/css/buttons.bootstrap5.min.css'); ?>
<?php $dm->get_css('css/dashmix.min.css'); ?>
<?php $dm->get_css('js/plugins/datatables-responsive-bs5/css/responsive.bootstrap5.min.css'); ?>
<?php $dm->get_css('js/plugins/sweetalert2/sweetalert2.min.css'); ?>

<!-- Page Content -->
<div class="content">
    <!-- Nhập Hàng Block -->
    <div class="block block-rounded">
        <div class="block-header block-header-default">
            <h3 class="block-title">Nhập hàng</h3>
            <div class="block-options">
                <div class="dropdown">
                    <a class="btn btn-hero btn-primary" href="nhap_hang/add">
                        Tạo phiếu nhập <i class="fa fa-plus ms-1"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="block-content block-content-full">
            <!-- Table Nhập Hàng -->
            <div class="table-responsive">
                <table id="nhaphang-table" class="table table-borderless table-striped table-vcenter js-dataTable-responsive">
                    <thead>
                        <tr>
                            <th class="text-center" style="width: 100px;">MÃ PN</th>
                            <th class="text-center">NHÂN VIÊN</th>
                            <th class="text-center">NHÀ CUNG CẤP</th>
                            <th class="d-none d-sm-table-cell text-center">THỜI GIAN TẠO</th>
                            <th class="text-center">TỔNG TIỀN</th>
                            <th class="text-center">TRẠNG THÁI</th>
                            <th class="text-center">HÀNH ĐỘNG</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal Chi Tiết Phiếu Nhập -->
    <div class="modal fade" id="modal-chitiet-phieunhap" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="block block-rounded block-transparent mb-0">
                    <div class="block-header bg-primary">
                        <h3 class="block-title text-white">
                            <i class="fa fa-file-alt me-2"></i>Thông tin phiếu nhập
                        </h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option text-white" data-bs-dismiss="modal">
                                <i class="fa fa-fw fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content fs-sm">
                        <!-- Header info: Giữ nguyên các trường thông tin chung -->
                        <div class="row g-3 mb-4">
                            <div class="col-md-3">
                                <label class="form-label fw-semibold text-muted small text-uppercase">Mã phiếu</label>
                                <input type="text" class="form-control form-control-alt" id="detail-mapn" readonly>
                            </div>
                            <div class="col-md-3">
                                <label class="form-label fw-semibold text-muted small text-uppercase">Nhân viên nhập</label>
                                <input type="text" class="form-control form-control-alt" id="detail-tenadmin" readonly>
                            </div>
                            <div class="col-md-3">
                                <label class="form-label fw-semibold text-muted small text-uppercase">Nhà cung cấp</label>
                                <input type="text" class="form-control form-control-alt" id="detail-tenncc" readonly>
                            </div>
                            <div class="col-md-3">
                                <label class="form-label fw-semibold text-muted small text-uppercase">Thời gian tạo</label>
                                <input type="text" class="form-control form-control-alt" id="detail-thoigiantao" readonly>
                            </div>
                        </div>

                        <!-- Cấu trúc bảng cuộn với Footer cố định -->
                        <div style="display: flex; flex-direction: column; max-height: 55vh;">
                            <div style="overflow-y: auto; flex: 1; border: 1px solid #e1e1e1; border-radius: 4px 4px 0 0;">
                                <table class="table table-borderless table-striped table-vcenter mb-0">
                                    <thead class="sticky-top bg-white shadow-sm" style="z-index: 1;">
                                        <tr class="text-uppercase fs-sm text-center">
                                            <th style="width: 60px;">STT</th>
                                            <th style="width: 100px;">Mã SP</th>
                                            <th style="width: auto;">Tên sản phẩm</th>
                                            <th style="width: 140px;">Đơn giá</th>
                                            <th style="width: 120px;">Số lượng</th>
                                            <th style="width: 160px;">Thành tiền</th>
                                        </tr>
                                    </thead>
                                    <tbody id="detail-chitiet-body">
                                        <!-- Dữ liệu JS render vào đây -->
                                    </tbody>
                                </table>
                            </div>
                            <!-- Footer bảng cố định nằm ngay dưới vùng cuộn -->
                            <table class="table table-borderless mb-0 border-top bg-body-light">
                                <tfoot>
                                    <tr class="fw-bold">
                                        <td colspan="5" class="text-end text-uppercase py-3" style="width: calc(100% - 160px);">Tổng cộng:</td>
                                        <td class="text-center text-primary fs-5 py-3" style="width: 160px;" id="detail-tongtien">0đ</td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>

                        <!-- Trạng thái -->
                        <div class="mt-3 d-flex align-items-center gap-2">
                            <span class="fw-semibold text-muted small text-uppercase">Trạng thái phiếu:</span>
                            <span id="detail-trangthai"></span>
                        </div>
                    </div>
                    <div class="block-content block-content-full text-end bg-body-light mt-3">
                        <button type="button" class="btn btn-hero btn-danger" data-bs-dismiss="modal">
                            <i class="fa fa-times me-1"></i> Đóng
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END Modal Chi Tiết -->
</div>
<!-- END Page Content -->