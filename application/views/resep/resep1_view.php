<?php if (!defined('BASEPATH')) exit('No direct script acess allowed'); ?>
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            <i class="fa fa-plus" style="color:green"> </i> Resep
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



                        <div class="box-body">
                            <div class="table-responsive">
                                <br />
                                <table id="example1" class="table table-bordered table-striped table" width="100%">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>No RM</th>
                                            <th>Nama Pasien</th>
                                            <th>Kode Resep</th>
                                            <th>Nama Obat</th>
                                            <th>Jumlah</th>
                                            <th>Tanggal Resep</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1;
                                        foreach ($resep as $isi) { ?>
                                            <tr>
                                                <td><?= $no; ?></td>
                                                <td><?= $isi['no_rm']; ?></td>
                                                <td><?= $isi['nama_pasien']; ?></td>
                                                <td><?= $isi['kode_resep']; ?></td>
                                                <td><?= $isi['nama_obat']; ?></td>
                                                <td><?= $isi['jumlah']; ?></td>
                                                <td><?= $isi['tgl_resep']; ?></td>
                                                <td style="width:20%;">
                                                    <a href="<?= base_url('resep/edit/' . $isi['kode_resep'] . '/' . $isi['id_daftar']); ?>"><button class="btn btn-success"><i class="fa fa-edit"></i></button></a>
                                                    <a href="<?= base_url('resep/proses?id_daftar=' . $isi['id_daftar']); ?>" onclick="return confirm('Anda yakin Akan Menghapus Data Resep Ini ?');">
                                                        <button class="btn btn-danger"><i class="fa fa-trash"></i></button></a>
                                                    <a href="<?= base_url('resep/detail/' . $isi['kode_resep']); ?>" target="_blank"><button class="btn btn-primary">
                                                            <i class="fa fa-print"></i> Cetak Resep</button></a>
                                                </td>
                                            </tr>
                                        <?php $no++;
                                        } ?>
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