<div class="container">
    <div class="row mt-3">
        <div class="col-6 m-auto">
            <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
            <div class="card">
                <div class="card-header">
                    Edit Poliklinik
                    <a href="<?= base_url('admin/data_poli'); ?>" class="float-end"><i class="fas fa-solid fa-xmark fa-xl"></i></a>
                </div>
                <div class="card-body">
                    <form action="<?= base_url('admin/edit_poli/' . $poliklinik['poliklinik_id']); ?>" method="POST">
                        <div class="mb-3">
                            <label for="" class="form-label">Nama Poliklinik</label>
                            <input type="text" class="form-control" id="nama_poliklinik" name="nama_poliklinik" value="<?= $poliklinik['nama_poliklinik']; ?>">
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