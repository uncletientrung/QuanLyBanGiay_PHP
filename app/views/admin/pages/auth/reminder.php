<!-- Page Content -->
<div class="bg-image" style="background-image: url('<?php echo $dm->assets_folder; ?>/images/shoefly.gif');">
  <div class="row g-0" style="backdrop-filter: blur(6px); background-color: rgba(0, 0, 0, 0.3);">
    <!-- Main Section -->
    <div class="hero-static col-md-6 d-flex align-items-center bg-body-extra-light">
      <div class="p-3 w-100">
        <!-- Header -->
        <div class="text-center">
          <a class="link-fx fw-bold fs-1" href="index.php">
            <span class="text-dark">Galaxy</span><span class="text-primary">shoes</span>
          </a>
          <p class="text-uppercase fw-bold fs-sm text-muted">Khôi phục mật khẩu</p>
        </div>
        <!-- END Header -->

        <!-- Reminder Form -->
        <!-- jQuery Validation (.js-validation-reminder class is initialized in js/pages/op_auth_reminder.min.js which was auto compiled from _js/pages/op_auth_reminder.js) -->
        <!-- For more info and examples you can check out https://github.com/jzaefferer/jquery-validation -->
        <div class="row g-0 justify-content-center">
          <div class="col-sm-8 col-xl-6">
            <form class="js-validation-reminder" action="be_pages_auth_all.php" method="POST">
              <div class="py-3 mb-4">
                <input type="text" class="form-control form-control-lg form-control-alt" id="reminder-credential" name="reminder-credential" placeholder="Tên tài khoản hoặc Email">
              </div>
              <div class="text-center mb-4">
                <button type="submit" class="btn w-100 btn-lg btn-hero btn-primary">
                  <i class="fa fa-fw fa-reply opacity-50 me-1"></i> Khôi phục mật khẩu
                </button>
                <p class="mt-3 mb-0 d-lg-flex justify-content-lg-between">
                  <a class="btn btn-sm btn-alt-secondary d-block d-lg-inline-block mb-1" href="<?php echo APP_PATH; ?>admin/signin">
                    <i class="fa fa-sign-in-alt opacity-50 me-1"></i> Đăng nhập
                  </a>
                  <a class="btn btn-sm btn-alt-secondary d-block d-lg-inline-block mb-1" href="<?php echo APP_PATH; ?>admin/signup">
                    <i class="fa fa-plus opacity-50 me-1"></i> Tạo tài khoản
                  </a>
                </p>
              </div>
            </form>
          </div>
        </div>
        <!-- END Reminder Form -->
      </div>
    </div>
    <!-- END Main Section -->

    <!-- Meta Info Section -->
    <div class="hero-static col-md-6 d-none d-md-flex align-items-md-center justify-content-md-center text-md-center">
      <div class="p-3">
        <p class="display-4 fw-bold text-white mb-0">
          Be ready to fail..
        </p>
        <p class="fs-1 fw-semibold text-white-75 mb-0">
          ..to be able to succeed!
        </p>
      </div>
    </div>
    <!-- END Meta Info Section -->
  </div>
</div>
<!-- END Page Content -->