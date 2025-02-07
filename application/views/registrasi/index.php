<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><?= $title; ?></h4>
    
    <!-- Mahasiswa PIN -->
       <div class="card">
        <div class="card-header">
            <h5 class="card-title">Mahasiswa PIN</h5>
            <hr>
            <?php if ($this->session->flashdata('message')) : ?>
                <?= $this->session->flashdata('message'); ?>
            <?php endif; ?>
        </div>
        <div class="card-body">
            <table id="pinTable" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>NIM</th>
                        <th>Nama</th>
                        <th>Fakultas</th>
                        <th>Jurusan</th>
                        <th>PIN</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($mahasiswa_pin as $row) : ?>
                        <tr>
                            <td><?= $row['NIM']; ?></td>
                            <td><?= $row['Nama']; ?></td>
                            <td><?= !empty($row['nama_fakultas']) ? $row['nama_fakultas'] :''; ?></td>
<td><?= !empty($row['jurusan']) ? $row['jurusan'] : 'Tidak Diketahui'; ?></td>

                            <td><?= $row['PIN']; ?></td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end">
                                        <li>
                                            <a class="dropdown-item" href="<?= base_url('registrasi/completeData/' . $row['NIM']); ?>">
                                                <i class="bx bxs-user-check me-1"></i> Complete Data
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
