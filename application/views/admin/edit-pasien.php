<div class="container">
    <div class="row mt-3">
        <div class="col-6 m-auto">
            <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
            <div class="card">
                <div class="card-header">
                    Edit Pasien
                    <a href="<?= base_url('admin/data_pasien'); ?>" class="float-end"><i class="fas fa-solid fa-xmark fa-xl"></i></a>
                </div>
                <div class="card-body">
                    <form action="<?= base_url('admin/edit_pasien/' . $pasien['pasien_id']); ?>" method="POST">
                        <div class="mb-3">
                            <label for="" class="form-label">Nama Pasien</label>
                            <input type="text" class="form-control" id="name_pasien" name="name_pasien" value="<?= $pasien['name_pasien']; ?>">
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label">Tanggal Lahir</label>
                            <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="<?= $pasien['tanggal_lahir']; ?>">
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label">Jenis Kelamin</label>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="jk" name="jk" value="Laki-Laki" <?php if ($pasien['jenis_kelamin'] == "Laki-Laki") echo "checked"; ?>>Laki-Laki
                            </div>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="jk" name="jk" value="Perempuan" <?php if ($pasien['jenis_kelamin'] == "Perempuan") echo "checked"; ?>>Perempuan
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label">Alamat</label>
                            <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $pasien['alamat']; ?>">
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label">Nomor Telepon</label>
                            <input type="text" class="form-control" id="nomor_telepon" name="nomor_telepon" value="<?= $pasien['nomor_telepon']; ?>">
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label">Email</label>
                            <input type="text" class="form-control" id="email" name="email" value="<?= $pasien['email']; ?>">
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Edit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>