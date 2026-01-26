<!-- Page Content -->
<div class="bg-image" style="background-image: url('<?php echo $dm->assets_folder; ?>/media/photos/photo12@2x.jpg');">
  <div class="row g-0 justify-content-center bg-black-75">
    <!-- Main Section -->
    <div class="hero-static col-md-6 d-flex align-items-center bg-body-extra-light">
      <div class="p-3 w-100">
        <!-- Header -->
        <div class="mb-3 text-center">
          <a class="link-fx fw-bold fs-1" href="index.php">
            <span class="text-dark">Galaxy</span><span class="text-primary">shoes</span>
          </a>
          <p class="text-uppercase fw-bold fs-sm text-muted">Tạo tài khoản</p>
        </div>
        <!-- END Header -->

        <!-- Sign Up Form -->
        <!-- jQuery Validation (.js-validation-signup class is initialized in js/pages/op_auth_signup.min.js which was auto compiled from _js/pages/op_auth_signup.js) -->
        <!-- For more info and examples you can check out https://github.com/jzaefferer/jquery-validation -->
        <div class="row g-0 justify-content-center">
          <div class="col-sm-8 col-xl-6">
            <form class="js-validation-signup" action="be_pages_auth_all.php" method="POST">
              <div class="py-3">
                <div class="mb-4">
                  <input type="text" class="form-control form-control-lg form-control-alt" id="signup-username" name="signup-username" placeholder="Tên tài khoản">
                </div>
                <div class="mb-4">
                  <input type="email" class="form-control form-control-lg form-control-alt" id="signup-email" name="signup-email" placeholder="Email">
                </div>
                <div class="mb-4">
                  <input type="password" class="form-control form-control-lg form-control-alt" id="signup-password" name="signup-password" placeholder="Mật khẩu">
                </div>
                <div class="mb-4">
                  <input type="password" class="form-control form-control-lg form-control-alt" id="signup-password-confirm" name="signup-password-confirm" placeholder="Xác nhận mật khẩu">
                </div>
              </div>
              <div class="mb-4">
                <button type="submit" class="btn w-100 btn-lg btn-hero btn-primary">
                  <i class="fa fa-fw fa-plus opacity-50 me-1"></i> Đăng ký
                </button>
                <p class="mt-3 mb-0 d-lg-flex justify-content-lg-between">
                  <a class="btn btn-sm btn-alt-secondary d-block d-lg-inline-block mb-1" href="<?php echo APP_PATH; ?>admin/auth/signin">
                    <i class="fa fa-sign-in-alt opacity-50 me-1"></i> Đăng nhập
                  </a>
                </p>
              </div>
            </form>
          </div>
        </div>
        <!-- END Sign Up Form -->
      </div>
    </div>
    <!-- END Main Section -->
  </div>

  <!-- Terms Modal -->
  <div class="modal fade" id="modal-terms" tabindex="-1" role="dialog" aria-labelledby="modal-terms" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="block block-themed block-transparent mb-0">
          <div class="block-header bg-primary-dark">
            <h3 class="block-title">Terms &amp; Conditions</h3>
            <div class="block-options">
              <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
                <i class="fa fa-fw fa-times"></i>
              </button>
            </div>
          </div>
          <div class="block-content">
            <?php $dm->get_text('small', 5); ?>
          </div>
          <div class="block-content block-content-full text-end bg-body">
            <button type="button" class="btn btn-sm btn-primary" data-bs-dismiss="modal">Done</button>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- END Terms Modal -->
</div>
<!-- END Page Content -->