<?php ob_start();
$currentYear = date("Y");
?>
<h1 style="text-align: center;margin: 10px 0;">Thống kê Số hàng bán được theo tháng trong năm</h1>

<form action="" method="post">
  <select name="nam" style="padding: 10px;
    font-size: 16px;
    border: 1px solid #ccc;
    border-radius: 5px;">
    <?php 
    for($i = $currentYear ; $i <= $currentYear+2; $i++ ){
    
      echo "<option value='$i'>$i</option>";
    }?>
  </select>
  <button type="submit" class="btn btn-outline-dark">Lọc</button>
</form>

<table class="table table-success table-striped">
    <thead>
    <tr>
      <th scope="col">Tháng</th>
      <th scope="col">Số lượng tiêu thụ</th>
    </tr>
  </thead>
  <tbody>
    <?php
for ($i = 0; $i < count($thongke); $i++) {
    echo '<tr class="table-success">';
    echo '<td class="table-success"> '.$i + 1 . '</td>';
    echo '<td class="table-success"> '  . $thongke[$i] . '</td>';
    echo '</tr>';
}
?>
</tbody>
</table>
<?php $content = ob_get_clean(); ?>
<?php include (__DIR__ .'/../../../templates/AdminPage.php'); ?>