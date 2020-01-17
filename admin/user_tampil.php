<?php

mysql_select_db($database_koneksi, $koneksi);
$query_rec_user_tampil = "SELECT * FROM tb_user";
$rec_user_tampil = mysql_query($query_rec_user_tampil, $koneksi) or die(mysql_error());
$row_rec_user_tampil = mysql_fetch_assoc($rec_user_tampil);
$totalRows_rec_user_tampil = mysql_num_rows($rec_user_tampil);
?>

<h2>User
	<a href="index.php?hal=user_input" class="btn btn-primary btn-sm pull-right">Tambah User</a>
</h2>

<?php 
if (isset($_SESSION['pesan'])) {
	echo '<div class="alert alert-info">' . $_SESSION['pesan'] . '</div>';
} 
?>


<table class="table table-bordered" id="dtb">
<thead>
  <tr>
    <th>ID</th>
    <th>Username</th>
    <th>Email</th>
    <th>Nama Lengkap</th>
    <th>Level</th>
    <th>Aktif</th>
    <th>Edit</th>
  </tr>
</thead>
<tbody>
  <?php do { ?>
    <tr>
      <td><?php echo $row_rec_user_tampil['user_id']; ?></td>
      <td><?php echo $row_rec_user_tampil['user_name']; ?></td>
      <td><?php echo $row_rec_user_tampil['user_email']; ?></td>
      <td><?php echo $row_rec_user_tampil['user_nama_lengkap']; ?></td>
      <td><?php echo $row_rec_user_tampil['user_level']; ?></td>
      <td><?php echo '<img src="../Asset/images/' . $row_rec_user_tampil['user_aktif'] . '.png">'; ?></td>
      <td><a class="btn btn-warning btn-xs" href="index.php?hal=user_edit&user_id=<?php echo $row_rec_user_tampil['user_id']; ?>"><i class="fa fa-pencil" aria-hidden="true"></i></a></td>
    </tr>
    <?php } while ($row_rec_user_tampil = mysql_fetch_assoc($rec_user_tampil)); ?>
</tbody>
</table>
