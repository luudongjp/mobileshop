<?php
echo "<script>
    var baseurl = '" . BASE_URL . "';
    </script>"
?>
<div class="login-page">
    <div class="loginform">
        <form method="POST" class="register-form" id="register-form" action="<?php echo baseUrl(''); ?>">
            <input type="text" class="reg-name" name="reg-name" placeholder="Tên của bạn" />
            <input type="email" class="reg-email" name="reg-email" placeholder="Địa chỉ email" />
            <input type="password" class="reg-password" name="reg-password" placeholder="Mật khẩu" />
            <input type="text" class="reg-address" name="reg-address" placeholder="Địa chỉ" />
            <input type="text" class="reg-phone" name="reg-phone" placeholder="Số điện thoại" />
            <input type="hidden" name="rp-valid" id="rp-valid" value="false">
            <button type="submit" name="createAccount">Tạo mới</button>
            <p class="message">Sẵn sàng? <a href="#">Đăng nhập</a></p>
        </form>
        <form method="POST" class="login-form" id="login-form">
            <input type="email" class="login-email" name="login-email" placeholder="Địa chỉ email" />
            <input type="password" class="login-password" name="login-password" placeholder="Mật khẩu" />
            <input type="hidden" name="lp-valid" id="lp-valid" value="false">
            <button type="submit" name="login">Đăng nhập</button>
            <p class="message">Chưa có tài khoản? <a href="#">Tạo tài khoản</a></p>
        </form>
        <div class="error">
        </div>
        <div id="search-email">
        </div>
        <div id="notice">
            <h3>Mật khẩu phải chứa:</h3>
            <p id="letter" class="invalid">Một chữ cái <b>viết thường</b> </p>
            <p id="capital" class="invalid">Một chữ cái <b>viết hoa</b></p>
            <p id="number" class="invalid">Một <b>chữ số</b></p>
            <p id="length" class="invalid">Ít nhất <b>8 ký tự</b></p>
        </div>
    </div>
</div>