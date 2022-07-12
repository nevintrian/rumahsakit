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
                                    <h4> Edit Jenis Pasien</h4>
                                <?php } else { ?>
                                    <h4> Tambah Jenis Pasien</h4>
                                <?php } ?>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <?php if (!empty($this->input->get('id'))) { ?>
                                    <form method="post" action="<?= base_url('pasien/jenis_pasien_proses'); ?>">
                                        <div class="form-group">
                                            <label for="">Jenis Pasien</label>
                                            <input type="text" name="jns_pasien" value="<?= $datajnspasien->jns_pasien; ?>" id="kunjung" class="form-control" placeholder="Contoh : BPJS">
                                        </div>
                                        <br />
                                        <input type="hidden" name="edit" value="<?= $datajnspasien->id_jns_pasien; ?>">
                                        <button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i>Edit Jenis Pasien</button>
                                    </form>
                                <?php } else { ?>

                                    <form method="post" action="<?= base_url('pasien/jenis_pasien_proses'); ?>">
                                        <div class="form-group">
                                            <label for="">Jenis Pasien</label>
                                            <input type="text" name="jns_pasien" id="kunjung" required class="form-control" placeholder="Contoh : BPJS">
                                        </div>
                                        <br />
                                        <input type="hidden" name="tambah" value="tambah">
                                        <button type="submit" class="btn btn-primary"> <i class="fa fa-plus"></i> Tambah Jenis Pasien</button>
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
                                                <th>Jenis Pasien</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 1;
                                            foreach ($jnspasien->result_array() as $isi) { ?>
                                                <tr>
                                                    <td><?= $no; ?></td>
                                                    <td><?= $isi['jns_pasien']; ?></td>
                                                    <td style="width:20%;">
                                                        <a href="<?= base_url('pasien/jenis_pasien?id=' . $isi['id_jns_pasien']); ?>"><button class="btn btn-success"><i class="fa fa-edit"></i></button></a>
                                                        <a href="<?= base_url('pasien/jenis_pasien_proses?jenis_id=' . $isi['id_jns_pasien']); ?>" onclick="return confirm('Anda yakin akan menghapus jenis pasien?');">
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