<?php 

$colname_rec_pendaftaran_edit = "-1";
if (isset($_GET['no_psb'])) {
  $colname_rec_pendaftaran_edit = $_GET['no_psb'];
}
mysql_select_db($database_koneksi, $koneksi);
$query_rec_pendaftaran_edit = sprintf("SELECT * FROM tb_siswa WHERE siswa_no_psb = %s", GetSQLValueString($colname_rec_pendaftaran_edit, "int"));
$rec_pendaftaran_edit = mysql_query($query_rec_pendaftaran_edit, $koneksi) or die(mysql_error());
$row_rec_pendaftaran_edit = mysql_fetch_assoc($rec_pendaftaran_edit);
$totalRows_rec_pendaftaran_edit = mysql_num_rows($rec_pendaftaran_edit);

mysql_select_db($database_koneksi, $koneksi);
$query_rec_list_jurusan = "SELECT * FROM tb_jurusan";
$rec_list_jurusan = mysql_query($query_rec_list_jurusan, $koneksi) or die(mysql_error());
$row_rec_list_jurusan = mysql_fetch_assoc($rec_list_jurusan);
$totalRows_rec_list_jurusan = mysql_num_rows($rec_list_jurusan);
?>

<h2>Edit Pendaftaran</h2>

<form enctype="multipart/form-data" class="well" method="post" name="form1" action="proses_daftar.php">
  <table class="table table-hover">
    <tr>
      <td style="width:150px;">Jurusan</td>
      <td><select class="form-control" name="siswa_id_jur" id="siswa_id_jur">
        <?php
do {  
?>
        <option value="<?php echo $row_rec_list_jurusan['jur_id']?>"<?php if (!(strcmp($row_rec_list_jurusan['jur_id'], $row_rec_pendaftaran_edit['siswa_id_jur']))) {echo "selected=\"selected\"";} ?>><?php echo $row_rec_list_jurusan['jur_nama']?></option>
        <?php
} while ($row_rec_list_jurusan = mysql_fetch_assoc($rec_list_jurusan));
  $rows = mysql_num_rows($rec_list_jurusan);
  if($rows > 0) {
      mysql_data_seek($rec_list_jurusan, 0);
	  $row_rec_list_jurusan = mysql_fetch_assoc($rec_list_jurusan);
  }
