<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <div class="row mb-3">
        <div class="col-lg">
            <!-- jika error -->
            <?php if (validation_errors()) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors(); ?>
                </div>
            <?php endif; ?>

            <?php echo form_error('poliklinik', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

            <!-- jika success -->
            <?= $this->session->flashdata('message'); ?>

            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newModal">Tambah Poliklinik</a>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col" width="20px">#</th>
                        <th scope="col" width="100px">Nama Poliklinik</th>
                        <th scope="col" width="110px">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($poliklinik as $poli) : ?>
                        <tr>
                            <th scope="row"><?= $i++; ?></th>
                            <td><?= $poli['nama_poliklinik'] ?></td>
                            <td>
                                <a href="<?= base_url('admin/edit_poli/' . $poli['poliklinik_id']) ?>" class="btn btn-success"><i class="fas fa-solid fa-pen-to-square"></i></a>
                                <a href="<?= base_url('admin/delete_poli/' . $poli['poliklinik_id']) ?>" class="btn btn-danger"><i class="fas fa-solid fa-trash"></i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->

<!-- Tambah Modal -->
<div class="modal fade" id="newModal" tabindex="-1" aria-labelledby="newModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="newModalLabel">Tambah Data Poliklinik</h1>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('admin/tambah_poli') ?>" method="POST">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="" class="form-label">Nama Poliklinik</label>
                        <input type="text" class="form-control" id="nama_poliklinik" name="nama_poliklinik" placeholder="Nama Poliklinik">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>