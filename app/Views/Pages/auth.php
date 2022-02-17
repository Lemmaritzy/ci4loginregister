<?=$this->extend('layouts/index')?>
<?=$this->section("content")?>

<div class="auth">

    <div class="login">
        <div class="title">
            <h3>Giriş</h3>
        </div>
        <div class="errorss">
            <?php
            if (isset($errors)) {
                echo $errors;
            }
            ?>
        </div>
        <div class="forms">
            <label for="login-form">Giriş</label>
            <form action="login" method="POST" id="login-form">
                <div class="form-input">
                    <input type="text" name="username" placeholder="username">
                </div>
                <div class="form-input">
                    <input type="password" name="password" placeholder="Şifre">
                </div>
                <div class="btn">
                    <input type="submit" value="Giriş">
                </div>
            </form>
        </div>
    </div>
    <?=session('username')?>
    <div class="register">
        <div class="title">
        <h3>Kayıt</h3>
        </div>
        <div class="forms">
            <form action="register" method="POST" id="register-form">
                <div class="form-input">
                    <input type="text" name="name" placeholder="İsim">
                </div>
                <div class="form-input">
                    <input type="text" name="surname" placeholder="Soyisim">
                </div>
                <div class="form-input">
                    <input type="text" name="username" placeholder="Kullanıcı adı">
                </div>
                <div class="form-input">
                    <input type="password" name="password" placeholder="Şifre">
                </div>
                <div class="form-input">
                    <input type="text" name="mail" placeholder="E-posta adresi">
                </div>
                <div class="btn">
                    <input type="submit" value="Kayıt">
                </div>
            </form>
        </div>
    </div>
</div>
<?=$this->endSection("content")?>