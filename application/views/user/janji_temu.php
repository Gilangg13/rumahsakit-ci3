<!-- Janji Temu -->
<section id="appointment" class="appointment section-bg">
    <div class="container">

        <div class="row">
            <div class="col-lg-6">
                <?= $this->session->set_flashdata('message', validation_errors()); ?>
            </div>
        </div>

        <div class="section-title">
            <h2>Janji Temu</h2>
            <p>Silakan mengisi formulir di bawah ini untuk membuat janji temu dengan kami. Tim kami akan segera menghubungi Anda untuk mengkonfirmasi janji temu Anda.</p>
        </div>

        <form action="<?= base_url('janji_temu/proses'); ?>" method="post">
            <div class="row">
                <div class="col-md-4 form-group">
                    <label for="" class="form-label">Nama Anda</label>
                    <input type="text" class="form-control" name="name_pasien" id="name_pasien" placeholder="Nama Anda">
                </div>
                <div class="col-md-4 form-group mt-3 mt-md-0">
                    <label for="" class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="Email Anda">
                </div>
                <div class="col-md-4 form-group mt-3 mt-md-0">
                    <label for="" class="form-label">Nomor Telepon</label>
                    <input type="tel" class="form-control" name="nomor_telepon" id="nomor_telepon" placeholder="Nomor Telepon Anda">
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-md-4 form-group">
                    <label for="" class="form-label pb-2">Jenis Kelamin</label> <br>
                    <input type="radio" name="jk" class="form-check-input" value="Laki-Laki">Laki-Laki <span class="pe-4"></span>
                    <input type="radio" name="jk" class="form-check-input" value="Perempuan">Perempuan
                </div>
                <div class="col-md-4 form-group mt-3 mt-md-0">
                    <label for="" class="form-label">Tempat Lahir</label>
                    <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" placeholder="Tempat lahir">
                </div>
                <div class="col-md-4 form-group mt-3 mt-md-0">
                    <label for="" class="form-label">Tanggal Lahir</label>
                    <input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir">
                </div>
            </div>

            <div class="row">
                <div class="col-md-4 form-group mt-3">
                    <label for="" class="form-label">Tanggal Janji Temu</label>
                    <input type="date" class="form-control" name="tanggal_janji" id="date" placeholder="Tanggal Janji Temu">
                </div>
                <div class="col-md-4 form-group mt-3">
                    <label for="" class="form-label">Poliklinik</label>
                    <select name="poliklinik" id="poliklinik" class="form-select">
                        <option value="-">Pilih Poliklinik</option>
                        <?php foreach ($poliklinik as $poli) : ?>
                            <option value="<?= $poli['poliklinik_id']; ?>"><?= $poli['nama_poliklinik']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-md-4 form-group mt-3">
                    <label for="" class="form-label">Dokter</label>
                    <select name="dokter" id="dokter" class="form-select">
                        <option value="">Pilih Dokter</option>
                        <?php foreach ($dokter as $d) : ?>
                            <option value="<?= $d['dokter_id']; ?>" data-poliklinik-id="<?= $d['poliklinik_id']; ?>"><?= $d['name']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>

            <div class="form-group mt-3">
                <label for="" class="form-label">Alamat Lengkap</label>
                <textarea name="alamat" class="form-control" placeholder="Masukan Alamat Lengkap"></textarea>
            </div>

            <div class="form-group mt-3">
                <textarea class="form-control" name="pesan" rows="3" placeholder="Pesan atau keluhan (Opsional)"></textarea>
            </div>
            <div class="text-center mt-3">

                <button type="submit" class="btn btn-primary">Buat Janji Temu</button>
            </div>
        </form>
    </div>
</section><!-- End Appointment Section -->