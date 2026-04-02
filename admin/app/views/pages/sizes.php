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
            <th class="text-center" style="width: 100px;">Mã số</th>
            <th>Số size</th>
            <th style="width: 10%" class="text-center">Trạng thái</th>
            <th style="width: 15%">
              <button type="button" class="btn btn-outline-primary btn-sm dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fa fa-plus"></i>
              </button>
              <div class="dropdown-menu" aria-labelledby="dropdown-content-hero-primary">
                  <div class="mb-2">
                    <label class="form-label" for="sosize">Tên</label>
                    <input type="number" class="form-control" id="sosize" name="sosize" placeholder="Nhập số size">
                  </div>
                  <div class="block-content p-0 d-flex justify-content-end">
                    <button type="button" id="add" class="btn btn-primary">Thêm</button>
                  </div>
              </div>
            </th>
          </tr>
        </thead>
        <tbody>
            <!-- The data of the table should be placed here -->
        </tbody>
      </table>
    </div>
  </div>
  <!-- END Dynamic Table Full Pagination -->
</div>