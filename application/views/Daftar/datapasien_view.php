<?php if (!defined('BASEPATH')) exit('No direct script acess allowed'); ?>
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            <i class="fa fa-edit" style="color:green"> </i> Pendaftaran Pasien
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('dashboard'); ?>"><i class="fa fa-dashboard"></i>&nbsp; Dashboard</a></li>
            <li class="active"><i class="fa fa-file-text"></i>&nbsp; Pendaftaran Pasien </li>
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
                        <a href="daftar/tambah"><button class="btn btn-primary"><i class="fa fa-plus"> </i> Tambah Pasien</button></a>

                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <br />
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped table" width="100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>No RM</th>
                                        <th>Nama Pasien</th>
                                        <th>Alamat</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Tanggal Lahir</th>
                                        <th>Agama</th>
                                        <th>Pekerjaan</th>
                                        <th>No Telepon</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($rmpasien->result_array() as $isi) { ?>
                                        <tr>
                                            <td><?= $no; ?></td>
                                            <td><?= $isi['no_rm']; ?></td>
                                            <td><?= $isi['nama_pasien']; ?></td>
                                            <td><?= $isi['alamat']; ?></td>
                                            <td><?= $isi['j_kel']; ?></td>
                                            <td><?= $isi['tgl_lahir']; ?></td>
                                            <td><?= $isi['agama']; ?></td>
                                            <td><?= $isi['pekerjaan']; ?></td>
                                            <td><?= $isi['no_telp']; ?></td>
                                            <td <?php if ($this->session->userdata('level') == 'Kepala Rekam Medik') { ?>style="width:17%;" <?php } ?>>

                                                <?php if ($this->session->userdata('level') == 'Kepala Rekam Medik') { ?>
                                                    <a href="<?= base_url('daftar/daftarpx/' . $isi['no_rm']); ?>"><button class="btn btn-primary">
                                                            <i class="fa fa-pencil-square"> </i> Daftar Pasien </button></a>
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