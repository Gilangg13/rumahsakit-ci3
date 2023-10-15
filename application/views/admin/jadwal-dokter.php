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

            <?php echo form_error('jadwal_dokter', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

            <!-- jika success -->
            <?= $this->session->flashdata('message'); ?>

            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newModal">Tambah Jadwal Dokter</a>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama Dokter</th>
                        <th scope="col">Hari</th>
                        <th scope="col">Jam Mulai</th>
                        <th scope="col">Jam Selesai</th>
                        <th scope="col">Lokasi</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($jadwal_dokter as $jd) : ?>
                        <tr>
                            <th scope="row"><?= $i++; ?></th>
                            <td><?= $jd['name'] ?></td>
                            <td><?= $jd['hari'] ?></td>
                            <td><?= $jd['jam_mulai'] ?></td>
                            <td><?= $jd['jam_selesai'] ?></td>
                            <td><?= $jd['lokasi'] ?></td>
                            <td>
                                <a href="<?= base_url('admin/edit_jadwal_dokter/' . $jd['jadwal_id']) ?>" class="btn btn-success"><i class="fas fa-solid fa-pen-to-square"></i></a>
                                <a href="<?= base_url('admin/delete_jadwal_dokter/' . $jd['jadwal_id']) ?>" class="btn btn-danger"><i class="fas fa-solid fa-trash"></i></a>
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
                <h1 class="modal-title fs-5" id="newModalLabel">Tambah Data Jadwal Dokter</h1>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('admin/tambah_jadwal') ?>" method="POST">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="" class="form-label">Nama Dokter</label>
                        <select name="dokter_id" class="form-select">
                            <option value="-">Pilih Dokter</option>
                            <?php foreach ($dokter as $d) : ?>
                                <option value="<?= $d['dokter_id']; ?>"><?= $d['name']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">Hari</label>
                        <input type="text" class="form-control" id="hari" name="hari" placeholder="Hari">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Jam Mulai</label>
                        <input type="time" class="form-control" id="jam_mulai" name="jam_mulai">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Jam Selesai</label>
                        <input type="time" class="form-control" id="jam_selesai" name="jam_selesai">
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">Lokasi Praktek</label>
                        <input type="text" class="form-control" id="lokasi" name="lokasi" placeholder="Lokasi Ruangan Praktek">
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