<!-- Page JS Plugins CSS -->
<?php $dm->get_css('js/plugins/datatables-bs5/css/dataTables.bootstrap5.min.css'); ?>
<?php $dm->get_css('js/plugins/datatables-buttons-bs5/css/buttons.bootstrap5.min.css'); ?>
<?php $dm->get_css('js/plugins/datatables-responsive-bs5/css/responsive.bootstrap5.min.css'); ?>
<?php $dm->get_css('js/plugins/sweetalert2/sweetalert2.min.css'); ?>

<!-- Page Content -->
<div class="content">
    <!-- Hero -->
    <div class="d-md-flex justify-content-md-between align-items-md-center py-3 pt-md-3 pb-md-0 text-center text-md-start">
        <div class="mt-4 mt-md-0">
            <div class="dropdown d-inline-block">
                <button type="button" class="btn btn-sm btn-alt-primary px-3" id="dropdown-analytics-overview" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span id="selected-period">Tuần này</span> <i class="fa fa-fw fa-angle-down"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end fs-sm" aria-labelledby="dropdown-analytics-overview">
                    <a class="dropdown-item" href="#" data-period="week">Tuần này</a>
                    <a class="dropdown-item" href="#" data-period="month">Tháng này</a>
                    <a class="dropdown-item" href="#" data-period="quarter">Quý này</a>
                    <a class="dropdown-item" href="#" data-period="year">Năm nay</a>
                </div>
            </div>
            <button type="button" class="btn btn-sm btn-alt-primary" id="btn-refresh">
                <i class="fa fa-sync-alt"></i>
            </button>
        </div>
    </div>
    <!-- END Hero -->

    <!-- Overview Cards -->
    <div class="row items-push mt-3">
        <!-- Thẻ Doanh thu -->
        <div class="col-sm-6 col-xl-3">
            <div class="block block-rounded text-center d-flex flex-column h-100 mb-0 overflow-hidden">
                <div class="block-content block-content-full flex-grow-1" style="min-width: 0;">
                    <div class="item rounded-3 bg-body mx-auto my-3">
                        <i class="fa fa-money-bill-wave fa-lg text-primary"></i>
                    </div>
                    <!-- Đã có word-break -->
                    <div class="fs-2 fw-bold text-dark" id="total-revenue" style="word-break: break-all; line-height: 1.2;">0</div>
                    <div class="text-muted mb-3">Doanh thu <span class="stat-period">tháng này</span></div>
                    <div class="d-inline-block px-3 py-1 rounded-pill fs-sm fw-semibold text-success bg-success-light" id="revenue-growth">
                        <i class="fa fa-caret-up me-1"></i> 0%
                    </div>
                </div>
            </div>
        </div>

        <!-- Thẻ Đơn hàng -->
        <div class="col-sm-6 col-xl-3">
            <div class="block block-rounded text-center d-flex flex-column h-100 mb-0 overflow-hidden">
                <div class="block-content block-content-full flex-grow-1" style="min-width: 0;">
                    <div class="item rounded-3 bg-body mx-auto my-3">
                        <i class="fa fa-shopping-cart fa-lg text-primary"></i>
                    </div>
                    <!-- THÊM style="word-break: break-all; line-height: 1.2;" vào đây -->
                    <div class="fs-1 fw-bold text-dark" id="total-orders" style="word-break: break-all; line-height: 1.2;">0</div>
                    <div class="text-muted mb-3">Đơn hàng <span class="stat-period">tháng này</span></div>
                </div>
            </div>
        </div>

        <!-- Thẻ Sản phẩm -->
        <div class="col-sm-6 col-xl-3">
            <div class="block block-rounded text-center d-flex flex-column h-100 mb-0 overflow-hidden">
                <div class="block-content block-content-full flex-grow-1" style="min-width: 0;">
                    <div class="item rounded-3 bg-body mx-auto my-3">
                        <i class="fa fa-box fa-lg text-primary"></i>
                    </div>
                    <!-- THÊM style="word-break: break-all; line-height: 1.2;" vào đây -->
                    <div class="fs-1 fw-bold text-dark" id="total-products-sold" style="word-break: break-all; line-height: 1.2;">0</div>
                    <div class="text-muted mb-3">Sản phẩm <span class="stat-period">tháng này</span></div>
                </div>
            </div>
        </div>

        <!-- Thẻ Khách hàng -->
        <div class="col-sm-6 col-xl-3">
            <div class="block block-rounded text-center d-flex flex-column h-100 mb-0 overflow-hidden">
                <div class="block-content block-content-full flex-grow-1" style="min-width: 0;">
                    <div class="item rounded-3 bg-body mx-auto my-3">
                        <i class="fa fa-users fa-lg text-primary"></i>
                    </div>
                    <!-- THÊM style="word-break: break-all; line-height: 1.2;" vào đây -->
                    <div class="fs-1 fw-bold text-dark" id="total-customers" style="word-break: break-all; line-height: 1.2;">0</div>
                    <div class="text-muted mb-3">Tổng khách hàng</div>
                </div>
            </div>
        </div>
    </div>
    <!-- END Overview Cards -->

    <!-- Revenue Comparison Chart -->
    <div class="block block-rounded">
        <div class="block-header block-header-default">
            <h3 class="block-title">So sánh doanh thu theo <span id="chart-period-title"></span></h3>
            <div class="block-options">
                <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                    <i class="si si-refresh"></i>
                </button>
            </div>
        </div>
        <div class="block-content block-content-full">
            <div class="row">
                <div class="col-md-12 d-flex align-items-md-center">
                    <div class="w-100">
                        <!-- Bars Chart Container -->
                        <canvas id="revenue-chart" style="height: 300px;"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END Revenue Comparison Chart -->

    <!-- Top Products & Top Customers -->
    <div class="row">
        <div class="col-md-6">
            <!-- Top Products -->
            <div class="block block-rounded">
                <div class="block-header block-header-default">
                    <h3 class="block-title">Top sản phẩm bán chạy</h3>
                    <div class="block-options">
                        <select class="form-select form-select-sm" id="top-products-limit">
                            <option value="5">5</option>
                            <option value="10" selected>10</option>
                            <option value="20">20</option>
                        </select>
                    </div>
                </div>
                <div class="block-content">
                    <table class="table table-striped table-hover table-borderless table-vcenter fs-sm">
                        <thead>
                            <tr class="text-uppercase">
                                <th>Sản phẩm</th>
                                <th class="text-center">Thương hiệu</th>
                                <th class="text-center">Đã bán</th>
                                <th class="text-end">Giá bán</th>
                            </tr>
                        </thead>
                        <tbody id="top-products-table">
                            <tr>
                                <td colspan="4" class="text-center text-muted py-4">
                                    <i class="fa fa-spinner fa-spin fa-2x"></i>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- END Top Products -->
        </div>
        <div class="col-md-6">
            <!-- Top Customers -->
            <div class="block block-rounded">
                <div class="block-header block-header-default">
                    <h3 class="block-title">Top khách hàng mua nhiều</h3>
                    <div class="block-options">
                        <select class="form-select form-select-sm" id="top-customers-limit">
                            <option value="5">5</option>
                            <option value="10" selected>10</option>
                            <option value="20">20</option>
                        </select>
                    </div>
                </div>
                <div class="block-content">
                    <table class="table table-striped table-hover table-borderless table-vcenter fs-sm">
                        <thead>
                            <tr class="text-uppercase">
                                <th>Khách hàng</th>
                                <th class="text-center">Số Đơn</th>
                                <th class="text-end">Tổng tiền</th>
                            </tr>
                        </thead>
                        <tbody id="top-customers-table">
                            <tr>
                                <td colspan="3" class="text-center text-muted py-4">
                                    <i class="fa fa-spinner fa-spin fa-2x"></i>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- END Top Customers -->
        </div>
    </div>
    <!-- END Top Products & Top Customers -->
</div>
<!-- END Page Content -->