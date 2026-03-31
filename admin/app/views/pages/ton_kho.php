<?php $dm->get_css('js/plugins/datatables-bs5/css/dataTables.bootstrap5.min.css'); ?>
<?php $dm->get_css('js/plugins/datatables-responsive-bs5/css/responsive.bootstrap5.min.css'); ?>
<?php $dm->get_css('css/dashmix.min.css'); ?>
<?php $dm->get_css('js/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css'); ?>
<?php $dm->get_css('js/plugins/flatpickr/flatpickr.min.css'); ?>


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
          <!-- DataTables init on table by adding .js-dataTable-full-pagination class, functionality is initialized in js/pages/be_tables_datatables.min.js which was auto compiled from _js/pages/be_tables_datatables.js -->
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
        <h4 class="fw-normal">Lịch sử thống kê nhập xuất</h4>
        <p>...</p>
      </div>
    </div>
  </div>
</div>
