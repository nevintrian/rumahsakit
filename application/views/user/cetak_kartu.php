<?php
$tgla = $user->tgl_bergabung;
$tglk = $user->tgl_lahir;
$bulan = array(
	'01' => 'Januari',
	'02' => 'Februari',
	'03' => 'Maret',
	'04' => 'April',
	'05' => 'Mei',
	'06' => 'Juni',
	'07' => 'Juli',
	'08' => 'Agustus',
	'09' => 'September',
	'10' => 'Oktober',
	'11' => 'November',
	'12' => 'Desember',
);

$array1 = explode("-", $tgla);
$tahun = $array1[0];
$bulan1 = $array1[1];
$hari = $array1[2];
$bl1 = $bulan[$bulan1];
$tgl1 = $hari . ' ' . $bl1 . ' ' . $tahun;


$array2 = explode("-", $tglk);
$tahun2 = $array2[0];
$bulan2 = $array2[1];
$hari2 = $array2[2];
$bl2 = $bulan[$bulan2];
$tgl2 = $hari2 . ' ' . $bl2 . ' ' . $tahun2;
?>

<!DOCTYPE html>
<html>

<head>
	<!-- <link rel="stylesheet" href="<?php echo base_url(); ?>assets_style/assets/bower_components/bootstrap/dist/css/bootstrap.min.css"> -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous" />
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets_style/assets/bower_components/font-awesome/css/font-awesome.min.css">
	<title><?= $title_web; ?></title>
</head>

<body>
	<div class="container">
		<br />
		<div class="pull-left">
			Codekop - Preview HTML to DOC [ size paper A4 ]
		</div>
		<!-- <div class="pull-right">
			<button type="button" class="btn btn-success btn-md" onclick="printDiv('printableArea')">
				<i class="fa fa-print"> </i> Print File
			</button>
		</div> -->
	</div>
	<br />
	<a href="<?php echo base_url(); ?>assets_style/image/<?php echo $user->foto; ?>">aaaaaaaaaaaaaaaaaaaaa</a>
	<div id="printableArea" class="container">
		<page size="" class="col-md-7 col-md-offset-3">
			<div class="panel panel-default">
				<div class="panel-body" style="background-color: red !important">
					<h4 class="text-center">KARTU IDENTITAS PETUGAS KESEHATAN RME RSBH</h4>
					<br />
					<div class="row">
						<div class="col-sm-7">
							<table class="table table-stripped">
								<tr>
									<td>ID Anggota</td>
									<td>:</td>
									<td><?= $user->id_login; ?></td>
								</tr>
								<tr>
									<td>Nama</td>
									<td>:</td>
									<td><?= $user->nama; ?></td>
								</tr>
								<tr>
									<td>TTL</td>
									<td>:</td>
									<td><?= $user->tempat_lahir; ?>, <?= $tgl2; ?></td>
								</tr>
								<tr>
									<td>Alamat</td>
									<td>:</td>
									<td><?= $user->alamat; ?></td>
								</tr>
								<tr>
									<td class="text-center">Tgl Bergabung</td>
									<td>:</td>
									<td><?= $tgl1; ?></td>
								</tr>
							</table>
						</div>
						<div class="text-center">
							<center>
								<img src="./assets_style/image/user_1638574027.jpg" style="width:5cm;height:4cm;" class="img-responsive">
							</center>
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