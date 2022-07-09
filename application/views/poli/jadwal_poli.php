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
                            <a href="<?= base_url('poli/tambah_jadwal_poli/'); ?>"><button class="btn btn-primary">
                                    <i class="fa fa-plus"> </i> Tambah Jadwal Poli </button></a>
                        <?php } ?>

                        <!-- <div class="container">
                            <form class="form-inline" action="<?= base_url('data1/pencarian1') ?>" method="POST">
                                <div class="form-group">
                                    <label for="focusedInput">Tanggal</label>&emsp;&emsp;&emsp;&nbsp;
                                    <input class="form-control" id="focusedInput" type="date" name="tanggal" required>
                                </div>
                                <p>
                                <div class="form-group">
                                    <label for="focusedInput">Nama Poli</label>&emsp;&emsp;&nbsp;
                                    <select name="poli" class="form-control" required>
                                        <option value="">--Pilih Poli--</option>
                                        <option value="Poli Umum">Poli Umum</option>
                                        <option value="Poli Gigi">Poli Gigi</option>
                                        <option value="Poli Mata">Poli Mata</option>
                                        <option value="Poli Penyakit Dalam">Poli Penyakit Dalam</option>
                                        <option value="Poli Anak">Poli Anak</option>
                                        <option value="Poli THT">Poli THT</option>
                                    </select>
                                </div>
                                <p>
                                <div class="form-group">
                                    <label for="sel1">Nama Dokter</label>&emsp;
                                    <select name="dokter" class="form-control" required>
                                        <option value="">--Pilih Dokter--</option>
                                        <option value="dr. Anik">dr. Anik</option>
                                        <option value="dr. Damayanti">dr. Damayanti</option>
                                        <option value="dr. Rosa">dr. Rosa</option>
                                        <option value="dr. Hasyim">dr. Hasyim</option>
                                        <option value="dr. Giselle">dr. Giselle</option>
                                        <option value="dr. Gufron">dr. Gufron</option>
                                    </select>
                                </div>
                                <p>
                                <p>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary btn-md">Cari</button>
                                </div><br>
                            </form>
                        </div> -->
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <br />
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped table" width="100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Jam Buka</th>
                                        <th>Jam Tutup</th>
                                        <th>Hari</th>
                                        <th>Poli</th>
                                        <th>Nama Dokter</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($jadwal->result_array() as $isi) { ?>
                                        <tr>
                                            <td><?= $no; ?></td>
                                            <td><?= $isi['jam_buka']; ?></td>
                                            <td><?= $isi['jam_tutup']; ?></td>
                                            <td><?= $isi['hari']; ?></td>
                                            <td><?= $isi['nama_poli']; ?></td>
                                            <td><?= $isi['nama_dokter']; ?></td>
                                            <td <?php if ($this->session->userdata('level') == 'Dokter Poliklinik') { ?>style="width:17%;" <?php } ?>>

                                                <a href="<?= base_url('poli/jadwal_poli_edit/' . $isi['no_rm']); ?>"><button class="btn btn-success"><i class="fa fa-edit"></i></button></a>
                                                <a href="<?= base_url('poli/jadwal_poli_proses?no_rm=' . $isi['no_rm']); ?>" onclick="return confirm('Anda yakin akan menghapus data ini ?');">
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
    </section>
</div>