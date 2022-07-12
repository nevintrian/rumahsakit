<!DOCTYPE html>
<html>
<!-- Bagian halaman HTML yang akan konvert -->

<head>
	<meta charset='UTF-8'>
	<title>Cetak Laporan Resep</title>
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
	<div style="width: 794px; height: 397px; margin-bottom:10px; background-image: url('<?= base_url('assets_style/desain_kartu/bingkai_cetak_resep.png'); ?>');">
		<img style="position: absolute;margin-left: 180px;margin-top: 10px;" src="<?= base_url('assets_style/image/logo_klinik_new1.jpg'); ?>" width="80px" height="80px">
		<div style="padding-top: 5px;">
			<p style="margin-top: 3px; left:345px; position: absolute;font-family: Cambria;font-size: 25px;"><strong>Laporan Resep</strong></p>
			<p style="margin-top: 25px; left:280px; position: absolute;font-family: Cambria;font-size: 30px;text-transform: uppercase;"><strong>RSU BHAKTI HUSADA</strong></p>
			<p style="margin-top: 55px; left:300px; position: absolute;font-family: Cambria;font-size: 12px;"><strong>Jl. rs Bhakti Husada No. 11 Dsn. Krajan, Tegalharjo, Kec. Glenmore, <br>Kabupaten Banyuangi, Jawa Timur, 68466</strong></p>
			<hr style="border: 1px solid black; margin-top: 90px;" />
			<table style="margin-top: 20px; position: absolute; left:40px; text-align: left; font-family: Cambria;font-size: 16px;">
				<tr>
					<td>No. Rekam Medis</td>
					<td>&nbsp: &nbsp<?= $resep->no_rm; ?></td>
				</tr>
				<tr>
					<td>NIK</td>
					<td>&nbsp: &nbsp<?= $resep->no_identitas; ?></td>
				</tr>
				<tr>
					<td>Nama</td>
					<td>&nbsp: &nbsp<strong style="font-size: 16px;"><?= $resep->nama_pasien; ?></strong></td>
				</tr>
				<tr>
					<td>Tgl. Lahir</td>
					<td>&nbsp: &nbsp<?= $resep->tgl_lahir; ?></td>
				</tr>
				<tr>
					<td>Alamat</td>
					<td>&nbsp: &nbsp<?= $resep->alamat; ?></td>
				</tr>
			</table>
			<table width="95%" style="margin-top: 150px; position: absolute; left:20px; text-align: left; font-family: Cambria;font-size: 16px; border: 1px solid black; text-align: center;">
				<thead>
					<tr>
						<th style="border: 1px solid black;">No</th>
						<th style="border: 1px solid black;">Kode Resep</th>
						<th style="border: 1px solid black;">Nama Obat</th>
						<th style="border: 1px solid black;">Jumlah</th>
						<th style="border: 1px solid black;">Aturan Pakai</th>
						<th style="border: 1px solid black;">Tanggal Resep</th>
					</tr>
				</thead>
				<tbody>
					<?php $no = 1; ?>
					<tr>
						<td style="border: 1px solid black;"><?= $no; ?></td>
						<td style="border: 1px solid black;"><?= $resep->kode_resep; ?></td>
						<td style="border: 1px solid black;"><?= $resep->nama_obat; ?></td>
						<td style="border: 1px solid black;"><?= $resep->jumlah; ?></td>
						<td style="border: 1px solid black;"><?= $resep->aturan_pakai; ?></td>
						<td style="border: 1px solid black;"><?= $resep->tgl_resep; ?></td>
					</tr>
					<?php $no++; ?>
				</tbody>
			</table>
		</div>
	</div>

</body>

</html>