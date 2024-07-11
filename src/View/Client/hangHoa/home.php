<?php ob_start();?>
<h1>items List</h1>
    <?php
    session_start();
    ?>
    <div class="container-fluid">
      <div id="items" class="col-lg-9 col-md-9 col-12 col-sm-12">
        <div id="items-hover" class="row">
        <?php foreach ($hangHoa as $hang): ?>
        <a href=<?="/home/$hang[idhangHoa]"?> class="col-lg-3 col-md-4 col-sm-4 col-4 shadow-sm p-3 mb-5 bg-white rounded hover-div image">

            <div class="image-2" >
                <img src="../../../public/anhHang/<?=$hang['anh']?>" width="100%" height="200px"/>
            </div><br>

                    <label style="font-weight: bold; color: black"><?= $hang['tenHang']?></label><br>
                    <label style="color: black">Giá: <?= $hang['gia']?></label><br>
                    <label style="color: black">Màu sắc: <?= $hang['mau']?></label><br>
                    <p></p>
            </a>
        <?php endforeach; ?>
    
        </div>
     </div>  
    </div>


<?php $content = ob_get_clean(); ?>
<?php include (__DIR__ .'/../../../../templates/TrangChu.php'); ?>