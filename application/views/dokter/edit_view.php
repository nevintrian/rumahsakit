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
                        <form action="<?php echo base_url('dokter/prosesdokter/'); ?>" method="POST" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-sm-5">
                                    <div class="form-group">
                                        <label>No.</label>
                                        <input type="text" class="form-control" name="id_dokter" disabled value="<?= $data_dokter->id_dokter; ?>" required="required" placeholder="No.">
                                    </div>
                                    <div class="form-group">
                                        <label>Nama Dokter</label>
                                        <input type="text" class="form-control" name="nama_dokter" value="<?= $data_dokter->nama; ?>" required="required" placeholder="Nama Dokter" readonly>
                                    </div>




                                    <div class="form-group">
                                        <label>Poli</label>
                                        <select id="InputPoli" name="id_poli" value="<?= $data_dokter->id_poli; ?>" class="form-control" required>
                                            <?php foreach ($datapoli as $row) : ?>
                                                <option value="<?= $row->id_poli ?>" <?php if ($row->id_poli == $data_dokter->id_poli) echo 'selected="selected"'; ?>><?php echo $row->nama_poli; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>



                                </div>
                            </div>
                            <div class="pull-right">
                                <input type="hidden" name="edit" value="<?= $data_dokter->id_dokter; ?>">
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
</div>
</div>
</section>
</div>