<?php

mysql_select_db($database_koneksi, $koneksi);
$query_rec_setting_tampil = "SELECT * FROM tb_setting";
$rec_setting_tampil = mysql_query($query_rec_setting_tampil, $koneksi) or die(mysql_error());
$row_rec_setting_tampil = mysql_fetch_assoc($rec_setting_tampil);
$totalRows_rec_setting_tampil = mysql_num_rows($rec_setting_tampil);
?>

<h2>Setting</h2>

<?php 
if (isset($_SESSION['pesan'])) {
	echo '<div class="alert alert-info">' . $_SESSION['pesan'] . '</div>';
} 
?>


<table class="table table-bordered">
  <tr>
    <th>ID</th>
    <th>Nama</th>
    <th>File</th>
    <th>Edit</th>
  </tr>
  <?php do { ?>
    <tr>
      <td><?php echo $row_rec_setting_tampil['set_id']; ?></td>
      <td><?php echo $row_rec_setting_tampil['set_name']; ?></td>
      <td><?php echo $row_rec_setting_tampil['set_file']; ?></td>
      <td><a class="btn btn-warning btn-xs" href="index.php?hal=setting_edit&set_id=<?php echo $row_rec_setting_tampil['set_id']; ?>"><i class="fa fa-pencil" aria-hidden="true"></i></a></td>
    </tr>
    <?php } while ($row_rec_setting_tampil = mysql_fetch_assoc($rec_setting_tampil)); ?>
</table>