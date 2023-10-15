<div class="container">
    <div class="row mt-3">
        <div class="col-6 m-auto">
            <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
            <div class="card">
                <div class="card-header">
                    Edit Jadwal Dokter
                    <a href="<?= base_url('admin/data_jadwal_dokter'); ?>" class="float-end"><i class="fas fa-solid fa-xmark fa-xl"></i></a>
                </div>
                <div class="card-body">
                    <form action="<?= base_url('admin/edit_jadwal_dokter/' . $jadwal_dokter['jadwal_id']); ?>" method="POST">
                        <div class="mb-3">
                            <label for="" class="form-label">Nama Dokter</label>
                            <select name="dokter_id" class="form-select">
                                <option value="-">Pilih Dokter</option>
                                <?php foreach ($dokter as $d) : ?>
                                    <?php
                                    $selected_dokter_id =  $dokter_id;
                                    if ($d['dokter_id'] == $selected_dokter_id) : ?>
                                        <option value="<?= $d['dokter_id']; ?>" selected><?= $d['name']; ?></option>
                                    <?php else : ?>
                                        <option value="<?= $d['dokter_id']; ?>"><?= $d['name']; ?></option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label">Hari</label>
                            <input type="text" class="form-control" id="hari" name="hari" value="<?= $jadwal_dokter['hari'] ?>">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Jam Mulai</label>
                            <input type="time" class="form-control" id="jam_mulai" name="jam_mulai" value="<?= $jadwal_dokter['jam_mulai'] ?>">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Jam Selesai</label>
                            <input type="time" class="form-control" id="jam_selesai" name="jam_selesai" value="<?= $jadwal_dokter['jam_selesai'] ?>">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Lokasi Praktek</label>
                            <input type="text" class="form-control" id="lokasi" name="lokasi" value="<?= $jadwal_dokter['lokasi'] ?>">
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