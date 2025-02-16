
    <?php
 $role = $this->session->userdata('role');
 $user = $this->session->userdata();
?>

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><?= $title; ?></h4>
    <div class="row">
    <div class="col-lg-8">
        <div class="row mb-3">
            <label for="name" class="col-sm-2 col-form-label">Fullname</label>
            <div class="col-sm-10">
                <input type="text" id="name" class="form-control" name="name" value="<?= $user['name']; ?>" readonly>
            </div>
        </div>
        
        <div class="row mb-3">
                <label for="email" class="col-sm-2 col-form-label">Nim</label>
                <div class="col-sm-10">
                    <input type="email" id="email" class="form-control" name="email" value="<?= $user['nim']; ?>" readonly>
                </div>
        </div>

        <div class="row mb-3">
                <label for="email" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                <div class="col-sm-10">
                    <input type="email" id="email" class="form-control" name="email" value="<?= $user['jenisKelamin']; ?>" readonly>
                </div>
        </div>

        <div class="row mb-3">
                <label for="email" class="col-sm-2 col-form-label">Alamat</label>
                <div class="col-sm-10">
                    <input type="email" id="email" class="form-control" name="email" value="<?= $user['alamat']; ?>" readonly>
                </div>
        </div>

        <div class="row mb-3">
                <label for="email" class="col-sm-2 col-form-label">Nomor Hp</label>
                <div class="col-sm-10">
                    <input type="email" id="email" class="form-control" name="email" value="<?= $user['nomor']; ?>" readonly>
                </div>
        </div>

        <div class="row mb-3">
                <label for="email" class="col-sm-2 col-form-label">Ipk</label>
                <div class="col-sm-10">
                    <input type="email" id="email" class="form-control" name="email" value="<?= $user['ipk']; ?>" readonly>
                </div>
        </div>

        <div class="row mb-3">
                <label for="email" class="col-sm-2 col-form-label">Fakultas</label>
                <div class="col-sm-10">
                    <input type="email" id="email" class="form-control" name="email" value="<?= $user['fakultas']; ?>" readonly>
                </div>
        </div>

        <div class="row mb-3">
                <label for="email" class="col-sm-2 col-form-label">Jurusan</label>
                <div class="col-sm-10">
                    <input type="email" id="email" class="form-control" name="email" value="<?= $user['jurusan']; ?>" readonly>
                </div>
        </div>

        <div class="row mb-3">
                <label for="email" class="col-sm-2 col-form-label">Periode</label>
                <div class="col-sm-10">
                    <input type="email" id="email" class="form-control" name="email" value="<?= $user['periode']; ?>" readonly>
                </div>
        </div>
        </form>
    </div>
</div>


