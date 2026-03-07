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
            <div class="block-options">
                <div class="dropdown">
                    <button type="button" class="btn btn-hero btn-primary" data-bs-toggle="modal" data-bs-target="#modal-user" id="btn-add-modal">
                        Thêm mới <i class="fa fa-plus ms-1"></i>
                    </button>
                </div>
            </div>
        </div>
        <div class="block-content block-content-full">
            <!-- All Orders Table -->
            <div class="table-responsive">
                <table id="user-table" class="table table-borderless table-striped table-vcenter js-dataTable-responsive">
                    <thead>
                        <tr>
                            <!-- sm: Ẩn trên điện thoại / md: ẩn trên ipad -->
                            <th class="text-center" style="width: 80px;">MÃ ĐH</th>
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