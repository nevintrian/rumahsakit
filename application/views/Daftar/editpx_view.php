<?php if (!defined('BASEPATH')) exit('No direct script acess allowed'); ?>
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            <i class="fa fa-plus" style="color:green"> </i> <?= $title_web; ?>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('dashboard'); ?>"><i class="fa fa-dashboard"></i>&nbsp; Dashboard</a></li>
            <li class="active"><i class="fa fa-plus"></i>&nbsp; <?= $title_web; ?></li>
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
                        <form action="<?php echo base_url('daftar/prosespx'); ?>" method="POST" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-sm-5">
                                    <div class="form-group">
                                        <label>No Rekam Medis</label>
                                        <input type="text" class="form-control" name="no_rm" disabled value="<?= $rm_pasien->no_rm; ?>" required="required" placeholder="No Rekam Medis">
                                    </div>
                                    <div class="form-group">
                                        <label>Jenis Pasien</label>
                                        <select name="jns_pasien" class="form-control" required="required">
                                        <option <?php if ($rm_pasien->jns_pasien == 'Umum') {
                                                                                echo 'selected';
                                                                            } ?> value='umum' > Umum </option>";
                                        <option <?php if ($rm_pasien->jns_pasien == 'BPJS') {
                                                                                echo 'selected';
                                                                            } ?> value='BPJS' > BPJS </option>";   
                                        <option <?php if ($rm_pasien->jns_pasien == 'JKN') {
                                                                                echo 'selected';
                                                                            } ?> value='JKN' > JKN </option>"; 
                                        <option  <?php if ($rm_pasien->jns_pasien == 'KIS') {
                                                                                echo 'selected';
                                                                            } ?> value='KIS' >KIS</option>"; 
                                        <option <?php if ($rm_pasien->jns_pasien == 'Asuransi Swasta') {
                                                                                echo 'selected';
                                                                            } ?> value='Asuransi Swasta' > Asuransi Swasta </option>";                                    
                                        <option <?php if ($rm_pasien->jns_pasien == 'Asuransi Lain') {
                                                                                echo 'selected';
                                                                            } ?> value='Asuransi Lain' > Asuransi Lain </option>"; 
                                        }
                                        
                                        </select>
                                            
                                    </div>
                                        
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-5">
                                    <div class="form-group">
                                        <label>Tanggal Masuk </label>
                                        <input type="date" class="form-control" name="tgl_masuk" value="<?= $rm_pasien->tgl_masuk; ?>" required="required" placeholder="1999-05-12">
                                    </div>
                                    <div class="form-group">
                                        <label>Tanggal Kunjungan </label>
                                        <input type="date" class="form-control" name="tgl_kunjungan" value="<?= $rm_pasien->tgl_masuk; ?>" required="required" placeholder="1999-05-12">
                                    </div>
                                    <div class="form-group">
                                        <label>Jenis kunjungan</label>
                                        <select name="jns_kunjung" class="form-control" required="required" >
                                        <option <?php if ($rm_pasien->jns_kunjung == 'Lama') {
                                                                                echo 'selected';
                                                                            } ?> value='Lama' >Lama</option>";
                                        <option <?php if ($rm_pasien->jns_kunjung == 'Baru') {
                                                                                echo 'selected';
                                                                            } ?> value='Baru' > Baru </option>"; 
                                        
                                        </select>
                                    </div>

                                   <div class="form-group">
                                        <label>Cara Kunjungan</label>
                                        <select name="cara_kunjung" class="form-control" required="required">
                                            
                                            <option <?php if ($rm_pasien->cara_kunjung == 'Datang Sendiri') {
                                                                                echo 'selected';
                                                                            } ?> value='Datang Sendiri'> Datang Sendiri </option>
                                            <option <?php if ($rm_pasien->cara_kunjung == 'Rujukan Dari Klinik Lain') {
                                                                                echo 'selected';
                                                                            } ?> value="Rujukan Dari Klinik Lain"> Rujukan dari Klinik Lain </option>
                                            <option <?php if ($rm_pasien->cara_kunjung == 'Rujukan Dari Dokter') {
                                                                                echo 'selected';
                                                                            } ?> value="Rujukan Dari Dokter"> Rujukan dari Dokter </option>
                                            <option <?php if ($rm_pasien->cara_kunjung == 'Rujukan Dari Bidan') {
                                                                                echo 'selected';
                                                                            } ?> value="Rujukan Dari Bidan"> Rujukan dari Bidan </option>
                                            
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Tujuan Poli</label>
                                        <select name="ke_poli" class="form-control" required="required">
                                            
                                            <option <?php if ($rm_pasien->ke_poli == 'Poli Umum') {
                                                                            echo 'selected';
                                                                            } ?> value="Poli Umum"> Poli Umum </option>
                                            <option <?php if ($rm_pasien->ke_poli == 'Poli Gigi') {
                                                                            echo 'selected';
                                                                            } ?> value="Poli Gigi"> Poli Gigi </option>
                                            <option <?php if ($rm_pasien->ke_poli == 'Poli KIA') {
                                                                            echo 'selected';
                                                                            } ?> value="Poli KIA"> Poli KIA </option>
                                            <option <?php if ($rm_pasien->ke_poli == 'Poli Vaksin') {
                                                                            echo 'selected';
                                                                            } ?> value="Poli Vaksin"> Poli Vaksin </option>
                                            <option <?php if ($rm_pasien->ke_poli == 'Poli Gizi') {
                                                                            echo 'selected';
                                                                            } ?>value="Poli Gizi">Poli Gizi</option>
                                            <option <?php if ($rm_pasien->ke_poli == 'Poli Rawat Luka') {
                                                                            echo 'selected';
                                                                            } ?>value="Poli Rawat Luka">Poli Rawat Luka</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Nama Dokter</label>
                                        <select name="nama_dokter" class="form-control" required="required">
                                            
                                            <option>drg. Bahgianto</option>
                                            <option <?php if ($rm_pasien->nama_dokter == 'dr. Putri Sukmadewi') {
                                                                                echo 'selected';
                                                                            } ?> value="dr. Putri Sukmadewi">dr. Putri Sukmadewi</option>
                                            <option <?php if ($rm_pasien->nama_dokter == 'dr. Adipati') {
                                                                                echo 'selected';
                                                                            } ?> value="dr. Adipati"> dr. Adipati </option>
                                            <option <?php if ($rm_pasien->nama_dokter == 'dr. Agustinus Purwadi') {
                                                                                echo 'selected';
                                                                            } ?> value="dr. Agustinus Purwadi"> dr. Agustinus Purwadi </option>
                                            <option <?php if ($rm_pasien->nama_dokter == 'Irma Irnawati, AmG') {
                                                                                echo 'selected';
                                                                            } ?> value="Irma Irnawati, AmG">Irma Irnawati, AmG</option>
                                            <option <?php if ($rm_pasien->nama_dokter == 'Sriwulandari, AmG') {
                                                                                echo 'selected';
                                                                            } ?> value="Sriwulandari, AmG">Sriwulandari, AmG</option>
                                        </select>
                                    </div>
                                   
                                </div>
                            </div>
                    </div>
                    <div class="pull-right">
                        <button type="submit" class="btn btn-primary btn-md">Edit Data</button>
                        </form>
                        <?php if ($this->session->userdata('level') == 'Petugas RM') { ?>
                            <a href="<?= base_url('data'); ?>" class="btn btn-danger btn-md">Kembali</a>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
</div>
</section>
</div>