<?php
echo "<script type='text/javascript'>
        var numberBasePrice = '" . sizeof($arrayMobiles) . "';
      </script>";
?>
    <div id="manage-banner">
        <h4>
            QUẢN LÝ SẢN PHẨM NỔI BẬT
        </h4>
        <div class="success-update">
            <?php echo(isset($_SESSION['updateActBasePriceSuccess']) ? $_SESSION['updateActBasePriceSuccess'] : ''); ?>
        </div>
        <div class="content">
            <form id="formUpdageBanner" method="post" action="<?php echo baseUrl('product/updateActBasePrice'); ?>">
                <table class="table">
                    <tr>
                        <th class="c1">STT</th>
                        <th class="c2">Tên sản phẩm</th>
                        <th class="c3">Hình ảnh</th>
                        <th class="c6">Màu sắc</th>
                        <th class="c6">Bộ nhớ trong</th>
                        <th class="c4">Giá nhập</th>
                        <th class="c4">Giá bán</th>
                        <th class="c5">Hiển thị</th>
                    </tr>
                    <?php 
                    $i = 0;
                        foreach($arrayMobiles as $item):?>
                            <tr>
                            <td class="c1"><?php echo $i = $i+1; ?></td>
                            <td class="c2"><?php echo $item['tenDienThoai']; ?></td>
                            <td class="c3"><img class="image" src="<?php echo BASE_URL . $item[0]; ?>" alt="image-mobile" height = "100px"></td>
                            <td class="c6"><?php echo $item['mauSac']; ?></td>
                            <td class="c6"><?php echo $item['boNhoTrong']; ?>Gb</td>
                            <td class="c4"><?php echo formatPrice($item['giaNhap']); ?></td>
                            <td class="c4"><?php echo formatPrice($item['giaBan']); ?></td>
                            <td class="c5"><?php if($item['visibleOnHome'] == 1){
                                echo '<input type="checkbox" checked />';
                            } else{
                                echo '<input type="checkbox" />';
                            }
                            ?></td>
                            
                        </tr>
                        <?php endforeach; ?>
                    
                </table>
                <button type="submit" class="btn btn-info">
                    Cập nhật
                </button>
            </form>
        </div>
    </div>
<?php
if (isset($_SESSION['updateActBasePriceSuccess'])) {
    unset($_SESSION['updateActBasePriceSuccess']);
}
?>