<?php $dm->get_css('js/plugins/datatables-bs5/css/dataTables.bootstrap5.min.css'); ?>
<?php $dm->get_css('js/plugins/datatables-responsive-bs5/css/responsive.bootstrap5.min.css'); ?>
<?php $dm->get_css('js\plugins\select2\css\select2.min.css') ?>
<?php $dm->get_css('css/dashmix.min.css'); ?>

<div class="content row justify-content-center">
  <div class="mb-3 p-0">
      <a class="btn btn-alt-primary" href="../products">
          <i class="fa fa-chevron-left me-1"></i> Danh sách sản phẩm
      </a>
  </div>
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
    <div class="tab-content col-md-10 justify-content-center align-middle">
      <div class="block-content tab-pane active" id="thongtin-panel" role="tabpanel" aria-labelledby="thongtin-panel-tab" tabindex="0">
        <div class="d-flex justify-content-between align-items-center mb-3 me-4">  
          <h4 class="fw-semibold m-0">Thông tin sản phẩm mã <a id="masp" class="fw-semibold" style="pointer-events: none;"><strong>SP-<?= $id ?></strong></a></h4>
          <button id="edit-btn" type="button" class="btn btn-hero btn-primary">Chỉnh sửa</button>
        </div>
          <!-- Thông tin chi tiết -->
        <div class="block block-rounded">
          <!-- Form thông tin -->
          <form action="be_pages_ecom_product_edit.php" method="POST" onsubmit="return false;">
            <div class="row col">
                <div class="col-lg-7 border rounded pt-4 ps-4 pe-4 ms-3 me-5 h-100">
                  <div class="row mb-4">
                    <div class="col">
                      <label class="form-label fw-bold" for="">Tên sản phẩm</label>
                      <input type="text" class="form-control" id="tensp" name="tensp" placeholder="Tên sản phẩm" value="<?= $product[0]['tensp'] ?>">
                    </div>
                  </div>
                  <div class="row mb-4">
                    <div class="col-6">
                      <label class="form-label fw-bold" for="">Giá nhập (đồng)</label>
                      <input type="text" class="form-control" id="gianhap" name="gianhap" placeholder="Giá nhập sản phẩm" value="<?= $product[0]['gianhap'] ?>">
                    </div>
                    <div class="col-6">
                      <label class="form-label fw-bold" for="">Tỉ lệ lợi nhuận (%)</label>
                      <input type="text" class="form-control" id="loinhuan" name="loinhuan" placeholder="Phần trăm lợi nhuận" value="<?= $product[0]['tyleloinhuan'] ?>">
                    </div>
                  </div>
                  <div class="row mb-4">
                    <div class="col">
                      <label class="form-label fw-bold" for="">Mô tả sản phẩm</label>
                      <textarea class="form-control" id="mota" name="mota" rows="4"><?= $product[0]['motasp'] ?></textarea>
                    </div>
                  </div>
                  <div class="row mb-4">
                    <div class="w-100 d-flex justify-content-end">
                      <btn hidden id="add-size" class="btn btn-sm btn-info col-lg-1"><i class="fa fa-plus"></i></btn>
                    </div>
                    <div id="table-div">
                      <table id="size-table" class="table table-vcenter">
                        <thead>
                          <tr>
                            <th class="text-center" style="width: 50px;">Mã</th>
                            <th>Kích cỡ</th>
                            <th style="width: 25%;">Số lượng (đôi)</th>
                            <th style="width: 10%;"></th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php $totalStock = 0; foreach($size as $index=>$val) { $totalStock += $val['soluong'] ?>
                            <tr>
                              <th class="text-center" scope="row"><?php echo $val['masize']; ?></th>
                              <td class="fw-semibold text-primary tensize">
                                <?php echo $val['tensize']; ?>
                              </td>
                              <td class="justify-content-center soluong" style="text-align: center">
                                <?php echo $val['soluong']; ?>
                              </td>
                              <td>
                                <a type="button" class="btn btn-sm btn-outline-danger">
                                  <i class="fa fa-fw fa-times"></i>
                                </a>
                              </td>
                            </tr>
                          <?php } ?>
                        </tbody>
                        <tfoot>
                          <tr>
                              <th class="text-center" scope="row"></th>
                              <td class="fw-semibold">
                                <a href="be_pages_generic_profile.php" style="pointer-events: none;">Tổng số lượng</a>
                              </td>
                              <td class="d-flex justify-content-center" style="text-align: center">
                                <?php echo $totalStock ?>                               
                              </td>
                              <td></td>
                            </tr>
                        </tfoot>
                      </table>
                    </div>
                  </div>
                </div>
                <div class="block col-lg-4 border rounded pt-4 ps-4 pe-4 pt-3 h-100">
                  <div class="row mb-4">
                    <div class="col">
                      <label class="form-label fw-bold" for="">Giới tính</label>
                      <select class="form-select" id="gioitinh" style="width: 100%">
                        <option disabled selected hidden>Giới tính</option>
                        <?php if ($product[0]['gioitinh'] == 0) { ?>
                          <option value="1">Nam</option>
                          <option value="0" selected>Nữ</option>
                        <?php } else { ?>
                          <option value="1" selected>Nam</option>
                          <option value="0">Nữ</option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                  <div class="row mb-4">
                    <div class="col">
                      <label class="form-label fw-bold" for="">Màu sắc</label>
                      <select class="js-select2 form-control" id="mau" name="mau" data-placeholder="Màu hiện có">
                        <option></option>
                        <?php foreach($colors as $value) {
                              if ($value['tenmau'] == $product[0]['tenmau']) { ?>
                                <option selected value="<?= $value['mamau']?>"><?= $value['tenmau']?></option>
                                <?php } else {?>
                                <option value="<?= $value['mamau']?>"><?= $value['tenmau']?></option>
                          <?php } ?>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                  <div class="row mb-4">
                    <div class="col">
                      <label class="form-label fw-bold" for="">Loại</label>
                      <select class="js-select2 form-select" id="loai" style="width: 100%" data-placeholder="Loại giày">
                        <option></option>
                        <?php foreach($categories as $value) {
                              if ($value['tenloai'] == $product[0]['tenloai']) { ?>
                                <option selected value="<?= $value['maloai']?>"><?= $value['tenloai']?></option>
                                <?php } else {?>
                                <option value="<?= $value['maloai']?>"><?= $value['tenloai']?></option>
                          <?php } ?>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                  <div class="row mb-4">
                    <div class="col">
                      <label class="form-label fw-bold" for="">Hãng</label>
                      <select class="js-select2 form-select" id="hang" style="width: 100%" data-placeholder="Hãng">
                        <option></option>
                        <?php foreach($brands as $value) {
                              if ($value['tenhang'] == $product[0]['tenhang']) { ?>
                                <option selected value="<?= $value['mahang']?>"><?= $value['tenhang']?></option>
                                <?php } else {?>
                                <option value="<?= $value['mahang']?>"><?= $value['tenhang']?></option>
                          <?php } ?>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                  <div class="row mb-4">
                    <div class="col">
                      <label class="form-label fw-bold" for="">Trạng thái</label>
                      <select class="form-select" id="trangthai" style="width: 100%" >
                        <option disabled hidden>Ngừng bán/Đang kinh doanh</option>
                        <?php if ($product[0]['trangthai'] == 0) { ?>
                          <option selected value="1">Ngừng bán</opt ion>
                          <option value="0">Đang kinh doanh</option>
                        <?php } else {?>
                          <option value="0">Ngừng bán</option>
                          <option selected value="1">Đang kinh doanh</option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                  <div class="row mt-4 mb-4 justify-content-end">
                    <div class="col-4">
                      <button id="save-btn" class="btn btn-primary w-100 invisible">Save</button>
                    </div>
                  </div>
                </div>
            </div>
          </form>
          <!-- Kết thúc form thông tin -->
        </div>
      </div>
      <div class="block-content tab-pane" id="media-panel" role="tabpanel" aria-labelledby="media-panel-tab" tabindex="0">
        <div class="d-flex justify-content-between align-items-center mb-3 me-4">  
          <h4 class="fw-semibold m-0">Thư viện ảnh mã <a class="fw-semibold"><strong>SP-<?= $product[0]['masp']?>, </strong><?= $product[0]['tensp']?></a></h4>
          <form id="upload-form">
            <input type="file" id="add-image" name="images[]" multiple hidden>
            <label for="add-image">
                <i class="btn btn-outline-primary fa fa-plus"></i>
            </label>
          </form>
        </div>
        <div class="block-content d-flex justify-content-center flex-wrap">
          <div class="row items-push js-gallery justify-content-start">
            <?php foreach($img as $index=>$val) {?>
              <?php if ($val['ismain']) { ?>
                <div class="is-banner col-lg-2 border border-3 rounded-4 animated fadeIn p-0 overflow-hidden me-4">
              <?php } else { ?>
                <div class="col-lg-2 border border-3 rounded-4 animated fadeIn p-0 overflow-hidden me-4">
              <?php } ?>
              <div class="options-container fx-item-zoom-in">
                  <img class="img-fluid options-item" style="aspect-ratio: 1/1; object-fit: cover" src="<?= "/QuanLyBanGiay_Php/" . $val['path'] ?>" alt="Product Image">
                  <div class="options-overlay align-items-start" style="top: 10px; right: 10px; bottom: 0; left: 10px">
                    <div class="options-overlay-content d-inline-flex w-100 justify-content-between">
                      <a class="set-banner fs-5 ps-2 pe-2 bg-primary text-white rounded" style="cursor: pointer"><strong>Set Banner</strong></a>
                      <a class="delete btn btn-sm btn-secondary d-flex align-items-center" style="cursor: pointer">
                        <i class="fa fa-fw fa-times"></i>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
  </div>
  <span hidden id="allSizeFetcher">
    <?= json_encode($allSize) ?>
  </span>
</div>