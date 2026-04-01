<?php $dm->get_css('js/plugins/datatables-bs5/css/dataTables.bootstrap5.min.css'); ?>
<?php $dm->get_css('js/plugins/datatables-responsive-bs5/css/responsive.bootstrap5.min.css'); ?>
<?php $dm->get_css('css/dashmix.min.css'); ?>

<div class="content">
  <!-- Dynamic Table Full Pagination -->
  <div class="block block-rounded">
    <div class="block-header block-header-default">
      <h3 class="block-title">
        Quản lý giá bán
      </h3>
    </div>
    <div class="block-content block-content-full">
      <!-- DataTables init on table by adding .js-dataTable-full-pagination class, functionality is initialized in js/pages/be_tables_datatables.min.js which was auto compiled from _js/pages/be_tables_datatables.js -->
      <table id="sp-table" class="table table-hover table-vcenter js-dataTable-responsive">
        <thead>
          <tr>
            <th class="text-center" style="width: 80px;">Mã</th>
            <th>Tên sản phẩm</th>
            <th>Giá nhập</th>
            <th>Lợi nhuận (%)</th>
            <th>Giá bán</th>
            <th></th>
          </tr>
        </thead>
      </table>
    </div>
  </div>
  <!-- END Dynamic Table Full Pagination -->
</div>