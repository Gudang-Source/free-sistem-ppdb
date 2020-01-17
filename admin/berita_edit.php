<?php


$colname_rec_berita_edit = "-1";
if (isset($_GET['berita_id'])) {
  $colname_rec_berita_edit = $_GET['berita_id'];
}

$query_rec_berita_edit = sprintf("SELECT * FROM tb_berita WHERE berita_id = %s", GetSQLValueString($colname_rec_berita_edit, "int"));
$rec_berita_edit = mysql_query($query_rec_berita_edit, $koneksi) or die(mysql_error());
$row_rec_berita_edit = mysql_fetch_assoc($rec_berita_edit);
$totalRows_rec_berita_edit = mysql_num_rows($rec_berita_edit);
?>

<script type="text/javascript">
    tinymce.init({
		selector: '#mytextarea',
        plugins: "table",
        height: "200"
    });
</script>

<h2>Edit Berita</h2> 

<form class="well" method="post" name="form1" action="berita_proses.php">
  <table class="table table-hover">
    <tr>
      <td>Judul</td>
      <td><input class="form-control" type="text" name="berita_judul" value="<?php echo htmlentities($row_rec_berita_edit['berita_judul'], ENT_COMPAT, 'utf-8'); ?>"></td>
    </tr>
    <tr>
      <td>Isi</td>
      <td><textarea  class="form-control" id="mytextarea" name="berita_text"><?php echo htmlentities($row_rec_berita_edit['berita_text'], ENT_COMPAT, 'utf-8'); ?></textarea></td>
    </tr>
    <tr>
      <td>Aktif</td>
      <td><input <?php if (!(strcmp($row_rec_berita_edit['berita_aktif'],"Y"))) {echo "checked=\"checked\"";} ?> name="berita_aktif" type="checkbox" id="berita_aktif" value="Y"></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input class="btn btn-primary" type="submit" value="Simpan">
      <a class="btn btn-danger" href="index.php?hal=berita_tampil">Batal</a></td>
    </tr>
  </table>
  <input type="hidden" name="MM_update" value="form1">
  <input type="hidden" name="berita_id" value="<?php echo $row_rec_berita_edit['berita_id']; ?>">
</form>
