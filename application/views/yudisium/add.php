<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><?= $title; ?></h4>

    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Tambah Data Yudisium</h5>
            <a href="<?= base_url('yudisium'); ?>" class="btn btn-danger">Kembali</a>
        </div>
        <div class="card-body">
            <form method="post" action="<?= base_url('yudisium/addData'); ?>">

                <!-- Nama -->
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="nama">Nama</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Lengkap" required>
                    </div>
                </div>

                <!-- NIM -->
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="nim">NIM</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nim" name="nim" placeholder="Nomor Induk Mahasiswa" required>
                    </div>
                </div>

                <!-- Fakultas -->
                <div class="form-group mb-3">
                    <label>Fakultas</label>
                    <select name="kodeFakultas" id="fakultas" class="form-control" required>
                        <option value="" disabled selected>Pilih Fakultas</option>
                        <?php foreach ($fakultas as $f): ?>
                            <option value="<?= $f['kode_fakultas']; ?>"><?= $f['nama_fakultas']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <!-- Jurusan -->
                <div class="form-group mb-3">
                    <label>Jurusan</label>
                    <select name="kodeJurusan" id="jurusan" class="form-control" required>
                        <option value="" disabled selected>Pilih Jurusan</option>
                        <!-- Opsi jurusan akan diisi secara dinamis menggunakan AJAX -->
                    </select>
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

<!-- Script AJAX untuk filter jurusan -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        // Ketika fakultas dipilih
        $('#fakultas').change(function() {
            var kodeFakultas = $(this).val(); // Ambil kode fakultas yang dipilih

            // Kosongkan dropdown jurusan
            $('#jurusan').html('<option value="" disabled selected>Pilih Jurusan</option>');

            // Jika kode fakultas valid, kirim permintaan AJAX
            if (kodeFakultas) {
                $.ajax({
                    url: '<?= base_url("yudisium/getJurusanByFakultas"); ?>', // URL ke controller
                    type: 'POST',
                    data: { kodeFakultas: kodeFakultas }, // Data yang dikirim
                    dataType: 'json',
                    success: function(response) {
                        // Jika data jurusan diterima, tambahkan ke dropdown
                        if (response.length > 0) {
                            $.each(response, function(index, jurusan) {
                                $('#jurusan').append('<option value="' + jurusan.kodeJurusan + '">' + jurusan.jurusan + '</option>');
                            });
                        } else {
                            $('#jurusan').append('<option value="" disabled>Tidak ada jurusan</option>');
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            }
        });
    });
</script>