<!-- Header -->
<?php echo $this->extend('/Tempelan/Back') ?>

<?php echo $this->section('content') ?>
    <section class="tambah">
    <h1 class="text-center mb-5">TAMBAH DATA</h1>

    <!-- Form Tambah Data -->
        <form action="/Admin/create" method="POST" enctype="multipart/form-data" style="margin-left: 35%;">
    <//?php echo $validation->listErrors(); ?>
        <?php csrf_field(); ?>
            <div class="mb-3">
                <label>Foto/Gambar</label>
                <br>
                <input type="file" name="gambar" id="gambar">
            </div>
            <div class="mb-3 ">
                <label class="form-label" for="">NAMA</label>
                <input type="text" name="nama" id="nama" class="form-control w-50">
            </div>
            <div class="mb-3">
                <label class="form-label" for="">Varian Ram</label>
                <input type="text" name="asal" class="form-control w-50">
            </div>
            <div style="margin-left: 30%;">
                <button type="submit" name="kirim" class="btn btn-primary">Submit</button>
                <a href="/Admin/index" class="btn btn-light">Kembali</a>
            </div>
        </form>
    <!-- Akhir Form -->
    </section>
<?php echo $this->endSection() ?>
