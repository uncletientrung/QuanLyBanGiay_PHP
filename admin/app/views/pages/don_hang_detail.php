<!-- Page Content -->
<div class="content">
    <div class="row g-0 flex-md-grow-1">
        <!-- Side Content -->
        <div class="col-md-4 col-lg-5 col-xl-3 order-md-1 bg-body-dark">
            <div class="content">
                <div class="d-md-none push">
                    <button type="button" class="btn w-100 btn-alt-primary"
                        data-toggle="class-toggle"
                        data-target="#side-content"
                        data-class="d-none">
                        Side Content
                    </button>
                </div>

                <div id="side-content" class="d-none d-md-block push">
                    <p>Your side content..</p>
                </div>
            </div>
        </div>
        <!-- END Side Content -->

        <!-- Main Content -->
        <div class="col-md-8 col-lg-7 col-xl-9 order-md-0">
            <div class="content content-full">
                <div class="block block-rounded">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">Chi tiết đơn hàng <b class="text-primary">DH-<?= htmlspecialchars($id) ?></b>
                        </h3>
                        <div class="block-options">
                            <a href="../don_hang" class="btn btn-sm btn-alt-secondary">
                                <i class="fa fa-arrow-left me-1"></i> Quay lại
                            </a>
                        </div>
                    </div>
                    <div class="block-content">
                        <p>Your main content..</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- END Main Content -->
    </div>
</div>
<!-- END Page Content -->