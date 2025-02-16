<?php
    $role = $this->session->userdata('role');
?>
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">Mahasiswa PIN </h4>

    <!-- Mahasiswa Non-PIN -->
    <div class="card mb-4">
        <div class="card-header">
            <h5 class="card-title">Mahasiswa Non-PIN</h5>
            <?php if(in_array($role, ['1', '3'])):?>
            <a href="<?= base_url('yudisium/addData');?>" class="btn btn-primary">+ Add Data</a>
            <?php endif; ?>
            <hr>
            <?php if ($this->session->flashdata('message')) : ?>
                <?= $this->session->flashdata('message'); ?>
            <?php endif; ?>
        </div>
        <div class="card-body">
            <table id="nonPinTable" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>NIM</th>
                        <th>Nama</th>
                        <th>Kode Fakultas</th>
                        <th>Kode Jurusan</th>
                        <?php if(in_array($role, ['1', '2'])): ?>
                        <th>Action</th>
                        <?php endif; ?>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($mahasiswa_non_pin as $row) : ?>
                        <tr>
                            <td><?= $row['NIM']; ?></td>
                            <td><?= $row['Nama']; ?></td>
                            <td><?= $row['kode_fakultas']; ?></td>
                            <td><?= $row['kodeJurusan']; ?></td>
                            <?php if(in_array($role, ['1', '2'])): ?>
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end">
                                        <li>
                                            <a class="dropdown-item" href="<?= base_url('yudisium/pinData/' . $row['NIM']); ?>">
                                                <i class="bx bxs-key me-1"></i> Pin
                                            </a>
                                    </ul>
                                </div>
                            </td>
                            <?php endif; ?>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>