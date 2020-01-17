<?php

$colname_rec_jurusan_edit = "-1";
if (isset($_GET['jur_id'])) {
  $colname_rec_jurusan_edit = $_GET['jur_id'];
}

$query_rec_jurusan_edit = sprintf("SELECT * FROM tb_jurusan WHERE jur_id = %s", GetSQLValueString($colname_rec_jurusan_edit, "int"));
$rec_jurusan_edit = mysql_query($query_rec_jurusan_edit, $koneksi) or die(mysql_error());
$row_rec_jurusan_edit = mysql_fetch_assoc($rec_jurusan_edit);
$totalRows_rec_jurusan_edit = mysql_num_rows($rec_jurusan_edit);
?>

<h2>Edit Jurusan</h2>
<form class="well" method="post" name="form1" action="jurusan_proses.php">
  <table class="table table-hover">
    <tr>
      <td style="width:150px">Kode</td>
      <td><input class="form-control" type="text" name="jur_kode" value="<?php echo htmlentities($row_rec_jurusan_edit['jur_kode'], ENT_COMPAT, 'utf-8'); ?>" readonly></td>
    </tr>
    <tr>
      <td>Nama</td>
      <td><input class="form-control" type="text" name="jur_nama" value="<?php echo htmlentities($row_rec_jurusan_edit['jur_nama'], ENT_COMPAT, 'utf-8'); ?>"></td>
    </tr>
    <tr>
      <td>Keterangan:</td>
      <td><textarea name="jur_keterangan" class="form-control"><?php echo htmlentities($row_rec_jurusan_edit['jur_keterangan'], ENT_COMPAT, 'utf-8'); ?></textarea></td>
    </tr>
    <tr>
      <td>Kuota</td>
      <td><input class="form-control" type="text" name="jur_kuota" value="<?php echo htmlentities($row_rec_jurusan_edit['jur_kuota'], ENT_COMPAT, 'utf-8'); ?>"></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input class="btn btn-primary" type="submit" value="Simpan">
      <a class="btn btn-danger" href="index.php?hal=jurusan_tampil">Batal</a></td>
    </tr>
  </table>
  <input type="hidden" name="MM_update" value="form1">
  <input type="hidden" name="jur_id" value="<?php echo $row_rec_jurusan_edit['jur_id']; ?>">
</form>