<!-- Page JS Plugins CSS -->
<?php $dm->get_css('js/plugins/flatpickr/flatpickr.min.css'); ?>
<?php $dm->get_css('js/plugins/datatables-bs5/css/dataTables.bootstrap5.min.css'); ?>
<?php $dm->get_css('js/plugins/datatables-buttons-bs5/css/buttons.bootstrap5.min.css'); ?>
<?php $dm->get_css('js/plugins/datatables-responsive-bs5/css/responsive.bootstrap5.min.css'); ?>
<?php $dm->get_css('js/plugins/sweetalert2/sweetalert2.min.css'); ?>

<!-- Page Content -->
<div class="content">
    <!-- All Order -->
    <div class="block block-rounded">
        <div class="block-header block-header-default">
            <h3 class="block-title">Đơn hàng</h3>
        </div>
        <div class="block-content block-content-full">
            <!-- Bulk Action -->
            <div id="bulk-action-bar" class="d-none bg-body-light p-2 mb-3 rounded border d-flex align-items-center justify-content-between">
                <div class="fw-semibold">
                    <i class="fa fa-check-square me-1 text-primary"></i>
                    Đã chọn (<span id="selected-count">0</span> đơn hàng)
                </div>
                <div class="d-flex align-items-center gap-2">
                    <select class="form-select form-select-sm" id="bulk-status-select" style="width: 200px;">
                        <option value="">-- Thay đổi trạng thái --</option>
                        <option value="1">Đã xác nhận</option>
                        <option value="2">Đã giao thành công</option>
                        <option value="3">Đã hủy</option>
                    </select>
                    <button type="button" class="btn btn-sm btn-primary" id="btn-apply-bulk">Áp dụng</button>
                </div>
            </div>
            <!-- END Bulk Action -->

            <!-- All Orders Table -->
            <div class="table-responsive">
                <table id="user-table" class="table table-borderless table-striped table-vcenter js-dataTable-responsive js-table-checkable">
                    <thead>
                        <tr>
                            <!-- Checkbox -->
                            <th class="text-center" style="width: 30px;">
                                <div class="form-check d-inline-block">
                                    <input class="form-check-input" type="checkbox" value="" id="check-all" name="check-all">
                                    <label class="form-check-label" for="check-all"></label>
                                </div>
                            </th>


                            <!-- sm: Ẩn trên điện thoại / md: ẩn trên ipad -->
                            <th class="text-center">MÃ ĐH</th>
                            <th class="text-center">KHÁCH HÀNG</th>
                            <th class="text-center">TỔNG TIỀN</th>
                            <th class="text-center d-none d-sm-table-cell">THỜI GIAN</th>
                            <th class="text-center d-none d-lg-table-cell">ĐỊA CHỈ</th>
                            <th class="text-center">THANH TOÁN</th>
                            <th class="text-center">TRẠNG THÁI</th>
                            <th class="text-center">HÀNH ĐỘNG</th>
                        </tr>
                    </thead>

                    <!-- Data Table -->
                    <tbody>
                    </tbody>
                    <!-- END Data Table -->

                </table>
                <!-- END All Orders Table -->
            </div>
        </div>
        <!-- END All Orders -->
    </div>
    <!-- END Page Content -->