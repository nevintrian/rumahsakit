<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<?php if ($this->session->userdata('level') == 'Petugas RM') {
  redirect(base_url('transaksi'));
} ?>
<!-- Content Wrapper. Contains page content -->
<!-- Content Header (Page header) -->
<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Dashboard <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Dashboard</li>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-sm-12">
        <div class="col-lg-4 col-xs-8">
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?= $jumlah_antrian->JumlahAntrian; ?></h3>

              <p>Total Antrian</p>
            </div>
            <div class="icon">
              <i class="fa fa-edit"></i>
            </div>
            <!-- <a href="user" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> -->
          </div>
        </div>

        <div class="col-lg-4 col-xs-8">
          <!--small box-->
          <div class="small-box bg-blue">
            <div class="inner">
              <h3><?= $jumlah_kunjungan->JumlahKunjungan; ?></h3>

              <p>Jumlah Kunjungan</p>
            </div>
            <div class="icon">
              <i class="fa fa-book"></i>
            </div>
            <!-- <a href="data" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> -->
          </div>
        </div>

        <div class="col-lg-4 col-xs-8">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?= $NoAntrian; ?></h3>

              <p>No Antrian Saat Ini</p>
            </div>
            <div class="icon">
              <i class="fa fa-user-plus"></i>
            </div>
            <!-- <a href="transaksi" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> -->
          </div>
        </div>




      </div>
    </div>
  </section>
</div>
<!-- /.content -->