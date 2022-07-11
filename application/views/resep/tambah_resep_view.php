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
                        <form action="<?php echo base_url('resep/add_resep'); ?>" method="POST" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>No RM</label>
                                        <input type="text" class="form-control" name="no_rm" required="required" placeholder="No RM" value="<?= $detailrm->no_rm ?>" readonly>
                                        <input type="hidden" class="form-control" name="id_daftar" required="required" placeholder="No RM" value="<?= $detailrm->id_daftar ?>" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label>Nama Pasien</label>
                                        <input type="text" class="form-control" name="nama_pasien" required="required" placeholder="" value="<?= $detailrm->nama_pasien ?>" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label>Tanggal Resep</label>
                                        <input type="date" value="<?= date('Y-m-d') ?>" readonly class="form-control" name="tgl_resep" required="required" placeholder="Tanggal Resep">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <!-- <div class="form-group">
                                        <label>Kode Resep</label>
                                        <input type="text" class="form-control" name="kode_resep" required="required" placeholder="Kode Resep">
                                    </div> -->
                                    <div class="form-group">
                                        <label>Nama Obat</label>
                                        <select id="nama_obat" name="nama_obat" class="form-control" required>
                                            <option disabled selected style="display: none;" value="">--Pilih Nama Obat--</option>
                                            <?php foreach ($data_obat as $row) : ?>
                                                <option value="<?= $row->id_obat ?>"><?= $row->nama_obat ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Jumlah & Aturan Pakai</label><br>
                                        <input type="number" class="form-control w-25" style="width: 25%; display:inline;" name="jumlah" required="required" placeholder="Jumlah">
                                        <input type="text" class="form-control w-75" style="width: 54%; display:inline;" name="aturan_pakai" required="required" placeholder="Aturan Pakai">
                                    </div>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary btn-md">Simpan</button>
                                    <a href="<?= base_url('pelayanan'); ?>" class="btn btn-danger btn-md">Kembali</a>
                                </div><br>
                                <br>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>
</div>