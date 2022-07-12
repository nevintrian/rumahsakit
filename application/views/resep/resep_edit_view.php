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
                        <form action="<?php echo base_url('resep/proses'); ?>" method="POST" enctype="multipart/form-data">
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
                                        <select id="InputPoli" name="nama_obat" value="<?= $resep->id_obat; ?>" class="form-control" required>
                                            <?php foreach ($data_obat as $row) : ?>
                                                <option value="<?= $row->id_obat ?>" <?php if ($row->id_obat == $resep->id_obat) echo 'selected="selected"'; ?>><?php echo $row->nama_obat; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>


                                    <div class="form-group">
                                        <label>Jumlah & Aturan Pakai</label><br>
                                        <input type="number" class="form-control w-25" style="width: 25%; display:inline;" name="jumlah" required="required" placeholder="Jumlah" value="<?= $resep->jumlah ?>">
                                        <input type="text" class="form-control w-75" style="width: 54%; display:inline;" name="aturan_pakai" required="required" placeholder="Aturan Pakai" value="<?= $resep->aturan_pakai ?>">
                                    </div>
                                </div>
                                <div class="text-center">
                                    <input type="hidden" name="edit" value="<?= $resep->kode_resep; ?>">
                                    <button type="submit" class="btn btn-primary btn-md">Update</button>
                                    <a href="<?= base_url('resep'); ?>" class="btn btn-danger btn-md">Kembali</a>
                                </div><br>
                                <br>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>
</div>