<?php 

$siswa = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : "";

$query_rec_menu_profil = sprintf("SELECT * FROM tb_user WHERE user_id = %s", GetSQLValueString($siswa, "int"));
$rec_menu_profil = mysql_query($query_rec_menu_profil, $koneksi) or die(mysql_error());
$row_rec_menu_profil = mysql_fetch_assoc($rec_menu_profil);
$totalRows_rec_menu_profil = mysql_num_rows($rec_menu_profil);
?>

<h2>Profil</h2>

<?php 
if (isset($_SESSION['pesan'])) {
	echo '<div class="alert alert-info">' . $_SESSION['pesan'] . '</div>';
} 
?>


<form class="well" method="post" name="form1" action="proses_akun.php">
  <table class="table table-hover">
    <tr>
      <td style="width:150px">Username</td>
      <td><input class="form-control" type="text" name="user_name" value="<?php echo htmlentities($row_rec_menu_profil['user_name'], ENT_COMPAT, ''); ?>" readonly></td>
    </tr>
    <tr>
      <td>Password</td>
      <td><input class="form-control" type="password" name="user_password" value="">
      <p class="help-block">Kosongkan jika tidak ingin merobah</p></td>
    </tr>
    <tr>
      <td>Email</td>
      <td><input class="form-control" type="text" name="user_email" value="<?php echo htmlentities($row_rec_menu_profil['user_email'], ENT_COMPAT, ''); ?>"></td>
    </tr>
    <tr>
      <td>Nama Lengkap</td>
      <td><input class="form-control" type="text" name="user_nama_lengkap" value="<?php echo htmlentities($row_rec_menu_profil['user_nama_lengkap'], ENT_COMPAT, ''); ?>"></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input class="btn btn-primary" type="submit" value="Simpan"></td>
    </tr>
  </table>
  <input type="hidden" name="form_profil" value="profil">
  <input type="hidden" name="user_id" value="<?php echo $siswa; ?>">
</form>
