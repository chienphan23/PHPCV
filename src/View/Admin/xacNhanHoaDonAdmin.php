<?php ob_start();?>

<div class="container-fluid mt-3">
        <div style="text-align: center"><h3>Xác nhận hóa đơn</h3></div>
<h3>Danh sách chưa thanh toán</h3>
<table class="table table-responsive">
    <thead class="table-dark">
        <tr>
          <th scope="col">Mã hóa đơn</th>
          <th scope="col">Mã khách hàng</th>
          <th scope="col">Số lượng mua</th>
          <th scope="col">Ngày mua</th>
          <th scope="col">Tổng tiền</th>
          <th scope="col">Tình trạng</th>
           <th scope="col">Xác nhận</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($hoadon[0] as $hoa): ?>
            <tr>
            <td><?= $hoa['idhoaDon']?></td>
                <td><?= $hoa['idkhachHang']?></td>
                <td><?= $hoa['soLuongMua']?></td>
                <?php $ngayMoi = date("d-m-Y", strtotime($hoa['ngayMua']))?>
                <td><?= $ngayMoi?></td>
                <td><?= $hoa['soLuongMua'] * $hoa['gia']?></td>
                <td style="<?php if($hoa['tinhTrang']==0) {echo "color: red;";}else{ echo"color: green";} ?>;"><?= $hoa['tinhTrang'] == 0 ? "Đang được giao đến cho khách" : "Đã thanh toán"?></td>
                <td>
                    <form action="/admin/hoanThanhHoaDon" method="post">
                    <input  value="<?= $hoa['idhoaDon']?>" name="idhoaDon" type="hidden" />
                    <input  value="<?= $hoa['idchiTietHoaDon']?>" name="idchiTietHoaDon" type="hidden" />
                    <button type="submit" class="btn btn-outline-dark">Xác nhận</button>
                    </form>
                </td>
                </tr>
        <?php endforeach; ?>
        </tbody>
</table>
<br>
<h3>Danh sách đã thanh toán</h3>
<table class="table table-responsive">
    <thead class="table-dark">
        <tr>
          <th scope="col">Mã hóa đơn</th>
          
          <th scope="col">Mã khách hàng</th>
          <th scope="col">Số lượng mua</th>
          <th scope="col">Ngày mua</th>
          <th scope="col">Tổng tiền</th>
          <th scope="col">Tình trạng</th>
           <th scope="col">Xác nhận</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($hoadon[1] as $hoa): ?>
            <tr>
            <td><?= $hoa['idhoaDon']?></td>
                <td><?= $hoa['idkhachHang']?></td>
                <td><?= $hoa['soLuongMua']?></td>
                <?php $ngayMoi = date("d-m-Y", strtotime($hoa['ngayMua']))?>
                <td><?= $ngayMoi?></td>
                <td><?= $hoa['soLuongMua'] * $hoa['gia']?></td>
                <td style="<?php if($hoa['tinhTrang']==0) {echo "color: red;";}else{ echo"color: green";} ?>;"><?= $hoa['tinhTrang'] == 0 ? "Đang được giao đến cho khách" : "Đã thanh toán"?></td>
                <td style="color: green;">Đã hoàn thành</td>
                </tr>
        <?php endforeach; ?>
        </tbody>
</table>
<?php $content = ob_get_clean(); ?>
<?php include (__DIR__ .'/../../../templates/AdminPage.php'); ?>




