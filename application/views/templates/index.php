<!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
                <div class="row">
                    <!-- Card untuk Yudisium -->
                    <div class="col-lg-4 col-md-4 order-1">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-title d-flex align-items-start justify-content-between">
                                    <div class="avatar flex-shrink-0">
                                        <img src="<?= base_url('assets/img/icons/unicons/chart-success.png'); ?>" alt="chart success" class="rounded"/>
                                    </div>
                                    <div class="dropdown">
                                        <button class="btn p-0" type="button" id="cardOpt1" data-bs-toggle="dropdown">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt1">
                                            <a class="dropdown-item" href="javascript:void(0);">View More</a>
                                            <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                                        </div>
                                    </div>
                                </div>
                                <span class="fw-semibold d-block mb-1">Yudisium</span>
                                <h3 class="card-title mb-2"><?= $jumlah_yudisium; ?></h3>
                                <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i> Total Data</small>
                            </div>
                        </div>
                    </div>
            
                    <!-- Card untuk Registrasi -->
                    <div class="col-lg-4 col-md-4 order-2">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-title d-flex align-items-start justify-content-between">
                                    <div class="avatar flex-shrink-0">
                                        <img src="<?= base_url('assets/img/icons/unicons/wallet-info.png'); ?>" alt="Credit Card" class="rounded"/>
                                    </div>
                                    <div class="dropdown">
                                        <button class="btn p-0" type="button" id="cardOpt2" data-bs-toggle="dropdown">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt2">
                                            <a class="dropdown-item" href="javascript:void(0);">View More</a>
                                            <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                                        </div>
                                    </div>
                                </div>
                                <span class="fw-semibold d-block mb-1">Registrasi</span>
                                <h3 class="card-title mb-2"><?= $jumlah_registrasi; ?></h3>
                                <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i> Total Data</small>
                            </div>
                        </div>
                    </div>
            
                    <!-- Card untuk Mahasiswa -->
                    <div class="col-lg-4 col-md-4 order-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-title d-flex align-items-start justify-content-between">
                                    <div class="avatar flex-shrink-0">
                                        <img src="<?= base_url('assets/img/icons/unicons/chart.png'); ?>" alt="chart" class="rounded"/>
                                    </div>
                                    <div class="dropdown">
                                        <button class="btn p-0" type="button" id="cardOpt3" data-bs-toggle="dropdown">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt3">
                                            <a class="dropdown-item" href="javascript:void(0);">View More</a>
                                            <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                                        </div>
                                    </div>
                                </div>
                                <span class="fw-semibold d-block mb-1">Mahasiswa</span>
                                <h3 class="card-title mb-2"><?= $jumlah_mahasiswa; ?></h3>
                                <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i> Total Data</small>
                            </div>
                        </div>
                    </div>
                </div>
            
                <!-- Chart -->
                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">Data Yudisium, Registrasi, dan Mahasiswa</h5>
                            </div>
                            <div class="card-body">
                                <div id="dataChart"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            </div>
            <!-- / Content -->