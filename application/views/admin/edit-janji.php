<!-- Tambah Modal -->
<div class="container">
    <div class="row mt-3">
        <div class="col-6 m-auto">
            <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
            <div class="card">
                <div class="card-header">
                    Edit Janji Temu
                    <a href="<?= base_url('admin/data_janji_temu'); ?>" class="float-end"><i class="fas fa-solid fa-xmark fa-xl"></i></a>
                </div>
                <div class="card-body">
                    <form action="<?= base_url('admin/edit_janji/' . $janji_temu['janji_id']); ?>" method="POST">
                        <div class="mb-3">
                            <label for="" class="form-label">Nama Pasien</label>
                            <select name="pasien_id" class="form-select">
                                <option value="-">Pilih Pasien</option>
                                <?php foreach ($pasien as $p) : ?>
                                    <?php
                                    $selected_pasien_id = $pasien_id;
                                    if ($p['pasien_id'] == $selected_pasien_id) : ?>
                                        <option value="<?= $p['pasien_id']; ?>" selected><?= $p['name_pasien']; ?></option>
                                    <?php else : ?>
                                        <option value="<?= $p['pasien_id']; ?>"><?= $p['name_pasien']; ?></option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label">Poliklinik</label>
                            <select name="poliklinik" id="poliklinik" class="form-select">
                                <option value="-">Pilih Poliklinik</option>
                                <?php foreach ($poliklinik as $poli) : ?>
                                    <?php
                                    $selected_poli = $poliklinik_id;
                                    if ($poli['poliklinik_id'] == $selected_poli) : ?>
                                        <option value="<?= $poli['poliklinik_id']; ?>" selected><?= $poli['nama_poliklinik']; ?></option>
                                    <?php else : ?>
                                        <option value="<?= $poli['poliklinik_id']; ?>"><?= $poli['nama_poliklinik']; ?></option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label">Nama Dokter</label>
                            <select name="dokter" id="dokter" class="form-select">
                                <option value="-">Pilih Dokter</option>
                                <?php foreach ($dokter as $d) : ?>
                                    <?php
                                    $selected_dokter_id = $dokter_id;
                                    if ($d['dokter_id'] == $selected_dokter_id) : ?>
                                        <option value="<?= $d['dokter_id']; ?>" data-poliklinik-id="<?= $d['poliklinik_id']; ?>" selected><?= $d['name']; ?></option>
                                    <?php else : ?>
                                        <option value="<?= $d['dokter_id']; ?>" data-poliklinik-id="<?= $d['poliklinik_id']; ?>"><?= $d['name']; ?></option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label">Tanggal Janji</label>
                            <input type="date" class="form-control" id="tanggal_janji" name="tanggal_janji" value="<?= $janji_temu['tanggal_janji']; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Keluhan</label>
                            <input type="text" class="form-control" id="keluhan" name="keluhan" value="<?= $janji_temu['keluhan']; ?>">
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">EDIT</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>