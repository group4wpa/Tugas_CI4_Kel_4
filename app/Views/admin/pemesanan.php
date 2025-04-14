<?= $this->extend('templates/admin'); ?>

<?= $this->section('content'); ?>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Nama</th>
            <th>Lapangan</th>
            <th>Tanggal</th>
            <th>Jam</th>
            <th>Harga</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($pemesanan as $p) : ?>
            <tr>
                <td><?= $p['nama']; ?></td>
                <td><?= $p['nama_lapangan']; ?></td>
                <td><?= $p['tanggal']; ?></td>
                <td><?= $p['jam']; ?></td>
                <td>Rp <?= number_format($p['harga'], 0, ',', '.'); ?></td>
                <td><?= ucfirst($p['status']); ?></td>
                <td>
                    <?php if ($p['status'] == 'pending') : ?>
                        <a href="<?= base_url('admin/approve/' . $p['id']) ?>" class="btn btn-success btn-sm">Approve</a>
                    <?php endif; ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?= $this->endSection(); ?>