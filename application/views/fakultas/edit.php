<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><?= $title; ?></h4>

    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Edit Fakultas</h5>
            <a href="<?= base_url('fakultas'); ?>" class="btn btn-danger">Back</a>
        </div>
        <div class="card-body">
            <form method="post" action="<?= base_url('fakultas/update'); ?>">
                <input type="hidden" name="kodeFakultas" value="<?= $fakultas['kode_fakultas']; ?>">

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="nama_fakultas">Nama Fakultas</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nama_fakultas" name="nama_fakultas" value="<?= $fakultas['nama_fakultas']; ?>" required>
                    </div>
                </div>

                <div class="row justify-content-end">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
