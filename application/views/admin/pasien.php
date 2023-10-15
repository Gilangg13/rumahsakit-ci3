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

            <?php echo form_error('pasien', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

            <!-- jika success -->
            <?= $this->session->flashdata('message'); ?>

            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newModal">Tambah Pasien</a>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col" width="20px">#</th>
                        <th scope="col" width="100px">Nama</th>
                        <th scope="col" width="120">Tanggal Lahir</th>
                        <th scope="col" width="30px">Gender</th>
                        <th scope="col" width="130px">Alamat</th>
                        <th scope="col" width="50px">Telp</th>
                        <th scope="col" width="50px">Email</th>
                        <th scope="col" width="110px">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($pasien as $p) : ?>
                        <tr>
                            <th scope="row"><?= $i++; ?></th>
                            <td><?= $p['name_pasien'] ?></td>
                            <td><?= $p['tanggal_lahir'] ?></td>
                            <td><?= $p['jenis_kelamin'] ?></td>
                            <td><?= $p['alamat'] ?></td>
                            <td><?= $p['nomor_telepon'] ?></td>
                            <td><?= $p['email'] ?></td>
                            <td>
                                <a href="<?= base_url('admin/edit_pasien/' . $p['pasien_id']) ?>" class="btn btn-success"><i class="fas fa-solid fa-pen-to-square"></i></a>
                                <a href="<?= base_url('admin/delete_pasien/' . $p['pasien_id']) ?>" class="btn btn-danger"><i class="fas fa-solid fa-trash"></i></a>
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
                <h1 class="modal-title fs-5" id="newModalLabel">Tambah Data Pasien</h1>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('admin/tambah_pasien') ?>" method="POST">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="" class="form-label">Nama Pasien</label>
                        <input type="text" class="form-control" id="name_pasien" name="name_pasien" placeholder="Nama Pasien">
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">Tanggal Lahir</label>
                        <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir">
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">Jenis Kelamin</label>
                        <div class="form-check">
                            <input type="radio" class="form-check-input" id="jk" name="jk" value="Laki-Laki">Laki-Laki
                        </div>
                        <div class="form-check">
                            <input type="radio" class="form-check-input" id="jk" name="jk" value="Perempuan">Perempuan
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">Alamat</label>
                        <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat Pasien">
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">Nomor Telepon</label>
                        <input type="text" class="form-control" id="nomor_telepon" name="nomor_telepon" placeholder="Nomor Telepon">
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">Email</label>
                        <input type="text" class="form-control" id="email" name="email" placeholder="Email">
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