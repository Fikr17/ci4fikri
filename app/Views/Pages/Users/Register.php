<?= $this->extend('/Tempelan/Login'); ?>

<!-- section register -->
<?= $this->section('content'); ?>
    <div class="form-login">
        <h1>Silakan <span>isi</span> form register</h1>
        <form action="<?= base_url('/Auth/funcRegister'); ?>" method="POST">
            <div class="input-form">
                <label for="inputNama">Username :</label>
                <input type="text" name="username" 
                    class="form-control <?= ($validate->hasError('username')) ? 'is-invalid':'' ?>" id="inputNama" autofocus value="<?= old('username'); ?>">
                <div class="invalid-feedback">
                    <?= ($validate->getError('username'))?>
                </div>
            </div>
            <div class="input-form">
                <label for="inputEmail">Email :</label>
                <input type="email" name="email" 
                    class="form-control <?= ($validate->hasError('email')) ? 'is-invalid':'' ?>" id="inputEmail" value="<?= old('email'); ?>">
                <div class="invalid-feedback">
                    <?= ($validate->getError('email'))?>
                </div>
            </div>
            <div class="input-form">
                <label for="inputPassword">Password :</label>
                <input type="password" name="password" 
                    class="form-control <?= ($validate->hasError('password')) ? 'is-invalid':'' ?>" id="inputPassword">
                <div class="invalid-feedback">
                    <?= ($validate->getError('password'))?>
                </div>
            </div>
            <input type="hidden" name="level" value="user">
            <button type="submit" class="tombol">Sign Up</button>
        </form>
        <a href="/Home/login" class="tombol-ku">Kembali</a>
    </div>
<?= $this->endSection(); ?>