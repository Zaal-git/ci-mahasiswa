<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><?= $title; ?></h4>
    
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Data Periode</h5>
            <a href="<?= base_url('periode/add'); ?>" class="btn btn-primary">+ Add Periode</a>
            <hr>
            <?php if ($this->session->flashdata('message')) : ?>
                <?= $this->session->flashdata('message'); ?>
            <?php endif; ?>
        </div>
        <div class="card-body">
            <table id="periodeTable" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Periode</th>
                        <th>Keterangan</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data_periode as $row) : ?>
                        <tr>
                            <td><?= $row['periode']; ?></td>
                            <td><?= $row['keterangan']; ?></td>
                            <td>
                                <span class="badge <?= $row['status'] == 1 ? 'bg-success' : 'bg-danger'; ?>">
                                    <?= $row['status'] == 1 ? 'Aktif' : 'Tidak Aktif'; ?>
                                </span>
                            </td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"></button>
                                    <ul class="dropdown-menu dropdown-menu-end">
                                        <li>
                                            <a class="dropdown-item" href="<?= base_url('periode/edit/' . $row['id_periode']); ?>">
                                                <i class="bx bx-edit me-1"></i> Edit
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="<?= base_url('periode/delete/' . $row['id_periode']); ?>" onclick="return confirm('Yakin ingin menghapus?');">
                                                <i class="bx bx-trash me-1"></i> Delete
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
