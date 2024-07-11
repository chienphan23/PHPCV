<?php ob_start();
$tongTien = 0;
?>
<div class="row mt-3"> 
                <div class="col-11" style="text-align: center">
                    <div class="row tieuDe">
                    <div class="col-1"></div>
                    <div class="col-4" style="font-weight: bold;">SẢN PHẨM</div>
                    
                    <div class="col-2" style="font-weight: bold;">GIÁ</div>
                    <div class="col-2" style="padding: 0px !important; font-weight: bold;">SỐ LƯỢNG</div>
                    <div class="col-2" style="font-weight: bold;">TẠM TÍNH</div>
                    <div clsas="col-1" style="font-weight: bold;"></div>
                    </div>
                </div>
            </div>
        <?php foreach ($gioHangAll as $hang): 
        $tamTinh = $hang['gia'] * $hang['soLuongMua'];
        $tongTien += $tamTinh;
            ?>
            <div class="row mt-3"> 
    		<div class="col-11">
            <div class="row" style=" height: 80px;text-align: center"> 

    			<div class="col-1"><img src="<?= $hang['anh']?>" style="width: 100%; height: 100%"></div>
    			<div class="col-4 text" style="font-weight: bold;"><p class="text"><?= $hang['tenHang']?></p></div>
    			<div class="col-2"><?= $hang['gia']?></div>
                <div class="col-2">
    			<form action="/gioHang/SuaSoLuong" method="post">
    			<div class="row">
                    <input type="hidden" value="<?= $hang['idgio']?>" name="idgio"/>
    				<input type="number" name="soLuongMua" value="<?= $hang['soLuongMua']?>" min="1" class="col-lg-4 col-sm-6 col-6" style="padding: 0 !important; margin-right: 2px;" width="100%">
    				<input type="submit" value="Sửa" class="col-lg-5 col-sm-6 col-6 btn btn-outline-dark btn-sm" style="width: 50%">
    				</div>
    			</form>
    			</div>
    			<div class="col-1 "><?= $hang['gia'] * $hang['soLuongMua']?></div>
                <div class="col-1">
    			<form action="/gioHang/delete" method="post" class="formbtnXoa1">
                    <input type="hidden" value="<?= $hang['idgio']?>" name="idgio"/>
    				<input type="submit" value="Xóa" name="xoaHang" class="btn btn-outline-danger btn-sm" style="width: 100%">
    			</form>
    			
    			</div>
                <div class="col-1">
                <form action="/gioHang/buy" method="post">
                <input type="hidden" value="<?= $hang['soLuongMua']?>" name="soLuongMua"/>
                <input type="hidden" value="<?= $hang['idhangHoa']?>" name="idhangHoa"/>
                <input type="hidden" value="<?= $hang['idgio']?>" name="idgio"/>
                <button type="submit" class="btn btn-outline-success btn-sm" style="height: 30.6px !important;width: 100%;font-size: 12px;">Mua hàng</button>
                </form>
                </div>
                
            </div>
            </div>
            </div>
        <?php endforeach; ?>
        <hr>
    	<div class="row">
    		<div class="col-1"></div>
    		<div class="col-11">
    			<div class="row">
    				<div class="col-10" style="font-weight: bold;">TỔNG TIỀN: </div>
    				<div class="col-2"><?= $tongTien?></div>
    			</div>
    		</div>
    	</div>
		</div>

    <?php $content = ob_get_clean(); ?>
<?php include (__DIR__ .'/../../../../templates/TrangChuKhongSlider.php'); ?>