<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><?= $title; ?></h4>

    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Ccomplete the registration data</h5>
            <a href="<?= base_url('registrasi'); ?>" class="btn btn-danger">Back</a>
        </div>
        <div class="card-body">
            <form method="post" action="<?= base_url('registrasi/saveData'); ?>">

                <!-- Nama -->
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="nama">Nama</label>
                    <div class="col-sm-10">
                        <div class="input-group input-group-merge">
                            <span class="input-group-text">
                                <i class="bx bx-user"></i>
                            </span>
                            <input type="text" class="form-control" id="nama" name="nama" value="<?= $mahasiswa['Nama'];?>" readonly>
                        </div>
                    </div>
                </div>


                <!-- NIM -->
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="nim">NIM</label>
                    <div class="col-sm-10">
                        <div class="input-group input-group-merge">
                            <span class="input-group-text">
                                <i class="bx bx-id-card"></i>
                            </span>
                            <input type="text" class="form-control" id="nim" name="nim" value="<?= $mahasiswa['NIM']?>" readonly>
                        </div>
                    </div>
                </div>


                <!-- Kode Fakultas -->
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="kode_fakultas">Fakultas</label>
                    <div class="col-sm-10">
                        <div class="input-group input-group-merge">
                            <span class="input-group-text">
                                <i class="bx bx-building"></i>
                            </span>
                            <select class="form-select" id="kode_fakultas" name="kode_fakultas" aria-readonly="true">
                                <option value="<?= $mahasiswa['Fakultas'];?>"><?= $mahasiswa['Fakultas'];?></option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Kode Jurusan -->
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="kode_jurusan">Jurusan</label>
                    <div class="col-sm-10">
                        <div class="input-group input-group-merge">
                            <span class="input-group-text">
                                <i class="bx bx-book"></i>
                            </span>
                            <select class="form-select" id="kode_jurusan" name="kode_jurusan" aria-readonly="true">
                                <option value="<?= $mahasiswa['Jurusan'];?>"><?= $mahasiswa['Jurusan'];?></option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Email -->
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="email">Email</label>
                    <div class="col-sm-10">
                        <div class="input-group input-group-merge">
                            <span class="input-group-text">
                                <i class="bx bx-envelope"></i>
                            </span>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan Email" required>
                        </div>
                    </div>
                </div>


                <!-- Alamat -->
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="alamat">Alamat</label>
                    <div class="col-sm-10">
                        <div class="input-group input-group-merge">
                            <span class="input-group-text">
                                <i class="bx bx-home"></i>
                            </span>
                            <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat" required>
                        </div>
                    </div>
                </div>

                <!-- Nomor HP -->
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="nomor_hp">Nomor HP</label>
                    <div class="col-sm-10">
                        <div class="input-group input-group-merge">
                            <span class="input-group-text">
                                <i class="bx bx-phone"></i>
                            </span>
                            <input type="text" class="form-control" id="nomor_hp" name="nomor_hp" placeholder="Nomor HP" required>
                        </div>
                    </div>
                </div>

                <!-- IPK -->
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="ipk">IPK</label>
                    <div class="col-sm-10">
                        <div class="input-group input-group-merge">
                            <span class="input-group-text">
                                <i class="bx bx-bar-chart"></i>
                            </span>
                            <input type="number" step="0.01" class="form-control" id="ipk" name="ipk" placeholder="Indeks Prestasi Kumulatif" required>
                        </div>
                    </div>
                </div>

                <!-- Jenis Kelamin -->
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="jenis_kelamin">Jenis Kelamin</label>
                    <div class="col-sm-10">
                        <div class="input-group input-group-merge">
                            <span class="input-group-text">
                                <i class="bx bx-male-female"></i>
                            </span>
                            <select class="form-select" id="jenis_kelamin" name="jenis_kelamin">
    <option value="Laki-laki">Laki-laki</option>
    <option value="Perempuan">Perempuan</option>
</select>

                        </div>
                    </div>
                </div>

                <!-- Tombol Submit -->
                <div class="row justify-content-end">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">Simpan Data</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>