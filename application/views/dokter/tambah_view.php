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
                        <form action="<?php echo base_url('dokter/prosesdokter'); ?>" method="POST" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-sm-5">
                                    <div class="form-group">
                                        <label>Nama Dokter</label>
                                        <select id="InputDokter" name="id_login" class="form-control" required>
                                            <option disabled selected style="display: none;" value="">Pilih Dokter</option>
                                                <?php foreach ($datadokter_user as $row):?>
                                                    <option value="<?= $row->id_login?>" ><?= $row->nama?></option>
                                                <?php endforeach; ?>
                                        </select>
                                        <!-- <input type="text" class="form-control" name="nama_dokter" required="required" placeholder="Nama Dokter"> -->
                                    </div>
                                    <div class="form-group">
                                        <label>Poli</label>
                                        <select id="InputPoli" name="id_poli" class="form-control" required>
                                            <option disabled selected style="display: none;" value="">Pilih Poli</option>
                                                <?php foreach ($datapoli as $row):?>
                                                    <option value="<?= $row->id_poli?>" ><?= $row->nama_poli?></option>
                                                <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="pull-right">
                                <input type="hidden" name="tambah" value="tambah">
                                <button type="submit" class="btn btn-primary btn-md">Submit</button>
                        </form>
                        <a href="<?= base_url('dokter'); ?>" class="btn btn-danger btn-md">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
</div>
</section>
</div>