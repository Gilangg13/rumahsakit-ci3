<div class="container">
    <div class="row">
        <?php
        $currentDokterId = null;
        foreach ($jadwal as $dokterJadwal) {
            if ($currentDokterId !== $dokterJadwal['dokter_id']) {
                // Jika dokter berbeda, tutup card sebelumnya dan buat card baru
                if ($currentDokterId !== null) {
                    echo '</table>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                }
                $currentDokterId = $dokterJadwal['dokter_id'];
        ?>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="<?= base_url('assets/img/dokter/doctors-4new.jpg'); ?>" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title text-center text-primary fw-bold"><?= $dokterJadwal['name']; ?></h5>
                            <h6 class="card-subtitle mb-2 text-primary-emphasis text-center py-2"><?= $dokterJadwal['spesialis']; ?></h6>
                            <p class="card-text">Kontak: <?= $dokterJadwal['nomor_telepon']; ?></p>
                            <p class="card-text">Email: <?= $dokterJadwal['email']; ?></p>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Hari</th>
                                        <th colspan="2">Jam Praktek</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                            }
                                ?>
                                <tr>
                                    <td><?= $dokterJadwal['hari']; ?></td>
                                    <td>
                                        <?= $dokterJadwal['jam_mulai'] . " - " . $dokterJadwal['jam_selesai']; ?>
                                    </td>
                                </tr>
                            <?php
                        }
                            ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <?php
                if ($currentDokterId !== null) {
                    echo '</table>'; // Tutup tabel terakhir
                    echo '</div>'; // Tutup card terakhir
                    echo '</div>';
                }
                ?>
    </div>
</div>