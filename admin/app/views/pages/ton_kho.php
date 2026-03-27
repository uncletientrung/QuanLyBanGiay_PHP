<?php $dm->get_css('js/plugins/datatables-bs5/css/dataTables.bootstrap5.min.css'); ?>
<?php $dm->get_css('js/plugins/datatables-responsive-bs5/css/responsive.bootstrap5.min.css'); ?>
<?php $dm->get_css('css/dashmix.min.css'); ?>
<?php $dm->get_css('js/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css'); ?>
<?php $dm->get_css('js/plugins/flatpickr/flatpickr.min.css'); ?>


<div class="content">
  <!-- Dynamic Table Full Pagination -->
  <div class="block block-rounded">
    <div class="block-header block-header-default">
        <h3 class="block-title">
            Quản lý tồn kho
        </h3>
        <div class="block-options">
            <button class="btn btn-outline-primary" title="Cài đặt"><i class="fa fa-gear"></i></button>
        </div>
    </div>
    <div class="block-content block-content-full">
      <!-- DataTables init on table by adding .js-dataTable-full-pagination class, functionality is initialized in js/pages/be_tables_datatables.min.js which was auto compiled from _js/pages/be_tables_datatables.js -->
      <table id="table" class="table table-hover table-vcenter js-dataTable-responsive">
        <thead>
          <tr>
            <th class="text-center" style="width: 100px;">Mã</th>
            <th style="width: 50%" class="text-center">Tên sản phẩm</th>
            <th style="width: 15%" class="text-center">Tổng tồn (Đôi)</th>
            <th style="width: 15%" class="text-center">Trạng thái</th>
            <th></th>
          </tr>
        </thead>
      </table>
    </div>
  </div>
  <!-- END Dynamic Table Full Pagination -->
</div>