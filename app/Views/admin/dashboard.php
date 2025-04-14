<?= $this->extend('templates/admin'); ?>

<?= $this->section('content'); ?>

<h2 class="mt-4">📊 Dashboard Admin</h2>

<div class="row mt-4">
    <div class="col-lg-4 col-md-6 mb-3">
        <div class="card border-0 shadow p-3">
            <h5 class="fw-bold">👥 Pelanggan</h5>
            <h2 class="text-warning fw-bold"><?= $jumlah_pelanggan ?></h2>
        </div>
    </div>

    <div class="col-lg-4 col-md-6 mb-3">
        <div class="card border-0 shadow p-3">
            <h5 class="fw-bold">📅 Total Pemesanan</h5>
            <h2 class="text-primary fw-bold"><?= $total_pemesanan ?></h2>
        </div>
    </div>

    <div class="col-lg-4 col-md-6 mb-3">
        <div class="card border-0 shadow p-3">
            <h5 class="fw-bold">💰 Total Pemasukan</h5>
            <h2 class="text-success fw-bold">Rp <?= number_format($total_pemasukan, 0, ',', '.') ?></h2>
        </div>
    </div>

    <div class="col-lg-4 col-md-6 mb-3">
        <div class="card border-0 shadow p-3">
            <h5 class="fw-bold">🔄 Pemesanan Hari Ini</h5>
            <h2 class="text-danger fw-bold"><?= $pemesanan_hari_ini ?></h2>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>