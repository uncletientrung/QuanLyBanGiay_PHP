<!-- Page JS Plugins CSS -->
<?php $dm->get_css('js/plugins/flatpickr/flatpickr.min.css'); ?>
<?php $dm->get_css('js/plugins/datatables-bs5/css/dataTables.bootstrap5.min.css'); ?>
<?php $dm->get_css('js/plugins/datatables-buttons-bs5/css/buttons.bootstrap5.min.css'); ?>
<?php $dm->get_css('js/plugins/datatables-responsive-bs5/css/responsive.bootstrap5.min.css'); ?>
<?php $dm->get_css('js/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css'); ?>
<?php $dm->get_css('js/plugins/sweetalert2/sweetalert2.min.css'); ?>
<?php $dm->get_css('css/dashmix.min.css'); ?>

<div class="content">
  <div class="block block-rounded">
    <ul class="nav nav-tabs nav-tabs-alt" role="tablist">
      <li class="nav-item">
        <button class="nav-link active" id="btab-tongquan" data-bs-toggle="tab" data-bs-target="#tab-tongquan" role="tab" aria-controls="tab-tongquan" aria-selected="true">Tổng quan kho hàng</button>
      </li>
      <li class="nav-item">
        <button class="nav-link" id="btab-tracuu" data-bs-toggle="tab" data-bs-target="#tab-tracuu" role="tab" aria-controls="tab-tracuu" aria-selected="false">Tra cứu sản phẩm</button>
      </li>
      <li class="nav-item">
        <button class="nav-link" id="btab-thongke" data-bs-toggle="tab" data-bs-target="#tab-thongke" role="tab" aria-controls="tab-thongke" aria-selected="false">Thống kê nhập - xuất</button>
      </li>
    </ul>
    <div class="block-content tab-content">
      <!-- TAB TỔNG QUAN -->
      <div class="tab-pane active" id="tab-tongquan" role="tabpanel" aria-labelledby="btab-tongquan" tabindex="0">
      <!-- Dynamic Table Full Pagination -->
      <div class="block block-rounded">
        <!-- DataTables init on table by adding .js-dataTable-full-pagination class, functionality is initialized in js/pages/be_tables_datatables.min.js which was auto compiled from _js/pages/be_tables_datatables.js -->
        <table id="table" class="table table-hover table-vcenter js-dataTable-responsive">
          <thead>
            <tr class="bg-body-dark">
              <th class="text-center" style="width: 10%;">Mã</th>
              <th style="width: 40%">Tên sản phẩm</th>
              <th style="width: 20%">Loại sản phẩm</th>
              <th style="width: 15%" class="text-center">Tổng tồn (Đôi)</th>
              <th style="width: 15%" class="text-center">Trạng thái</th>
              <th></th>
            </tr>
          </thead>
        </table>
      </div>
      </div>
      <!-- TAB TRA CỨU -->
      <div class="tab-pane" id="tab-tracuu" role="tabpanel" aria-labelledby="btab-tracuu" tabindex="0">
        <div class="block block-rounded">
          <div class="row">
            <div class="col-sm-12 col-md-6 col-lg-4">
              <select id="select-tracuu" class="form-select select2">
                <option></option>
              </select>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-5 ms-auto">
              <div class="input-group" id="datepicker-wrap">
                <span class="input-group-text input-group-text-alt" data-toggle>
                    <i class="fa-solid fa-calendar"></i>
                </span>
                <input type="text" class="form-control form-control-alt text-center" 
                      id="filter-from" placeholder="Chọn ngày tra cứu" data-input readonly>
                <button class="btn btn-light" type="button" id="btn-reset-date" data-clear>
                    <i class="fa fa-rotate-left"></i>
                </button>
              </div>
            </div>
            <div class="w-auto ps-0">
              <button type="button" id="tracuu-btn" class="btn btn-outline-primary">Áp dụng</button>
            </div>
          </div>

          <div id="tracuu-status-banner" class="alert alert-info d-flex align-items-center mt-3 shadow-sm" role="alert">
            <div class="flex-shrink-0 me-3">
              <i class="fa-solid fa-circle-info fa-2x"></i>
            </div>
            <div>
              <h6 class="alert-heading mb-1">Chờ nhập thông tin...</h6>
              <span>Vui lòng chọn <strong>Sản phẩm</strong> và <strong>Ngày</strong>, sau đó nhấn nút <strong>Áp dụng</strong> để tải dữ liệu.</span>
            </div>
          </div>

          <div class="block-content ps-0 visually-hidden" id="thongtin-tracuu">
            <div class="mt-3 mb-3 p-3 bg-light rounded border-start border-4 border-primary shadow-sm">
              <div class="row g-3 align-items-center py-3 bg-light-subtle rounded fs-5">
                <div class="col-sm-2 border-end">
                    <small class="text-muted d-block text-uppercase fw-bold ls-sm" style="font-size: 0.65rem;">Mã hãng</small>
                    <span id="ma-tracuu" class="fw-bold text-dark">H001</span>
                </div>

                <div class="col-sm-4 border-end">
                    <small class="text-muted d-block text-uppercase fw-bold ls-sm" style="font-size: 0.65rem;">Tên sản phẩm</small>
                    <span id="ten-tracuu" class="fw-bold text-primary">NIKE VIETNAM</span>
                </div>

                <div class="col-sm text-center">
                    <small class="text-muted d-block text-uppercase fw-bold mb-1" style="font-size: 0.65rem;">Tổng nhập</small>
                    <span id="slnhap-tracuu" class="fs-4 badge rounded-pill bg-info-light text-info px-3 py-2 fw-bold">
                        <i class="fa fa-arrow-down me-1"></i> 1.250
                    </span>
                </div>

                <div class="col-sm text-center">
                    <small class="text-muted d-block text-uppercase fw-bold mb-1" style="font-size: 0.65rem;">Tổng xuất</small>
                    <span id="slxuat-tracuu" class="fs-4 badge rounded-pill bg-warning-light text-warning px-3 py-2 fw-bold">
                        <i class="fa fa-arrow-up me-1"></i> 850
                    </span>
                </div>

                <div class="col-sm text-center">
                    <small class="text-muted d-block text-uppercase fw-bold mb-1" style="font-size: 0.65rem;">Tổng tồn</small>
                    <span id="ton-tracuu" class="badge fs-4 rounded-pill bg-success text-white px-3 py-2 fw-bold shadow-sm">
                        400
                    </span>
                </div>
              </div>
            </div>
            <div class="row mt-3">
              <div class="col-md-6">
                  <div class="block block-rounded block-bordered">
                      <div class="block-header block-header-default bg-info-light">
                          <h3 class="block-title">Lịch sử phiếu nhập</h3>
                      </div>
                      <div class="block-content">
                          <div class="table-responsive">
                              <table id="nhap-tracuu-table" class="table table-striped table-vcenter w-100">
                                  <thead>
                                      <tr>
                                          <th class="text-center" style="width: 100px;">Mã</th>
                                          <th>Ngày</th>
                                          <th class="text-center" style="width: 150px">Số lượng</th>
                                      </tr>
                                  </thead>
                                  <tfoot>
                                    <tr>
                                      <th></th>
                                      <th>Tổng số lượng nhập: </th>
                                      <th class="text-center">10</th>
                                    </tr>
                                  </tfoot>
                              </table>
                          </div>
                      </div>
                  </div>
              </div>

              <div class="col-md-6">
                  <div class="block block-rounded block-bordered">
                      <div class="block-header block-header-default bg-warning-light">
                          <h3 class="block-title">Lịch sử đơn hàng đơn hàng</h3>
                      </div>
                      <div class="block-content">
                          <div class="table-responsive">
                              <table id="xuat-tracuu-table" class="table table-striped table-vcenter" class="w-100">
                                  <thead>
                                      <tr>
                                          <th class="text-center" style="width: 100px;">Mã</th>
                                          <th>Ngày</th>
                                          <th class="text-center" style="width: 150px">Số lượng</th>
                                      </tr>
                                  </thead>
                                  <tfoot>
                                    <tr>
                                      <th></th>
                                      <th>Tổng số lượng xuất: </th>
                                      <th class="text-center">10</th>
                                    </tr>
                                  </tfoot>
                              </table>
                          </div>
                      </div>
                  </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- TAB THỐNG KÊ -->
      <div class="tab-pane" id="tab-thongke" role="tabpanel" aria-labelledby="btab-thongke" tabindex="0">
        <div class="block block-rounded">
          <div class="block-content block-content-full">
            <table id="table-thongke" class="table table-borderless table-striped table-vcenter js-dataTable-responsive w-100" style="width: 100%;">
              <thead>
                <tr>
                  <th class="text-center" style="width: 10%;">Mã</th>
                  <th style="width: 40%;">Tên Sản phẩm</th>
                  <th class="text-center" style="width: 15%;">Tổng Nhập</th>
                  <th class="text-center" style="width: 15%;">Tổng Xuất</th>
                  <th class="text-center" style="width: 20%;">Hành động</th>
                </tr>
              </thead>
              <tbody></tbody>
            </table>
          </div>
        </div>
      </div>

      <!-- Modal Chi Tiết Thống Kê Nhập - Xuất -->
      <div class="modal fade" id="modal-thongke-chitiet" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable" role="document">
          <div class="modal-content">
            <div class="block block-transparent bg-white mb-0">
              <ul class="nav nav-tabs nav-tabs-alt" role="tablist">
                <li class="nav-item">
                  <button class="nav-link active" id="tab-chitiet-nhap-btn"
                    data-bs-toggle="tab" data-bs-target="#tab-chitiet-nhap"
                    role="tab" aria-selected="true">
                    <i class="fa fa-arrow-down text-success me-1"></i> Phiếu nhập
                    <span class="badge bg-success ms-1" id="badge-tong-nhap">0</span>
                  </button>
                </li>
                <li class="nav-item">
                  <button class="nav-link" id="tab-chitiet-xuat-btn"
                    data-bs-toggle="tab" data-bs-target="#tab-chitiet-xuat"
                    role="tab" aria-selected="false">
                    <i class="fa fa-arrow-up text-danger me-1"></i> Đơn hàng
                    <span class="badge bg-danger ms-1" id="badge-tong-xuat">0</span>
                  </button>
                </li>
                <li class="nav-item ms-auto d-flex align-items-center pe-3">
                  <span class="text-muted fw-semibold" id="modal-thongke-tensp"></span>
                </li>
              </ul>
              <div class="block-content tab-content">

                <!-- Tab phiếu nhập -->
                <div class="tab-pane active" id="tab-chitiet-nhap" role="tabpanel" tabindex="0">
                  <div style="display: flex; flex-direction: column; max-height: 60vh;">
                    <div style="overflow-y: auto; flex: 1;">
                      <table class="table table-borderless table-striped table-vcenter mb-0">
                        <thead class="sticky-top bg-white">
                          <tr class="text-center text-uppercase fs-sm">
                            <th>Mã phiếu</th>
                            <th>Thời gian</th>
                            <th>Nhân viên</th>
                            <th>Nhà cung cấp</th>
                            <th>Số lượng</th>
                            <th>Đơn giá</th>
                          </tr>
                        </thead>
                        <tbody id="chitiet-nhap-body">
                          <tr>
                            <td colspan="6" class="text-center text-muted py-3">Đang tải...</td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                    <table class="table table-borderless mb-0 border-top">
                      <tfoot>
                        <tr class="fw-bold">
                          <td colspan="4" class="text-end">Tổng nhập:</td>
                          <td class="text-center text-success" id="chitiet-tong-nhap">0</td>
                          <td></td>
                        </tr>
                      </tfoot>
                    </table>
                  </div>
                </div>

                <!-- Tab đơn hàng -->
                <div class="tab-pane" id="tab-chitiet-xuat" role="tabpanel" tabindex="0">
                  <div style="display: flex; flex-direction: column; max-height: 60vh;">
                    <div style="overflow-y: auto; flex: 1;">
                      <table class="table table-borderless table-striped table-vcenter mb-0">
                        <thead class="sticky-top bg-white">
                          <tr class="text-center text-uppercase fs-sm">
                            <th>Mã đơn</th>
                            <th>Thời gian</th>
                            <th>Khách hàng</th>
                            <th>Số lượng</th>
                            <th>Đơn giá</th>
                          </tr>
                        </thead>
                        <tbody id="chitiet-xuat-body">
                          <tr>
                            <td colspan="5" class="text-center text-muted py-3">Đang tải...</td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                    <table class="table table-borderless mb-0 border-top">
                      <tfoot>
                        <tr class="fw-bold">
                          <td colspan="3" class="text-end">Tổng xuất:</td>
                          <td class="text-center text-danger" id="chitiet-tong-xuat">0</td>
                          <td></td>
                        </tr>
                      </tfoot>
                    </table>
                  </div>
                </div>

              </div>
              <div class="block-content block-content-full text-end bg-body">
                <button type="button" class="btn btn-hero btn-danger" data-bs-dismiss="modal">
                  <i class="fa fa-times me-1"></i> Đóng
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- END Modal Chi Tiết Thống Kê -->
    </div>
  </div>
</div>