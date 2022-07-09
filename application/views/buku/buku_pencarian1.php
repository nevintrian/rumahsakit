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


                        <div class="container">
                            <form class="form-inline" action="<?= base_url('data1/pencarian1') ?>" method="POST">
                                <div class="form-group">
                                    <label for="focusedInput">Tanggal</label>&emsp;&emsp;&emsp;&nbsp;
                                    <input value="<?= $tanggal != '' ? $tanggal : '' ?>" class="form-control" id="focusedInput" type="date" name="tanggal" required>
                                </div>
                                <p>
                                <div class="form-group">
                                    <label for="focusedInput">Nama Poli</label>&emsp;&emsp;&nbsp;
                                    <select name="poli" class="form-control" required>
                                        <option value="">--Pilih Poli--</option>
                                        <option value="Poli Umum" <?= $poli == 'Poli Umum' ? 'selected' : '' ?>>Poli Umum</option>
                                        <option value="Poli Gigi" <?= $poli == 'Poli Gigi' ? 'selected' : '' ?>>Poli Gigi</option>
                                        <option value="Poli Mata" <?= $poli == 'Poli Mata' ? 'selected' : '' ?>>Poli Mata</option>
                                        <option value="Poli Penyakit Dalam" <?= $poli == 'Poli Penyakit Dalam' ? 'selected' : '' ?>>Poli Penyakit Dalam</option>
                                        <option value="Poli Anak" <?= $poli == 'Poli Anak' ? 'selected' : '' ?>>Poli Anak</option>
                                        <option value="Poli THT" <?= $poli == 'Poli THT' ? 'selected' : '' ?>>Poli THT</option>
                                    </select>
                                </div>
                                <p>
                                <div class="form-group">
                                    <label for="sel1">Nama Dokter</label>&emsp;
                                    <select name="dokter" class="form-control" required="required">
                                        <option value="">--Pilih Dokter--</option>
                                        <option value="dr. Anik" <?= $dokter == 'dr. Anik' ? 'selected' : '' ?>>dr. Anik</option>
                                        <option value="dr. Damayanti" <?= $dokter == 'dr. Damayanti' ? 'selected' : '' ?>>dr. Damayanti</option>
                                        <option value="dr. Rosa" <?= $dokter == 'dr. Rosa' ? 'selected' : '' ?>>dr. Rosa</option>
                                        <option value="dr. Hasyim" <?= $dokter == 'dr. Hasyim' ? 'selected' : '' ?>>dr. Hasyim</option>
                                        <option value="dr. Giselle" <?= $dokter == 'dr. Giselle' ? 'selected' : '' ?>>dr. Giselle</option>
                                        <option value="dr. Gufron" <?= $dokter == 'dr. Gufron' ? 'selected' : '' ?>>dr. Gufron</option>
                                    </select>
                                </div>
                                <p>
                                <p>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary btn-md">Cari</button>
                                    <a target="_blank" href="<?= base_url('data1/cetak1/' . $tanggal . '/' . $poli . '/' . $dokter); ?>" class="btn btn-danger btn-md">Cetak</a>
                                    <a href="<?= base_url('data1'); ?>" class="btn btn-success btn-md">Kembali</a>
                                </div><br>
                            </form>
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
                                            <th>Tanggal</th>
                                            <th>Hari</th>
                                            <th>Nama Poli</th>
                                            <th>Nama Dokter</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1;
                                        foreach ($jadwal->result_array() as $isi) { ?>
                                            <tr>
                                                <td><?= $no; ?></td>
                                                <td><?= $isi['no_rm']; ?></td>
                                                <td><?= $isi['tanggal']; ?></td>
                                                <td><?= $isi['hari']; ?></td>
                                                <td><?= $isi['nama_poli']; ?></td>
                                                <td><?= $isi['nama_dokter']; ?></td>
                                                <td <?php if ($this->session->userdata('level') == 'Dokter Poliklinik') { ?>style="width:17%;" <?php } ?>>

                                                    <?php if ($this->session->userdata('level') == 'Dokter Poliklinik') { ?>
                                                        <a href="<?= base_url('data1/bukuedit1/' . $isi['no_rm']); ?>"><button class="btn btn-success"><i class="fa fa-edit"></i></button></a>
                                                        <a href="<?= base_url('data1/bukudetail1/' . $isi['no_rm']); ?>">
                                                            <button class="btn btn-primary"><i class="fa fa-sign-in"></i> Detail</button></a>
                                                        <a href="<?= base_url('data1/prosesbuku1?no_rm=' . $isi['no_rm']); ?>" onclick="return confirm('Anda yakin akan menghapus data ini ?');">
                                                            <button class="btn btn-danger"><i class="fa fa-trash"></i></button></a>
                                                    <?php } else { ?>
                                                        <a href="<?= base_url('data1/bukudetail1/' . $isi['no_rm']); ?>">
                                                            <button class="btn btn-primary"><i class="fa fa-sign-in"></i> Detail</button></a>
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