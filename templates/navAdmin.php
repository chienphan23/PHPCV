<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a href="/admin" class="navbar-brand">Trang chủ</a>
                <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse1">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse1">
                    <div class="navbar-nav">
                   
                        <a href="/admin/hangHoa" class="nav-item nav-link">Quản lý mặt hàng</a>
                        <a href="/admin/xacNhanHoaDonIndex" class="nav-item nav-link">Xác nhận hóa đơn</a>
                    </div>
                    
                </div>
                    <form action="/user/logout" method="post" style="float: right;">
                <button id="logout" type="submit" class="btn btn-outline-light" style="width: 140px;float: right;">
                Đăng xuất
                <i class="fas fa-arrow-right"></i>
                </button>
                    </form>
            </div>
     </nav>