<?php
$nameNCC = isset($mobile['NhaCungCap_idNhaCungCap']) ? getNameSupplier($mobile['NhaCungCap_idNhaCungCap']) : null;
if (getAction() === "edit") {
    echo "<script type='text/javascript'>
        var controller = '" . getModule() . "';
        var id = " . $mobile['idMobile'] . ";
        var ten = '" . $mobile['tenDienThoai'] . "';
        var giaNhap = " . $mobile['giaNhap'] . ";
        var giaBan = " . $mobile['giaBan'] . ";
        var giamGia = " . $mobile['giamGia'] . ";
        var moTa = '" . $mobile['moTa'] . "';
        var ngayNhapKho = '" . $mobile['ngayNhapKho'] . "';
        var soLuongTrongKho = " . $mobile['soLuongTrongKho'] . ";
        var mauSac = '" . $mobile['mauSac'] . "';
        var CPU = '" . $mobile['CPU'] . "';
        var gpu = '" . $mobile['gpu'] . "';
        var RAM = " . $mobile['RAM'] . ";
        var boNhoTrong = " . $mobile['boNhoTrong'] . ";
        var heDieuHanh = '" . $mobile['heDieuHanh'] . "';
        var manHinh = '" . $mobile['manHinh'] . "';
        var cameraSau = '" . $mobile['cameraSau'] . "';
        var cameraTruoc = '" . $mobile['cameraTruoc'] . "';
        var dungLuongPin = " . $mobile['dungLuongPin'] . ";
        var sacNhanh = '" . $mobile['sacNhanh'] . "';
        var SIM = '" . $mobile['SIM'] . "';
        var _4G = " . $mobile['4G'] . ";
        var soLuotXem = " . $mobile['soLuotXem'] . ";
        var soSao = " . $mobile['soSao'] . ";
        var mucDichSuDung = '" . $mobile['mucDichSuDung'] . "';
        var visibleOnHome = " . $mobile['visibleOnHome'] . ";
        var theloai = '" . getNameCategory($mobile['theloai_idTheloai']) . "';
        var nhacungcap = '" . ($nameNCC ?? null) . "';
        var nhasanxuat = '" . getNameManufacturer($mobile['NhaSanXuat_idNhaSanXuat']) . "';
        var urlLogo = '" . $mobile[0] . "';
        var urlAnh1 = '" . $mobile[1] . "';
        var urlAnh2 = '" . $mobile[2] . "';
        var urlAnh3 = '" . $mobile[3] . "';
        var urlAnh4 = '" . $mobile[4] . "';
    </script>";
}
?>
<div id="edit-mobile">
    <h4>
        S???a th??ng tin ??i???n tho???i
    </h4>
    <div class="content">
        <form id="saveEditProduct" enctype="multipart/form-data" method="post" action="<?php echo baseUrl('product/saveEdit'); ?>">
            <input type="hidden" name="idMobile" value="<?php echo $mobile['idMobile']; ?>">
            <table class="table">
                <tr>
                    <th class="col1">T??n ??i???n tho???i</th>
                    <th class="detail">
                        <input type="text" class="enamePhone" name="eten" autocomplete="off" readonly required>
                        <div class="searchProduct"></div>
                    </th>
                </tr>
            </table>
            <table class="table">
                <tr>
                    <th>M??u s???c</th>
                    <th class="detail"><input class="emausac" type="text" name="emausac" autocomplete="off" required></th>
                    <th>S??? l?????ng trong kho</th>
                    <th class="detail"><input class="esoluong" type="number" name="esoluong" autocomplete="off" value="0" readonly></th>
                </tr>
                <tr>
                    <th>Gi?? nh???p</th>
                    <th class="detail"><input class="egiaNhap" type="number" name="egianhap" autocomplete="off" required>
                    </th>
                    <th>Gi?? b??n</th>
                    <th class="detail"><input class="egiaBan" type="number" name="egiaban" autocomplete="off" required>
                    </th>
                </tr>
                <tr>
                    <th>Gi???m gi??</th>
                    <th class="detail"><input class="egiamGia" type="number" name="egiamgia" autocomplete="off" required>
                    </th>
                    <th>Ng??y nh???p kho</th>
                    <th class="detail"><input class="engaynhapkho" type="date" name="engaynhapkho" autocomplete="off" readonly></th>
                </tr>
                <tr>
                    <th>CPU</th>
                    <th class="detail"><input class="ecpu" type="text" name="ecpu" autocomplete="off" required></th>
                    <th>GPU</th>
                    <th class="detail"><input class="egpu" type="text" name="egpu" autocomplete="off" required></th>
                </tr>
                <tr>
                    <th>RAM</th>
                    <th class="detail"><input class="eram" type="number" name="eram" autocomplete="off" required></th>
                    <th>B??? nh??? trong</th>
                    <th class="detail"><input class="ebonhotrong" type="number" name="ebonhotrong" autocomplete="off" required></th>
                </tr>
                <tr>
                    <th>H??? ??i???u h??nh</th>
                    <th class="detail"><input class="ehedieuhanh" type="text" name="ehedieuhanh" autocomplete="off" required></th>
                    <th>M??n h??nh</th>
                    <th class="detail"><input class="emanhinh" type="text" name="emanhinh" autocomplete="off" required></th>
                </tr>
                <tr>
                    <th>Camera sau</th>
                    <th class="detail"><input class="ecamerasau" type="text" name="ecamerasau" autocomplete="off" required></th>
                    <th>Camera tr?????c</th>
                    <th class="detail"><input class="ecameratruoc" type="text" name="ecameratruoc" autocomplete="off" required></th>
                </tr>
                <tr>
                    <th>Dung l?????ng PIN</th>
                    <th class="detail"><input class="epin" type="number" name="epin" autocomplete="off" required></th>
                    <th>C??ng ngh??? s???c PIN</th>
                    <th class="detail"><input class="esacpin" type="text" name="esacpin" autocomplete="off" required></th>
                </tr>
                <tr>
                    <th>SIM</th>
                    <th class="detail"><input class="esim" type="text" name="esim" autocomplete="off" required></th>
                    <th>C??ng ngh??? 4G</th>
                    <td class="detail">
                        <select class="ecn4g" name="e4g" id="">
                            <option>C??</option>
                            <option>Kh??ng</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th>S??? sao</th>
                    <th class="detail"><input class="esosao" type="number" name="esosao" value="0" readonly></th>
                    <th>Th??? lo???i</th>
                    <td class="detail">
                        <select class="etheloai" name="etheloai">
                            <?php for ($i = 0; $i < sizeof($listTheloai); $i++) : ?>
                                <option>
                                    <?php echo $listTheloai[$i]['tentheloai']; ?>
                                </option>
                            <?php endfor; ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th>H??ng s???n xu???t</th>
                    <td class="detail">
                        <select class="ensx" name="enhasanxuat">
                            <?php for ($i = 0; $i < sizeof($listNSX); $i++) : ?>
                                <option>
                                    <?php echo $listNSX[$i]['tenNhaSX']; ?>
                                </option>
                            <?php endfor; ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th>M?? t???</th>
                    <td class="detail">
                        <textarea class="emota" form="saveEditProduct" rows="4" cols="50" name="emota" required></textarea>
                    </td>
                </tr>
            </table>
            <div class="submit">
                <button type="submit" class="btn btn-success">L??u</button>
                <a href="<?php echo baseUrl('product/index/' . $mobile['idMobile']); ?>" type="button" class="btn btn-danger">H???y b???</a>
            </div>
        </form>
    </div>
</div>
