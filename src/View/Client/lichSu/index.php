<?php ob_start();?>
<div class="row">
    <div class="col-12">
            <div id="body-lichsu" class="row">
                <div class="col-1"></div>
                <div class="col-3" style="font-weight: bold;">SẢN PHẨM</div>
                <div class="col-2" style="font-weight: bold;">GIÁ</div>
                <div class="col-2" style="font-weight: bold;">SỐ LƯỢNG</div>
                <div class="col-2" style="font-weight: bold;">NGÀY MUA</div>
                <div class="col-2" style="font-weight: bold;">TÌNH TRẠNG</div>
            </div>
    </div>
            <hr>
        <?php foreach ($hoadon as $hoa): ?>
            <div class="col-1" style="text-align: center;"><img src="<?= $hoa['anh']?>" width="50px"></div>
            <div class="col-3"><?= $hoa['tenHang']?></div>
            <div class="col-2"><?= $hoa['gia']?></div>
            <div class="col-2"><?= $hoa['soLuongMua']?></div>
                <?php $ngayMoi = date("d-m-Y", strtotime($hoa['ngayMua']))?>
                <div class="col-2"><?= $ngayMoi?></div>
                <div class="col-2"  style="<?php if($hoa['tinhTrang']==0) {echo "color: red;";}else{ echo"color: green";} ?>" ><?= $hoa['tinhTrang'] == 0 ? "Đang được gửi đến" : "Đã thanh toán"?></div>
                <div class="mb-2"></div>
                <hr>
        <?php endforeach; ?>
    </div>
</div>
<?php $content = ob_get_clean(); ?>
<?php include (__DIR__ .'/../../../../templates/TrangChuKhongSlider.php'); ?>


    