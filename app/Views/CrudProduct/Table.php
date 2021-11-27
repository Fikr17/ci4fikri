<!-- header -->
<?php echo $this->extend('/Tempelan/Back') ?>


<?php echo $this->section('content'); ?>
    <?php if(allow('admin')): ; ?>
    <section class="admin" style="margin-top: 5rem;">
    <h1 style="text-align: center;">Data-Data Produk</h1>
        <a href="/Admin/formTambah" class="btn btn-primary" style="margin-left:10%; margin-bottom:1rem;">tambah data</a>
        <?php if(session()->get('pesan') != null): ?>
        <div class="col" style="margin-bottom: 1rem;">
            <input type="text" class="form-control is-valid" id="validationServer01" value="<?= session()->get('pesan'); ?>" readonly style="max-width:900px; padding:1rem 1rem; margin:0 auto;">
        </div>
        <?php endif; ?>
        <table class="table" style="max-width:900px; padding:1rem 1rem; margin:0 auto;">
            <thead>
                <tr>
                    <th>id</th>
                    <td>Gambar</td>
                    <td>Nama</td>
                    <td>Harga</td>
                    <td>Action</td>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1 + (5*($currentPage-1)); ?>
                <?php foreach ($data as $d){ ?>
                <tr>
                    <th>
                        <?php echo $no++; ?>
                    </th>
                    <td>
                        <!-- gambar sdh terhubung ke "public/gambar/" -->
                        <img src="/images/<?php echo $d['gambar'] ?>" style="max-width: 100px;" alt="<?= $d['gambar']; ?>">
                    </td>
                    <td><?php echo $d['nama'] ?></td>
                    <td>Rp<?php echo $d['harga'] ?></td>
                    <td>
                        <form action="<?= base_url('/Admin/'.$d['id']); ?>" method="POST" class="d-inline-block">
                        <?= csrf_field(); ?>
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                        <a href="<?= base_url('/Admin/formEdit/'.$d['id']); ?>" class="btn btn-success">Edit</a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
            <?= $pager->links('data', 'data_pagination'); ?>
    </section>
    <?php endif; ?>
    
    <?php if(allow('user')): ?>
        <h1 style="text-align:center; padding:125px">Maaf, Anda tidak memiliki akses pada halaman ini</h1>
    <?php endif; ?>
<?php echo $this->endSection() ?>
