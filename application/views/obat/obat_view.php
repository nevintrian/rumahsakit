<?php if (!defined('BASEPATH')) exit('No direct script acess allowed'); ?>
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            <i class="fa fa-edit" style="color:green"> </i> <?= $title_web; ?>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('dashboard'); ?>"><i class="fa fa-dashboard"></i>&nbsp; Dashboard</a></li>
            <li class="active"><i class="fa fa-file-text"></i>&nbsp; <?= $title_web; ?></li>
        </ol>
    </section>
    <section class="content">
        <?php if (!empty($this->session->flashdata())) {
            echo $this->session->flashdata('pesan');
        } ?>
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <?php if (!empty($this->input->get('id'))) { ?>
                                    <h4> Edit Obat</h4>
                                <?php } else { ?>
                                    <h4> Tambah Obat</h4>
                                <?php } ?>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <?php if (!empty($this->input->get('id'))) { ?>
                                    <form method="post" action="<?= base_url('obat/obatproses'); ?>">
                                        <div class="form-group">
                                            <label for="">ID </label>
                                            <input type="text" name="id_obat" value="<?= $obatpasien->id_obat; ?>" class="form-control" name="id_obat" placeholder="ID obat" disabled>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Nama Obat</label>
                                            <input type="text" name="nama_obat" value="<?= $obatpasien->nama_obat; ?>" id="nama_obat" class="form-control" placeholder="Contoh : obat Umum">
                                        </div>
                                        <br />
                                        <input type="hidden" name="edit" value="<?= $obatpasien->id_obat; ?>">
                                        <button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i> Edit obat</button>
                                    </form>
                                <?php } else { ?>

                                    <form method="post" action="<?= base_url('obat/obatproses'); ?>">
                                        <div class="form-group">
                                            <label for="">ID Obat</label>
                                            <input type="text" name="id_obat" id="id_obat" class="form-control" placeholder="ID obat" disabled>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Nama Obat</label>
                                            <input type="text" name="nama_obat" id="nama_obat" class="form-control" placeholder="Contoh : obat Umum">

                                        </div>
                                        <br />
                                        <input type="hidden" name="tambah" value="tambah">
                                        <button type="submit" class="btn btn-primary"> <i class="fa fa-plus"></i> Tambah obat</button>
                                    </form>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="box box-primary">
                            <div class="box-header with-border">
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="table-responsive">
                                    <table id="example1" class="table table-bordered table-striped table" width="100%">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>ID Obat</th>
                                                <th>Nama Obat</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 1;
                                            foreach ($obat->result_array() as $isi) { ?>
                                                <tr>
                                                    <td><?= $no; ?></td>
                                                    <td><?= $isi['id_obat']; ?></td>

                                                    <td><?= $isi['nama_obat']; ?></td>
                                                    <td style="width:20%;">
                                                        <a href="<?= base_url('obat/index?id=' . $isi['id_obat']); ?>"><button class="btn btn-success"><i class="fa fa-edit"></i></button></a>
                                                        <a href="<?= base_url('obat/obatproses?obat_id=' . $isi['id_obat']); ?>" onclick="return confirm('Anda yakin obat ini akan dihapus ?');">
                                                            <button class="btn btn-danger"><i class="fa fa-trash"></i></button></a>
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
        </div>
    </section>
</div>