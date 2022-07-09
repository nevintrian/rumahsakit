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
                        <form action="<?php echo base_url('data1/prosesbuku1'); ?>" method="POST" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-sm-5">
                                    <div class="form-group">
                                        <label>No RM</label>
                                        <input type="text" class="form-control" name="no_rm" required="required" placeholder="No Rekam Medis">
                                    </div>
                                    <div class="form-group">
                                        <label>Tanggal Lahir</label>
                                        <input type="date" class="form-control" name="tanggal" required="required" placeholder="Tanggal Lahir">
                                    </div>
                                    <div class="form-group">
                                        <label> Hari</label>
                                        <input type="text" class="form-control" name="hari" required="required" placeholder="Hari">
                                    </div>
                                    <div class="form-group">
                                        <label>Nama Poli</label>
                                        <select name="level" class="form-control" required="required">
                                            <option value="">--Pilih Poli--</option>
                                            <option value="id-Poli1">Poli Umum</option>
                                            <option value="id-Poli2">Poli Gigi</option>
                                            <option value="id-Poli2">Poli Mata</option>
                                            <option value="id-Poli2">Poli Penyakit Dalam</option>
                                            <option value="id-Poli2">Poli Anak</option>
                                            <option value="id-Poli2">Poli THT</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Nama Dokter</label>
                                        <input type="text" class="form-control" name="nama_dokter" required="required" placeholder="Nama Dokter">
                                    </div>
                                </div>
                            </div>
                            <div class="pull-right">
                                <input type="hidden" name="tambah" value="tambah">
                                <button type="submit" class="btn btn-primary btn-md">Submit</button>
                        </form>
                        <a href="<?= base_url('data1'); ?>" class="btn btn-danger btn-md">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
</div>
</section>
</div>