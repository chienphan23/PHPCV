<?php ob_start();
?>
<h1 style="text-align: center;">Quản lý hàng hoá</h1>
    <!-- <div>
        <form action="/admin/themHang" method="post" enctype="multipart/form-data">
            <label>
                Tên hàng:
            </label>
            <input name="tenHang" type="text"/>
            <label>
                Giá:
            </label>
            <input type="number" name="gia" min="1"/>
            <label>
                Màu sắc:
            </label>
            <input type="text" name="mau"/>
            <label>Ảnh</label>
            <input type="file" name="anh" id="anh"/>
            <div>
                <button type="submit">Thêm hàng</button>
            </div>
        </form>
    </div>
    <hr> -->
    <div class="row justify-content-center">
                        <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
          
                          <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Thêm hàng</p>
          
                          <form class="mx-1 mx-md-4" action="/admin/themHang" method="POST" enctype="multipart/form-data">
          
                            <div class="d-flex flex-row align-items-center mb-2">
                              <div class="form-outline flex-fill mb-0">
                                <label class="form-label" for="form3Example1c">Tên hàng:</label>
                                <input  id="form3Example1c" class="form-control" name="tenHang" type="text"/>
                              </div>
                            </div>
                            <div class="d-flex flex-row align-items-center mb-2">
                              <div class="form-outline flex-fill mb-0">
                                <label class="form-label" for="form3Example1c">Giá</label>
                                <input id="form3Example1c" class="form-control" type="number" name="gia" min="1"/>
                              </div>
                            </div>

                            <div class="d-flex flex-row align-items-center mb-2">
                                <div class="form-outline flex-fill mb-0">
                                <label class="form-label" for="form3Example1c" >Màu sắc</label>
                                  <input type="text" name="mau" id="form3Example1c" class="form-control"/>
                                </div>
                              </div>

                              <div class="d-flex flex-row align-items-center mb-2">
                                <div class="form-outline flex-fill mb-0">
                                    <label class="form-label" for="form3Example1c">Ảnh</label>
                                  <input type="file" name="anh" id="anh" class="form-control" />
                                </div>
                              </div>
                            <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                              <button type="submit" class="btn btn-primary btn-lg">Thêm hàng</button>
                            </div>
          
                          </form>
          
                        </div>
                        
                      </div>
    <table class="table">
        <thead class="table-dark">
             <tr>
                 <th scope="col">Ảnh</th>
                 <th scope="col">Tên Hàng</th>
                  <th scope="col">Giá</th>
                  <th scope="col">Màu sắc</th>
                  <th scope="col">Sửa</th>
                  <th scope="col">Xóa</th>
             </tr>
        </thead>
    <tbody>
        <?php foreach ($hangHoa as $hang): ?>
            <tr>
                <td><img src="../../../public/anhHang/<?=$hang['anh']?>" width="300" height="200" style="border-radius: 6px;"/></td>
                <td><?= $hang['tenHang']?></td>
                <td><?= $hang['gia']?></td>
                <td><?= $hang['mau']?></td>
                <!-- <a href=<?="/admin/hangHoa/$hang[idhangHoa]"?> type="button">Sửa</a> -->
                <td><a href=<?="/admin/hangHoa/$hang[idhangHoa]"?> type="button" class="btn btn-outline-dark">
                  Sửa</a>
                  </td>
                  <td><a href=<?="/admin/hangHoa/xoa/$hang[idhangHoa]"?> type="button" class="btn btn-outline-dark">Xoá</a></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

<?php $content = ob_get_clean(); ?>
<?php include (__DIR__ .'/../../../templates/AdminPage.php'); ?>