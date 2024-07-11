<?php ob_start();?>
<h1 style="text-align: center;">Quản lý hàng hoá</h1>
    <div class="row justify-content-center">
                        <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
          
                          <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Sửa hàng</p>
          
                          <form class="mx-1 mx-md-4" action="/admin/suaHang" method="post" enctype="multipart/form-data">
                            <input type="hidden" value="<?= $hangHoa['idhangHoa']?>" name="idhangHoa"/>
          
                            <div class="d-flex flex-row align-items-center mb-2">
                              <div class="form-outline flex-fill mb-0">
                                <label class="form-label" for="form3Example1c">Tên hàng:</label>
                                <input  id="form3Example1c" class="form-control" name="tenHang" type="text" value="<?= $hangHoa['tenHang']?>"/>
                              </div>
                            </div>
                            <div class="d-flex flex-row align-items-center mb-2">
                              <div class="form-outline flex-fill mb-0">
                                <label class="form-label" for="form3Example1c">Giá</label>
                                <input id="form3Example1c" class="form-control" type="number" name="gia" min="1" value="<?= $hangHoa['gia']?>"/>
                              </div>
                            </div>

                            <div class="d-flex flex-row align-items-center mb-2">
                                <div class="form-outline flex-fill mb-0">
                                <label class="form-label" for="form3Example1c" >Màu sắc</label>
                                  <input type="text" name="mau" value="<?= $hangHoa['mau']?>" id="form3Example1c" class="form-control"/>
                                </div>
                              </div>

                              <div class="d-flex flex-row align-items-center mb-2">
                                <div class="form-outline flex-fill mb-0">
                                    <label class="form-label" for="form3Example1c">Ảnh</label>
                                  <input type="file" name="anh" id="anh" class="form-control" />
                                </div>
                              </div>
                            <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                              <button type="submit" class="btn btn-primary btn-lg">Sửa hàng</button>
                            </div>
                          </form>
                        </div>
    </div>
<?php $content = ob_get_clean(); ?>
<?php include (__DIR__ .'/../../../templates/AdminPage.php'); ?>