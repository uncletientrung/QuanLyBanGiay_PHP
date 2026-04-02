<?php $dm->get_css('js/plugins/datatables-bs5/css/dataTables.bootstrap5.min.css'); ?>
<?php $dm->get_css('js/plugins/datatables-responsive-bs5/css/responsive.bootstrap5.min.css'); ?>
<?php $dm->get_css('css/dashmix.min.css'); ?>

<div class="content">
  <!-- Dynamic Table Full Pagination -->
  <div class="block block-rounded">
    <div class="block-header block-header-default">
      <h3 class="block-title">
        Danh sách sản phẩm
      </h3>
      <div class="block-options">
        <a class="btn btn-hero btn-primary" href="./products/0">Thêm mới<i class="fa fa-plus ms-2"></i></a>
      </div>
    </div>
    <div class="block-content block-content-full">
      <!-- DataTables init on table by adding .js-dataTable-full-pagination class, functionality is initialized in js/pages/be_tables_datatables.min.js which was auto compiled from _js/pages/be_tables_datatables.js -->
      <table id="sp-table" class="table table-hover table-vcenter js-dataTable-responsive">
        <thead>
          <tr class="bg-body-dark">
            <th class="text-center" style="width: 60px">
                <div class="form-check d-flex justify-content-center">
                    <input class="form-check-input" type="checkbox" value="" id="check-all" name="check-all"
                        style="cursor: pointer;">
                </div>
            </th>
            <th class="text-center" style="width: 80px;">Mã</th>
            <th style="width: 25%">Tên sản phẩm</th>
            <th style="width: 10%">Loại</th>
            <th>Giới tính</th>
            <th>Hãng</th>
            <th style="width: 12%">Màu</th>
            <th>Sizes</th>
            <th>Trạng thái</th>
            <th>Hành động</th>
          </tr>
        </thead>
      </table>
    </div>
  </div>
  <!-- END Dynamic Table Full Pagination -->
</div>