<?php
//pretty($mobiles);
$numberSupplier = sizeof($supplier);

?>
<div id="supplier-list">
<div class="addSuccess">
        <?php echo isset($_SESSION['addNewSupplierSuccess']) ? $_SESSION['addNewSupplierSuccess'] : ''; ?>
    </div>
    <div class="addFail">
        <?php echo isset($_SESSION['addNewSupplierFail']) ? $_SESSION['addNewSupplierFail'] : ''; ?>
    </div>
    <div class="top-menu">
    <?php if (getAction() == "list"): ?>
        <h4>
            Danh sách tất cả nhà cung cấp (Tổng số: <?php echo $numberSupplier; ?> nhà cung cấp)
        </h4>
    <?php endif; ?>
        <div class="modal">

        </div>
        <div class="add-new">
            <a href="<?php echo baseUrl('supplier/add'); ?>" class="btn btn-success">Thêm mới</a>
        </div>
    </div>
    <div class="list-item">
        <table class="table">
            <tr>
                <th class="c1">STT</th>
                <th class="c2">Tên nhà cung cấp</th>
                <th class="c3">Địa chỉ</th>
                <th class="c4">Điện thoại</th>
                <th class="c5">Mô tả</th>
            </tr>
            <?php for ($i = 0; $i < $numberSupplier; $i++):
                ?>
                <tr>
                    <td class="c1"><?php echo $i + 1; ?></td>
                    <td class="c2">
                        <a href="<?php echo baseUrl('supplier/index/' . $supplier[$i]['idNhaCungCap']); ?>">
                            <?php echo $supplier[$i]['tenNhaCC']; ?>
                        </a>
                    </td>
                    <td class="c3"><?php echo $supplier[$i]['diaChi']; ?></td>
                    <td class="c4"><?php echo $supplier[$i]['dienThoai']; ?></td>
                    <td class="c5"><?php echo $supplier[$i]['moTa']; ?></td>
                </tr>
            <?php endfor; ?>
        </table>
    </div>
</div>
<?php
if (isset($_SESSION['addNewSupplierSuccess'])) {
    unset($_SESSION['addNewSupplierSuccess']);
}
if (isset($_SESSION['addNewSupplierFail'])) {
    unset($_SESSION['addNewSupplierFail']);
}
?>