<table class="table table-striped">
    <tr>
        <th>#</th>
        <th>no_rm</th>
        <th>Nama</th>
        <th>Alamat</th>
    </tr>
    <?php $no = 1;
    foreach ($pasien as $row) : ?>
        <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $row->no_rm ?></td>
            <td><?php echo $row->nama_pasien ?></td>
            <td><?php echo $row->alamat ?></td>
        </tr>
    <?php endforeach ?>
</table>
<a href="<?= site_url('Cetak_Filter/cetak/' . $no_rm) ?>" target="_blank" class="btn btn-warning">Cetak Laporan</a>