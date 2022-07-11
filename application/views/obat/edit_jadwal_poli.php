<?php if (!defined('BASEPATH')) exit('No direct script acess allowed'); ?>
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            <i class="fa fa-plus" style="color:green"> </i> <?= $title_web; ?>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('dashboard'); ?>"><i class="fa fa-dashboard"></i>&nbsp; Dashboard</a></li>
            <li class="active"><i class="fa fa-plus"></i>&nbsp; <?= $title_web; ?></li>
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
                        <form action="<?php echo base_url('poli/jadwal_poli_proses'); ?>" method="POST" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-sm-5">
                                    <div class="form-group">
                                        <label>Nama Dokter</label>
                                        <select id="InputDokter" name="id_dokter" class="form-control" required disabled>
                                            <option disabled selected style="display: none;" value="">Pilih Dokter</option>
                                                <?php foreach ($datadokter as $row):?>
                                                    <option value="<?= $row->id_dokter?>" <?php echo set_select('id_dokter', $row->id_dokter, ( !empty($jadwal_poli->id_dokter) && $jadwal_poli->id_dokter == $row->id_dokter ? TRUE : FALSE )); ?>  ><?= $row->nama_dokter?></option>
                                                <?php endforeach; ?>
                                        </select>
                                        <!-- <input type="text" class="form-control" name="nama_dokter" required="required" placeholder="Nama Dokter"> -->
                                    </div>
                                    <div class="form-group">
                                        <label>Pilih Hari</label>
                                        <select id="InputPoli" name="hari" class="form-control" required>
                                            <option disabled selected style="display: none;" value="">Pilih Hari</option>
                                            <option value="Senin" <?php echo set_select('hari','Senin', ( !empty($jadwal_poli->hari) && $jadwal_poli->hari == "Senin" ? TRUE : FALSE )); ?>  >Senin</option>
                                            <option value="Selasa" <?php echo set_select('hari','Selasa', ( !empty($jadwal_poli->hari) && $jadwal_poli->hari == "Selasa" ? TRUE : FALSE )); ?>  >Selasa</option>
                                            <option value="Rabu"  <?php echo set_select('hari','Rabu', ( !empty($jadwal_poli->hari) && $jadwal_poli->hari == "Rabu" ? TRUE : FALSE )); ?> >Rabu</option>
                                            <option value="Kamis"  <?php echo set_select('hari','Kamis', ( !empty($jadwal_poli->hari) && $jadwal_poli->hari == "Kamis" ? TRUE : FALSE )); ?> >Kamis</option>
                                            <option value="Jumat"  <?php echo set_select('hari','Jumat', ( !empty($jadwal_poli->hari) && $jadwal_poli->hari == "Jumat" ? TRUE : FALSE )); ?> >Jum'at</option>
                                            <option value="Sabtu"  <?php echo set_select('hari','Sabtu', ( !empty($jadwal_poli->hari) && $jadwal_poli->hari == "Sabtu" ? TRUE : FALSE )); ?> >Sabtu</option>
                                            <option value="Minggu"  <?php echo set_select('hari','Minggu', ( !empty($jadwal_poli->hari) && $jadwal_poli->hari == "Minggu" ? TRUE : FALSE )); ?> >Minggu</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Pilih Jam Buka</label>
                                        <input type="text" class="form-control timepicker" name="jam_buka" value="<?= $jadwal_poli->jam_buka ?>" required="required" placeholder="">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Pilih Jam Tutup</label>
                                        <input type="text" class="form-control timepicker" name="jam_tutup" value="<?= $jadwal_poli->jam_tutup ?>" required="required" placeholder="">
                                    </div>
                                </div>
                            </div>
                            <div class="pull-right">
                                <input type="hidden" name="edit" value="<?= $jadwal_poli->no_rm; ?>">
                                <button type="submit" class="btn btn-primary btn-md">Submit</button>
                        </form>
                        <a href="<?= base_url('poli/jadwal_poli'); ?>" class="btn btn-danger btn-md">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
</div>
</section>
</div>