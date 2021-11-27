<!-- Header -->
<?php echo $this->extend('/Tempelan/Back') ?>

<?php echo $this->section('content') ?>
    <?php if(allow('admin')): ?>
    <section class="tambah" style="margin-top: 5rem;">
        <h1 class="text-center mb-5">TAMBAH DATA</h1>
    <!-- Form Tambah Data -->
    <form action="<?= base_url('/Admin/create') ?>" method="POST" enctype="multipart/form-data" style="max-width:500px; padding:1rem 1rem; margin:0 auto;">
        <?= csrf_field(); ?>
        <div class="row mb-3">
            <label for="gambar" class="col-sm-2 col-form-label">Gambar</label>
            <div class="col-sm-2">
                <img src="/images/default.png" class="img-thumbnail img-preview">
            </div>
            <div class="col-sm-8">
                <div class="custom-file">
                    <input type="file" class="custom-file-input <?= ($validate->hasError('gambar')) ? 'is-invalid' : ''; ?>" id="gambar" name="gambar" onchange="previewImg()">
                    <div class="invalid-feedback">
                        <?= $validate->getError('gambar'); ?>
                    </div>
                    <label class="custom-file-label" for="Gambar">Pilih Gambar..</label>
                </div>
            </div>
        </div>
            <div class="input-form">
                <label class="form-label" for="nama">NAMA</label>
                <input type="text" name="nama" id="nama" class="form-control <?= ($validate->hasError('nama')) ? 'is-invalid':'' ?>" value="<?= old('nama'); ?>">
                <div class="invalid-feedback">
                    <?= ($validate->getError('nama'));?>
                </div>
            </div>
            <div class="input-form">
                <label class="form-label" for="harga">Harga</label>
                <input type="text" name="harga" id="harga" class="form-control <?= ($validate->hasError('harga')) ? 'is-invalid':'' ?>" value="<?= old('harga'); ?>">
                <div class="invalid-feedback">
                    <?= ($validate->getError('harga'));?>
                </div>
            </div>
            <div style=" margin-top: 1rem;">
                <button type="submit" name="kirim" class="btn btn-primary">Submit</button>
                <a href="<?= base_url('/Admin/funcData'); ?>" class="btn btn-light">Kembali</a>
            </div>
        </form>
    <!-- Akhir Form -->
    </section>
    <?php endif; ?>
    
    <?php if(allow('user')): ?>
        <h1 style="text-align:center; padding:125px">Maaf, Anda tidak memiliki akses pada halaman ini</h1>
    <?php endif; ?>
<?php echo $this->endSection() ?>