?>
      </select></td>
    </tr>
    <tr>
      <td>Nama Lengkap</td>
      <td><input class="form-control" type="text" name="siswa_nama" value="<?php echo htmlentities($row_rec_pendaftaran_edit['siswa_nama'], ENT_COMPAT, 'utf-8'); ?>"></td>
    </tr>
    <tr>
      <td>NIS</td>
      <td><input class="form-control" type="text" name="siswa_nis" value="<?php echo htmlentities($row_rec_pendaftaran_edit['siswa_nis'], ENT_COMPAT, 'utf-8'); ?>"></td>
    </tr>
    <tr>
      <td>Jenis Kelamin</td>
      <td><select class="form-control" name="siswa_jk" id="siswa_jk">
        <option value="L" selected <?php if (!(strcmp("L", $row_rec_pendaftaran_edit['siswa_jk']))) {echo "selected=\"selected\"";} ?>>Laki-laki</option>
        <option value="P" <?php if (!(strcmp("P", $row_rec_pendaftaran_edit['siswa_jk']))) {echo "selected=\"selected\"";} ?>>Perempuan</option>
      </select></td>
    </tr>
    <tr>
      <td>Tempat Lahir</td>
      <td><textarea class="form-control" name="siswa_tmplahir" cols="32"><?php echo htmlentities($row_rec_pendaftaran_edit['siswa_tmplahir'], ENT_COMPAT, 'utf-8'); ?></textarea></td>
    </tr>
    <tr>
      <td>Tanggal Lahir</td>
      <td>
      	<div style="width:300px;" class="input-group date" data-date="" data-date-format="yyyy-mm-dd">
            <input class="form-control" type="text" name="siswa_tgllahir" value="<?php echo htmlentities($row_rec_pendaftaran_edit['siswa_tgllahir'], ENT_COMPAT, 'utf-8'); ?>" placeholder="Mulai Tanggal" readonly>
            <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
        </div>
      </td>
    </tr>
    <tr>
      <td>Agama</td>
      <td><select class="form-control" name="siswa_agama" id="siswa_agama">
        <option value="Islam" <?php if (!(strcmp("Islam", $row_rec_pendaftaran_edit['siswa_agama']))) {echo "selected=\"selected\"";} ?>>Islam</option>
        <option value="Katolik" <?php if (!(strcmp("Katolik", $row_rec_pendaftaran_edit['siswa_agama']))) {echo "selected=\"selected\"";} ?>>Katolik</option>
        <option value="Protestan" <?php if (!(strcmp("Protestan", $row_rec_pendaftaran_edit['siswa_agama']))) {echo "selected=\"selected\"";} ?>>Protestan</option>
        <option value="Hindu" <?php if (!(strcmp("Hindu", $row_rec_pendaftaran_edit['siswa_agama']))) {echo "selected=\"selected\"";} ?>>Hindu</option>
        <option value="Budha" <?php if (!(strcmp("Budha", $row_rec_pendaftaran_edit['siswa_agama']))) {echo "selected=\"selected\"";} ?>>Budha</option>
      </select></td>
    </tr>
    <tr>
      <td>Alamat</td>
      <td><input class="form-control" type="text" name="siswa_alamat" value="<?php echo htmlentities($row_rec_pendaftaran_edit['siswa_alamat'], ENT_COMPAT, 'utf-8'); ?>"></td>
    </tr>
    <tr>
      <td>Nama Ayah</td>
      <td><input class="form-control" type="text" name="siswa_ayah_nama" value="<?php echo htmlentities($row_rec_pendaftaran_edit['siswa_ayah_nama'], ENT_COMPAT, 'utf-8'); ?>"></td>
    </tr>
    <tr>
      <td>Alamat Ayah</td>
      <td><textarea class="form-control" name="siswa_ayah_alamat" cols="32"><?php echo htmlentities($row_rec_pendaftaran_edit['siswa_ayah_alamat'], ENT_COMPAT, 'utf-8'); ?></textarea></td>
    </tr>
    <tr>
      <td>Pekerjaan Ayah</td>
      <td><input class="form-control" type="text" name="siswa_ayah_pek" value="<?php echo htmlentities($row_rec_pendaftaran_edit['siswa_ayah_pek'], ENT_COMPAT, 'utf-8'); ?>"></td>
    </tr>
    <tr>
      <td>HP Ayah</td>
      <td><input class="form-control" type="text" name="siswa_ayah_hp" value="<?php echo htmlentities($row_rec_pendaftaran_edit['siswa_ayah_hp'], ENT_COMPAT, 'utf-8'); ?>"></td>
    </tr>
    <tr>
      <td>Asal Sekolah</td>
      <td><input class="form-control" type="text" name="siswa_sekolah_asal" value="<?php echo htmlentities($row_rec_pendaftaran_edit['siswa_sekolah_asal'], ENT_COMPAT, 'utf-8'); ?>"></td>
    </tr>
    <tr>
      <td>Status Sekolah</td>
      <td><input class="form-control" type="text" name="siswa_sekolah_sta" value="<?php echo htmlentities($row_rec_pendaftaran_edit['siswa_sekolah_sta'], ENT_COMPAT, 'utf-8'); ?>"></td>
    </tr>
    <tr>
      <td>Alamat Sekolah</td>
      <td><textarea class="form-control" name="siswa_sekolah_alm" cols="32"><?php echo htmlentities($row_rec_pendaftaran_edit['siswa_sekolah_alm'], ENT_COMPAT, 'utf-8'); ?></textarea></td>
    </tr>
    <tr>
      <td>No STTB</td>
      <td><input class="form-control" type="text" name="siswa_no_sttb" value="<?php echo htmlentities($row_rec_pendaftaran_edit['siswa_no_sttb'], ENT_COMPAT, 'utf-8'); ?>"></td>
    </tr>
    <tr>
      <td>No SKHUN/STL</td>
      <td><input class="form-control" type="text" name="siswa_no_skhun" value="<?php echo htmlentities($row_rec_pendaftaran_edit['siswa_no_skhun'], ENT_COMPAT, 'utf-8'); ?>"></td>
    </tr>
    <tr>
      <td>Tahun Lulus</td>
      <td><input class="form-control" type="text" name="siswa_thn_lls" value="<?php echo htmlentities($row_rec_pendaftaran_edit['siswa_thn_lls'], ENT_COMPAT, 'utf-8'); ?>"></td>
    </tr>
    <tr>
      <td>Nilai</td>
      <td><input class="form-control" type="text" name="siswa_nilai" value="<?php echo htmlentities($row_rec_pendaftaran_edit['siswa_nilai'], ENT_COMPAT, 'utf-8'); ?>"></td>
    </tr>
    <tr>
          <td>Berkas</td>
          <td><input type="file" name="siswa_berkas"><p class="help-block">Scan SKHUN/STL, Format .JPG</p></td>
        </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input class="btn btn-primary" type="submit" value="Simpan">
      <a class="btn btn-danger" href="index.php?hal=menu_pendaftaran">Batal</a></td>
    </tr>
  </table>
  <input type="hidden" name="MM_update" value="form1">
  <input type="hidden" name="siswa_no_psb" value="<?php echo $row_rec_pendaftaran_edit['siswa_no_psb']; ?>">
</form>