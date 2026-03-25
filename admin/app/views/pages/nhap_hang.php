<!-- Page JS Plugins CSS -->
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
</div>
<!-- END Page Content -->