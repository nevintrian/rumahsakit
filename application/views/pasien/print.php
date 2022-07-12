<!DOCTYPE html>
<html>
<!-- Bagian halaman HTML yang akan konvert -->

<head>
	<meta charset='UTF-8'>
	<title>Cetak Kartu Pasien</title>
</head>
<style>
	@media print {
		* {
			-webkit-print-color-adjust: exact;
		}
	}

	@page {
		size: 21cm 30cm;
		margin: 5mm 7mm 5mm 7mm;
		/* change the margins as you want them to be. */
	}

	table {
		border-spacing: 0px;
	}

	/* cellspacing */

	th,
	td {
		padding: 0px;
	}
</style>

<body onload='window.print()' style="font-size: 12px;margin-top:0;position:absolute;">
	<div style="width: 340px; height: 207px; margin-bottom:10px; background-image: url('<?= base_url('assets_style/desain_kartu/desain_kartu.png'); ?>');">
		<!-- <img style="position: absolute;margin-left: 10px;margin-top: 90px;" src="<?= base_url('assets_style/image/' . $cetak_kartu->foto); ?>" width="75.5px" height="75.5px"> -->
		<img style="position: absolute;margin-left: 20px;margin-top: 8px;" src="<?= base_url('assets_style/desain_kartu/logo_medis.png'); ?>" width="60px" height="60px">
		<div style="padding-top: 5px;">
			<p style="margin-top: 3px; right:10px; position: absolute;font-family: Cambria;font-size: 15px;"><strong>Kartu Identitas Berobat</strong></p>
			<p style="margin-top: 19px; right:10px; position: absolute;font-family: Cambria;font-size: 18px;text-transform: uppercase;"><strong>RSU BHAKTI HUSADA</strong></p>
			<table style="margin-top: 70px; position: absolute; right:80px; text-align: left; font-family: Cambria;font-size: 12px;">
				<tr>
					<td>No. RM</td>
					<td>: &nbsp<?= $cetak_kartu->no_rm; ?></td>
				</tr>
				<tr>
					<td>Nama</td>
					<td>: &nbsp<strong style="font-size: 12px;"><?= $cetak_kartu->nama_pasien; ?></strong></td>
				</tr>
				<tr>
					<td>Tgl. Lahir</td>
					<td>: &nbsp<?= $cetak_kartu->tgl_lahir; ?></td>
				</tr>
				<tr>
					<td>Jenis Kelamin</td>
					<td>: &nbsp<?= $cetak_kartu->j_kel; ?></td>
				</tr>
				<tr>
					<td>Alamat</td>
					<td>: &nbsp<?= $cetak_kartu->alamat; ?></td>
				</tr>
				<tr>
					<td>Agama</td>
					<td>: &nbsp<?= $cetak_kartu->agama; ?></td>
				</tr>
				<tr>
					<td>Pekerjaan</td>
					<td>: &nbsp<?= $cetak_kartu->pekerjaan; ?></td>
				</tr>
			</table>
		</div>
	</div>

</body>

</html>