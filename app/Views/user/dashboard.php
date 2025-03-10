<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>

<div class="container-fluid">
    <!-- Page Heading -->
    <div class="container">
        <div class="d-sm-flex align-items-center justify-content-center mb-4">
            <h1 class="h3 mb-0 text-gray-800 text-center">Jadwal Cabang Olahraga</h1>
        </div>
        <div class="fw-bold"> Jadwal Hari ini: <?= date('d F Y') ?></div> <br>
    </div>

    <div class="container">
        <!-- BARIS PERTAMA -->
        <div class="row d-flex justify-content-center"> <!-- Menengahkan semua card dalam baris -->
            <!-- Futsal Card -->
            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card border-left-primary shadow py-4" style="min-height: 200px;">
                    <div class="card-body">
                        <div class="text-lg font-weight-bold text-primary text-uppercase mb-1 text-center">
                            Futsal
                        </div>
                        <div class="h4 mb-0 font-weight-bold text-gray-800 text-center"></div>
                        <h5 class="text-lg font-weight-bold text-success text-uppercase mb-3 text-center">Jadwal Futsal</h5>
                        <ul class="list-group text-center">
                            <li class="list-group-item">09:00 - 10:00</li>
                            <li class="list-group-item">10:00 - 11:00</li>
                            <li class="list-group-item">11:00 - 12:00</li>
                            <li class="list-group-item">12:00 - 13:00</li>
                            <li class="list-group-item">13:00 - 14:00</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Badminton Card -->
            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card border-left-primary shadow py-4" style="min-height: 200px;">
                    <div class="card-body">
                        <div class="text-lg font-weight-bold text-primary text-uppercase mb-1 text-center">
                            Badminton
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800 text-center"></div>
                        <h5 class="text-lg font-weight-bold text-success text-uppercase mb-3 text-center">Jadwal Badminton</h5>
                        <ul class="list-group text-center">
                            <li class="list-group-item">09:00 - 10:00</li>
                            <li class="list-group-item">10:00 - 11:00</li>
                            <li class="list-group-item">11:00 - 12:00</li>
                            <li class="list-group-item">12:00 - 13:00</li>
                            <li class="list-group-item">13:00 - 14:00</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- BARIS KEDUA -->
        <div class="row d-flex justify-content-center mt-4"> <!-- Baris kedua juga ditengahkan -->
            <!-- Volly Card -->
            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card border-left-primary shadow py-4" style="min-height: 200px;">
                    <div class="card-body">
                        <div class="text-lg font-weight-bold text-primary text-uppercase mb-1 text-center">
                            Volly
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800 text-center"></div>
                        <h5 class="text-lg font-weight-bold text-success text-uppercase mb-3 text-center">Jadwal Volly</h5>
                        <ul class="list-group text-center">
                            <li class="list-group-item">10:00 - 11:00</li>
                            <li class="list-group-item">11:00 - 12:00</li>
                            <li class="list-group-item">12:00 - 13:00</li>
                            <li class="list-group-item">13:00 - 14:00</li>
                            <li class="list-group-item">14:00 - 15:00</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Basket -->
            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card border-left-primary shadow py-4" style="min-height: 200px;">
                    <div class="card-body">
                        <div class="text-lg font-weight-bold text-primary text-uppercase mb-1 text-center">
                            Basket
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800 text-center"></div>
                        <h5 class="text-lg font-weight-bold text-success text-uppercase mb-3 text-center">Jadwal Badminton</h5>
                        <ul class="list-group text-center">
                            <li class="list-group-item">09:00 - 10:00</li>
                            <li class="list-group-item">10:00 - 11:00</li>
                            <li class="list-group-item">11:00 - 12:00</li>
                            <li class="list-group-item">12:00 - 13:00</li>
                            <li class="list-group-item">13:00 - 14:00</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <?= $this->endSection(); ?>