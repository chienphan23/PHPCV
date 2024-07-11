<nav id="navbar" class="navbar navbar-expand-lg navbar-dark bg-dark" style="width: 100%;">
        <div class="container-fluid">
          <a class="navbar-brand" href="/home">Trang Chủ</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0" style="width: 100%;">
               
                <a class="nav-link active" aria-current="page" href="/gioHang">
                  Giỏ Hàng
                  <i class="fas fa-regular fa-shopping-cart" style="color: white;"></i>
                </a>
                <a class="nav-link active" aria-current="page" href="/lichSu">Lịch sử mua hàng</a>
                <form id="search" class="d-flex" action="/home/search" method="post">
                  <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="tenHangInput">
                  <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </ul>
<?php
if(isset($_SESSION['flash_message'])) {
    $message = $_SESSION['flash_message'];
    unset($_SESSION['flash_message']);
    echo $message . '<br>';
}
function isUserLoggedIn() {
    return isset($_SESSION['currentUser']) && !empty($_SESSION['currentUser']);
}
if (isUserLoggedIn()) {
?>


            <form action="/user/logout" method="post">
                <button id="logout" type="submit" class="btn btn-outline-light" style="width: 140px;float: right;">
                Đăng xuất
                <i class="fas fa-arrow-right"></i>
                </button>
            </form>
    <?php } else {?>
      <form action="/" method="post">
                <button id="logout" type="submit" class="btn btn-outline-light" style="width: 140px;float: right;">
                Đăng nhập
                <i class="fas fa-arrow-right"></i>
                </button>
            </form>
      <?php }?>
          </div>
        </div>
      </nav>