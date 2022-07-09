<!DOCTYPE html>
<html>
<head>
<style>
body {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 10px 15px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}


a:link, a:visited {
  background-color: #f44336;
  color: white;
  padding: 14px 25px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
}

a:hover, a:active {
  background-color: red;
}
</style>
</head>
<body>

<h2 style="text-align: center;">Cetak Jadwal Poli</h2>

<div  style="text-align: left; margin-bottom: 20px; padding: 5px 15%;">
<span>Tanggal : <?=$tanggal?></span><br>
<span>Nama Poli : <?=$poli?></span><br>
<span>Nama Dokter : <?=$dokter?></span><br>
</div>

<table style="margin:auto;">
    <tr>
        <th>No</th>
        <th>No RM</th>
        <th>Tanggal</th>
        <th>Hari</th>
        <th>Nama Poli</th>
        <th>Nama Dokter</th>
    </tr>
    <?php $no=1;foreach($jadwal->result_array() as $isi){ ?>
    <tr>
        <td><?=$no?>.</td>
        <td><?= $isi['no_rm'];?></td>
        <td><?= $isi['tanggal'];?></td>
        <td><?= $isi['hari'];?></td>
        <td><?= $isi['nama_poli'];?></td>
        <td><?= $isi['nama_dokter'];?></td>
    </tr>
    <?php $no++; }?>
</table>

    <script>window.print();</script>
</body>
</html>