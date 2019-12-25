<?php
// pretty($allOrderDetails);
// pretty($donHang);
// pretty($khachHang);
if (($_SESSION['chucvuNV'] === "Nhân viên thủ kho") && ($donHang['trangThaiDonHang'] !== "đang giao hàng")) {
    $show = true;
} else {
    $show = false;
}
?>
<div id="order-details">
    <div class="title">
        <h4>Thông tin chi tiết đơn hàng</h4>
    </div>
    <div class="wrap">
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
    <div class="wrap">
        <h5>Thông tin đơn hàng hàng</h5>
        <table class="table">
            <tr>
                <td>Mã đơn hàng:</td>
                <th class="content"><?php echo $donHang['idDonHang']; ?></th>
                <td>Loại đơn hàng:</td>
                <th class="content"><?php echo $donHang['loaiDonHang']; ?></th>
            </tr>
            <tr>
                <td>Ngày tạo:</td>
                <th class="content"><?php echo $donHang['ngayTao']; ?></th>
                <td>Tổng tiền:</td>
                <th class="content totalPrice"><?php echo formatPrice($donHang['tongTien']); ?></th>
            </tr>
            <tr>
                <td>Địa chỉ giao hàng:</td>
                <th class="content"><?php echo $donHang['diaChiNhanHang']; ?></th>
                <td>Trạng thái:</td>
                <th class="content"><?php echo $donHang['trangThaiDonHang']; ?></th>
            </tr>
            <?php if ($donHang['trangThaiDonHang'] === "đang giao hàng") :
                $nvgiaohang = getObjectById('nhanvien', 'idNhanVien', $donHang['nhanvien_idNhanVien']);
            ?>
                <tr>
                    <td>Nhân viên giao hàng:</td>
                    <th class="content">
                        <?php echo $nvgiaohang['tenNhanVien']; ?>
                    </th>
                    <td>Số điện thoại nhân viên:</td>
                    <th><?php echo $nvgiaohang['soDienThoai']; ?></th>
                </tr>
            <?php endif; ?>
        </table>
    </div>
    <div class="wrap">
        <h5>Danh sách mặt hàng trong đơn hàng</h5>
        <table class="table">
            <tr>
                <th class="stt">ID</th>
                <th>Tên sản phẩm</th>
                <th>Hình ảnh</th>
                <th>Số lượng</th>
                <th>Tổng tiền</th>
            </tr>
            <?php for ($j = 0; $j < sizeof($allOrderDetails); $j++) :
                $mobile = getObjectById('mobile', 'idMobile', $allOrderDetails[$j]['mobile_idMobile']);
                linkImageAndMobile($mobile, getBaseImage($mobile['idMobile']), []);
            ?>
                <tr>
                    <td class="chitiet stt"><?php echo $allOrderDetails[$j]['idChiTiet']; ?></td>
                    <td class="chitiet">
                        <a target="_blank" href="<?php echo baseUrl('product/index/' . $mobile['idMobile']); ?>">
                            <?php echo $mobile['tenDienThoai']; ?>
                        </a>
                    </td>
                    <td class="chitiet"><img src="<?php echo BASE_URL . $mobile[0]; ?>" alt=""></td>
                    <td class="chitiet"><?php echo $allOrderDetails[$j]['soLuong']; ?></td>
                    <td class="chitiet price"><?php echo formatPrice($allOrderDetails[$j]['thanhTien']); ?></td>
                </tr>
            <?php endfor; ?>
        </table>
    </div>
    <?php if ($show) : ?>
        <div class="phancong">
            <h4>Phân công giao hàng</h4>
            <form id="" method="post" action="<?php echo baseUrl('order/assign'); ?>">
                <input type="hidden" name="idOrder" value="<?php echo $donHang['idDonHang']; ?>">
                <table class="table">
                    <tr>
                        <th class="col1">Chọn nhân viên</th>
                        <th>
                            <select class="selectShipper" name="selectShipper" id="">
                                <?php $allShipper = getAllShipper();
                                for ($k = 0; $k < sizeof($allShipper); $k++) :
                                ?>
                                    <option value="<?php echo $allShipper[$k]['idNhanVien']; ?>">
                                        <?php echo $allShipper[$k]['tenNhanVien']; ?>
                                    </option>
                                <?php endfor; ?>
                            </select>
                        </th>
                        <th>
                            <button type="submit" class="btn btn-success">Giao việc</button>
                        </th>
                    </tr>
                </table>
            </form>
        </div>
    <?php endif; ?>
</div>