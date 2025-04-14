<?= $this->extend('templates/user'); ?>
<?= $this->section('page-content'); ?>

<div class="container my-5">
    <h2>Form Pemesanan Lapangan</h2>
    <p>Jenis Lapangan: <strong><?= esc($jenis) ?></strong></p>

    <!-- Tambahkan form pemesanan di sini -->
    <form action="/user/order/submit" method="post">
        <!-- Contoh form -->
        <div class="mb-3">
            <label for="nama" class="form-label">Nama Pemesan</label>
            <input type="text" name="nama" id="nama" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="waktu" class="form-label">Jam Pemesanan</label>
            <select name="waktu" id="waktu" class="form-control">
                <option value="09:00">09:00</option>
                <option value="10:00">10:00</option>
                <option value="11:00">11:00</option>
                <!-- dst -->
            </select>
        </div>
        <input type="hidden" name="jenis" value="<?= esc($jenis) ?>">
        <button type="submit" class="btn btn-primary">Pesan Sekarang</button>
    </form>
</div>

<?= $this->endSection(); ?>