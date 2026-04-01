<!-- Page JS Plugins CSS -->
<?php $dm->get_css('js/plugins/flatpickr/flatpickr.min.css'); ?>
<?php $dm->get_css('js/plugins/datatables-bs5/css/dataTables.bootstrap5.min.css'); ?>
<?php $dm->get_css('css/dashmix.min.css'); ?>
<?php $dm->get_css('js/plugins/datatables-buttons-bs5/css/buttons.bootstrap5.min.css'); ?>
<?php $dm->get_css('js/plugins/datatables-responsive-bs5/css/responsive.bootstrap5.min.css'); ?>
<?php $dm->get_css('js/plugins/sweetalert2/sweetalert2.min.css'); ?>
<?php $dm->get_css('js/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css'); ?>

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
        <div class="block block-rounded">
          <div class="block-header block-header-default">
            <div class="block-options">
              <button type="button" class="btn btn-outline-primary dropdown-toggle" id="config-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fa fa-gear"></i>
              </button>
              <div class="dropdown-menu" aria-labelledby="dropdown-dropleft-outline-dark">
                <div class="block-content p-2">
                  <label for="saphet">Sản phẩm sắp hết hàng khi dưới:</label>
                  <input type="number" class="mt-3 form-control" id="saphet" name="saphet" placeholder="Nhập số lượng">
                </div>
              </div>
            </div>
          </div>
          <div class="block-content block-content-full">
            <table id="table" class="table table-hover table-vcenter js-dataTable-responsive">
              <thead>
                <tr>
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
      </div>
      <!-- TAB TRA CỨU -->
      <div class="tab-pane" id="tab-tracuu" role="tabpanel" aria-labelledby="btab-tracuu" tabindex="0">
        <h4 class="fw-normal">Tra cứu sản phẩm theo thời gian</h4>
        <p>...</p>
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