<body>

    <!-- Portfolio Section Heading -->
    <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Daftar Antrian</h2>

    <!-- Icon Divider -->
    <div class="divider-custom">
        <div class="divider-custom-line"></div>
        <div class="divider-custom-icon">
            <i class="fas fa-star"></i>
        </div>
        <div class="divider-custom-line"></div>
    </div>


    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-md-6" style="margin-top: 20px">
                <form action="<?php echo base_url('antrian/getNoAntrian') ?>" method="post">

                    <div>
                        <label>No. RM</label>
                        <input type="text" id="no_identitas" name="no_rm" class="form-control" value="<?= $this->session->userdata('ses_id') ?>" readonly required>
                    </div>

                    <div>
                        <label>Nama Pasien</label>
                        <input type="text" id="nama" name="nama_pasien" class="form-control" value="<?= $this->session->userdata('nama_pasien') ?>" readonly required>
                    </div>

                    <div>
                        <label>Jenis Kelamin</label>
                        <input type="text" id="nama" name="j_kel" class="form-control" value="<?= $this->session->userdata('jenis_kelamin') ?>" readonly required>
                    </div>

                    <div>
                        <label>Jenis Pasien</label>
                        <select id="jenis_kelamin" name="jns_pasien" class="form-control" required>
                            <option disabled selected style="display:none">--Pilih Jenis Pasien--</option>
                            <?php foreach($datajenis as $dj) : ?>
                                <option value="<?= $dj->id_jns_pasien ?>"><?= $dj->jns_pasien ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div>
                        <label>Tanggal Kunjung</label>
                        <input type="date" id="tgl_lahir" name="tgl_kunjung" class="form-control" value="">
                    </div>

                    <div>
                        <label>Jenis Kunjung</label>
                        <select id="jenis_kelamin" name="kunjung" class="form-control" required>
                            <option disabled selected style="display:none">--Pilih Jenis Kunjung--</option>
                            <option value="Lama">Lama</option>
                            <option value="Baru">Baru</option>
                        </select>
                    </div>

                    <div>
                        <label>Cara Kunjung</label>
                        <select id="jenis_kelamin" name="cara_kunjung" class="form-control" required>
                            <option disabled selected style="display:none">--Pilih Cara Kunjung--</option>
                            <?php foreach($datakunjung as $dk) : ?>
                                <option value="<?= $dk->id_kunjung ?>"><?= $dk->cara_kunjung ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div>
                        <label>Dokter</label>
                        <select name="dokter" class="form-control" required>
                            <option disabled selected style="display:none">--Pilih Dokter--</option>
                            <?php foreach($datadokter as $dd) : ?>
                                <option value="<?= $dd->id_dokter ?>"><?= $dd->nama_poli ?> -- <?= $dd->nama_dokter ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <br><br>
                    <div>
                        <input type="submit" name="" value="Daftar Antrian" class="btn btn-info">
                    </div>

                </form>
            </div>
        </div>
    </div>



</body>

</html>