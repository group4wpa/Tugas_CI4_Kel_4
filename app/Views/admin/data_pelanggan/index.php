<?= $this->extend('templates/admin'); ?>
<?= $this->section('content'); ?>

<h2>Data Pelanggan</h2>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Email</th>
            <th>No HP</th>
            <th>Alamat</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($pelanggan)): ?>
            <?php $no = 1;
            foreach ($pelanggan as $user): ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= esc($user['name']) ?></td>
                    <td><?= esc($user['email']) ?></td>
                    <td><?= esc($user['phone'] ?? '-') ?></td>
                    <td><?= esc($user['address'] ?? '-') ?></td>
                    <th>Aksi</th>
                    <td>
                        <a href="<?= base_url('admin/edit_pelanggan/' . $user['id']) ?>" class="btn btn-sm btn-warning">Edit</a>
                        <a href="<?= base_url('admin/hapus_pelanggan/' . $user['id']) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus data ini?')">Hapus</a>
                    </td>

                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="5" class="text-center">Belum ada data pelanggan</td>
            </tr>
        <?php endif; ?>
    </tbody>
    <form method="get" action="<?= base_url('admin/data_pelanggan') ?>" class="mb-3">
        <div class="input-group">
            <input type="text" name="keyword" class="form-control" placeholder="Cari nama atau email..." value="<?= esc($keyword) ?>">
            <button class="btn btn-primary" type="submit">Cari</button>
        </div>
    </form>

</table>

<?= $this->endSection(); ?>