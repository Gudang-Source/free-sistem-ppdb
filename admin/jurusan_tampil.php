<?php

mysql_select_db($database_koneksi, $koneksi);
$query_rec_jur_tampil = "SELECT * FROM tb_jurusan";
$rec_jur_tampil = mysql_query($query_rec_jur_tampil, $koneksi) or die(mysql_error());
$row_rec_jur_tampil = mysql_fetch_assoc($rec_jur_tampil);
$totalRows_rec_jur_tampil = mysql_num_rows($rec_jur_tampil);
?>


<h2>Daftar Jurusan
	<a href="index.php?hal=jurusan_input" class="btn btn-primary btn-sm pull-right">Tambah Jurusan</a>
</h2>

<?php 
if (isset($_SESSION['pesan'])) {
	echo '<div class="alert alert-info">' . $_SESSION['pesan'] . '</div>';
} 
?>

<table class="table table-bordered">
  <tr>
    <th>ID</th>
    <th>Kode</th>
    <th>Nama</th>
    <th>Keterangan</th>
    <th>Kuota</th>
    <th>Edit</th>
  </tr>
  <?php do { ?>
    <tr>
      <td><?php echo $row_rec_jur_tampil['jur_id']; ?></td>
      <td><?php echo $row_rec_jur_tampil['jur_kode']; ?></td>
      <td><?php echo $row_rec_jur_tampil['jur_nama']; ?></td>
      <td><?php echo $row_rec_jur_tampil['jur_keterangan']; ?></td>
      <td><?php echo $row_rec_jur_tampil['jur_kuota']; ?></td>
      <td><a class="btn btn-warning btn-xs" href="index.php?hal=jurusan_edit&jur_id=<?php echo $row_rec_jur_tampil['jur_id']; ?>"><i class="fa fa-pencil" aria-hidden="true"></i></a></td>
    </tr>
    <?php } while ($row_rec_jur_tampil = mysql_fetch_assoc($rec_jur_tampil)); ?>
</table>
