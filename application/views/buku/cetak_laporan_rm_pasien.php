<!DOCTYPE html>
<html>

<head>
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets_style/assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets_style/assets/bower_components/font-awesome/css/font-awesome.min.css">
	<title>PRINT LAPORAN RM PASIEN</title>
	<style>
		/* body {
			background: rgba(0, 0, 0, 0.2);
		} */

		page[size="A4 landscape"] {
			background: white;
			width: 21cm;
			height: 29.7cm;
			display: block;
			margin: 0 auto;
			margin-bottom: 0.5pc;
			box-shadow: 0 0 0.5cm rgba(0, 0, 0, 0.5);
			padding-left: 2.54cm;
			padding-right: 2.54cm;
			padding-top: 1.54cm;
			padding-bottom: 1.54cm;
		}

		@media print {
			@page {
				margin: 0;
				box-shadow: 0;
			}

			body {
				margin: 0cm;
			}
		}
	</style>
</head>

<body>
	<div class="container">
		<br />
		<div class="pull-right">
			<button type="button" class="btn btn-success btn-md" onclick="printDiv('printableArea')">
				<i class="fa fa-print"> </i> Print File
			</button>
		</div>
	</div>
	<br />
	<div id="printableArea">
		<page size="A4">
			<div class="panel panel-default">
				<div class="panel-header">
					<h2><b>
							<center>Data Riwayat Kesehatan (Medical Record) Pasien<center><b></h3>
										<!-- <h6><center>Jl. rs Bhakti Husada No. 11 Dsn. Krajan, Tegalharjo, Kec. Glenmore, <br>Kabupaten Banyuangi, Jawa Timur, 68466<center></h6> -->
				</div>
				<div class="panel-body">
					<!-- <h4 class="text-center">LAPORAN REKAM MEDIS PASIEN</h4> -->
					<table border="0">
						<tbody>
							<tr>
								<td>Tgl. Reg</td>
								<td>:</td>
								<td><?= $rows->tgl_masuk ?></td>
							</tr>
							<tr>
								<td>No. RM &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td>
								<td>:</td>
								<td><?= $rows->no_rm ?></td>
							</tr>
							<tr>
								<td>Nama</td>
								<td>:</td>
								<td><?= $rows->nama_pasien ?></td>
							</tr>
							<tr>
								<td>Tgl. Lahir</td>
								<td>:</td>
								<td><?= $rows->tgl_lahir ?></td>
							</tr>
						</tbody>
					</table>
					<div class="row">
						<div class="col-sm-12">
							<table id="example1" class="table table-bordered table-striped table" width="100%">
								<thead>
									<tr>
										<th>No</th>
										<th>Tanggal Kunjung</th>
										<th>Lokasi</th>
										<th>Poli</th>
										<th>Anamnesa</th>
										<th>Diagnosa</th>
										<th>Tindakan</th>
										<th>Pemeriksaan Fisik</th>
										<th>Obat</th>
										<th>Jumlah</th>
										<th>Aturan Pakai</th>
									</tr>
								</thead>
								<tbody>
									<?php $no = 1; ?>
									<tr>
										<td><?= $no; ?></td>
										<td><?php echo $rows->tgl_kunjung ?></td>
										<td>RSU BHAKTI HUSADA</td>
										<td><?php echo $rows->nama_poli ?></td>
										<td><?php echo $rows->anamnesa ?></td>
										<td><?php echo $rows->diagnosa ?></td>
										<td><?php echo $rows->tindakan ?></td>
										<td><?php echo $rows->pem_fisik ?></td>
										<td><?php echo $rows->nama_obat ?></td>
										<td><?php echo $rows->jumlah ?></td>
										<td><?php echo $rows->aturan_pakai ?></td>
									</tr>
									<?php $no++;
									?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</page>
	</div>
</body>
<script>
	function printDiv(divName) {
		var printContents = document.getElementById(divName).innerHTML;
		var originalContents = document.body.innerHTML;
		document.body.innerHTML = printContents;
		window.print();
		document.body.innerHTML = originalContents;
	}
</script>

</html>