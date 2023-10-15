<div class="container">
    <div class="row mt-3">
        <div class="col-6 m-auto">
            <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
            <div class="card">
                <div class="card-header">
                    Edit Dokter
                    <a href="<?= base_url('admin/data_dokter'); ?>" class="float-end"><i class="fas fa-solid fa-xmark fa-xl"></i></a>
                </div>
                <div class="card-body">
                    <form action="<?= base_url('admin/edit_dokter/' . $dokter['dokter_id']); ?>" method="POST">
                        <div class="mb-3">
                            <label for="" class="form-label">Nama Dokter</label>
                            <input type="text" class="form-control" id="name" name="name" value="<?= $dokter['name'] ?>">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Poliklinik</label>
                            <select name="poliklinik" id="" class="form-select">
                                <option value="-">Pilih Poliklinik</option>
                                <?php foreach ($poliklinik as $p) : ?>
                                    <option value="<?= $p['poliklinik_id']; ?>" <?= ($dokter['poliklinik_id'] == $p['poliklinik_id']) ? 'selected' : ''; ?>><?= $p['nama_poliklinik']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Spesialis</label>
                            <input type="text" class="form-control" id="spesialis" name="spesialis" value="<?= $dokter['spesialis'] ?>">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Nomor Telepon</label>
                            <input type="text" class="form-control" id="nomor_telepon" name="nomor_telepon" value="<?= $dokter['nomor_telepon'] ?>">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Email</label>
                            <input type="text" class="form-control" id="email" name="email" value="<?= $dokter['email'] ?>">
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