<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><?= $title; ?></h4>

    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Tambah PIN untuk <?= $yudisium['Nama']; ?></h5>
            <a href="<?= base_url('yudisium'); ?>" class="btn btn-danger">Kembali</a>
        </div>
        <div class="card-body">
            <form method="post" action="<?= base_url('yudisium/savePin'); ?>">
                <!-- Input NIM (hidden) -->
                <input type="hidden" name="nim" value="<?= $yudisium['NIM']; ?>">

                <!-- NIM -->
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="nim">NIM</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nim" value="<?= $yudisium['NIM']; ?>" readonly>
                    </div>
                </div>

                <!-- Nama -->
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="nama">Nama</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nama" value="<?= $yudisium['Nama']; ?>" readonly>
                    </div>
                </div>

                <!-- Nama Fakultas -->
<div class="row mb-3">
    <label class="col-sm-2 col-form-label" for="nama_fakultas">Fakultas</label>
    <div class="col-sm-10">
    <input type="text" class="form-control" id="nama_fakultas" value="<?= isset($yudisium['nama_fakultas']) ? $yudisium['nama_fakultas'] : 'Tidak Diketahui'; ?>" readonly>
    </div>
</div>


                <!-- Nama Jurusan -->
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="nama_jurusan">Jurusan</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nama_jurusan" value="<?= $yudisium['nama_jurusan']; ?>" readonly>
                    </div>
                </div>

                <!-- Input PIN -->
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="pin">PIN</label>
                    <div class="col-sm-10">
                        <div class="input-group input-group-merge">
                            <span class="input-group-text">
                                <i class="bx bx-lock"></i>
                            </span>
                            <input type="text" class="form-control" id="pin" name="pin" placeholder="Masukkan PIN" required>
                        </div>
                    </div>
                </div>

                <!-- Tombol Submit -->
                <div class="row justify-content-end">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">Simpan PIN</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>