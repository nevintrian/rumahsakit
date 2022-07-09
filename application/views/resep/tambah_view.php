<?php if (!defined('BASEPATH')) exit('No direct script acess allowed'); ?>
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            <i class="fa fa-plus" style="color:green"> </i> Tambah Resep
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('dashboard'); ?>"><i class="fa fa-dashboard"></i>&nbsp; Dashboard</a></li>
            <li class="active"><i class="fa fa-plus"></i>&nbsp; Tambah Resep</li>
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
                        <form action="<?php echo base_url('resep/add'); ?>" method="POST" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>No RM</label>
                                        <input type="text" class="form-control" name="nama" required="required" placeholder="No RM" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label>Nama Pasien</label>
                                        <input type="text" class="form-control" name="nama" required="required" placeholder="Nama Pengguna" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label>No Resep</label>
                                        <input type="text" class="form-control" name="lahir" required="required" placeholder="No Resep">
                                    </div>
                                    <div class="form-group">
                                        <label>Kategori</label>
                                        <select name="level" class="form-control" required="required">
                                            <option value="">--Pilih Kategori--</option>
                                            <?php foreach ($kategori as $keyKat ) {?>
                                            <option value="<?=$keyKat['id_kategori']?>"><?=$keyKat['nama_kategori']?></option>
                                            <?php }?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Nama Obat</label>
                                        <select name="level" class="form-control" required="required">
                                            <option value="">--Pilih Obat--</option>
                                            <option value="id-obat1">Obat 1</option>
                                            <option value="id-obat2">Obat 2</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Jumlah & Aturan Pakai</label><br>
                                        <input type="number" class="form-control w-25" style="width: 25%; display:inline;" name="user" required="required" placeholder="Jumlah">
                                        <input type="text" class="form-control w-75" style="width: 54%; display:inline;" name="user" required="required" placeholder="Aturan Pakai">
                                        <button type="button" style="width: 20%;" class="btn btn-primary btn-md"><i class="fa fa-plus mr-2"></i>  Tambah</button>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Tanggal Resep</label>
                                        <input type="date" value="<?= date('Y-m-d')?>" readonly class="form-control" name="tanggal" required="required" placeholder="Tanggal Resep">
                                    </div>
                                    <div class="form-group">
                                        <label>Poli</label>
                                        <select name="level" class="form-control" required="required">
                                            <option value="">--Pilih Poli--</option>
                                            <option value="id-Poli1">Poli 1</option>
                                            <option value="id-Poli2">Poli 2</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Nama Dokter</label>
                                        <select name="level" class="form-control" required="required">
                                            <option value="">--Pilih Dokter--</option>
                                            <option value="id-Dokter1">Dokter 1</option>
                                            <option value="id-Dokter2">Dokter 2</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary btn-md">Simpan</button>
                                <a href="<?= base_url('resep'); ?>" class="btn btn-danger btn-md">Kembali</a>
                            </div><br>
                        </form>
                        <div class="table-responsive mt-3">
                        <br/>
                        <table id="example1" class="table table-bordered table-striped table" width="100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kode</th>
                                    <th>Nama Obat</th>
                                    <th>Jumlah</th>
                                    <th>Aturan Pakai</th>
                                    <th>Hapus</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1.</td>
                                    <td>OBT001</td>
                                    <td>Paramex</td>
                                    <td>3 Tablet</td>
                                    <td>2x1 Hari</td>
                                    <td style="width:20%;">
                                        <a href="<?= base_url('resep/obat_del/');?>" onclick="return confirm('Anda yakin obat akan dihapus ?');">
                                        <button class="btn btn-danger"><i class="fa fa-trash"></i></button></a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    </div>
                </div>
            </div>
        </div>
</div>
</section>
</div>