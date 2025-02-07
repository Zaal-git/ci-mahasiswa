<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><?= $title; ?></h4>

    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Tambah Data Jurusan</h5>
            <a href="<?= base_url('jurusan'); ?>" class="btn btn-danger">Kembali</a>
        </div>
        <div class="card-body">
            <form method="post" action="<?= base_url('jurusan/save'); ?>">

                <!-- Kode Jurusan -->
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="kodeJurusan">Kode Jurusan</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="kodeJurusan" name="kodeJurusan" placeholder="Masukkan Kode Jurusan" required>
                    </div>
                </div>

                <!-- Nama Jurusan -->
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="jurusan">Nama Jurusan</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="jurusan" name="jurusan" placeholder="Masukkan Nama Jurusan" required>
                    </div>
                </div>

                <!-- Fakultas -->
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="kode_fakultas">Fakultas</label>
                    <div class="col-sm-10">
                        <select class="form-select" id="kode_fakultas" name="kode_fakultas" required>
                            <option value="">Pilih Fakultas</option>
                            <?php foreach ($fakultas as $f) : ?>
                                <option value="<?= $f['kode_fakultas']; ?>"><?= $f['nama_fakultas']; ?></option>
                            <?php endforeach; ?>
                        </select>
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
