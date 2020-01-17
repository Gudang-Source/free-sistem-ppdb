<?php 

$colname_rec_user_edit = "-1";
if (isset($_GET['user_id'])) {
  $colname_rec_user_edit = $_GET['user_id'];
}
mysql_select_db($database_koneksi, $koneksi);
$query_rec_user_edit = sprintf("SELECT * FROM tb_user WHERE user_id = %s", GetSQLValueString($colname_rec_user_edit, "int"));
$rec_user_edit = mysql_query($query_rec_user_edit, $koneksi) or die(mysql_error());
$row_rec_user_edit = mysql_fetch_assoc($rec_user_edit);
$totalRows_rec_user_edit = mysql_num_rows($rec_user_edit);
?>

<h2>Edit User</h2>
<form method="post" name="form1" action="user_proses.php">
  <table class="table table-hover">
    <tr>
      <td style="width:150px;">Username</td>
      <td><input class="form-control" type="text" name="user_name" value="<?php echo htmlentities($row_rec_user_edit['user_name'], ENT_COMPAT, 'utf-8'); ?>" readonly></td>
    </tr>
    <tr>
      <td>Password</td>
      <td><input class="form-control" type="password" name="user_password">
      	<p class="help-block">Kosongkan jika tidak ada perubahan</p>
      </td>
    </tr>
    <tr>
      <td>Email</td>
      <td><input class="form-control" type="text" name="user_email" value="<?php echo htmlentities($row_rec_user_edit['user_email'], ENT_COMPAT, 'utf-8'); ?>"></td>
    </tr>
    <tr>
      <td>Nama Lengkap</td>
      <td><input class="form-control" type="text" name="user_nama_lengkap" value="<?php echo htmlentities($row_rec_user_edit['user_nama_lengkap'], ENT_COMPAT, 'utf-8'); ?>"></td>
    </tr>
    <tr>
      <td>Level</td>
      <td><select class="form-control" name="user_level" id="user_level">
        <option value="1">Administrator</option>
        <option value="2">Calon Siswa</option>
      </select>
        </td>
    </tr>
    <tr>
      <td>Aktif</td>
      <td><input <?php if (!(strcmp($row_rec_user_edit['user_aktif'],"Y"))) {echo "checked=\"checked\"";} ?> name="user_aktif" type="checkbox" id="user_aktif" value="Y"></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input class="btn btn-primary" type="submit" value="Perbaharui">
      <a class="btn btn-danger" href="index.php?hal=user_tampil">Batal</a></td>
    </tr>
  </table>
  <input type="hidden" name="MM_update" value="form1">
  <input type="hidden" name="user_id" value="<?php echo $row_rec_user_edit['user_id']; ?>">
</form>