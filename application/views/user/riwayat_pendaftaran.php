<!-- Begin Page Content -->
<div class="container">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title;   ?></h1>
    <table class="table table-hover" border="1">
        <tr>
            <td>#</td>
            <td>Nama</td>
            <td>Poliklinik Tujuan</td>
            <td>Nama Dokter</td>
            <td>Tanggal Kunjungan</td>
            <td></td>
        </tr>
        <?php $no = 1; ?>
        <?php foreach ($detail as $d) : ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $d['name_pasien']; ?></td>
                <td><?= $d['nama_poliklinik']; ?></td>
                <td><?= $d['name']; ?></td>
                <td><?= $d['tanggal_janji']; ?></td>
                <td><a href="<?= base_url('user/detail_janji_temu/' . $d['janji_id']); ?>" class="btn btn-success">Detail</a></td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>