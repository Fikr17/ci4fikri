<!-- header -->
<?php echo $this->extend('/Tempelan/Back') ?>

<?php echo $this->section('content') ?>
    <?php if(allow('admin')): ?>
    <h1 class="text-center mb-5" style="padding-top: 2rem; margin-top: 5rem;">EDIT DATA</h1>

    <!-- Form Tambah Data -->
    <?php foreach($data as $d){ ?>
        <form action="<?= base_url('/Admin/update/'.$d['id']); ?>" method="POST" enctype="multipart/form-data" style="max-width:500px; padding:1rem 1rem; margin:0 auto;">
            <?= csrf_field(); ?>
            <div class="row mb-3">
                <input type="hidden" name="imgLama" value="<?= $d['gambar']; ?>">
                <label for="gambar" class="col-sm-2 col-form-label">Gambar</label>
                <div class="col-sm-2">
                    <img src="/images/<?= $d['gambar']; ?>" class="img-thumbnail img-preview">
                </div>
                <div class="col-sm-8">
                    <div class="custom-file">
                        <!-- input file upload -->
                        <input type="file" class="custom-file-input <?= ($validate->hasError('gambar')) ? 'is-invalid' : ''; ?>" id="gambar" name="gambar" onchange="previewImg()">
                        <div class="invalid-feedback">
                            <?= $validate->getError('gambar'); ?>
                        </div>
                        <label class="custom-file-label" for="Gambar"><?= $d['gambar']; ?></label>
                    </div>
                </div>
            </div>
            <div class="input-form">
                <label class="form-label" for="nama">Nama</label>
                <input type="text" name="nama" id="nama" class="form-control <?= ($validate->hasError('nama')) ? 'is-invalid':'' ?>" 
                value="<?php //echo(old('nama'))
                    if($d['nama']!=''){
                        echo($d['nama']);
                    }else{
                    echo(old($d['nama']));
                    };
                 ?>">
                <div class="invalid-feedback">
                    <?= ($validate->getError('nama'));?>
                </div>
            </div>
            <div class="input-form">
                <label class="form-label" for="harga">Harga</label>
                <input type="text" name="harga" id="harga" class="form-control <?= ($validate->hasError('harga')) ? 'is-invalid':'' ?>" 
                value="<?php 
                //echo(old('harga'))
                    if($d['harga']!=''){
                    echo($d['harga']);
                    } else{
                    echo(old('harga'));
                    };
                 ?>">
                <div class="invalid-feedback">
                    <?= ($validate->getError('harga'));?>
                </div>
            </div>
            <div style="padding: 1rem 0;">
                <a href="<?= base_url('/Admin/funcData'); ?>" class="btn btn-light">Kembali</a>
                <button type="submit" name="kirim" class="btn btn-primary">Submit</button>
            </div>
        <?php } ?>
        </form>
    <!-- Akhir Form -->
    <?php endif; ?>

    <?php if(allow('user')): ?>
        <h1 style="text-align:center; padding:125px">Maaf, Anda tidak memiliki akses pada halaman ini</h1>
    <?php endif; ?>
<?php echo $this->endSection('content') ?>
