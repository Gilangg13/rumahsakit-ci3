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

            <?php echo form_error('dokter', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

            <!-- jika success -->
            <?= $this->session->flashdata('message'); ?>

            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newModal">Tambah Dokter</a>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Poliklinik</th>
                        <th scope="col">Spesialis</th>
                        <th scope="col">Telp</th>
                        <th scope="col">Email</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($dokter as $d) : ?>
                        <tr>
                            <th scope="row"><?= $i++; ?></th>
                            <td><?= $d['name'] ?></td>
                            <td><?= $d['nama_poliklinik'] ?></td>
                            <td><?= $d['spesialis'] ?></td>
                            <td><?= $d['nomor_telepon'] ?></td>
                            <td><?= $d['email'] ?></td>
                            <td>
                                <a href="<?= base_url('admin/edit_dokter/' . $d['dokter_id']) ?>" class="btn btn-success"><i class="fas fa-solid fa-pen-to-square"></i></a>
                                <a href="<?= base_url('admin/delete_dokter/' . $d['dokter_id']) ?>" class="btn btn-danger"><i class="fas fa-solid fa-trash"></i></a>
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
                <h1 class="modal-title fs-5" id="newModalLabel">Tambah Data Dokter</h1>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('admin/tambah_dokter') ?>" method="POST">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="" class="form-label">Nama Dokter</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Nama Dokter">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Poliklinik</label>
                        <select name="poliklinik" id="" class="form-select text-secondary">
                            <option value="-">Pilih Poliklinik</option>
                            <?php foreach ($poliklinik as $poli) : ?>
                                <option value="<?= $poli['poliklinik_id']; ?>"><?= $poli['nama_poliklinik']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Spesialis</label>
                        <input type="text" class="form-control" id="spesialis" name="spesialis" placeholder="Spesialis Dokter">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Nomor Telepon</label>
                        <input type="text" class="form-control" id="nomor_telepon" name="nomor_telepon" placeholder="Nomor Telepon">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Email</label>
                        <input type="text" class="form-control" id="email" name="email" placeholder="Email Dokter">
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