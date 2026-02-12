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
                    <p class="fw-semibold fs-sm text-danger text-uppercase mb-0">
                        Out of stock
                    </p>
                </div>
            </a>
        </div>
        <div class="col-6 col-lg-3">
            <a class="block block-rounded block-link-shadow text-center h-100 mb-0" href="javascript:void(0)">
                <div class="block-content py-5">
                    <div class="fs-3 fw-semibold text-dark mb-1">690</div>
                    <p class="fw-semibold fs-sm text-muted text-uppercase mb-0">
                        New
                    </p>
                </div>
            </a>
        </div>
        <div class="col-6 col-lg-3">
            <a class="block block-rounded block-link-shadow text-center h-100 mb-0" href="javascript:void(0)">
                <div class="block-content py-5">
                    <div class="fs-3 fw-semibold text-dark mb-1">36.963</div>
                    <p class="fw-semibold fs-sm text-muted text-uppercase mb-0">
                        All Products
                    </p>
                </div>
            </a>
        </div>
    </div>
    <!-- END Quick Overview -->

    <!-- All Products -->
    <div class="block block-rounded">
        <div class="block-header block-header-default">
            <h3 class="block-title">All Products</h3>
            <div class="block-options">
                <div class="dropdown">
                    <button type="button" class="btn btn-alt-secondary" id="dropdown-ecom-filters" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Filters <i class="fa fa-angle-down ms-1"></i>
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
        <div class="block-content">
            <!-- All Products Table -->
            <div class="table-responsive">
                <table class="table table-borderless table-striped table-vcenter js-dataTable-responsive">
                    <thead>
                        <tr>
                            <th class="text-center" style="width: 100px;">Mã</th>
                            <th class="d-none d-sm-table-cell text-center">Added</th>
                            <th class="d-none d-md-table-cell">Product</th>
                            <th>Status</th>
                            <th class="d-none d-sm-table-cell text-end">Value</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $badges['0']['class'] = "bg-success";
                        $badges['0']['text'] = "Available";
                        $badges['1']['class'] = "bg-danger";
                        $badges['1']['text'] = "Out of Stock";
                        ?>
                        <?php for ($i = 35; $i > 15; $i--) { ?>
                            <tr>
                                <td class="text-center fs-sm">
                                    <a class="fw-semibold" href="be_pages_ecom_product_edit.php">
                                        <strong>PID.0365<?php echo $i; ?></strong>
                                    </a>
                                </td>
                                <td class="d-none d-sm-table-cell text-center fs-sm"><?php echo sprintf('%02d', rand(1, 28)) . '/' . sprintf('%02d', rand(1, 12)); ?>/2019</td>
                                <td class="d-none d-md-table-cell fs-sm">
                                    <a class="fw-semibold" href="be_pages_ecom_product_edit.php">Product #<?php echo $i; ?></a>
                                </td>
                                <td>
                                    <span class="badge<?php
                                                        $rand = rand(0, 1);
                                                        echo ($badges[$rand]['class']) ? " " . $badges[$rand]['class'] : "";
                                                        ?>"><?php echo $badges[$rand]['text']; ?></span>
                                </td>
                                <td class="text-end d-none d-sm-table-cell fs-sm">
                                    <strong>$<?php echo rand(10, 99); ?>,00</strong>
                                </td>
                                <td class="text-center fs-sm">
                                    <a class="btn btn-sm btn-alt-secondary" href="be_pages_ecom_product_edit.php">
                                        <i class="fa fa-fw fa-eye"></i>
                                    </a>
                                    <a class="btn btn-sm btn-alt-secondary" href="javascript:void(0)">
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