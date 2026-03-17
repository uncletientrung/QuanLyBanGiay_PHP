<?php $dm->get_css('js/plugins/datatables-bs5/css/dataTables.bootstrap5.min.css'); ?>
<?php $dm->get_css('js/plugins/datatables-responsive-bs5/css/responsive.bootstrap5.min.css'); ?>
<?php $dm->get_css('js\plugins\select2\css\select2.min.css') ?>
<?php $dm->get_css('css/dashmix.min.css'); ?>

<div class="content">
  <div class="block block-rounded row g-0">
    <ul class="nav nav-tabs nav-tabs-block flex-md-column col-md-2" role="tablist">
      <li class="nav-item d-md-flex flex-md-column">
        <button class="nav-link text-md-start active" id="btabs-vertical-home-tab" data-bs-toggle="tab" data-bs-target="#btabs-vertical-home" role="tab" aria-controls="btabs-vertical-home" aria-selected="true">
          <i class="fa fa-fw fa-home opacity-50 me-1 d-none d-sm-inline-block"></i> Thông tin sản phẩm
        </button>
      </li>
      <li class="nav-item d-md-flex flex-md-column">
        <button class="nav-link text-md-start" id="btabs-vertical-profile-tab" data-bs-toggle="tab" data-bs-target="#btabs-vertical-profile" role="tab" aria-controls="btabs-vertical-profile" aria-selected="false">
          <i class="fa fa-fw fa-user-circle opacity-50 me-1 d-none d-sm-inline-block"></i> Hình ảnh
        </button>
      </li>
    </ul>
    <div class="tab-content col-md-10">
      <div class="block-content tab-pane active" id="btabs-vertical-home" role="tabpanel" aria-labelledby="btabs-vertical-home-tab" tabindex="0">
        <h4 class="fw-semibold">Thông tin sản phẩm mã <a class="fw-semibold"><strong>SP-<?= $id ?></strong></a></h4>
        <!-- Thông tin chi tiết -->
        <div class="block block-rounded">
          <div class="block-content">
                <!-- Form thông tin -->
                <form action="be_pages_ecom_product_edit.php" method="POST" onsubmit="return false;">
                  <!-- Row Tên, loại, giới tính -->
                  <div class="row mb-4">
                    <div class="col-4">
                      <label class="form-label" for="dm-ecom-product-name">Tên sản phẩm</label>
                      <input type="text" class="form-control" id="dm-ecom-product-name" name="dm-ecom-product-name" value="Bloodborne">
                    </div>
                    <div class="col-4">
                      <label class="form-label" for="dm-ecom-product-name">Loại</label>
                      <input type="text" class="form-control" id="dm-ecom-product-name" name="dm-ecom-product-name" value="Bloodborne">  
                    </div>
                    <div class="col-4">
                      <label class="form-label" for="dm-ecom-product-name">Giới tính</label>
                      <input type="text" class="form-control" id="dm-ecom-product-name" name="dm-ecom-product-name" value="Bloodborne">  
                    </div>
                  </div>
                  <!-- Kết thúc row Tên, loại, giới tính -->
                  <!-- Row 
                </form>
                <!-- Kết thúc form thông tin -->
          </div>
        </div>
      </div>
      <div class="block-content tab-pane" id="btabs-vertical-profile" role="tabpanel" aria-labelledby="btabs-vertical-profile-tab" tabindex="0">
        <h4 class="fw-semibold">Profile Content</h4>
        <p class="fs-sm">
          Mauris tincidunt tincidunt turpis in porta. Integer fermentum tincidunt auctor. Vestibulum ullamcorper, odio sed rhoncus imperdiet, enim elit sollicitudin orci, eget dictum leo mi nec lectus. Nam commodo turpis id lectus scelerisque vulputate. Integer sed dolor erat. Fusce erat ipsum, varius vel euismod sed, tristique et lectus? Etiam egestas fringilla enim, id convallis lectus laoreet at. Fusce purus nisi, gravida sed consectetur ut, interdum quis nisi. Quisque egestas nisl id lectus facilisis scelerisque? Proin rhoncus dui at ligula vestibulum ut facilisis ante sodales! Suspendisse potenti. Aliquam tincidunt.
        </p>
      </div>
    </div>
  </div>
</div>