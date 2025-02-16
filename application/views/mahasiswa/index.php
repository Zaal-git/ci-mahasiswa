<?php
 $role = $this->session->userdata('role');
?>

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><?= $title; ?></h4>

    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Data Mahasiswa</h5>
            <hr>
            <?php if ($this->session->flashdata('message')) : ?>
                <?= $this->session->flashdata('message'); ?>
            <?php endif; ?>
        </div>
        <div class="card-body">
            <div class="table-responsive"> <!-- Agar tabel bisa scroll -->
                <table id="mahasiswaTable" class="table table-striped table-bordered">
                    <thead class="table-primary"> <!-- Bootstrap style -->
                        <tr>
                            <th>NIM</th>
                            <th>Nama</th>
                            <th>Fakultas</th>
                            <th>Jurusan</th>
                            <th>Alamat</th>
                            <th>Nomor Hp</th>
                            <th>IPK</th>
                            <th>Jenis Kelamin</th>
                            <th>Periode</th>
                            <?php if(in_array($role, ['1', '2'])) : ?>
                            <th style="width: 1%;" class="text-center">Action</th>
                            <?php endif; ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($mahasiswa as $row) : ?>
                            <tr>
                                <td><?= $row['NIM']; ?></td>
                                <td><?= $row['Nama']; ?></td>
                                <td><?= $row['Fakultas']; ?></td>
                                <td><?= $row['Jurusan']; ?></td>
                                <td><?= $row['Alamat']; ?></td>
                                <td><?= $row['NomorHp']; ?></td>
                                <td><?= $row['Ipk']; ?></td>
                                <td><?= $row['jenisKelamin']; ?></td>
                                <td><?= $row['periode'] ?? '-'; ?></td>
                                <?php if(in_array($role, ['1', '2'])):?>
                                <td class="text-center">
                                    <div class="dropdown">
                                        <button class="btn btn-light btn-sm p-0" type="button" data-bs-toggle="dropdown">
                                            <i class="bx bx-dots-vertical-rounded fs-5"></i>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end">
                                            <li>
                                                <a class="dropdown-item text-danger" href="<?= base_url('mahasiswa/deleteData/' . $row['NIM']); ?>" 
                                                   onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                                                    <i class="bx bx-trash me-1"></i> Hapus
                                                </a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item text-primary" href="<?= base_url('mahasiswa/editData/' . $row['NIM']); ?>">
                                                    <i class="bx bx-edit me-1"></i> Edit
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                                <?php endif; ?>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div> <!-- table-responsive -->
        </div>
    </div>
</div>


