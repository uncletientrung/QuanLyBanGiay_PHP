<!-- Single Page Header start -->
<div class="container-fluid page-header py-5">
  <h1 class="text-center text-white display-6">Shop Detail</h1>
  <ol class="breadcrumb justify-content-center mb-0">
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item"><a href="#">Pages</a></li>
    <li class="breadcrumb-item active text-white">Shop Detail</li>
  </ol>
</div>
<!-- Single Page Header End -->

<!-- Single Product Start -->
<div class="container-fluid py-5 mt-5">
  <div class="container py-5">
    <div class="row g-4 mb-5">
      <div class="col-12">
        <div class="row g-4">

          <!-- Cột trái: Hình ảnh + Tabs (thu nhỏ lại thành col-lg-7) -->
          <div class="col-lg-7">

            <!-- Div mẹ chứa thumbnail + ảnh lớn -->
            <div class="row g-3 mb-4">
              <!-- Thumbnail nhỏ - vuông, to hơn một chút (95px) -->
              <div class="col-2 d-none d-lg-block">
                <div class="d-flex flex-column gap-2"> <!-- tăng gap-1 lên gap-2 để tổng chiều cao vẫn cân đối khi thumbnail to hơn -->
                  <img src="public/img/products/giay-nike-metcon-10-nam-trang-den-xanh-01-main.jpg" 
                      class="img-fluid rounded thumb-img active" 
                      onclick="changeImage(this)" 
                      style="cursor: pointer; border: 2px solid transparent; transition: all 0.3s ease; width: 95px; height: 95px; object-fit: cover;">
                  <img src="public/img/products/giay-nike-metcon-10-nam-trang-den-xanh-02.jpg" 
                      class="img-fluid rounded thumb-img" 
                      onclick="changeImage(this)" 
                      style="cursor: pointer; border: 2px solid transparent; transition: all 0.3s ease; width: 95px; height: 95px; object-fit: cover;">
                  <img src="public/img/products/giay-nike-metcon-10-nam-trang-den-xanh-03.jpg" 
                      class="img-fluid rounded thumb-img" 
                      onclick="changeImage(this)" 
                      style="cursor: pointer; border: 2px solid transparent; transition: all 0.3s ease; width: 95px; height: 95px; object-fit: cover;">
                  <img src="public/img/products/giay-nike-metcon-10-nam-trang-den-xanh-04.jpg" 
                      class="img-fluid rounded thumb-img" 
                      onclick="changeImage(this)" 
                      style="cursor: pointer; border: 2px solid transparent; transition: all 0.3s ease; width: 95px; height: 95px; object-fit: cover;">
                  <img src="public/img/products/giay-nike-metcon-10-nam-trang-den-xanh-05.jpg" 
                      class="img-fluid rounded thumb-img" 
                      onclick="changeImage(this)" 
                      style="cursor: pointer; border: 2px solid transparent; transition: all 0.3s ease; width: 95px; height: 95px; object-fit: cover;">
                  <img src="public/img/products/giay-nike-metcon-10-nam-trang-den-xanh-06.jpg" 
                      class="img-fluid rounded thumb-img" 
                      onclick="changeImage(this)" 
                      style="cursor: pointer; border: 2px solid transparent; transition: all 0.3s ease; width: 95px; height: 95px; object-fit: cover;">
                </div>
              </div>

            <!-- Ảnh lớn - luôn có border-radius -->
            <div class="col-10">
              <div class="rounded product-image-container" 
                  style="min-height: 600px; display: flex; align-items: center; justify-content: center; overflow: hidden; background: #ffffff; position: relative;">
                <img id="mainImage"
                    src="public/img/products/giay-nike-metcon-10-nam-trang-den-xanh-01-main.jpg"
                    class="img-fluid product-main-image"
                    style="transition: all 0.4s ease; max-height: 580px; object-fit: contain; cursor: zoom-in; width: 100%; border-radius: 0.375rem;">  <!-- thêm border-radius ở đây -->
              </div>
            </div>
            </div>

            <!-- Tabs mô tả - giữ sát biên trái -->
            <div class="ps-lg-0 ps-3">
              <nav>
                <div class="nav nav-tabs mb-3">
                  <button class="nav-link active border-white border-bottom-0" type="button" role="tab"
                    id="nav-about-tab" data-bs-toggle="tab" data-bs-target="#nav-about"
                    aria-controls="nav-about" aria-selected="true">Description</button>
                  <button class="nav-link border-white border-bottom-0" type="button" role="tab"
                    id="nav-shipping-tab" data-bs-toggle="tab" data-bs-target="#nav-shipping"
                    aria-controls="nav-shipping" aria-selected="false">Chính sách giao hàng</button>
                  <button class="nav-link border-white border-bottom-0" type="button" role="tab"
                    id="nav-return-tab" data-bs-toggle="tab" data-bs-target="#nav-return"
                    aria-controls="nav-return" aria-selected="false">Chính sách đổi trả</button>
                </div>
              </nav>
              <div class="tab-content mb-5">
                <!-- nội dung tab giữ nguyên -->
                <div class="tab-pane active" id="nav-about" role="tabpanel" aria-labelledby="nav-about-tab">
                  <p>The generated Lorem Ipsum is therefore always free from repetition injected humour, or non-characteristic words etc. 
                    Susp endisse ultricies nisi vel quam suscipit </p>
                  <p>Sabertooth peacock flounder; chain pickerel hatchetfish, pencilfish snailfish filefish Antarctic 
                    icefish goldeye aholehole trumpetfish pilot fish airbreathing catfish, electric ray sweeper.</p>
                </div>
                <div class="tab-pane" id="nav-shipping" role="tabpanel" aria-labelledby="nav-shipping-tab">
                  <p>Giao hàng toàn quốc từ 2–5 ngày.</p>
                </div>
                <div class="tab-pane" id="nav-return" role="tabpanel" aria-labelledby="nav-return-tab">
                  <p>Đổi trả trong vòng 30 ngày.</p>
                </div>
              </div>
            </div>

          </div>

          <!-- Cột phải: Thông tin sản phẩm - col-lg-5 -->
          <div class="col-lg-5">
            <!-- Tên sản phẩm nổi bật hơn -->
            <h4 class="fw-bold mb-2" style="font-size: 2.5rem; line-height: 1.1;">Nike Air Force 1</h4>
            
            <p class="mb-1">Loại sản phẩm: <strong>Sneaker</strong></p>
            <p class="mb-2">Thương hiệu: <strong>Nike</strong></p>
            <!-- Thêm giới tính -->
            <p class="mb-3">Giới tính: <strong>Unisex</strong></p>

            <!-- Giá nổi bật hơn -->
            <h5 class="fw-bolder mb-4 text-danger" style="font-size: 2rem; letter-spacing: -0.5px;">
              2.500.000 ₫
            </h5>

            <div class="mb-4">
              <p class="fw-bold mb-2">Size</p>
              <div class="d-flex gap-2 flex-wrap">
                <button class="btn btn-outline-secondary btn-sm size-btn">38</button>
                <button class="btn btn-outline-secondary btn-sm size-btn">39</button>
                <button class="btn btn-outline-secondary btn-sm size-btn">40</button>
                <button class="btn btn-outline-secondary btn-sm size-btn">41</button>
                <button class="btn btn-outline-secondary btn-sm size-btn">42</button>
              </div>
            </div>

            <div class="d-flex align-items-center gap-3 mb-4">
              <div class="input-group quantity" style="width: 130px;">
                <button class="btn btn-sm btn-minus rounded-circle bg-light border" onclick="changeQty(-1)">
                  <i class="fa fa-minus"></i>
                </button>
                <input id="qty" type="text" class="form-control form-control-sm text-center border-0" value="1">
                <button class="btn btn-sm btn-plus rounded-circle bg-light border" onclick="changeQty(1)">
                  <i class="fa fa-plus"></i>
                </button>
              </div>

              <a href="#" class="btn border border-secondary rounded-pill px-5 py-2 text-primary">
                <i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart
              </a>
            </div>

            <a href="#" class="btn btn-danger w-100 mb-4 py-3 fw-bold" style="font-size: 1.2rem;">Mua ngay</a>

            <!-- Khung icons info - làm dài bằng nút Mua ngay -->
            <div class="rounded py-3 bg-white border mb-4 w-100">
              <div class="row text-center gx-0">
                <div class="col">
                  <i class="fa fa-truck fa-2x text-primary mb-2"></i>
                  <p class="mb-0 fw-bold">Giao hàng toàn quốc</p>
                  <p class="mb-0 text-muted small">2-5 ngày</p>
                </div>
                <div class="col">
                  <i class="fa fa-tags fa-2x text-primary mb-2"></i>
                  <p class="mb-0 fw-bold">Ưu đãi hấp dẫn</p>
                  <p class="mb-0 text-muted small">Khuyến mãi liên tục</p>
                </div>
                <div class="col">
                  <i class="fa fa-check-circle fa-2x text-primary mb-2"></i>
                  <p class="mb-0 fw-bold">Chính hãng</p>
                  <p class="mb-0 text-muted small">100% chính hãng</p>
                </div>
              </div>
            </div>

            <!-- Khung Tại sao chọn GalaxyShoes - cũng dài bằng nút Mua ngay -->
            <div class="border rounded p-4 mb-4 w-100">
              <h6 class="fw-bold mb-3" style="font-size: 1.25rem;">Tại sao khách hàng lựa chọn GalaxyShoes?</h6>
              <ul class="list-unstyled mb-0">
                <li class="mb-2">✓ 100% Hàng chính hãng</li>
                <li class="mb-2">✓ Đổi hàng 30 ngày</li>
                <li class="mb-2">✓ Uy tín hơn 9 năm</li>
                <li class="mb-2">✓ 100.000+ khách hàng tin tưởng</li>
                <li>✓ Miễn phí vận chuyển đơn trên 500.000đ</li>
              </ul>
            </div>

            <!-- Collapse chính sách nếu có - giữ nguyên -->
          </div>

        </div>
      </div>
    </div>

     <h1 class="fw-bold mb-0">Related products</h1>
    <div class="vesitable">
      <div class="owl-carousel vegetable-carousel justify-content-center">
        <div class="border border-primary rounded position-relative vesitable-item">
          <div class="vesitable-img">
            <img src="public/img/vegetable-item-6.jpg" class="img-fluid w-100 rounded-top" alt="">
          </div>
          <div class="text-white bg-primary px-3 py-1 rounded position-absolute" style="top: 10px; right: 10px;">Vegetable</div>
          <div class="p-4 pb-0 rounded-bottom">
            <h4>Parsely</h4>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod te incididunt</p>
            <div class="d-flex justify-content-between flex-lg-wrap">
              <p class="text-dark fs-5 fw-bold">$4.99 / kg</p>
              <a href="#" class="btn border border-secondary rounded-pill px-3 py-1 mb-4 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
            </div>
          </div>
        </div>
        <div class="border border-primary rounded position-relative vesitable-item">
          <div class="vesitable-img">
            <img src="public/img/vegetable-item-1.jpg" class="img-fluid w-100 rounded-top" alt="">
          </div>
          <div class="text-white bg-primary px-3 py-1 rounded position-absolute" style="top: 10px; right: 10px;">Vegetable</div>
          <div class="p-4 pb-0 rounded-bottom">
            <h4>Parsely</h4>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod te incididunt</p>
            <div class="d-flex justify-content-between flex-lg-wrap">
              <p class="text-dark fs-5 fw-bold">$4.99 / kg</p>
              <a href="#" class="btn border border-secondary rounded-pill px-3 py-1 mb-4 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
            </div>
          </div>
        </div>
        <div class="border border-primary rounded position-relative vesitable-item">
          <div class="vesitable-img">
            <img src="public/img/vegetable-item-3.png" class="img-fluid w-100 rounded-top bg-light" alt="">
          </div>
          <div class="text-white bg-primary px-3 py-1 rounded position-absolute" style="top: 10px; right: 10px;">Vegetable</div>
          <div class="p-4 pb-0 rounded-bottom">
            <h4>Banana</h4>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod te incididunt</p>
            <div class="d-flex justify-content-between flex-lg-wrap">
              <p class="text-dark fs-5 fw-bold">$7.99 / kg</p>
              <a href="#" class="btn border border-secondary rounded-pill px-3 py-1 mb-4 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
            </div>
          </div>
        </div>
        <div class="border border-primary rounded position-relative vesitable-item">
          <div class="vesitable-img">
            <img src="public/img/vegetable-item-4.jpg" class="img-fluid w-100 rounded-top" alt="">
          </div>
          <div class="text-white bg-primary px-3 py-1 rounded position-absolute" style="top: 10px; right: 10px;">Vegetable</div>
          <div class="p-4 pb-0 rounded-bottom">
            <h4>Bell Papper</h4>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod te incididunt</p>
            <div class="d-flex justify-content-between flex-lg-wrap">
              <p class="text-dark fs-5 fw-bold">$7.99 / kg</p>
              <a href="#" class="btn border border-secondary rounded-pill px-3 py-1 mb-4 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
            </div>
          </div>
        </div>
        <div class="border border-primary rounded position-relative vesitable-item">
          <div class="vesitable-img">
            <img src="public/img/vegetable-item-5.jpg" class="img-fluid w-100 rounded-top" alt="">
          </div>
          <div class="text-white bg-primary px-3 py-1 rounded position-absolute" style="top: 10px; right: 10px;">Vegetable</div>
          <div class="p-4 pb-0 rounded-bottom">
            <h4>Potatoes</h4>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod te incididunt</p>
            <div class="d-flex justify-content-between flex-lg-wrap">
              <p class="text-dark fs-5 fw-bold">$7.99 / kg</p>
              <a href="#" class="btn border border-secondary rounded-pill px-3 py-1 mb-4 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
            </div>
          </div>
        </div>
        <div class="border border-primary rounded position-relative vesitable-item">
          <div class="vesitable-img">
            <img src="public/img/vegetable-item-6.jpg" class="img-fluid w-100 rounded-top" alt="">
          </div>
          <div class="text-white bg-primary px-3 py-1 rounded position-absolute" style="top: 10px; right: 10px;">Vegetable</div>
          <div class="p-4 pb-0 rounded-bottom">
            <h4>Parsely</h4>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod te incididunt</p>
            <div class="d-flex justify-content-between flex-lg-wrap">
              <p class="text-dark fs-5 fw-bold">$7.99 / kg</p>
              <a href="#" class="btn border border-secondary rounded-pill px-3 py-1 mb-4 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
            </div>
          </div>
        </div>
        <div class="border border-primary rounded position-relative vesitable-item">
          <div class="vesitable-img">
            <img src="public/img/vegetable-item-5.jpg" class="img-fluid w-100 rounded-top" alt="">
          </div>
          <div class="text-white bg-primary px-3 py-1 rounded position-absolute" style="top: 10px; right: 10px;">Vegetable</div>
          <div class="p-4 pb-0 rounded-bottom">
            <h4>Potatoes</h4>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod te incididunt</p>
            <div class="d-flex justify-content-between flex-lg-wrap">
              <p class="text-dark fs-5 fw-bold">$7.99 / kg</p>
              <a href="#" class="btn border border-secondary rounded-pill px-3 py-1 mb-4 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
            </div>
          </div>
        </div>
        <div class="border border-primary rounded position-relative vesitable-item">
          <div class="vesitable-img">
            <img src="public/img/vegetable-item-6.jpg" class="img-fluid w-100 rounded-top" alt="">
          </div>
          <div class="text-white bg-primary px-3 py-1 rounded position-absolute" style="top: 10px; right: 10px;">Vegetable</div>
          <div class="p-4 pb-0 rounded-bottom">
            <h4>Parsely</h4>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod te incididunt</p>
            <div class="d-flex justify-content-between flex-lg-wrap">
              <p class="text-dark fs-5 fw-bold">$7.99 / kg</p>
              <a href="#" class="btn border border-secondary rounded-pill px-3 py-1 mb-4 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
            </div>
          </div>
        </div>
      </div>
    </div>



  </div>
