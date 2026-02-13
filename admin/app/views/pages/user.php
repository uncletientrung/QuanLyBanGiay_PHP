<!-- Page JS Plugins CSS -->
<?php $dm->get_css('js/plugins/datatables-bs5/css/dataTables.bootstrap5.min.css'); ?>
<?php $dm->get_css('js/plugins/datatables-buttons-bs5/css/buttons.bootstrap5.min.css'); ?>
<?php $dm->get_css('js/plugins/datatables-responsive-bs5/css/responsive.bootstrap5.min.css'); ?>
<?php $dm->get_css('js/plugins/sweetalert2/sweetalert2.min.css'); ?>

<!-- Page Content -->
<div class="content">
    <!-- All User -->
    <div class="block block-rounded">
        <div class="block-header block-header-default">
            <h3 class="block-title">Người dùng</h3>
            <div class="block-options">
                <div class="dropdown">
                    <button type="button" class="btn btn-hero btn-primary" data-bs-toggle="modal" data-bs-target="#modal-user" id="btn-add-modal">
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
                    <!-- END Data Table -->

                </table>
                <!-- END All Products Table -->
            </div>

            <!-- Modal -->
            <div class="modal fade" id="modal-user" tabindex="-1" role="dialog" aria-labelledby="modal-user" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <form id="form-user" onsubmit="return false;">
                            <div class="block block-rounded block-transparent mb-0">
                                <div class="block-header block-header-default">
                                    <h3 class="block-title" id="modal-title">Thêm khách hàng</h3>
                                    <div class="block-options">
                                        <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
                                            <i class="fa fa-fw fa-times"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="block-content fs-sm">
                                    <input type="hidden" id="user_id" name="id">
                                    <div class="mb-4">
                                        <label class="form-label" for="hoten">Họ tên</label>
                                        <input type="text" class="form-control" id="hoten" name="hoten" required>
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label" for="email">Email</label>
                                        <input type="email" class="form-control" id="email" name="email" required>
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label" for="sdt">Số điện thoại</label>
                                        <input type="text" class="form-control" id="sdt" name="sdt">
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label" for="diachi">Địa chỉ</label>
                                        <input type="text" class="form-control" id="diachi" name="diachi">
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label" for="matkhau">Mật khẩu</label>
                                        <input type="password" class="form-control" id="matkhau" name="matkhau" required>
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label">Giới tính</label>
                                        <div class="space-x-2">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" id="gt-nam" name="gioitinh" value="1" checked>
                                                <label class="form-check-label" for="gt-nam">Nam</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" id="gt-nu" name="gioitinh" value="0">
                                                <label class="form-check-label" for="gt-nu">Nữ</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label">Trạng thái</label>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="trangthai" name="trangthai" checked>
                                            <label class="form-check-label" for="trangthai">Hoạt động</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="block-content block-content-full text-end bg-body-light">
                                    <button type="button" class="btn btn-sm btn-alt-secondary" data-bs-dismiss="modal">Đóng</button>
                                    <button type="submit" class="btn btn-sm btn-primary" id="btn-save">Lưu</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- END Modal -->
        </div>
        <!-- END All Products -->
    </div>
    <!-- END Page Content -->