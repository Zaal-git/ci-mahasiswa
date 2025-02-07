<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><?= $title; ?></h4>

    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Edit Data Mahasiswa</h5>
            <a href="<?= base_url('mahasiswa'); ?>" class="btn btn-danger">Back</a>
        </div>
        <div class="card-body">
            <form method="post" action="<?= base_url('mahasiswa/updateData'); ?>">

                <input type="hidden" name="nim" value="<?= $mahasiswa['NIM']; ?>">

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="nama">Nama</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nama" name="nama" value="<?= $mahasiswa['Nama']; ?>" required>
                    </div>
                </div>

                <!-- Fakultas -->
                <div class="form-group mb-3">
                    <label>Fakultas</label>
                    <select name="fakultas" id="fakultas" class="form-control" required>
                        <option value="" disabled>Pilih Fakultas</option>
                        <?php foreach ($fakultas as $f): ?>
                            <option value="<?= $f['kode_fakultas']; ?>" <?= ($mahasiswa['kode_fakultas'] == $f['kode_fakultas']) ? 'selected' : ''; ?>>
                                <?= $f['nama_fakultas']; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <!-- Jurusan -->
                <div class="form-group mb-3">
                <label>Jurusan</label>
                <select name="jurusan" id="jurusan" class="form-control" required>
    <option value="">-- Pilih Jurusan --</option>
    <?php foreach ($jurusan as $j) : ?>
        <option value="<?= $j['kodeJurusan']; ?>" data-nama="<?= $j['jurusan']; ?>"
            <?= ($j['kodeJurusan'] == $mahasiswa['kode_jurusan']) ? 'selected' : ''; ?>>
            <?= $j['jurusan']; ?>
        </option>
    <?php endforeach; ?>
</select>
<input type="hidden" name="nama_jurusan" id="nama_jurusan" value="<?= $mahasiswa['Jurusan']; ?>">
                </div>

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="alamat">Alamat</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $mahasiswa['Alamat']; ?>" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="nomor_hp">Nomor HP</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nomor_hp" name="nomor_hp" value="<?= $mahasiswa['NomorHp']; ?>" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="ipk">IPK</label>
                    <div class="col-sm-10">
                        <input type="number" step="0.01" class="form-control" id="ipk" name="ipk" value="<?= $mahasiswa['Ipk']; ?>" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="jenis_kelamin">Jenis Kelamin</label>
                    <div class="col-sm-10">
                        <select class="form-select" id="jenis_kelamin" name="jenis_kelamin">
                            <option value="Laki-laki" <?= ($mahasiswa['jenisKelamin'] == 'Laki-laki') ? 'selected' : ''; ?>>Laki-laki</option>
                            <option value="Perempuan" <?= ($mahasiswa['jenisKelamin'] == 'Perempuan') ? 'selected' : ''; ?>>Perempuan</option>
                        </select>
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

<p>Jurusan yang dikirim: <span id="debug-jurusan"></span></p>

<script>
document.getElementById('jurusan').addEventListener('change', function() {
    document.getElementById('debug-jurusan').innerText = this.value;
});
</script>

<script>
document.getElementById("jurusan").addEventListener("change", function() {
    var selectedOption = this.options[this.selectedIndex];
    var namaJurusan = selectedOption.getAttribute("data-nama");
    document.getElementById("nama_jurusan").value = namaJurusan;
});
</script>


<!-- Script AJAX untuk filter jurusan -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    $('#fakultas').change(function() {
        var kodeFakultas = $(this).val();

        $('#jurusan').html('<option value="" disabled selected>Pilih Jurusan</option>');

        if (kodeFakultas) {
            $.ajax({
                url: '<?= base_url("mahasiswa/getJurusanByFakultas"); ?>',
                type: 'POST',
                data: { kodeFakultas: kodeFakultas },
                dataType: 'json',
                success: function(response) {
                    $.each(response, function(index, jurusan) {
                        $('#jurusan').append('<option value="' + jurusan.kodeJurusan + '">' + jurusan.jurusan + '</option>');
                    });
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        }
    });
});
</script>
