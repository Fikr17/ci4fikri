<?= $this->extend('/Tempelan/Login'); ?>

<!-- section login -->
<?= $this->section('content'); ?>
    <div class="form-login">
        <h1>Silakan <span>login</span></h1>
        <!-- pesan verifikasi apakah email dan password benar -->
        <?= session()->get('pesan'); ?>
        <?php if(session('email')!=""){echo("Anda sudah login dengan akun ".session('email'));}; ?>
        <form action="<?php echo base_url('/Auth/login')?>" method="POST">
            <div class="input-form">
                <label for="inputEmail">Email :</label>
                <input type="email" name="email" class="form-control <?= ($validate->hasError('email')) ? 'is-invalid':'' ?>" 
                     id="inputEmail" autofocus value="<?= old('email'); ?>">
                <div class="invalid-feedback">
                    <?= ($validate->getError('email')); ?>
                </div>
            </div>
            <div class="input-form">
                <label for="inputPassword">Password :</label>
                <input type="password" class="form-control <?= ($validate->hasError('password')) ? 'is-invalid':'' ?>"
                    name="password" id="inputPassword">
                <div class="invalid-feedback">
                    <?= ($validate->getError('password')); ?>
                </div>
            </div>
            <button type="submit" class="tombol">Sign in</button>
        </form>
        <a href="/Home/coffee" class="tombol-ku">Kembali</a>
        <p>Belum mempunyai akun? silakan klik link berikut untuk register 
            <a href="/Home/register">Sign Up</a>
        </p>
        
    </div>
<?= $this->endSection(); ?>