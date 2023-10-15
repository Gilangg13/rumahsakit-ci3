<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg">
            <!-- jika error -->
            <?php if (validation_errors()) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors(); ?>
                </div>
            <?php endif; ?>

            <?php echo form_error('janji_temu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

            <!-- jika success -->
            <?= $this->session->flashdata('message'); ?>

            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newModal">Tambah Janji Temu</a>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama Pasien</th>
                        <th scope="col">Nama Dokter</th>
                        <th scope="col">Poliklinik</th>
                        <th scope="col">Tanggal Janji</th>
                        <th scope="col">Keluhan</th>
                        <th scope="col">Tanggal Dibuat</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($janji_temu as $jt) : ?>
                        <tr>
                            <th scope="row"><?= $i++; ?></th>
                            <td><?= $jt['name_pasien'] ?></td>
                            <td><?= $jt['name'] ?></td>
                            <td><?= $jt['nama_poliklinik'] ?></td>
                            <td><?= $jt['tanggal_janji'] ?></td>
                            <td><?= $jt['keluhan'] ?></td>
                            <td><?= $jt['created_at'] ?></td>
                            <td>
                                <a href="<?= base_url('admin/edit_janji/' . $jt['janji_id']) ?>" class="btn btn-success"><i class="fas fa-solid fa-pen-to-square"></i></a>
                                <a href="<?= base_url('admin/delete_janji/' . $jt['janji_id']) ?>" class="btn btn-danger"><i class="fas fa-solid fa-trash"></i></a>
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
                <h1 class="modal-title fs-5" id="newModalLabel">Tambah Data Janji Temu</h1>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('admin/tambah_janji') ?>" method="POST">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="" class="form-label">Nama Pasien</label>
                        <select name="pasien_id" class="form-select">
                            <option value="-">Pilih Pasien</option>
                            <?php foreach ($pasien as $p) : ?>
                                <option value="<?= $p['pasien_id']; ?>"><?= $p['name_pasien']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>


                    <div class="mb-3">
                        <label for="" class="form-label">Poliklinik</label>
                        <select name="poliklinik" id="poliklinik" class="form-select">
                            <option value="-">Pilih Poliklinik</option>
                            <?php foreach ($poliklinik as $poli) : ?>
                                <option value="<?= $poli['poliklinik_id']; ?>"><?= $poli['nama_poliklinik']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">Nama Dokter</label>
                        <select name="dokter" id="dokter" class="form-select">
                            <option value="-">Pilih Dokter</option>
                            <?php foreach ($dokter as $d) : ?>
                                <option value="<?= $d['dokter_id']; ?>" data-poliklinik-id="<?= $d['poliklinik_id']; ?>"><?= $d['name']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">Tanggal Janji</label>
                        <input type="date" class="form-control" id="tanggal_janji" name="tanggal_janji">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Keluhan</label>
                        <input type="text" class="form-control" id="keluhan" name="keluhan" placeholder="Keluhan Pasien">
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