<!DOCTYPE html>
<html>

<head>
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets_style/assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets_style/assets/bower_components/font-awesome/css/font-awesome.min.css">
	<title>PRINT LAPORAN RM PASIEN</title>
	<style>
		body {
			background: rgba(0, 0, 0, 0.2);
		}

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

		@media print 
{
  @page { margin: 0; box-shadow: 0; }
  body  { margin: 0cm; }
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
					<h2><b><center>Laporan Resep<center><b></h3>
					<!-- <h6><center>Jl. xxxxxxxxxxxxxxx<center></h6> -->
				</div>
				<div class="panel-body">
					<!-- <h4 class="text-center">LAPORAN REKAM MEDIS PASIEN</h4> -->
					<table border="0">
						<tbody>

						</tbody>
					</table>
					<div class="row">
						<div class="col-sm-12">
								<table id="example1" class="table table-bordered table-striped table" width="100%">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>No RM</th>
                                            <th>Nama Pasien</th>
                                            <th>Kode Resep</th>
                                            <th>Nama Obat</th>
                                            <th>Jumlah</th>
                                            <th>Aturan Pakai</th>
                                            <th>Tanggal Resep</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; ?>
                                            <tr>
                                                <td><?= $no; ?></td>
                                                <td><?= $resep->no_rm; ?></td>
                                                <td><?= $resep->nama_pasien; ?></td>
                                                <td><?= $resep->kode_resep; ?></td>
                                                <td><?= $resep->nama_obat; ?></td>
                                                <td><?= $resep->jumlah; ?></td>
                                                <td><?= $resep->aturan_pakai; ?></td>
                                                <td><?= $resep->tgl_resep; ?></td>
                                            </tr>
                                        <?php $no++; ?>
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