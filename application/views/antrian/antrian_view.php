<body id="page-top">

    <!-- Navigation -->



    <!-- Masthead -->
    <header class="masthead bg-primary text-white text-center">
        <div class="container d-flex align-items-center flex-column">

            <!-- Masthead Avatar Image -->


            <!-- Masthead Heading -->
            <h1 class="masthead-heading text-uppercase mb-0"><img class="masthead-avatar mb-5" src="<?php echo base_url('assets_style') ?>/image/klinik.jpg" style="width:50%; justify-content:center" alt=""><br>KLINIK X - RS BAKTI HUSADA</h1>
            <?php if (!empty($this->session->userdata('ses_id'))) { ?>
                <div class="row">
                    <div class="col-md-6" style="border: thin solid; ">
                        <h3>JUMLAH ANTRIAN SAAT INI</h3>
                        <h1 style="margin-top: 5px;"><?php echo $jumlah_antrian; ?></h1>
                    </div>
                    <div class="col-md-6" style="border: thin solid; ">
                        <h3>NO ANTRIAN SAAT INI</h3>
                        <h1 style="margin-top: 5px;"><?php echo $NoAntrian; ?></h1>
                    </div>
                </div>
            <?php } ?>

            <?php if (empty($this->session->userdata('ses_id'))) { ?>
                <div class="col-md-12" style="border: thin solid; ">
                    <h3>JUMLAH ANTRIAN SAAT INI</h3>
                    <h1 style="margin-top: 5px;"><?php echo $jumlah_antrian; ?></h1>
                </div>
            <?php } ?>


            <?php if (!empty($this->session->userdata('ses_id'))) { ?>
                <div class="row" style="margin-top: 60px">
                    <!-- <div class="col-md-3" style="border: thin solid; ">
                        <h3><?php echo $poli_umum; ?></h3>
                        <H6>Poli Umum</H6>
                    </div> -->
                    <div class="col-md-12">
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <a href="<?php echo base_url('antrian/daftar_antrian') ?>"><button class="btn btn-primary">
                                        <i class="fa fa-plus"> </i> Daftar Antrian </button></a>
                            </div>
                        </div>
                    </div>
                </div>

                <table class="table table-stripped">
                    <thead>
                        <tr>
                            <th>Nomor</th>
                            <th>NO RM</th>
                            <th>Nama</th>
                            <th>Jaminan</th>
                            <th>Poli Tujuan</th>
                            <th>Tanggal Kunjungan</th>
                            <th>Nomor Antrian</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        $i = 0;
                        foreach ($daftar_antrian as $data) { ?>
                            <tr>
                                <td><?= ++$i ?></td>
                                <td><?= $data->no_rm; ?></td>
                                <td><?= $data->nama_pasien; ?></td>
                                <td><?= $data->jns_pasien; ?></td>
                                <td><?= $data->nama_poli; ?></td>
                                <td><?= $data->tgl_kunjung; ?></td>
                                <td><?= $data->no_antrian; ?></td>
                                <td> <a href="<?= base_url('antrian/cetak_kartu/' . $data->id_daftar); ?>"><button class="btn btn-success">Cetak Kartu</button></a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>

            <?php } ?>
            <?php if (empty($this->session->userdata('ses_id'))) { ?>
                <h4 class="masthead mb-0" style="margin-top: 10px !important;padding: 20px;">SELAMAT DATANG DI SI KLINIK X - RS BAKTI HUSADA.
                    <br> Jika belum memiliki akun, silakan Registrasi terlebih dahulu.
                </h4>
                <div class="row">
                    <div class="col-md-12">
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <a href="<?php echo base_url('antrian/regis') ?>"><button class="btn btn-primary">
                                        <i class="fa fa-plus"> </i> Registrasi </button></a>
                                <a href="<?php echo base_url('antrian/login_antrian') ?>"><button class="btn btn-primary">
                                        <i class="fa fa-plus"> </i> Login </button></a>
                            <?php } ?>
                            </div>