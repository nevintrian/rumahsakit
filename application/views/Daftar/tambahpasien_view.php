<?php if (!defined('BASEPATH')) exit('No direct script acess allowed'); ?>
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            <i class="fa fa-plus" style="color:green"> </i> Tambah Pasien
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('dashboard'); ?>"><i class="fa fa-dashboard"></i>&nbsp; Dashboard</a></li>
            <li class="active"><i class="fa fa-plus"></i>&nbsp; Tambah Pasien</li>
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
                        <form action="<?php echo base_url('daftar/tambah_pasien'); ?>" method="POST" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Nama Pasien</label>
                                        <input type="text" class="form-control" name="nama" required="required" placeholder="Nama Pengguna">
                                    </div>
                                    <div class="form-group">
                                        <label>Tanggal Lahir</label>
                                        <input type="date" class="form-control" name="tgl_lahir" required="required" placeholder="Contoh : 1999-05-18">
                                    </div>
                                    <div class="form-group">
                                        <label>Alamat</label>
                                        <textarea class="form-control" name="alamat" required="required"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Telepon</label>
                                        <input id="uintTextBox" class="form-control" name="telepon" required="required" placeholder="Contoh : 089618173609">
                                    </div>
                                    <div class="form-group">
                                        <label>Jenis Kelamin</label>
                                        <br />
                                        <input type="radio" name="jenkel" value="Laki-Laki" required="required"> Laki-Laki
                                        <br />
                                        <input type="radio" name="jenkel" value="Perempuan" required="required"> Perempuan
                                    </div>

                                </div>

                                <div class="col-sm-6">

                                    <div>
                                        <label>Jenis Pasien</label>
                                        <select id="jenis_kelamin" name="jns_pasien" class="form-control" required>
                                            <option disabled selected style="display:none">--Pilih Jenis Pasien--</option>
                                            <?php foreach ($datajenis as $dj) : ?>
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
                                            <?php foreach ($datakunjung as $dk) : ?>
                                                <option value="<?= $dk->id_kunjung ?>"><?= $dk->cara_kunjung ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>

                                    <div>
                                        <label>Dokter</label>
                                        <select name="dokter" class="form-control" required>
                                            <option disabled selected style="display:none">--Pilih Dokter--</option>
                                            <?php foreach ($datadokter as $dd) : ?>
                                                <option value="<?= $dd->id_dokter ?>"><?= $dd->nama_poli ?> -- <?= $dd->nama_dokter ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="pull-right">
                                <button type="submit" class="btn btn-primary btn-md">Submit</button>
                        </form>
                        <a href="<?= base_url('daftar'); ?>" class="btn btn-danger btn-md">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
</div>
</section>
</div>