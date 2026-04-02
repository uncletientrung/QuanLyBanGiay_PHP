<?php $dm->get_css('js/plugins/datatables-bs5/css/dataTables.bootstrap5.min.css'); ?>
<?php $dm->get_css('js/plugins/sweetalert2/sweetalert2.min.css'); ?>
<?php $dm->get_css('css/dashmix.min.css'); ?>

<div class="content">
  <!-- Dynamic Table Full Pagination -->
  <div class="block block-rounded">
    <div class="block-header block-header-default">
      <h3 class="block-title">
        Dynamic Table <small>Full pagination</small>
      </h3>
    </div>
    <div class="block-content block-content-full">
      <!-- DataTables init on table by adding .js-dataTable-full-pagination class, functionality is initialized in js/pages/be_tables_datatables.min.js which was auto compiled from _js/pages/be_tables_datatables.js -->
      <table class="table table-hover table-bordered table-vcenter js-dataTable-full-pagination">
        <thead>
          <tr>
            <th class="text-center" style="width: 100px;">Mã NCC</th>
            <th style="width: 25%;">Tên nhà cung cấp</th>
            <th style="width: 45%;">Địa chỉ</th>
            <th>Trạng thái</th>
            <th style="width: 10%">
              <button type="button" class="btn btn-outline-primary btn" data-bs-toggle="modal" data-bs-target="#add-supplier">
                <i class="fa fa-plus"></i>
              </button>
            </th>
          </tr>
        </thead>
      </table>
    </div>
  </div>
  <!-- END Dynamic Table Full Pagination -->
  <div class="modal" id="add-supplier" tabindex="-1" role="dialog" aria-labelledby="add-supplier" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <form id="form-nhacungcap" onsubmit="return false" novalidate>
          <input id="mancc" name="mancc" hidden>
          <div class="modal-header">
            <h5 class="modal-title text-muted">THÊM NHÀ CUNG CẤP</h5>
            <button type="reset" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
            <div class="block-content">
                <div class="mb-4">
                  <label class="form-label" for="ten-nhacungcap">Tên nhà cung cấp <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="ten-nhacungcap" name="ten-nhacungcap" placeholder="Nhập tên nhà cung cấp...">
                </div>
                <div class="mb-4">
                  <label class="form-label" for="sdt-nhacungcap">Số điện thoại <span class="text-danger">*</span></label>
                  <input type="tel" maxlength="10" class="form-control" id="sdt-nhacungcap" name="sdt-nhacungcap" placeholder="Nhập số điện thoại...">
                </div>
                <div class="mb-4">
                  <label class="form-label" for="diachi-nhacungcap">Địa chỉ <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="diachi-nhacungcap" name="diachi-nhacungcap" placeholder="Nhập địa chỉ...">
                </div>
            </div>
            <div class="modal-footer">
              <button type="reset" class="btn btn-sm btn-alt-secondary" data-bs-dismiss="modal">Hủy</button>
              <button type="submit" class="btn btn-sm btn-primary">Xác nhận</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>