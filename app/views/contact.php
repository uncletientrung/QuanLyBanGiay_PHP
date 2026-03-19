<!-- Single Page Header start -->
<div class="container-fluid page-header py-5">
  <h1 class="text-center text-white display-6">Liên hệ</h1>
  <ol class="breadcrumb justify-content-center mb-0">
    <li class="breadcrumb-item"><a href="<?= ROOT_URL ?>">Trang chủ</a></li>
    <li class="breadcrumb-item active text-white">Liên hệ</li>
  </ol>
</div>
<!-- Single Page Header End -->

<!-- Contact Start -->
<div class="container-fluid contact py-5">
  <div class="container py-5">
    <div class="p-5 bg-light rounded">
      <div class="row g-4">
        <div class="col-lg-12">
          <div class="h-100 rounded">
            <iframe class="rounded w-100"
              style="height: 400px;"
              src="https://www.google.com/maps?q=10.759967895663818,106.68221883692539&hl=vi&z=16&output=embed"
              loading="lazy"
              referrerpolicy="no-referrer-when-downgrade">
            </iframe>
          </div>
        </div>

        <div class="col-lg-7">
          <form id="contactForm">
            <input type="text" class="w-100 form-control border-0 py-3 mb-4"
              placeholder="Tên của bạn" id="userInput" name="userInput">

            <input type="email" class="w-100 form-control border-0 py-3 mb-4"
              placeholder="Email" id="emailInput" name="emailInput">

            <textarea class="w-100 form-control border-0 mb-4"
              rows="5" cols="10" placeholder="Nội dung"
              id="contentInput" name="contentInput"></textarea>

            <button class="w-100 btn form-control border-secondary py-3 bg-white text-primary"
              type="submit" id="btnSend" disabled>
              Gửi
            </button>
          </form>
        </div>

        <div class="col-lg-5">
          <div class="d-flex p-4 rounded mb-4 bg-white">
            <i class="fas fa-map-marker-alt fa-2x text-primary me-4"></i>
            <div>
              <h4>Địa chỉ</h4>
              <p class="mb-2">273 An Dương Vương, P.2, Quận 5, Thành phố Hồ Chí Minh, Việt Nam</p>
            </div>
          </div>
          <div class="d-flex p-4 rounded mb-4 bg-white">
            <i class="fas fa-envelope fa-2x text-primary me-4"></i>
            <div>
              <h4>Email</h4>
              <p class="mb-2">shoesgalaxy@gmail.com</p>
            </div>
          </div>
          <div class="d-flex p-4 rounded bg-white">
            <i class="fa fa-phone-alt fa-2x text-primary me-4"></i>
            <div>
              <h4>Điện thoại</h4>
              <p class="mb-2">0909 669 035</p>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>
<!-- Contact End -->