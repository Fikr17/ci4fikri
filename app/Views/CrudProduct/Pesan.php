<!-- header -->
<?php echo $this->extend('/Tempelan/Back') ?>


<?php echo $this->section('content'); ?>
    <?php if(allow('admin')): ; ?>
    <section class="admin" style="margin-top: 5rem;">
    <h1 style="text-align: center;">Pesan dari client</h1>
        <table class="table" style="max-width:900px; padding:1rem 1rem; margin:0 auto;">
            <thead>
                <tr>
                    <th>No</th>
                    <td>Nama</td>
                    <td>Email</td>
                    <td>Kritik dan Saran</td>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1 + (5*($currentPage-1)); ?>
                <?php foreach ($data as $d){ ?>
                <tr>
                    <th>
                        <?php echo $no++; ?>
                    </th>
                    <td><?php echo $d['nama'] ?></td>
                    <td><?php echo $d['email'] ?></td>
                    <td><?php echo $d['pesan'] ?></td>
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
