<!-- Begin Page Content -->
<div class="container">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title;   ?></h1>

    <div class="col-6">
        <table class="table table-hover" border="1">
            <tr>
                <th>Nama</th>
                <td><?= $detail['name_pasien']; ?></td>
            </tr>
            <tr>
                <th>Tempat, Tanggal Lahir</th>
                <td><?= $detail['tempat_lahir'] . "," . $detail['tanggal_lahir']; ?></td>
            </tr>
            <tr>
                <th>Jenis Kelamin</th>
                <td><?= $detail['jenis_kelamin']; ?></td>
            </tr>
            <tr>
                <th>Alamat</th>
                <td><?= $detail['alamat']; ?></td>
            </tr>
            <tr>
                <th>Nomor Telepon</th>
                <td><?= $detail['nomor_telepon']; ?></td>
            </tr>
            <tr>
                <th>Email</th>
                <td><?= $detail['email']; ?></td>
            </tr>
            <tr>
                <th>Poliklinik</th>
                <td><?= $detail['nama_poliklinik']; ?></td>
            </tr>
            <tr>
                <th>Nama Dokter</th>
                <td><?= $detail['name']; ?></td>
            </tr>
            <tr>
                <th>Tanggal Kunjungan</th>
                <td><?= $detail['tanggal_janji']; ?></td>
            </tr>
            <tr>
                <th>Keluhan</th>
                <td><?= $detail['keluhan']; ?></td>
            </tr>
        </table>
        <a href="<?= base_url('user/rimayat_pendaftaran'); ?>" class="btn btn-secondary">Kembali Ke Home</a>
    </div>
</div>