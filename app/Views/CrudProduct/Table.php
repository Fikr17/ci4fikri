<!-- header -->
<?php echo $this->extend('/Tempelan/Back') ?>


<?php echo $this->section('content') ?>
    <section class="admin">
        <a href="/Admin/formTambah" class="btn btn-primary" style="margin-left:10%;">tambah data</a>
        <table class="table" style="width: 80%; margin-left:10%;">
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
                <?php //$no = 1; ?>
                <?php foreach ($data as $d){ ?>
                <tr>
                    <th>
                        <?php //echo $no++; ?>
                        <?php echo $d['id'] ?>
                    </th>
                    <td>
                        <!-- gambar sdh terhubung ke "public/gambar/" -->
                        <img src="/gambar/<?php echo $d['gambar'] ?>" style="width: 150px;" alt="">
                    </td>
                    <td><?php echo $d['nama'] ?></td>
                    <td><//?php echo $d['asal'] ?></td>
                    <td>
                        <form action="" method="POST" class="d-inline-block">
                            <input type="hidden" name="">
                            <button type="submit" name="Delete" class="btn btn-success">Delete</button>
                        </form>
                        <a href="Home/<?php echo $d['id'] ?>" class="btn btn-danger">Edit</a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </section>
<?php echo $this->endSection() ?>
