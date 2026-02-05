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

          <!-- ẢNH NHỎ -->
          <div class="col-lg-1 d-none d-lg-block">
            <div class="d-flex flex-column gap-2">
              <img src="public/img/products/giay-nike-metcon-10-nam-trang-den-xanh-01-main.jpg" class="img-fluid rounded thumb-img active" onclick="changeImage(this)" style="cursor: pointer; border: 2px solid transparent; transition: all 0.3s ease;">
              <img src="public/img/products/giay-nike-metcon-10-nam-trang-den-xanh-02.jpg" class="img-fluid rounded thumb-img" onclick="changeImage(this)" style="cursor: pointer; border: 2px solid transparent; transition: all 0.3s ease;">
              <img src="public/img/products/giay-nike-metcon-10-nam-trang-den-xanh-03.jpg" class="img-fluid rounded thumb-img" onclick="changeImage(this)" style="cursor: pointer; border: 2px solid transparent; transition: all 0.3s ease;">
              <img src="public/img/products/giay-nike-metcon-10-nam-trang-den-xanh-04.jpg" class="img-fluid rounded thumb-img" onclick="changeImage(this)" style="cursor: pointer; border: 2px solid transparent; transition: all 0.3s ease;">
              <img src="public/img/products/giay-nike-metcon-10-nam-trang-den-xanh-05.jpg" class="img-fluid rounded thumb-img" onclick="changeImage(this)" style="cursor: pointer; border: 2px solid transparent; transition: all 0.3s ease;">
              <img src="public/img/products/giay-nike-metcon-10-nam-trang-den-xanh-06.jpg" class="img-fluid rounded thumb-img" onclick="changeImage(this)" style="cursor: pointer; border: 2px solid transparent; transition: all 0.3s ease;">
            </div>
          </div>

          <!-- ẢNH CHÍNH + MÔ TẢ NGAY BÊN DƯỚI -->
          <div class="col-lg-5">
            <div class=" rounded product-image-container" style="min-height: 555px; display: flex; align-items: center; justify-content: center; overflow: hidden; background: #ffffff; position: relative;">
              <img id="mainImage" src="public/img/products/giay-nike-metcon-10-nam-trang-den-xanh-01-main.jpg" class="img-fluid rounded product-main-image" style="transition: all 0.4s ease; max-height: 470px; object-fit: contain; cursor: zoom-in;">
            </div>

            <!-- MÔ TẢ SẢN PHẨM -->
            <div class="mt-4">
              <h6 class="fw-bold pb-2 border-bottom">Mô tả sản phẩm</h6>
              <p class="text-muted mt-3 mb-0" style="line-height: 1.7; font-size: 1.02rem;">
                Nike Air Force 1 là biểu tượng không thời gian trong làng giày thể thao. Với thiết kế tinh tế, chất liệu cao cấp và đệm Air công nghệ, đôi giày này mang lại sự thoải mái tối đa cho từng bước chân. Thích hợp cho các hoạt động hàng ngày cũng như thể thao.
              </p>
            </div>
          </div>

          <!-- THÔNG TIN SẢN PHẨM -->
          <div class="col-lg-6">
            <h4 class="fw-bold mb-2">Nike Air Force 1</h4>
            <p class="mb-1">Loại sản phẩm: <strong>Sneaker</strong></p>
            <p class="mb-3">Thương hiệu: <strong>Nike</strong></p>

            <h5 class="fw-bold mb-3 text-primary" style="font-size: 1.4rem;">2.500.000 ₫</h5>

            <!-- SIZE -->
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

            <!-- SỐ LƯỢNG + ADD TO CART -->
            <div class="d-flex align-items-center gap-3 mb-3">
              <div class="input-group quantity" style="width: 120px;">
                <button class="btn btn-sm btn-minus rounded-circle bg-light border" onclick="changeQty(-1)">
                  <i class="fa fa-minus"></i>
                </button>
                <input id="qty" type="text" class="form-control form-control-sm text-center border-0" value="1">
                <button class="btn btn-sm btn-plus rounded-circle bg-light border" onclick="changeQty(1)">
                  <i class="fa fa-plus"></i>
                </button>
              </div>

              <a href="#" class="btn border border-secondary rounded-pill px-4 py-2 text-primary">
                <i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart
              </a>
            </div>

            <!-- MUA NGAY -->
            <a href="#" class="btn btn-danger w-100 mb-4">Mua ngay</a>

            <!-- ICON INFO - ĐÃ THU HẸP LẠI -->
            <div class="row justify-content-center mb-4">
              <div class="col-11 col-md-10 col-lg-11 rounded py-3 bg-white">
                <div class="row text-center">
                  <div class="col">
                    <i class="fa fa-truck fa-2x text-primary mb-2"></i>
                    <p class="mb-0 fw-bold">Giao hàng toàn quốc</p>
                    <p class="mb-0 text-muted" style="font-size: 0.85rem;">2-5 ngày</p>
                  </div>
                  <div class="col">
                    <i class="fa fa-tags fa-2x text-primary mb-2"></i>
                    <p class="mb-0 fw-bold">Ưu đãi hấp dẫn</p>
                    <p class="mb-0 text-muted" style="font-size: 0.85rem;">Khuyến mãi liên tục</p>
                  </div>
                  <div class="col">
                    <i class="fa fa-truck fa-2x text-primary mb-2"></i>
                    <p class="mb-0 fw-bold">Sản phẩm chính hãng</p>
                    <p class="mb-0 text-muted" style="font-size: 0.85rem;">100% chính hãng</p>
                  </div>
                </div>
              </div>
            </div>

            <!-- WHY CHOOSE -->
            <div class="border rounded p-3 mb-4">
              <h6 class="fw-bold mb-2">Tại sao khách hàng lựa chọn GalaxyShoes?</h6>
              <ul class="list-unstyled mb-0">
                <li>✓ 100% Hàng chính hãng</li>
                <li>✓ Đổi hàng 30 ngày</li>
                <li>✓ Uy tín hơn 9 năm</li>
                <li>✓ 100.000+ khách hàng tin tưởng</li>
                <li>✓ Miễn phí vận chuyển đơn trên 500.000đ</li>
              </ul>
            </div>

            <!-- POLICY -->
            <div class="mb-2">
              <a class="fw-bold d-flex justify-content-between text-decoration-none"
                 data-bs-toggle="collapse" href="#shippingPolicy">
                Chính sách giao hàng
                <i class="fa fa-angle-down"></i>
              </a>
              <div class="collapse mt-2" id="shippingPolicy">
                <p>Giao hàng toàn quốc từ 2–5 ngày.</p>
              </div>
            </div>

            <div>
              <a class="fw-bold d-flex justify-content-between text-decoration-none"
                 data-bs-toggle="collapse" href="#returnPolicy">
                Chính sách đổi trả
                <i class="fa fa-angle-down"></i>
              </a>
              <div class="collapse mt-2" id="returnPolicy">
                <p>Đổi trả trong vòng 30 ngày.</p>
              </div>
            </div>
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