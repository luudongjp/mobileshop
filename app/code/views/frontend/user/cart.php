<?php
$isSignedIn = isset($_SESSION['username']) ? true : false;
if (!$isSignedIn){
    redirect('user/login');
}
?>
<div class="cart-page">
    <div class="cart-title">
        <h3>GIỎ HÀNG CỦA BẠN</h3>
    </div>
    <div class="cart-content">

    </div>
</div>