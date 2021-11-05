<!-- header -->
<?php echo $this->extend('/Tempelan/Back') ?>

<?php echo $this->section('content') ?>
<?php d($data) ?>
    <h1 class="text-center mb-5">EDIT DATA</h1>

    <!-- Form Tambah Data -->
        <form action="/Admin/create" method="POST" enctype="multipart/form-data" style="margin-left: 35%;">
        <?php foreach($data as $d){ ?>
            <!-- <div class="mb-3">
                <label>Foto/Gambar</label>
                <br>
                <input type="file" name="gambar" id="gambar">
            </div> -->
            <div class="mb-3 ">
                <label class="form-label" href="#NAMA">gambar</label>
                <input type="text" name="gambar" id="nama" class="form-control w-50">
            </div>
            <div class="mb-3 ">
                <label class="form-label" href="#NAMA">NAMA</label>
                <input type="text" name="nama" id="nama" class="form-control w-50">
            </div>
            <div class="mb-3">
                <label class="form-label" href="#ram">Varian Ram</label>
                <input type="text" name="asal" class="form-control w-50" value="<?php  ?>">
            </div>
            <div style="margin-left: 30%;">
                <button type="submit" name="kirim" class="btn btn-primary">Submit</button>
                <a href="/Admin/index" class="btn btn-light">Kembali</a>
            </div>
        <?php } ?>
        </form>
    <!-- Akhir Form -->
<?php echo $this->endSection('content') ?>

<!-- footer -->
<?php echo $this->extend('/Tempelan/Bawah') ?>

