<!-- Page Content -->
<div class="bg-image" style="background-image: url('<?php echo $dm->assets_folder; ?>/images/shoemove.gif');">
  <div class="row g-0" style="background-color: rgba(6, 101, 208, 0.3);">
    <!-- Main Section -->
    <div class="hero-static col-md-6 d-flex align-items-center bg-body-extra-light">
      <div class="p-3 w-100">
        <!-- Header -->
        <div class="mb-3 text-center">
          <a class="link-fx fw-bold fs-1" href="index.php">
            <span class="text-dark">Galaxy</span><span class="text-primary">shoes</span>
          </a>
          <p class="text-uppercase fw-bold fs-sm text-muted">Đăng nhập</p>
        </div>
        <!-- END Header -->

        <!-- Sign In Form -->
        <!-- jQuery Validation (.js-validation-signin class is initialized in js/pages/op_auth_signin.min.js which was auto compiled from _js/pages/op_auth_signin.js) -->
        <!-- For more info and examples you can check out https://github.com/jzaefferer/jquery-validation -->
        <div class="row g-0 justify-content-center">
          <div class="col-sm-8 col-xl-6">
            <form class="js-validation-signin" method="POST">
              <div class="py-3">
                <div class="mb-4">
                  <input type="text" class="form-control form-control-lg form-control-alt" id="login-email" name="login-email" placeholder="Email hoặc số điện thoại">
                </div>
                <div class="mb-4">
                  <input type="password" class="form-control form-control-lg form-control-alt" id="login-password" name="login-password" placeholder="Mật khẩu">
                </div>
              </div>
              <div class="mb-4">
                <button type="submit" class="btn w-100 btn-lg btn-hero btn-primary">
                  <i class="fa fa-fw fa-sign-in-alt opacity-50 me-1"></i> Đăng nhập
                </button>
              </div>
            </form>
          </div>
        </div>
        <!-- END Sign In Form -->
      </div>
    </div>
    <!-- END Main Section -->

    <!-- Meta Info Section -->
    <div class="hero-static col-md-6 d-none d-md-flex align-items-md-center justify-content-md-center text-md-center">
      <div class="p-3">
        <p class="display-4 fw-bold text-white mb-3">
          Welcome
        </p>
        <p class="fs-lg fw-semibold text-white-75 mb-0">
          Copyright &copy; <span data-toggle="year-copy"></span>
        </p>
      </div>
    </div>
    <!-- END Meta Info Section -->
  </div>
</div>
<!-- END Page Content -->

<!-- jQuery (required for jQuery Validation plugin) -->
<?php $dm->get_js('js/lib/jquery.min.js'); ?>
<?php $dm->get_js('js/plugins/bootstrap-notify/bootstrap-notify.min.js'); ?>

<!-- Page JS Plugins -->
<?php $dm->get_js('js/plugins/jquery-validation/jquery.validate.min.js'); ?>

<?php $dm->get_js('js/dashmix.app.min.js'); ?>

<!-- Page JS Code -->
<?php $dm->get_js('js/pages/signin.js'); ?>

<!-- Toast -->
<script>
  $(function() {
    <?php if (isset($_SESSION['error'])): ?>
      Dashmix.helpers('jq-notify', {
        type: 'danger',
        icon: 'fa fa-times-circle me-1',
        message: '<?php echo $_SESSION['error']; ?>'
      });
      <?php unset($_SESSION['error']); ?>
    <?php endif; ?>
  });
</script>