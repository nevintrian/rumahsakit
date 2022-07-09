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
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <?php if ($this->session->userdata('level') == 'Kepala Rekam Medik') { ?>
                            <a href="dokter/tambahdokter"><button class="btn btn-primary">
                                    <i class="fa fa-plus"> </i> Tambah Data Dokter </button></a>
                        <?php } ?>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <br />
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped table" width="100%">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama Dokter</th>
                                        <th>Poli</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($datadokter->result_array() as $isi) { ?>
                                        <tr>
                                            <td><?= $no; ?></td>
                                            <td><?= $isi['nama_dokter']; ?></td>
                                            <td><?= $isi['nama_poli']; ?></td>

                                            <td <?php if ($this->session->userdata('level') == 'Kepala Rekam Medik') { ?>style="width:17%;" <?php } ?>>

                                                <?php if ($this->session->userdata('level') == 'Kepala Rekam Medik') { ?>
                                                    <a href="<?= base_url('dokter/editdokter/' . $isi['id_dokter']); ?>"><button class="btn btn-success"><i class="fa fa-edit"></i></button></a>
                                                    <a href="<?= base_url('dokter/prosesdokter?id_dokter=' . $isi['id_dokter']); ?>" onclick="return confirm('Anda yakin Akan Menghapus Data Ini ?');">
                                                        <button class="btn btn-danger"><i class="fa fa-trash"></i></button></a>
                                                    <a href="<?= base_url('dokter/print_kartu_dokter/' . $isi['id_dokter']); ?>" target="_blank"><button class="btn btn-primary">
                                                            <i class="fa fa-print"></i> Cetak Kartu Dokter</button></a>
                                                <?php } ?>
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
    </section>
</div>