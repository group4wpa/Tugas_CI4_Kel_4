<?= $this->extend('templates/user'); ?>

<?= $this->section('page-content'); ?>

<div class="container d-flex justify-content-center align-items-center mt-5">
    <div class="col-xl-8 col-md-10 mb-5">
        <div class="card border-0 shadow-lg py-4 text-center custom-card">
            <div class="card-header bg-gradient text-black">
                <h3 class="mb-0 fw-bold">🏟️ Pemesanan Lapangan</h3>
            </div>

            <div class="card-body">
                <h5 class="text-success text-uppercase fw-bold mb-3">Pilih Jadwal & Lapangan</h5>

                <!-- Form Pemesanan -->
                <form action="<?= base_url('user/simpanPemesanan') ?>" method="post">
                    <div class="mb-3 text-start">
                        <label for="lapangan" class="form-label fw-bold">🏟️ Pilih Lapangan</label>
                        <select name="lapangan_id" id="lapangan" class="form-select custom-select" required>
                            <option value="">Pilih Lapangan</option>
                            <?php foreach ($lapangan as $l) : ?>
                                <option value="<?= $l['id']; ?>" data-harga="<?= $l['harga']; ?>">
                                    <?= $l['nama']; ?> - <?= ucfirst($l['sport']); ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                        <div id="hargaDisplay" class="mt-2 fw-bold text-primary"></div>

                    </div>

                    <!-- Pilih Tanggal dan Jam -->
                    <div class="mb-3 text-start" id="jadwalSection" style="display:none;">
                        <label for="date" class="form-label fw-bold">📅 Pilih Tanggal</label>
                        <input type="date" class="form-control custom-input" id="date" name="date" required>

                        <label for="time" class="form-label fw-bold">⏰ Pilih Jam</label>
                        <select class="form-select custom-select" id="time" name="time" required>
                            <option value="">Pilih Jadwal</option>
                        </select>
                    </div>

                    <div class="mb-3 text-start">
                        <label for="price" class="form-label fw-bold">💰 Estimasi Harga</label>
                        <input type="text" class="form-control price-box" id="price" name="price" readonly>
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-warning fw-bold shadow-lg booking-btn">
                            <i class="fas fa-shopping-cart"></i> Booking Sekarang
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById("lapangan").addEventListener("change", function() {
        const selectedOption = this.options[this.selectedIndex];
        const harga = selectedOption.getAttribute("data-harga");

        if (harga) {
            document.getElementById("hargaDisplay").innerText = "💰 Harga: Rp " + parseInt(harga).toLocaleString();
        } else {
            document.getElementById("hargaDisplay").innerText = "";
        }
    });
</script>


<?= $this->endSection(); ?>