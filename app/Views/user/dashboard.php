<?= $this->extend('templates/user'); ?>

<?= $this->section('page-content'); ?>

<div class="container-fluid">
    <div class="container text-center">
        <div class="container my-5">
            <div class="text-center mb-4">
                <h1 class="h3 text-primary fw-bold">
                    Selamat Datang di Aplikasi Pemesanan Sarana Olahraga
                </h1>
            </div>
            <div class="text-center mb-4">
                <h1 class="h3 text-primary fw-bold">
                    🏅 Jadwal Cabang Olahraga 🏅
                </h1>
            </div>
        </div>

        <div class="fw-bold text-white bg-primary p-2 rounded shadow">
            📅 Jadwal Hari ini: <?= date('d F Y') ?>
        </div>
        <br>
        <div class="fw-bold text-white bg-primary p-2 rounded shadow">
            Dibuka Mulai Jam 09.00 - 23.00
        </div>
    </div>

    <div class="container">
        <div class="row d-flex justify-content-center">
            <?php
            $sports = [
                ['name' => 'Futsal', 'icon' => '⚽', 'color' => 'bg-primary', 'schedule' => [
                    ['09:00 - (kosong)', ''],
                    ['10:00 - (kosong)', ''],
                    ['11:00 - (kosong)', ''],
                    ['12:00 - (kosong)', ''],
                    ['13:00 - (kosong)', '']
                ], 'duration' => '1 jam per sesi'],

                ['name' => 'Badminton', 'icon' => '🏸', 'color' => 'bg-success', 'schedule' => [
                    ['09:00 - (kosong)', ''],
                    ['10:00 - (kosong)', ''],
                    ['11:00 - (kosong)', ''],
                    ['12:00 - (kosong)', ''],
                    ['13:00 - (kosong)', '']
                ], 'duration' => '1 jam per sesi'],

                ['name' => 'Voli', 'icon' => '🏐', 'color' => 'bg-warning', 'schedule' => [
                    ['09:00 - (kosong)', ''],
                    ['10:00 - (kosong)', ''],
                    ['11:00 - (kosong)', ''],
                    ['12:00 - (kosong)', ''],
                    ['13:00 - (kosong)', '']
                ], 'duration' => '1,5 - 2 jam per sesi'],

                ['name' => 'Basket', 'icon' => '🏀', 'color' => 'bg-danger', 'schedule' => [
                    ['09:00 - (kosong)', ''],
                    ['10:00 - (kosong)', ''],
                    ['11:00 - (kosong)', ''],
                    ['12:00 - (kosong)', ''],
                    ['13:00 - (kosong)', '']
                ], 'duration' => '1,5 - 2 jam per sesi']
            ];
            ?>

            <?php foreach ($sports as $sport) : ?>
                <div class="col-xl-4 col-md-6 mb-4">
                    <div class="card border-0 shadow-lg py-4"
                        style="min-height: 280px; transition: transform 0.3s ease-in-out;"
                        onmouseover="this.style.transform='scale(1.05)';"
                        onmouseout="this.style.transform='scale(1)';">

                        <div class="card-header text-white text-center <?= $sport['color'] ?>">
                            <h4 class="mb-0"> <?= $sport['icon'] ?> <?= $sport['name'] ?> </h4>
                        </div>

                        <div class="card-body text-center">
                            <h5 class="text-success text-uppercase fw-bold mb-3">Jadwal <?= $sport['name'] ?></h5>
                            <p><strong>🏟 Durasi Sewa:</strong> <?= $sport['duration'] ?></p>
                            <ul class="list-group">
                                <?php foreach ($sport['schedule'] as $time) : ?>
                                    <li class="list-group-item">
                                        <strong><?= $time[0] ?></strong> - <span class="text-muted"><?= $time[1] ?></span>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                            <a href="/user/pemesanan/<?= strtolower($sport['name']) ?>" class="btn btn-primary mt-3 w-100">Pesan Lapangan</a>
                        </div>

                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>