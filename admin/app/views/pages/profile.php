<!-- Page Content -->
<div class="content content-full content-boxed">
    <!-- Hero -->
    <div class="rounded border overflow-hidden push">
        <div class="bg-image pt-9" style="background-image: url('<?php echo $dm->assets_folder; ?>/images/photo12@2x.jpg');"></div>
        <div class="px-4 py-3 bg-body-extra-light d-flex flex-column flex-md-row align-items-center">
            <a class="d-block img-link mt-n5" href="<?php echo APP_ADMIN_PATH; ?>profile">
                <img class="img-avatar img-avatar96 img-avatar-thumb" src="<?php echo $dm->assets_folder; ?>/images/avatar_default.png" alt="Avatar">
            </a>
            <div class="ms-3 flex-grow-1 text-center text-md-start my-3 my-md-0">
                <h1 class="fs-4 fw-bold mb-1">
                    <?php echo $user['hoten'] ?? 'Chưa đăng nhập'; ?>
                </h1>
                <h2 class="fs-sm fw-medium text-muted mb-0">
                    Edit Account
                </h2>
            </div>
        </div>
    </div>
    <!-- END Hero -->

    <!-- Edit Account -->
    <div class="block block-bordered block-rounded">
        <ul class="nav nav-tabs nav-tabs-alt" role="tablist">
            <li class="nav-item">
                <button class="nav-link space-x-1 active" id="account-profile-tab" data-bs-toggle="tab" data-bs-target="#account-profile" role="tab" aria-controls="account-profile" aria-selected="true">
                    <i class="fa fa-user-circle d-sm-none"></i>
                    <span class="d-none d-sm-inline">Thông tin cá nhân</span>
                </button>
            </li>
            <li class="nav-item">
                <button class="nav-link space-x-1" id="account-password-tab" data-bs-toggle="tab" data-bs-target="#account-password" role="tab" aria-controls="account-password" aria-selected="false">
                    <i class="fa fa-asterisk d-sm-none"></i>
                    <span class="d-none d-sm-inline">Mật Khẩu</span>
                </button>
            </li>
        </ul>
        <div class="block-content tab-content">
            <div class="tab-pane active" id="account-profile" role="tabpanel" aria-labelledby="account-profile-tab" tabindex="0">
                <div class="row push p-sm-2 p-lg-4">
                    <div class="offset-xl-1 col-xl-4 order-xl-1">
                        <p class="bg-body-light p-4 rounded-3 text-muted fs-sm">
                            Your account’s vital info. Your username will be publicly visible.
                        </p>
                    </div>
                    <div class="col-xl-6 order-xl-0">
                        <form class="js-validation-profile" action="<?php echo ROOT_URL_ADMIN; ?>profile/update" method="POST" enctype="multipart/form-data">
                            <div class="mb-4">
                                <label class="form-label" for="dm-profile-edit-name">Họ tên</label>
                                <input type="text" class="form-control" id="dm-profile-edit-name" name="hoten" placeholder="Nhập tên.." value="<?php echo $user['hoten'] ?? ''; ?>">
                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="dm-profile-edit-email">Email</label>
                                <input type="email" class="form-control" id="dm-profile-edit-email" name="email" placeholder="Nhập email.." value="<?php echo $user['email'] ?? ''; ?>">
                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="dm-profile-edit-sdt">Số điện thoại</label>
                                <input type="text" class="form-control" id="dm-profile-edit-sdt" name="sdt" placeholder="Nhập số điện thoại.." value="<?php echo $user['sdt'] ?? ''; ?>">
                            </div>
                            <button type="submit" class="btn btn-alt-primary">
                                <i class="fa fa-check-circle opacity-50 me-1"></i> Cập nhật
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="tab-pane" id="account-password" role="tabpanel" aria-labelledby="account-password-tab" tabindex="0">
                <div class="row push p-sm-2 p-lg-4">
                    <div class="offset-xl-1 col-xl-4 order-xl-1">
                        <p class="bg-body-light p-4 rounded-3 text-muted fs-sm">
                            Changing your sign in password is an easy way to keep your account secure.
                        </p>
                    </div>
                    <div class="col-xl-6 order-xl-0">
                        <form class="js-validation-password" action="<?php echo ROOT_URL_ADMIN; ?>profile/change-password" method="POST">
                            <div class="mb-4">
                                <label class="form-label" for="dm-profile-edit-password">Mật khẩu hiện tại</label>
                                <input type="password" class="form-control" id="dm-profile-edit-password" name="current_password">
                            </div>
                            <div class="row mb-4">
                                <div class="col-12">
                                    <label class="form-label" for="dm-profile-edit-password-new">Mật khẩu mới</label>
                                    <input type="password" class="form-control" id="dm-profile-edit-password-new" name="new_password">
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-12">
                                    <label class="form-label" for="dm-profile-edit-password-new-confirm">Nhập lại mật khẩu mới</label>
                                    <input type="password" class="form-control" id="dm-profile-edit-password-new-confirm" name="confirm_password">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-alt-primary">
                                <i class="fa fa-check-circle opacity-50 me-1"></i> Đặt lại mật khẩu
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END Edit Account -->
</div>
<!-- END Page Content -->