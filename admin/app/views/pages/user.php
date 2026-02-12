<!-- Page JS Plugins CSS -->
<?php $dm->get_css('js/plugins/datatables-bs5/css/dataTables.bootstrap5.min.css'); ?>
<?php $dm->get_css('js/plugins/datatables-buttons-bs5/css/buttons.bootstrap5.min.css'); ?>
<?php $dm->get_css('js/plugins/datatables-responsive-bs5/css/responsive.bootstrap5.min.css'); ?>

<!-- Page Content -->
<div class="content">
    <!-- Quick Overview -->
    <div class="row items-push justify-content-center">
        <div class="col-6 col-lg-3 offset-lg-1">
            <a class="block block-rounded block-link-shadow text-center h-100 mb-0" href="javascript:void(0)">
                <div class="block-content py-5">
                    <div class="fs-3 fw-semibold text-danger mb-1">63</div>
                    <p class="fw-semibold fs-base text-danger text-uppercase mb-0">
                        Out of stock
                    </p>
                </div>
            </a>
        </div>
        <div class="col-6 col-lg-3">
            <a class="block block-rounded block-link-shadow text-center h-100 mb-0" href="javascript:void(0)">
                <div class="block-content py-5">
                    <div class="fs-3 fw-semibold text-dark mb-1">690</div>
                    <p class="fw-semibold fs-base text-muted text-uppercase mb-0">
                        New
                    </p>
                </div>
            </a>
        </div>
        <div class="col-6 col-lg-3">
            <a class="block block-rounded block-link-shadow text-center h-100 mb-0" href="javascript:void(0)">
                <div class="block-content py-5">
                    <div class="fs-3 fw-semibold text-dark mb-1">36.963</div>
                    <p class="fw-semibold fs-base text-muted text-uppercase mb-0">
                        All Products
                    </p>
                </div>
            </a>
        </div>
    </div>
    <!-- END Quick Overview -->

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
                <table class="table table-borderless table-striped table-vcenter js-dataTable-responsive">
                    <thead>
                        <tr>
                            <!-- sm: Ẩn trên điện thoại / md: ẩn trên ipad -->
                            <th class="text-center" style="width: 80px;">Mã</th>
                            <th>Họ tên</th>
                            <th class="d-none d-sm-table-cell">Số điện thoại</th>
                            <th class="d-none d-lg-table-cell">Địa chỉ</th>
                            <th class="text-center">Giới tính</th>
                            <th class="text-center">Trạng thái</th>
                            <th class="text-center">Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $badges['0']['class'] = "bg-success";
                        $badges['0']['text'] = "Hoạt động";
                        $badges['1']['class'] = "bg-danger";
                        $badges['1']['text'] = "Bị khoá";
                        ?>
                        <?php for ($i = 35; $i > 15; $i--) { ?>
                            <tr>
                                <td class="text-center">
                                    <a class="fw-semibold">
                                        <strong>KH-<?php echo $i; ?></strong>
                                    </a>
                                </td>

                                <td class="fs-base">
                                    <div class="fw-semibold text-primary"><?php echo $i; ?></div>
                                    <div class="text-muted small"><?php echo $i; ?>@gmail.com</div>
                                </td>

                                <td class="d-none d-sm-table-cell fs-base">
                                    09012345<?php echo $i; ?>
                                </td>

                                <td class="d-none d-lg-table-cell fs-base">
                                    273 An Dương Vương, P3, Q5
                                </td>

                                <td class="text-center">
                                    <div class="fw-semibold text-primary">
                                        <?php echo ($i % 2 == 0) ? 'Nam' : 'Nữ'; ?>
                                    </div>
                                </td>

                                <td class="text-center">
                                    <span class="badge <?php
                                                        $rand = rand(0, 1);
                                                        echo ($badges[$rand]['class']) ? " " . $badges[$rand]['class'] : "";
                                                        ?>"><?php echo $badges[$rand]['text']; ?></span>
                                </td>

                                <td class="text-center fs-base">
                                    <a class="btn btn-sm btn-alt-secondary">
                                        <i class="fa fa-fw fa-eye"></i>
                                    </a>
                                    <a class="btn btn-sm btn-alt-secondary">
                                        <i class="fa fa-fw fa-pen-to-square text-info"></i>
                                    </a>
                                    <a class="btn btn-sm btn-alt-secondary">
                                        <i class="fa fa-fw fa-times text-danger"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <!-- END All Products Table -->
        </div>
    </div>
    <!-- END All Products -->
</div>
<!-- END Page Content -->