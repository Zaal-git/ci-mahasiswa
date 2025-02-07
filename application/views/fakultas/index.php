<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><?= $title; ?></h4>
    
    <!-- Data Fakultas -->
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Data Fakultas</h5>
            <a href="<?= base_url('fakultas/addData'); ?>" class="btn btn-primary">+ Add Data</a>
            <hr>
            <?php if ($this->session->flashdata('message')) : ?>
                <?= $this->session->flashdata('message'); ?>
            <?php endif; ?>
        </div>
        <div class="card-body">
            <table id="fakultasTable" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Kode Fakultas</th>
                        <th>Nama Fakultas</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data_fakultas as $row) : ?>
                        <tr>
                            <td><?= $row['kode_fakultas']; ?></td>
                            <td><?= $row['nama_fakultas']; ?></td>
                            <td>
    <div class="dropdown">
        <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
            Action
        </button>
        <ul class="dropdown-menu dropdown-menu-end">
            <li>
                <a class="dropdown-item" href="<?= base_url('fakultas/edit/' . $row['kode_fakultas']); ?>">
                    <i class="bx bx-edit me-1"></i> Edit
                </a>
            </li>
            <li>
                <a class="dropdown-item" href="<?= base_url('fakultas/delete/' . $row['kode_fakultas']); ?>">
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