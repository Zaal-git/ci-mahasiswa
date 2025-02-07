<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><?= $title; ?></h4>

    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Tambah Data Periode</h5>
            <a href="<?= base_url('periode'); ?>" class="btn btn-danger">Kembali</a>
        </div>
        <div class="card-body">
            <form method="post" action="<?= base_url('periode/add'); ?>">

                <!-- Periode -->
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="periode">Periode</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="periode" name="periode" placeholder="Masukkan Periode" required>
                    </div>
                </div>

                <!-- Keterangan -->
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="keterangan">Keterangan</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="keterangan" name="keterangan" placeholder="Masukkan Keterangan Periode" required>
                    </div>
                </div>

                <!-- Status -->
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="status">Status</label>
                    <div class="col-sm-10">
                        <select class="form-select" id="status" name="status" required>
                            <option value="1">Aktif</option>
                            <option value="0">Tidak Aktif</option>
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
