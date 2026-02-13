<!-- Page JS Plugins CSS -->
<?php $dm->get_css('js/plugins/datatables-bs5/css/dataTables.bootstrap5.min.css'); ?>
<?php $dm->get_css('js/plugins/datatables-buttons-bs5/css/buttons.bootstrap5.min.css'); ?>
<?php $dm->get_css('js/plugins/datatables-responsive-bs5/css/responsive.bootstrap5.min.css'); ?>

<!-- Page Content -->
<div class="content">
    <!-- All User -->
    <div class="block block-rounded">
        <div class="block-header block-header-default">
            <h3 class="block-title">Người dùng</h3>
            <div class="block-options">
                <div class="dropdown">
                    <button type="button" class="btn btn-hero btn-primary">
                        Thêm mới <i class="fa fa-plus ms-1"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdown-ecom-filters">
                        <a class="dropdown-item d-flex align-items-center justify-content-between" href="javascript:void(0)">
                            New
                            <span class="badge bg-success rounded-pill">260</span>
                        </a>
                        <a class="dropdown-item d-flex align-items-center justify-content-between" href="javascript:void(0)">
                            Out of Stock
                            <span class="badge bg-danger rounded-pill">63</span>
                        </a>
                        <a class="dropdown-item d-flex align-items-center justify-content-between" href="javascript:void(0)">
                            All
                            <span class="badge bg-black-50 rounded-pill">36k</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="block-content block-content-full">
            <!-- All Products Table -->
            <div class="table-responsive">
                <table id="user-table" class="table table-borderless table-striped table-vcenter js-dataTable-responsive">
                    <thead>
                        <tr>
                            <!-- sm: Ẩn trên điện thoại / md: ẩn trên ipad -->
                            <th class="text-center" style="width: 80px;">MÃ</th>
                            <th class="text-center">HỌ TÊN</th>
                            <th class="d-none d-sm-table-cell text-center">SỐ ĐIỆN THOẠI</th>
                            <th class="d-none d-lg-table-cell text-center">ĐỊA CHỈ</th>
                            <th class="text-center">GIỚI TÍNH</th>
                            <th class="text-center">TRẠNG THÁI</th>
                            <th class="text-center">HÀNH ĐỘNG</th>
                        </tr>
                    </thead>
                    <!-- Data Table -->
                    <tbody>
                    </tbody>
                </table>
            </div>
            <!-- END All Products Table -->
        </div>
    </div>
    <!-- END All Products -->
</div>
<!-- END Page Content -->