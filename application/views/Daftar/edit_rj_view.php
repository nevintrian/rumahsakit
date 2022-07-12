<?php if (!defined('BASEPATH')) exit('No direct script acess allowed'); ?>
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            <i class="fa fa-user-circle" style="color:"> </i> <?= $title_web; ?>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('dashboard'); ?>"><i class="fa fa-dashboard"></i>&nbsp; Dashboard</a></li>
            <li class="active"><i class="fa fa-user-circle"></i>&nbsp; <?= $title_web; ?></li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <form action="<?php echo base_url('daftar/prosespx'); ?>" method="POST" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-sm-5">
                                    <div class="form-group">
                                        <label>No Rekam Medis</label>
                                        <input type="text" class="form-control" name="no_rm" value="<?= $rm_pasien->no_rm; ?>" required="required" placeholder="No Rekam Medis" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label>Jenis Pasien</label>
                                        <select id="jenis_kelamin" name="jns_pasien" class="form-control" required>
                                            <option disabled selected style="display:none">--Pilih Jenis Pasien--</option>
                                            <?php foreach ($datajenis as $dj) : ?>
                                                <option value="<?= $dj->id_jns_pasien ?>" <?php echo set_select('jns_pasien', $dj->id_jns_pasien, (!empty($rm_pasien->id_jns_pasien) && $rm_pasien->id_jns_pasien == $dj->id_jns_pasien ? TRUE : FALSE)); ?>><?= $dj->jns_pasien ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-5">
                                    <div class="form-group">
                                        <label>Tanggal Kunjungan </label>
                                        <input type="date" class="form-control" name="tgl_kunjung" required="required" value="<?= $rm_pasien->tgl_kunjung ?>" placeholder="1999-05-12">
                                    </div>
                                    <div class="form-group">
                                        <label>Jenis kunjungan</label>
                                        <select name="jns_kunjung" class="form-control" required="required">
                                            <option disabled selected style="display: none;">--Pilih Jenis Kunjungan--</option>
                                            <option value="Lama" <?php echo set_select('jns_kunjung', 'Lama', (!empty($rm_pasien->jns_kunjung) && $rm_pasien->jns_kunjung == 'Lama' ? TRUE : FALSE)); ?>>Lama</option>
                                            <option value="Baru" <?php echo set_select('jns_kunjung', 'Baru', (!empty($rm_pasien->jns_kunjung) && $rm_pasien->jns_kunjung == 'Baru' ? TRUE : FALSE)); ?>>Baru</option>

                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Cara Kunjungan</label>
                                        <select id="InputKunjung" name="cara_kunjung" class="form-control" required>
                                            <option disabled selected style="display: none;" value="">--Pilih Cara Kunjungan--</option>
                                            <?php foreach ($data_kunjung as $row) : ?>
                                                <option value="<?= $row->id_kunjung ?>" <?php echo set_select('cara_kunjung', $row->id_kunjung, (!empty($rm_pasien->id_kunjung) && $rm_pasien->id_kunjung == $row->id_kunjung ? TRUE : FALSE)); ?>><?= $row->cara_kunjung ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <!-- <div class="form-group">
                                        <label>Tujuan Poli</label>
                                        <select id="InputPoli" name="ke_poli" class="form-control" required>
                                            <option disabled selected style="display: none;" value="">--Pilih Tujuan Poli--</option>
                                            <?php foreach ($data_poli as $row) : ?>
                                                <option value="<?= $row->id_poli ?>" ><?= $row->nama_poli ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div> -->
                                    <div class="form-group">
                                        <label>Pilih Dokter</label>
                                        <select id="InputDokter" name="nama_dokter" class="form-control" required>
                                            <option disabled selected style="display: none;" value="">--Pilih Dokter--</option>
                                            <?php foreach ($data_dokter as $row) : ?>
                                                <option value="<?= $row->id_dokter ?>" <?php echo set_select('nama_dokter', $row->id_dokter, (!empty($rm_pasien->id_dokter) && $rm_pasien->id_dokter == $row->id_dokter ? TRUE : FALSE)); ?>><?= $row->nama_dokter ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="pull-right">
                                <input type="hidden" name="edit" value="<?= $rm_pasien->id_daftar ?>">
                                <button type="submit" class="btn btn-primary btn-md">Edit</button>
                        </form>
                        <a href="<?= base_url('datadaftar'); ?>" class="btn btn-danger btn-md">Kembali</a>
                    </div>
                </div>

            </div>
        </div>
</div>
</div>
</section>
</div>