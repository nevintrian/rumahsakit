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
                        <form action="<?php echo base_url('pasien/prosesrm'); ?>" method="POST" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-sm-5">
                                    <div class="form-group">
                                        <label>No Identitas</label>
                                        <input type="text" class="form-control" name="no_identitas" required="required" placeholder="No Identitas">
                                    </div>
                                    <div class="form-group">
                                        <label>Nama Pasien</label>
                                        <input type="text" class="form-control" name="nama_pasien" required="required" placeholder="Nama Pasien">
                                    </div>
                                    <div class="form-group">
                                        <label>Alamat</label>
                                        <textarea class="form-control" name="alamat" required="required"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Jenis Kelamin</label>
                                        <br />
                                        <input type="radio" name="j_kel" value="Laki-Laki" required="required"> Laki-Laki
                                        &nbsp;&nbsp;&nbsp;
                                        <input type="radio" name="j_kel" value="Perempuan" required="required"> Perempuan
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-5">
                                    <div class="form-group">
                                        <label>Tanggal Lahir </label>
                                        <input type="date" class="form-control" name="tgl_lahir" required="required" placeholder="1999-05-12">
                                    </div>
                                    <div class="form-group">
                                        <label>Agama</label>
                                        <select name="agama" class="form-control" required="required">
                                            <option disabled selected style="display: none">--Pilih Agama--</option>
                                            <option>Islam</option>
                                            <option>Kristen</option>
                                            <option>Hindu</option>
                                            <option>Budha</option>
                                            <option>Katholik</option>

                                        </select>

                                    </div>
                                    <div class="form-group">
                                        <label>Pekerjaan</label>
                                        <input type="Text" class="form-control" name="pekerjaan" required="required" placeholder="Pekerjaan">
                                    </div>
                                    <div class="form-group">
                                        <label>No Telepon</label>
                                        <input type="Text" class="form-control" name="no_telp" required="required" placeholder="08x-xxx-xxx-xxx">
                                    </div>
                                </div>
                            </div>
                            <div class="pull-right">
                                <input type="hidden" name="tambah" value="tambah">
                                <button type="submit" class="btn btn-primary btn-md">Submit</button>
                        </form>
                        <a href="<?= base_url('pasien'); ?>" class="btn btn-danger btn-md">Kembali</a>
                    </div>
                </div>

            </div>
        </div>
</div>
</div>
</section>
</div>