<?php if (!defined('BASEPATH')) exit('No direct script acess allowed'); ?>
<head>
    
    
</head>
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
                        <form method="get" action="<?php echo base_url("data/pencarian_laporan_kunjungan/") ?>">
                            <div class="col-md-2 col-sm-2 col-xs-2" align="center">Laporan Bulan
                                <select class="form-control" name="bulan" id="bulan">
                                    <option value="">Semua</option>
                                    <option value="01" <?php echo set_select('bulan','01', ( !empty($search['bulan']) && $search['bulan'] == "01" ? TRUE : FALSE )); ?> >Januari</option>
                                    <option value="02" <?php echo set_select('bulan','02', ( !empty($search['bulan']) && $search['bulan'] == "02" ? TRUE : FALSE )); ?> >Februari</option>
                                    <option value="03" <?php echo set_select('bulan','03', ( !empty($search['bulan']) && $search['bulan'] == "03" ? TRUE : FALSE )); ?> >Maret</option>
                                    <option value="04" <?php echo set_select('bulan','04', ( !empty($search['bulan']) && $search['bulan'] == "04" ? TRUE : FALSE )); ?> >April</option>
                                    <option value="05" <?php echo set_select('bulan','05', ( !empty($search['bulan']) && $search['bulan'] == "05" ? TRUE : FALSE )); ?> >Mei</option>
                                    <option value="06" <?php echo set_select('bulan','06', ( !empty($search['bulan']) && $search['bulan'] == "06" ? TRUE : FALSE )); ?> >Juni</option>
                                    <option value="07" <?php echo set_select('bulan','07', ( !empty($search['bulan']) && $search['bulan'] == "07" ? TRUE : FALSE )); ?> >Juli</option>
                                    <option value="08" <?php echo set_select('bulan','08', ( !empty($search['bulan']) && $search['bulan'] == "08" ? TRUE : FALSE )); ?> >Agustus</option>
                                    <option value="09" <?php echo set_select('bulan','09', ( !empty($search['bulan']) && $search['bulan'] == "09" ? TRUE : FALSE )); ?> >september</option>
                                    <option value="10" <?php echo set_select('bulan','10', ( !empty($search['bulan']) && $search['bulan'] == "10" ? TRUE : FALSE )); ?> >Oktober</option>
                                    <option value="11" <?php echo set_select('bulan','11', ( !empty($search['bulan']) && $search['bulan'] == "11" ? TRUE : FALSE )); ?> >November</option>
                                    <option value="12" <?php echo set_select('bulan','12', ( !empty($search['bulan']) && $search['bulan'] == "12" ? TRUE : FALSE )); ?> >Desember</option>
                                </select>
                            </div>
                            <div class="col-md-2 col-sm-2 col-xs-2" align="center">Laporan Tahun
                                <input type="text" class="yearpicker form-control" name="tahun" value="<?= $search['tahun'] ?>" required>
                            </div>

                            <div class="col-md-2 col-sm-2 col-xs-2" align="center">Jenis Pasien
                                <select class="form-control" name="jns_pasien">
                                    <option value="">Semua</option>
                                    <?php foreach($jenis_pasien as $jp) : ?>
                                        <option value="<?= $jp->id_jns_pasien ?>" <?php echo set_select('jns_pasien', $jp->id_jns_pasien, ( !empty($search['j_pasien']) && $search['j_pasien'] == $jp->id_jns_pasien ? TRUE : FALSE )); ?> ><?= $jp->jns_pasien ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="col-md-2 col-sm-2 col-xs-2" align="center">Kunjungan
                                <select class="form-control" name="kunjungan">
                                    <option value="">Semua</option>
                                    <option value="Baru" <?php echo set_select('kunjungan','Baru', ( !empty($search['kunjung']) && $search['kunjung'] == "Baru" ? TRUE : FALSE )); ?> >Baru</option>
                                    <option value="Lama" <?php echo set_select('kunjungan','Lama', ( !empty($search['kunjung']) && $search['kunjung'] == "Lama" ? TRUE : FALSE )); ?> >Lama</option>
                                </select>
                            </div>
                            <div class="col-md-2 col-sm-2 col-xs-2" align="left">
                                <br><input type="submit" class="btn btn-warning" value="Cari">
                            </div>
                            <div class="col-md-2 col-sm-2 col-xs-2" align="right">
                                <br><a href="<?php echo base_url("data/cetak_all_laporan_kunjungan?bulan=".$search['bulan'].'&tahun='.$search['tahun'].'&j_pasien='.$search['j_pasien'].'&kunjung='.$search['kunjung']) ?>" type="button" class="btn btn-primary">Cetak</a>
                            </div>
                        </form>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <br />
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped table" width="100%">
                                <thead>
                                    <tr>
                                        <th>No RM</th>
                                        <th>Nama Pasien</th>
                                        <th>Jenis Pasien</th>
                                        <th>Kunjungan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($kunjungan as $isi) { ?>
                                        <tr>
                                            <td><?= $isi->no_rm; ?></td>
                                            <td><?= $isi->nama_pasien; ?></td>
                                            <td><?= $isi->jns_pasien; ?></td>
                                            <td><?= $isi->jns_kunjung; ?></td>
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