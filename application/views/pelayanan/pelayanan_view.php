<?php if (!defined('BASEPATH')) exit('No direct script acess allowed'); ?>
<div class="content-wrapper">
	<section class="content-header">
		<h1>
			<i class="fa fa-edit" style="color:green"> </i> Pelayanan Pasien
		</h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo base_url('dashboard'); ?>"><i class="fa fa-dashboard"></i>&nbsp; Dashboard</a></li>
			<li class="active"><i class="fa fa-file-text"></i>&nbsp; Pelayanan Pasien </li>
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
						<h3>Daftar Antrian Pasien</h3>
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
										<th>Jenis Kelamin</th>
										<th>Tanggal Masuk</th>
										<th>Jenis Kunjungan</th>
										<th>Jenis Pasien</th>
										<th>Nama Dokter</th>
										<th>Status</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<?php $no = 1;
									foreach ($join_rmpasien_pelayanan as $rows) { ?>
										<tr>
											<td><?= $no; ?></td>
											<td><?php echo $rows->no_rm ?></td>
											<td><?php echo $rows->nama_pasien ?></td>
											<td><?php echo $rows->no_antrian ?></td>
											<td><?php echo $rows->j_kel ?></td>
											<td><?php echo $rows->tgl_masuk ?></td>
											<td><?php echo $rows->jns_kunjung ?></td>
											<td><?php echo $rows->jns_pasien ?></td>
											<td><?php echo $rows->nama_dokter ?></td>
											<td>
												<?php if($rows->status == '0') { ?>
													Antrian
												<?php } else { ?>
													Selesai Penanganan
												<?php } ?>
											</td>
											<td>
												<?php if($rows->status == '0') { ?>
													<a href="<?= base_url('pelayanan/inputrm/' . $rows->id_daftar); ?>" ><button class="btn btn-primary">
														<i class="fa fa-pencil-square"> </i> Input RM </button></a>
												<?php } elseif($rows->status == '1') { ?>
													<a href="<?= base_url('pelayanan/detailrm/' . $rows->id_daftar); ?>" ><button class="btn btn-success">
														<i class="fa fa-pencil-square"> </i> Detail RM </button></a>
													<a href="<?= base_url('resep/tambah_resep/' . $rows->id_daftar); ?>" ><button class="btn btn-warning">
														<i class="fa fa-pencil-square"> </i> Resep </button></a>
												<?php } else {?>
													<a href="<?= base_url('pelayanan/detailrm/' . $rows->id_daftar); ?>" ><button class="btn btn-success">
														<i class="fa fa-pencil-square"> </i> Detail RM </button></a>
												<?php } ?>
											</td>
										</tr>
										<?php $no++; } ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>

				<div class="box box-primary">
					<div class="box-header with-border">
						<h3>Daftar Pasien Selesai Pelayanan</h3>
					</div>
					<!-- /.box-header -->
					<div class="box-body">
						<br />
						<div class="table-responsive">
							<table id="example2" class="table table-bordered table-striped table" width="100%">
								<thead>
									<tr>
										<th>No</th>
										<th>No RM</th>
										<th>Nama Pasien</th>
										<th>No Antrian</th>
										<th>Tanggal Kunjung</th>
										<th>Jenis Kelamin</th>
										<th>Jenis Kunjungan</th>
										<th>Jenis Pasien</th>
										<th>Nama Dokter</th>
										<th>Status</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<?php $no = 1;
									foreach ($selesai_pelayanan as $rows) { ?>
										<tr>
											<td><?= $no; ?></td>
											<td><?php echo $rows->no_rm ?></td>
											<td><?php echo $rows->nama_pasien ?></td>
											<td><?php echo $rows->no_antrian ?></td>
											<td><?php echo $rows->tgl_kunjung ?></td>
											<td><?php echo $rows->j_kel ?></td>
											<td><?php echo $rows->jns_kunjung ?></td>
											<td><?php echo $rows->jns_pasien ?></td>
											<td><?php echo $rows->nama_dokter ?></td>
											<td>
												<?php if($rows->status == '0') { ?>
													Antrian
												<?php } else { ?>
													Selesai Penanganan
												<?php } ?>
											</td>
											<td>
												<?php if($rows->status == '0') { ?>
													<a href="<?= base_url('pelayanan/inputrm/' . $rows->id_daftar); ?>" ><button class="btn btn-primary">
														<i class="fa fa-pencil-square"> </i> Input RM </button></a>
												<?php } elseif($rows->status == '1') { ?>
													<a href="<?= base_url('pelayanan/detailrm/' . $rows->id_daftar); ?>" ><button class="btn btn-success">
														<i class="fa fa-pencil-square"> </i> Detail RM </button></a>
													<a href="<?= base_url('resep/tambah_resep/' . $rows->id_daftar); ?>" ><button class="btn btn-warning">
														<i class="fa fa-pencil-square"> </i> Resep </button></a>
												<?php } else {?>
													<a href="<?= base_url('pelayanan/detailrm/' . $rows->id_daftar); ?>" ><button class="btn btn-success">
														<i class="fa fa-pencil-square"> </i> Detail RM </button></a>
												<?php } ?>
											</td>
										</tr>
										<?php $no++; } ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>

			</div>
		</div>
	</section>
</div>