<!DOCTYPE html>
<html>

<head>
	<!-- <link rel="stylesheet" href="<?php echo base_url(); ?>assets_style/assets/bower_components/bootstrap/dist/css/bootstrap.min.css"> -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous" />
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets_style/assets/bower_components/font-awesome/css/font-awesome.min.css">
	<title><?= $title_web; ?></title>
</head>

<body onload='window.print()'>
	<div class="container">
	</div>
	<br />
	<div id="printableArea" class="container">
		<page size="" class="col-md-7 col-md-offset-3">
			<div class="panel panel-default">
				<div class="panel-body" style="background-color: light-grey !important">
					<h4 class="text-center">KARTU ANTRIAN PETUGAS KESEHATAN SISTEM RME RSU BHAKTI HUSADA</h4>
					<br />
					<div class="row">
						<div class="col-sm-12">
							<table class="table table-stripped">
								<tr>
									<td>No Antrian</td>
									<td>:</td>
									<td><?= $cetak_kartu->no_antrian; ?></td>
								</tr>
								<tr>
									<td>Tanggal Kunjung</td>
									<td>:</td>
									<td><?= $cetak_kartu->tgl_kunjung; ?></td>
								</tr>
								<tr>
									<td>Tujuan</td>
									<td>:</td>
									<td><?= $cetak_kartu->nama_poli; ?></td>
								</tr>
								<tr>
									<td>Nama</td>
									<td>:</td>
									<td><?= $cetak_kartu->nama_pasien; ?></td>
								</tr>
							</table>
						</div>
					</div>
				</div>
			</div>
		</page>
	</div>
</body>
<script>
	// function printDiv(divName) {
	// 	var printContents = document.getElementById(divName).innerHTML;
	// 	var originalContents = document.body.innerHTML;
	// 	document.body.innerHTML = printContents;
	// 	printContents = '<link rel="stylesheet" href="<?php echo base_url(); ?>assets_style/assets/bower_components/bootstrap/dist/css/bootstrap.min.css">';
	// 	setTimeout(function(){
	// 		window.print()
	// 	}, 1000);
	// 	document.body.innerHTML = originalContents;
	// }
</script>

</html>