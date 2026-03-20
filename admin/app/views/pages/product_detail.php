<?php $dm->get_css('js/plugins/datatables-bs5/css/dataTables.bootstrap5.min.css'); ?>
<?php $dm->get_css('js/plugins/datatables-responsive-bs5/css/responsive.bootstrap5.min.css'); ?>
<?php $dm->get_css('js\plugins\select2\css\select2.min.css') ?>
<?php $dm->get_css('css/dashmix.min.css'); ?>

<div class="content row justify-content-center">
  <div class="block block-rounded row g-0">
    <ul class="nav nav-tabs nav-tabs-block flex-md-column col-md-2" role="tablist">
      <li class="nav-item d-md-flex flex-md-column">
        <button class="nav-link text-md-start active" id="thongtin-panel-tab" data-bs-toggle="tab" data-bs-target="#thongtin-panel" role="tab" aria-controls="thongtin-panel" aria-selected="true">
          <i class="fa fa-fw fa-home opacity-50 me-1 d-none d-sm-inline-block"></i> Thông tin sản phẩm
        </button>
      </li>
      <li class="nav-item d-md-flex flex-md-column">
        <button class="nav-link text-md-start" id="media-panel-tab" data-bs-toggle="tab" data-bs-target="#media-panel" role="tab" aria-controls="media-panel" aria-selected="false">
          <i class="fa fa-fw fa-user-circle opacity-50 me-1 d-none d-sm-inline-block"></i> Hình ảnh
        </button>
      </li>
    </ul>
    <div class="tab-content col-md-10 justify-content-center">
      <div class="block-content tab-pane active" id="thongtin-panel" role="tabpanel" aria-labelledby="thongtin-panel-tab" tabindex="0">
        <h4 class="fw-semibold">Thông tin sản phẩm mã <a class="fw-semibold"><strong>SP-<?= $id ?></strong></a></h4>
        <!-- Thông tin chi tiết -->
        <div class="block block-rounded">
          <!-- Form thông tin -->
          <form action="be_pages_ecom_product_edit.php" method="POST" onsubmit="return false;">
            <div class="row col">
                <div class="col-lg-7 border rounded pt-4 ps-4 pe-4 ms-3 me-5 h-100">
                  <div class="row mb-4">
                    <div class="col">
                      <label class="form-label" for="">Tên sản phẩm</label>
                      <input type="text" class="form-control" id="tensp" name="tensp" placeholder="Tên sản phẩm">
                    </div>
                  </div>
                  <div class="row mb-4">
                    <div class="col-6">
                      <label class="form-label" for="">Giá nhập (đồng)</label>
                      <input type="text" class="form-control" id="gianhap" name="gianhap" placeholder="Giá nhập sản phẩm">
                    </div>
                    <div class="col-6">
                      <label class="form-label" for="">Tỉ lệ lợi nhuận (%)</label>
                      <input type="text" class="form-control" id="loinhuan" name="loinhuan" placeholder="Phần trăm lợi nhuận">
                    </div>
                  </div>
                  <div class="row mb-4">
                    <div class="col">
                      <label class="form-label" for="">Mô tả sản phẩm</label>
                      <textarea class="form-control" id="mota" name="mota" rows="6"></textarea>
                    </div>
                  </div>
                  <div class="row mb-4">
                    <div class="col">
                      <table id="size-table" class="table table-vcenter">
                        <thead>
                          <tr>
                            <th class="text-center" style="width: 50px;">#</th>
                            <th>Kich cỡ</th>
                            <th class="d-none d-sm-table-cell" style="width: 25%;">Số lượng</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php for ($i = 1; $i < 7; $i++) { ?>
                            <tr>
                              <th class="text-center" scope="row"><?php echo $i; ?></th>
                              <td class="fw-semibold">
                                <a href="be_pages_generic_profile.php"><?php $dm->get_name(); ?></a>
                              </td>
                              <td class="d-none d-sm-table-cell">
                                <?php $dm->get_tag(); ?>
                              </td>
                            </tr>
                          <?php } ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
                <div class="block col-lg-4 border rounded pt-4 ps-4 pe-4 pt-3 h-100">
                  <div class="row mb-4">
                    <div class="col">
                      <label class="form-label" for="">Giới tính</label>
                      <select class="form-select" style="width: 100%">
                        <option disabled selected hidden>Giới tính</option>
                        <option>Nam</option>
                        <option>Nữ</option>
                      </select>
                    </div>
                  </div>
                  <div class="row mb-4">
                    <div class="col">
                      <label class="form-label" for="">Màu sắc</label>
                      <select class="form-control" id="mau" name="mau" data-placeholder="Màu hiện có">
                        <option disabled selected hidden>Màu sắc</option>
                      </select>
                    </div>
                  </div>
                  <div class="row mb-4">
                    <div class="col">
                      <label class="form-label" for="">Loại</label>
                      <select class="js-select2 form-select" style="width: 100%" data-placeholder="Loại giày">
                        <option></option>
                      </select>
                    </div>
                  </div>
                  <div class="row mb-4">
                    <div class="col">
                      <label class="form-label" for="">Hãng</label>
                      <select class="js-select2 form-select" style="width: 100%" data-placeholder="Hãng">
                        <option></option>
                      </select>
                    </div>
                  </div>
                  <div class="row mb-4">
                    <div class="col">
                      <label class="form-label" for="">Trạng thái</label>
                      <select class="form-select" style="width: 100%" >
                        <option disabled selected hidden>Ngừng bán/Đang kinh doanh</option>
                        <option>Ngừng bán</option>
                        <option>Đang kinh doanh</option>
                      </select>
                    </div>
                  </div>
                  <div class="row mt-4 mb-4 justify-content-end">
                    <div class="col-4">
                      <button class="btn btn-primary w-100">Save</button>
                    </div>
                  </div>
                </div>
            </div>
          </form>
          <!-- Kết thúc form thông tin -->
        </div>
      </div>
      <div class="block-content tab-pane" id="media-panel" role="tabpanel" aria-labelledby="media-panel-tab" tabindex="0">
        <h4 class="fw-semibold">Media</h4>
        <div class="row items-push js-gallery">
          <div class="col-md-6 col-lg-4 col-xl-3 border border-3 rounded-4 animated fadeIn p-0 overflow-hidden">
            <div class="options-container fx-item-zoom-in fx-overlay-zoom-out">
              <img class="img-fluid options-item" src="\QuanLyBanGiay_PHP\public/img/products/giay-nike-metcon-10-nam-trang-den-xanh-01-main.jpg" alt="Product Image">
              
              <div class="options-overlay bg-black-75">
                <div class="options-overlay-content">
                  <h3 class="h4 text-white mb-1">Nike Metcon 10</h3>
                  <h4 class="h6 text-white-75 mb-3">Nam - Trắng Đen Xanh</h4>
                  
                  <a class="btn btn-sm btn-primary img-lightbox" href="\QuanLyBanGiay_PHP\public/img/products/giay-nike-metcon-10-nam-trang-den-xanh-01-main.jpg">
                    <i class="fa fa-search-plus opacity-50 me-1"></i> View
                  </a>
                  
                  <a class="btn btn-sm btn-secondary" href="edit_product.php?id=1">
                    <i class="fa fa-pencil-alt opacity-50 me-1"></i> Edit
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>