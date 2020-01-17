<script type="text/javascript">
    tinymce.init({
		selector: '#mytextarea',
        plugins: "table",
        height: "200"
    });
</script>

<?php

$colname_rec_setting_edit = "-1";
if (isset($_GET['set_id'])) {
  $colname_rec_setting_edit = $_GET['set_id'];
}
mysql_select_db($database_koneksi, $koneksi);
$query_rec_setting_edit = sprintf("SELECT * FROM tb_setting WHERE set_id = %s", GetSQLValueString($colname_rec_setting_edit, "int"));
$rec_setting_edit = mysql_query($query_rec_setting_edit, $koneksi) or die(mysql_error());
$row_rec_setting_edit = mysql_fetch_assoc($rec_setting_edit);
$totalRows_rec_setting_edit = mysql_num_rows($rec_setting_edit);
?>

<h2>Edit Setting</h2>

<form action="setting_proses.php" method="post" enctype="multipart/form-data" name="form1" class="well">
  <table class="table table-hover">
    <tr>
      <td style="width:150px">Nama</td>
      <td><input type="text" class="form-control" name="set_name" value="<?php echo htmlentities($row_rec_setting_edit['set_name'], ENT_COMPAT, 'utf-8'); ?>"></td>
    </tr>
    <tr>
      <td>Value</td>
      <td><textarea class="form-control" name="set_value" id="mytextarea"><?php echo htmlentities($row_rec_setting_edit['set_value'], ENT_COMPAT, 'utf-8'); ?></textarea></td>
    </tr>
    <tr>
      <td>File</td>
      <td><input type="file" name="set_file" value="<?php echo htmlentities($row_rec_setting_edit['set_file'], ENT_COMPAT, 'utf-8'); ?>"></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input type="submit" class="btn btn-primary" value="Perbaharui">
      		<a class="btn btn-danger" href="index.php?hal=setting_tampil">Batal</a>
      </td>
    </tr>
  </table>
  <input type="hidden" name="MM_update" value="form1">
  <input type="hidden" name="set_id" value="<?php echo $row_rec_setting_edit['set_id']; ?>">
</form>
