<?= $this->extend('templates/user'); ?>

<?= $this->section('page-content'); ?>

<div class="container mt-5">
    <h4>Riwayat Pemesanan Lapangan</h4>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Lapangan</th>
                <th>Olahraga</th>
                <th>Tanggal</th>
                <th>Jam</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pemesanan as $p) : ?>
                <tr>
                    <td><?= $p['nama_lapangan']; ?></td>
                    <td><?= $p['olahraga']; ?></td>
                    <td><?= $p['tanggal']; ?></td>
                    <td><?= $p['jam']; ?></td>
                    <td><?= ucfirst($p['status']); ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?= $this->endSection(); ?>