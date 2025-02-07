<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><?= $title; ?></h4>
    
    <!-- Data Jurusan -->
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Data Jurusan</h5>
            <a href="<?= base_url('jurusan/addData');?>" class="btn btn-primary">+ Add Data</a>
            <hr>
            <?php if ($this->session->flashdata('message')) : ?>
                <?= $this->session->flashdata('message'); ?>
            <?php endif; ?>
        </div>
        <div class="card-body">
            <table id="jurusanTable" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Kode Jurusan</th>
                        <th>Nama Jurusan</th>
                        <th>Kode Fakultas</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data_jurusan as $row) : ?>
                        <tr>
                            <td><?= $row['kodeJurusan']; ?></td>
                            <td><?= $row['jurusan']; ?></td>
                            <td><?= $row['kode_fakultas']; ?></td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end">
                                        <li>
                                            <a class="dropdown-item" href="<?= base_url('jurusan/edit/' . $row['kodeJurusan']); ?>">
                                                <i class="bx bx-edit me-1"></i> Edit
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="<?= base_url('jurusan/delete/' . $row['kodeJurusan']); ?>">
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