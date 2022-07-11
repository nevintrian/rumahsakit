<?php if (!defined('BASEPATH')) exit('No direct script acess allowed'); ?>
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            <i class="fa fa-plus" style="color:green"> </i> Input Data Pelayanan
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('dashboard'); ?>"><i class="fa fa-dashboard"></i>&nbsp; Dashboard</a></li>
            <li class="active"><i class="fa fa-plus"></i>&nbsp;Input Data Pelayanan</li>
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
                        <form action="<?php echo base_url('pelayanan/add_rekam_medis/'); ?>" method="POST" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>No RM</label>
                                        <input type="text" class="form-control" name="no_rm" required="required" placeholder="No RM" value="<?= $inputrm->no_rm ?>" readonly>
                                        <input type="hidden" class="form-control" name="id_daftar" required="required" placeholder="No RM" value="<?= $inputrm->id_daftar ?>" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label>Nama Pasien</label>
                                        <input type="text" class="form-control" name="nama_pasien" required="required" placeholder="" value="<?= $inputrm->nama_pasien ?>" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label>Tanggal Masuk</label>
                                        <input type="date" class="form-control" name="tgl_masuk" required="required" placeholder="Contoh : 1999-05-18" value="<?= $inputrm->tgl_masuk ?>" readonly>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Jenis Kelamin</label>
                                        <input id="" class="form-control" name="jenis_kelamin" required="required" placeholder="Contoh : 089618173609" value="<?= $inputrm->j_kel ?>" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label>Jenis Pasien</label>
                                        <input id="" class="form-control" name="jenis_pasien" required="required" placeholder="Contoh : 089618173609" value="<?= $inputrm->jns_pasien ?>" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label>Jenis Kunjungan</label>
                                        <input type="text" class="form-control" name="jenis_kunjung" required="required" placeholder="Contoh : fauzan1892@codekop.com" value="<?= $inputrm->jns_kunjung ?>" readonly>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Anamnesis</label>
                                        <input type="text" class="form-control" name="anamnesis" required="required" placeholder="Masukkan anamnesis">
                                    </div>
                                    <div class="form-group">
                                        <label>Diagnosa</label>
                                        <textarea class="form-control" name="diagnosa" required="required"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Tindakan</label>
                                        <input type="text" class="form-control" name="tindakan" required="required" placeholder="Tindakan">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Pemeriksaan Fisik</label>
                                        <input type="text" class="form-control" name="periksa_fisik" required="required" placeholder="Pemeriksaan Fisik">
                                    </div>
                                    <div class="form-group">
                                        <label>Kode ICD X</label>
                                        <input type="text" class="form-control" name="kode_icd_x" required="required" placeholder="Kode ICD X">
                                    </div>
                                    <div class="form-group">
                                        <label>Upload File Hasil Uji Lab</label>
                                        <input type="file" accept="image/*" name="gambar" required="required">
                                    </div>
                                </div>
                            </div>

                            <div class="pull-right">
                                <button type="submit" class="btn btn-primary btn-md">Submit</button>
                        </form>
                        <a href="<?= base_url('pelayanan'); ?>" class="btn btn-danger btn-md">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
</div>
</section>
</div>