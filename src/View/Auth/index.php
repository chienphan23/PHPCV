<?php ob_start(); ?>
    
    <?php
    session_start();
    function isUserLoggedIn() {
        return isset($_SESSION['currentUser']) && !empty($_SESSION['currentUser']);
    }
    if (isUserLoggedIn()) {
        header('Location: /home');
    } else { ?>

        <!-- echo '<h1>Xin chào bạn đến với shop của chúng tôi</h1>';
        echo '<form method="post" action="/user/login">';
        echo '<label>Tài khoản: </label>';
        echo '<input type="text" name="taiKhoan"/> <br/>';
        echo '<label>Mật khẩu: </label>';
        echo '<input type="password" name="matKhau"/> <br/>';
        echo '<button type="submit">Đăng nhập</button>';
        echo '</form>'; -->

        <section id="body-DangNhap" class="vh-100">
        <div class="container-fluid h-custom">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-md-9 col-lg-6 col-xl-5">
              <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp"
                class="img-fluid" alt="Sample image">
            </div>
            <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
              <form method="post" action="/user/login">
                <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start ">
                  <p class="lead fw-normal mb-6 me-3">Đăng Nhập</p>
                </div>
      
                <!-- Email input -->
                <div class="form-outline mb-4">
                <label class="form-label" for="form3Example3">Tài khoản:</label>
                  <input type="text" id="form3Example3" class="form-control form-control-lg"
                    placeholder="Nhập tài khoản" name="taiKhoan"/>
                </div>
      
                <!-- Password input -->
                <div class="form-outline mb-3">
                    <label class="form-label" for="form3Example4">Mật Khẩu:</label>
                  <input type="password" name="matKhau" id="form3Example4" class="form-control form-control-lg"
                    placeholder="Nhập mật khẩu" />
                </div>
      
      
                <div class="text-center text-lg-start mt-4 pt-2">
                  <button type="submit" class="btn btn-primary btn-lg"
                    style="padding-left: 2.5rem; padding-right: 2.5rem;">Đăng Nhập</button>
                  <p class="small fw-bold mt-2 pt-1 mb-0">Bạn đã có tài khoản chưa? <a href="/user/showRegister"
                      class="link-danger">Đăng Ký</a></p>
                </div>
      
              </form>
            </div>
          </div>
        </div>
      </section>

        
    <?php }?>
<?php $content = ob_get_clean(); ?>
<?php include (__DIR__ . '/../../../templates/layout.php'); ?>