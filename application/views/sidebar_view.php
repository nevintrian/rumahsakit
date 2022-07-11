<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <?php
                $d = $this->db->query("SELECT * FROM tbl_login WHERE id_login='$idbo'")->row();
                if (isset($d->foto)) {
                ?>
                    <br />
                    <img src="<?php echo base_url(); ?>assets_style/image/<?php echo $d->foto; ?>" alt="#" c lass="user-image" style="border:2px solid #fff;height:auto;width:100%;" />
                <?php } else { ?>
                    <!--<img src="" alt="#" class="user-image" style="border:2px solid #fff;"/>-->
                    <i class="fa fa-user fa-4x" style="color:#fff;"></i>
                <?php } ?>
            </div>
            <div class="pull-left info" style="margin-top: 5px;">
                <p><?php echo $d->nama; ?></p>
                <p><?= $d->level; ?>
                </p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
            <br />
            <br />
            <br />
            <br />
        </div>
        <ul class="sidebar-menu" data-widget="tree">


            <?php if ($this->session->userdata('level') == 'Kepala Rekam Medik') { ?>
                <!-- sidebar menu: : style can be found in sidebar.less -->

                <li class="<?php if ($this->uri->uri_string() == 'dashboard') {
                                echo 'active';
                            } ?>">
                    <a href="<?php echo base_url('dashboard'); ?>">
                        <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                    </a>
                </li>

                <li class="treeview <?php if ($this->uri->uri_string() == 'user') {
                                        echo 'active';
                                    } ?>
                
                <?php if ($this->uri->uri_string() == 'pasien') {
                    echo 'active';
                } ?>
                <?php if ($this->uri->uri_string() == 'pasien/jenis_pasien') {
                    echo 'active';
                } ?>
                <?php if ($this->uri->uri_string() == 'poli') {
                    echo 'active';
                } ?>
                <?php if ($this->uri->uri_string() == 'kunjung') {
                    echo 'active';
                } ?>
                <?php if ($this->uri->uri_string() == 'dokter') {
                    echo 'active';
                } ?>
                <?php if ($this->uri->uri_string() == 'poli/jadwal_poli') {
                    echo 'active';
                } ?>">
                    <!-- akhir koding yakk -->

                    <a href="#">
                        <i class="fa fa-pencil-square"></i>
                        <span>Data Master</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class=" <?php if ($this->uri->uri_string() == 'user') {
                                        echo 'active';
                                    } ?>
                        <?php if ($this->uri->uri_string() == 'user/tambah') {
                            echo 'active';
                        } ?>
                        <?php if ($this->uri->uri_string() == 'user/userdetail/' . $this->uri->segment('3')) {
                            echo 'active';
                        } ?>
                        <?php if ($this->uri->uri_string() == 'user/edit/' . $this->uri->segment('3')) {
                            echo 'active';
                        } ?>">
                            <a href="<?php echo base_url("user"); ?>" class="cursor">
                                <span class="fa fa-user"></span> Data user
                            </a>

                        </li>
                        <li class="<?php if ($this->uri->uri_string() == 'pasien') {
                                        echo 'active';
                                    } ?>
                        <?php if ($this->uri->uri_string() == 'pasien') {
                            echo 'active';
                        } ?>
                        <?php if ($this->uri->uri_string() == 'pasien/pasiendetail/' . $this->uri->segment('3')) {
                            echo 'active';
                        } ?>
                        <?php if ($this->uri->uri_string() == 'pasien/pasienedit/' . $this->uri->segment('3')) {
                            echo 'active';
                        } ?>">
                            <a href="<?php echo base_url("pasien"); ?>" class="cursor">
                                <span class="fa fa-book"></span> Data Pasien

                            </a>
                        </li>
                        <li class=" <?php if ($this->uri->uri_string() == 'pasien/jenis_pasien') {
                                        echo 'active';
                                    } ?>">
                            <a href="<?php echo base_url("pasien/jenis_pasien"); ?>" class="cursor">
                                <span class="fa fa-list"></span> Data Jenis Pasien

                            </a>
                        </li>
                        <li class=" <?php if ($this->uri->uri_string() == 'poli') {
                                        echo 'active';
                                    } ?>">
                            <a href="<?php echo base_url("poli"); ?>" class="cursor">
                                <span class="fa fa-tags"></span> Data Poli

                            </a>
                        </li>
                        <li class=" <?php if ($this->uri->uri_string() == 'kunjung') {
                                        echo 'active';
                                    } ?>">
                            <a href="<?php echo base_url("kunjung"); ?>" class="cursor">
                                <span class="fa fa-list"></span> Data Kunjungan
                            </a>
                        </li>
                        <li class="<?php if ($this->uri->uri_string() == 'dokter') {
                                        echo 'active';
                                    } ?>
                        <?php if ($this->uri->uri_string() == 'dokter/dokter_tambah') {
                            echo 'active';
                        } ?>
                        <?php if ($this->uri->uri_string() == 'dokter/dokterdetail/' . $this->uri->segment('3')) {
                            echo 'active';
                        } ?>
                        <?php if ($this->uri->uri_string() == 'dokter/dokteredit/' . $this->uri->segment('3')) {
                            echo 'active';
                        } ?>">
                            <a href="<?php echo base_url("dokter"); ?>" class="cursor">
                                <span class="fa fa-user"></span> Data Dokter

                            </a>
                        </li>
                        <li class=" <?php if ($this->uri->uri_string() == 'poli/jadwal_poli') {
                                        echo 'active';
                                    } ?>">
                            <a href="<?php echo base_url("poli/jadwal_poli"); ?>" class="cursor">
                                <span class="fa fa-tags"></span> Data Jadwal Poli
                            </a>
                        </li>

                        <li class=" <?php if ($this->uri->uri_string() == 'obat') {
                                        echo 'active';
                                    } ?>">
                            <a href="<?php echo base_url("obat"); ?>" class="cursor">
                                <span class="fa fa-book"></span> Data Obat
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="treeview <?php if ($this->uri->uri_string() == 'data/laporan_rl4') {
                                        echo 'active';
                                    } ?>
				<?php if ($this->uri->uri_string() == 'data/laporan_rm_pasien') {
                    echo 'active';
                } ?>
				<?php if ($this->uri->uri_string() == 'data') {
                    echo 'active';
                } ?>
				<?php if ($this->uri->uri_string() == 'data/bukutambah') {
                    echo 'active';
                } ?>
				<?php if ($this->uri->uri_string() == 'data/bukudetail/' . $this->uri->segment('3')) {
                    echo 'active';
                } ?>
				<?php if ($this->uri->uri_string() == 'data/bukuedit/' . $this->uri->segment('3')) {
                    echo 'active';
                } ?>">
                    <a href="#">
                        <i class="fa fa-pencil-square"></i>
                        <span>Laporan</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="<?php if ($this->uri->uri_string() == 'data') {
                                        echo 'active';
                                    } ?>
                        <?php if ($this->uri->uri_string() == 'data/bukutambah') {
                            echo 'active';
                        } ?>
                        <?php if ($this->uri->uri_string() == 'data/bukudetail/' . $this->uri->segment('3')) {
                            echo 'active';
                        } ?>
                        <?php if ($this->uri->uri_string() == 'data/bukuedit/' . $this->uri->segment('3')) {
                            echo 'active';
                        } ?>">
                            <a href="<?php echo base_url("data"); ?>" class="cursor">
                                <span class="fa fa-book"></span> Laporan Kunjungan
                            </a>
                        </li>
                        <li class=" <?php if ($this->uri->uri_string() == 'data/laporan_rm_pasien') {
                                        echo 'active';
                                    } ?>">
                            <a href="<?php echo base_url("data/laporan_rm_pasien"); ?>" class="cursor">
                                <span class="fa fa-tags"></span> Laporan RM Pasien
                            </a>
                        </li>
                        <li class=" <?php if ($this->uri->uri_string() == 'data/laporan_rl4') {
                                        echo 'active';
                                    } ?>">
                            <a href="<?php echo base_url("data/laporan_rl4"); ?>" class="cursor">
                                <span class="fa fa-tags"></span> Laporan RL 4
                            </a>
                        </li>
                    </ul>
                </li>
            <?php } ?>


            <?php if ($this->session->userdata('level') == 'Dokter Poliklinik') { ?>
                <!-- sidebar menu: : style can be found in sidebar.less -->
                <li class="header">Sidebar</li>
                <li class="<?php if ($this->uri->uri_string() == 'dashboard') {
                                echo 'active';
                            } ?>">
                    <a href="<?php echo base_url('dashboard'); ?>">
                        <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                    </a>
                </li>
                <li class="treeview <?php if ($this->uri->uri_string() == 'data/kategori') {
                                        echo 'active';
                                    } ?>
				<?php if ($this->uri->uri_string() == 'data/rak') {
                    echo 'active';
                } ?>
				<?php if ($this->uri->uri_string() == 'data1') {
                    echo 'active';
                } ?>
				<?php if ($this->uri->uri_string() == 'data1/bukutambah1') {
                    echo 'active';
                } ?>
				<?php if ($this->uri->uri_string() == 'data1/bukudetail1/' . $this->uri->segment('3')) {
                    echo 'active';
                } ?>
				<?php if ($this->uri->uri_string() == 'data1/bukuedit1/' . $this->uri->segment('3')) {
                    echo 'active';
                } ?>">
                    <a href="#">
                        <i class="fa fa-pencil-square"></i>
                        <span>Pelayanan RJ</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="<?php if ($this->uri->uri_string() == 'data1') {
                                        echo 'active';
                                    } ?>
                        <?php if ($this->uri->uri_string() == 'data1/bukutambah1') {
                            echo 'active';
                        } ?>
                        <?php if ($this->uri->uri_string() == 'data1/bukudetail1/' . $this->uri->segment('3')) {
                            echo 'active';
                        } ?>
                        <?php if ($this->uri->uri_string() == 'data1/bukuedit1/' . $this->uri->segment('3')) {
                            echo 'active';
                        } ?>">
                            <a href="<?php echo base_url("data1"); ?>" class="cursor">
                                <span class="fa fa-book"></span> Jadwal poli
                            </a>
                        </li>
                        <li class=" <?php if ($this->uri->uri_string() == 'pelayanan/') {
                                        echo 'active';
                                    } ?>">
                            <a href="<?php echo base_url("pelayanan/"); ?>" class="cursor">
                                <span class="fa fa-tags"></span> Catatan Medis Pasien

                            </a>
                        </li>

                    </ul>
                <li class="<?php if ($this->uri->uri_string() == 'resep') {
                                echo 'active';
                            } ?>
                <?php if ($this->uri->uri_string() == 'resep/tambah') {
                    echo 'active';
                } ?>
                <?php if ($this->uri->uri_string() == 'user/edit/' . $this->uri->segment('3')) {
                    echo 'active';
                } ?>">
                    <a href="<?php echo base_url('resep'); ?>" class="cursor">
                        <i class="fa fa-user"></i> <span>Resep</span></a>
                </li>
                </li>

            <?php } ?>


            <?php if ($this->session->userdata('level') == 'Petugas Pendaftaran') { ?>
                <!-- sidebar menu: : style can be found in sidebar.less -->
                <li class="header">Sidebar</li>
                <li class="<?php if ($this->uri->uri_string() == 'dashboard') {
                                echo 'active';
                            } ?>">
                    <a href="<?php echo base_url('dashboard'); ?>">
                        <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                    </a>
                </li>
                <!-- <li class="treeview <?php if ($this->uri->uri_string() == 'data/laporan_rl4') {
                                                echo 'active';
                                            } ?>
				<?php if ($this->uri->uri_string() == 'data/laporan_rm_pasien') {
                    echo 'active';
                } ?>
				<?php if ($this->uri->uri_string() == 'data') {
                    echo 'active';
                } ?>
				<?php if ($this->uri->uri_string() == 'data/bukutambah') {
                    echo 'active';
                } ?>
				<?php if ($this->uri->uri_string() == 'data/bukudetail/' . $this->uri->segment('3')) {
                    echo 'active';
                } ?>
				<?php if ($this->uri->uri_string() == 'data/bukuedit/' . $this->uri->segment('3')) {
                    echo 'active';
                } ?>">
            <a href="#">
                <i class="fa fa-pencil-square"></i>
                <span>Laporan</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li class="<?php if ($this->uri->uri_string() == 'data') {
                                echo 'active';
                            } ?>
                        <?php if ($this->uri->uri_string() == 'data/bukutambah') {
                            echo 'active';
                        } ?>
                        <?php if ($this->uri->uri_string() == 'data/bukudetail/' . $this->uri->segment('3')) {
                            echo 'active';
                        } ?>
                        <?php if ($this->uri->uri_string() == 'data/bukuedit/' . $this->uri->segment('3')) {
                            echo 'active';
                        } ?>">
                    <a href="<?php echo base_url("data"); ?>" class="cursor">
                        <span class="fa fa-book"></span> Laporan Kunjungan
                    </a>
                </li>
                <li class=" <?php if ($this->uri->uri_string() == 'data/laporan_rm_pasien') {
                                echo 'active';
                            } ?>">
                    <a href="<?php echo base_url("data/laporan_rm_pasien"); ?>" class="cursor">
                        <span class="fa fa-tags"></span> Laporan RM Pasien
                    </a>
                </li>
                <li class=" <?php if ($this->uri->uri_string() == 'data/laporan_rl4') {
                                echo 'active';
                            } ?>">
                    <a href="<?php echo base_url("data/laporan_rl4"); ?>" class="cursor">
                        <span class="fa fa-tags"></span> Laporan RL 4
                    </a>
                </li>
            </ul>
        </li> -->
                <li class="treeview <?php if ($this->uri->uri_string() == 'daftar') {
                                        echo 'active';
                                    } ?>
                
                <?php if ($this->uri->uri_string() == 'datadaftar') {
                    echo 'active';
                } ?>
                <?php if ($this->uri->uri_string() == 'daftar/tambah') {
                    echo 'active';
                } ?>
                <?php if ($this->uri->uri_string() == 'daftar/edit/' . $this->uri->segment('3')) {
                    echo 'active';
                } ?>">

                    <a href="#">
                        <i class="fa fa-user"></i>
                        <span>Registrasi RJ</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="<?php if ($this->uri->uri_string() == 'daftar') {
                                        echo 'active';
                                    } ?>
                            <?php if ($this->uri->uri_string() == 'daftar/daftarpx') {
                                echo 'active';
                            } ?>
                            <?php if ($this->uri->uri_string() == 'daftar/detail/' . $this->uri->segment('3')) {
                                echo 'active';
                            } ?>
                            <?php if ($this->uri->uri_string() == 'daftar/editpx/' . $this->uri->segment('3')) {
                                echo 'active';
                            } ?>">

                            <!-- sub menu dalam registrasi rawat jalan -->
                        <li class=" <?php if ($this->uri->uri_string() == 'daftar') {
                                        echo 'active';
                                    } ?>">
                            <a href="<?php echo base_url("daftar"); ?>" class="cursor">
                                <span class="fa fa-user-circle"></span> Pendaftaran Pasien
                            </a>
                        </li>
                        <li class=" <?php if ($this->uri->uri_string() == 'datadaftar') {
                                        echo 'active';
                                    } ?>">
                            <a href="<?php echo base_url("datadaftar"); ?>" class="cursor">
                                <span class="fa fa-id-card"></span> Data Pendaftar RJ
                            </a>
                        </li>
                </li>
        </ul>

        </li>

    <?php } ?>
    </ul>
    <div class="clearfix"></div>
    <br />
    <br />
    </section>
    <!-- /.sidebar -->
</aside>