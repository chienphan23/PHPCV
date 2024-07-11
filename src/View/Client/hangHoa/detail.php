<?php ob_start();?>
<div id="body-chitiet" class="container" style="padding-top: 105px;box-sizing: border-box;">
    <div class="row" >
    <div class="col-lg-5">
            <form action="/gioHang/create" method="post">
            <img src="<?= $hangHoa['anh']?>" height="90%" width="90%" class="img-thumbnail">
    </div>	

            <div class="col-lg-7">
                <div style="font-size: 30px; font-weight: bold;"><?= $hangHoa['tenHang']?></div>	
                <div style="margin: 10px 0; font-size: 25px; font-weight: normal;">Giá: <?= $hangHoa['gia']?></div>
                <div style="margin: 10px 0; font-size: 20px; font-weight: normal">Màu sắc: Trắng</div>
                <div style="margin: 10px 0; font-size: 20px; font-weight: normal; color: grey">Số lượng còn: 0</div>
                <div>
                <input value=<?= $hangHoa['idhangHoa']?> name='idhangHoa' type="hidden"/>
                <div>
                    <label style="margin: 10px 0; font-size: 20px; font-weight: normal">Số lượng: </label>
                <input type="number" min="1" name='soLuongMua' value="1" class="text-form" style="width : 50px"/>
                </div>
                <hr>

                <button type="submit" class="btn btn-dark">Thêm hàng vào giỏ</button>

            </form>
 </div>
 </div>
 </div>
 <?php $content = ob_get_clean(); ?>
<?php include (__DIR__ .'/../../../../templates/TrangChuKhongSlider.php'); ?>





	
                
                    
               
         
                