<?php
$isSignedIn = isset($_SESSION['username']) ? true : false;
$numberProduct = sizeof($arrayProducts);

?>
<div id="search">
    <div class="search-title-result">
        <h4>
            <?php if ($numberProduct === 0) {
                echo "Không có sản phẩm nào cho: \"" . $manufacturer['tenNhaSX'] . "\" ";
            } else {
                echo "Có " . $numberProduct . " sản phẩm nào cho: \"" . $manufacturer['tenNhaSX'] . "\" ";
            } ?>
        </h4>
    </div>
    <div class="search">
        <div class="search-result">
            <?php grid($arrayProducts, $isSignedIn); ?>
        </div>
    </div>
</div>