</div>
<!-- Single Product End -->

<style>
  .thumb-img:hover {
    transform: scale(1.08);
    border-color: #8c9deb !important;
    box-shadow: 0 4px 12px rgba(102, 126, 234, 0.4) !important;
  }

  .thumb-img.active {
    border-color: #8c9eed !important;
    box-shadow: 0 4px 12px rgba(102, 126, 234, 0.4);
  }

  .product-main-image {
    transition: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
  }

  .product-main-image:hover {
  transform: scale(1.12);
  cursor: zoom-in;
}


  @media (max-width: 768px) {
    .product-image-container {
      min-height: 350px !important;
    }
  }
</style>

<script>
  function changeImage(elem) {
    const mainImg = document.getElementById('mainImage');
    const thumbs = document.querySelectorAll('.thumb-img');
    
    thumbs.forEach(img => img.classList.remove('active'));
    elem.classList.add('active');
    
    mainImg.style.opacity = '0';
    
    setTimeout(() => {
      mainImg.src = elem.src;
      mainImg.style.opacity = '1';
    }, 150);
  }

  document.querySelectorAll('.thumb-img').forEach(img => {
    img.addEventListener('mouseenter', function() {
      this.style.transform = 'scale(1.08)';
    });
    img.addEventListener('mouseleave', function() {
      if (!this.classList.contains('active')) {
        this.style.transform = 'scale(1)';
      }
    });
  });

  // Hàm thay đổi số lượng (nếu chưa có thì thêm)
  function changeQty(value) {
    let qty = document.getElementById('qty');
    let current = parseInt(qty.value);
    let newQty = current + value;
    if (newQty >= 1) {
      qty.value = newQty;
    }
  }
</script>