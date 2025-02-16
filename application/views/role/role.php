<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><?= $title; ?></h4>
    
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Data Periode</h5>
            <hr>
            <?php if ($this->session->flashdata('message')) : ?>
                <?= $this->session->flashdata('message'); ?>
            <?php endif; ?>
        </div>
        <div class="card-body">
            <table id="periodeTable" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Role</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($role as $row) : ?>
                        <tr>
                            <td><?= $row['name']; ?></td>
                            <td>
                                <?php
                                switch ($row['role']) {
                                    case 1:
                                        echo 'Super Admin';
                                        break;
                                    case 2:
                                        echo 'BAKP';
                                        break;
                                    case 3:
                                        echo 'Admin Fakultas';
                                        break;
                                    case 4:
                                        echo 'Mahasiswa';
                                        break;
                                }
                                ?>
                            </td>
                            <td>
                                <button class="btn btn-status <?= $row['is_active'] == 1 ? 'btn-success' : 'btn-danger'; ?>" 
                                        data-id="<?= $row['id']; ?>" 
                                        data-status="<?= $row['is_active']; ?>">
                                    <?= $row['is_active'] == 1 ? 'Aktif' : 'Tidak Aktif'; ?>
                                </button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>