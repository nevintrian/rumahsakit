<?php if (!defined('BASEPATH')) exit('No direct script acess allowed'); ?>
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            <i class="fa fa-edit" style="color:green"> </i> Data Pendaftaran Pasien
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('dashboard'); ?>"><i class="fa fa-dashboard"></i>&nbsp; Dashboard</a></li>
            <li class="active"><i class="fa fa-file-text"></i>&nbsp; Data Pendaftaran Pasien </li>
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
                                        <th>No Antrian</th>
                                        <th>Tanggal Kunjungan</th>
                                        <th>Tanggal Masuk</th>
                                        <th>Jenis Kunjungan</th>
                                        <th>Cara Kunjungan</th>
                                        <th>Jenis Pasien</th>
                                        <th>Tujuan Poli</th>
                                        <th>Nama Dokter</th>
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
                                            <td><?= $isi['no_antrian']; ?></td>
                                            <td><?= $isi['tgl_kunjung']; ?></td>
                                            <td><?= $isi['tgl_masuk']; ?></td>
                                            <td><?= $isi['jns_kunjung']; ?></td>
                                            <td><?= $isi['cara_kunjung']; ?></td>
                                            <td><?= $isi['jns_pasien']; ?></td>
                                            <td><?= $isi['nama_poli']; ?></td>
                                            <td><?= $isi['nama_dokter']; ?></td>
                                            <td <?php if ($this->session->userdata('level') == 'Petugas Pendaftaran') { ?>style="width:20%;" <?php } ?>>

                                                <?php if ($this->session->userdata('level') == 'Petugas Pendaftaran') { ?>
                                                    <a href="<?= base_url('daftar/edit_rj/' . $isi['id_daftar']); ?>"><button class="btn btn-success"><i class="fa fa-edit"></i></button></a>
                                                    <a href="<?= base_url('daftar/prosespx?id_daftar=' . $isi['id_daftar']); ?>" onclick="return confirm('Anda yakin Akan Menghapus Data pendaftaran Ini ?');">
                                                        <button class="btn btn-danger"><i class="fa fa-trash"></i></button></a>
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