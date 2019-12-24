<?php
pretty($allOrderDetails);
pretty($donHang);
pretty($khachHang);
?>
<div id="order-details">
    <h4>Thông tin chi tiết đơn hàng</h4>
    <div class="">
        <h5>Thông tin khách hàng</h5>
        <table class="table">
            <tr>
                <td>Tên khách hàng:</td>
                <th class="content"><?php echo $khachHang['tenKhachHang']; ?></th>
                <td>Số điện thoại:</td>
                <th class="content"><?php echo $khachHang['soDienThoai']; ?></th>
            </tr>
            <tr>
                <td>Email:</td>
                <th class="content"><?php echo $khachHang['email']; ?></th>
                <td>Địa chỉ:</td>
                <th class="content"><?php echo $khachHang['diaChi']; ?></th>
            </tr>
        </table>
    </div>
    <div>
        <h5>Danh sách mặt hàng trong đơn hàng</h5>

    </div>
</div>