<?php 

$query_rec_jur_list = "SELECT * FROM tb_jurusan";
$rec_jur_list = mysql_query($query_rec_jur_list, $koneksi) or die(mysql_error());
$row_rec_jur_list = mysql_fetch_assoc($rec_jur_list);
$totalRows_rec_jur_list = mysql_num_rows($rec_jur_list);


if (isset($_GET['jurusan_id'])) {
	$colname_rec_siswa_tampil = $_GET['jurusan_id'];
	$_SESSION['id_jur'] = $colname_rec_siswa_tampil;

	$query_rec_siswa_tampil = "SELECT * FROM tb_siswa WHERE siswa_id_jur = '$colname_rec_siswa_tampil' AND siswa_terima='Y' ORDER BY siswa_nilai DESC, siswa_no_psb ASC";
	$rec_siswa_tampil = mysql_query($query_rec_siswa_tampil) or die(mysql_error());
	$row_rec_siswa_tampil = mysql_fetch_assoc($rec_siswa_tampil);
	$totalRows_rec_siswa_tampil = mysql_num_rows($rec_siswa_tampil);
}

?>

<h2>Jurnal Pendaftaran</h2>

<form class="form-inline well" name="form1" method="get" action="">
	<input type="hidden" name="hal" value="menu_jurnal"/>
  <select class="form-control" name="jurusan_id" id="jurusan_id">
  <option value="0">-- Pilih Jurusan -- </option>
    <?php 
	do { 
	$selected = $row_rec_jur_list['jur_id'] == $_SESSION['id_jur'] ? "selected" : "";
	?>
    <option value="<?php echo $row_rec_jur_list['jur_id']?>" <?php echo $selected; ?>><?php echo $row_rec_jur_list['jur_nama']?></option>
	<?php
    } while ($row_rec_jur_list = mysql_fetch_assoc($rec_jur_list));
    	$rows = mysql_num_rows($rec_jur_list);
		if($rows > 0) {
			mysql_data_seek($rec_jur_list, 0);
			$row_rec_jur_list = mysql_fetch_assoc($rec_jur_list);
		}
    ?>
  </select>
  <input class="btn btn-success" type="submit" name="button" id="button" value="Tampilkan">
</form>


<?php if (isset($_GET['jurusan_id']) && $totalRows_rec_siswa_tampil > 0) { ?>
<table class="table table-bordered">
  <tr>
    <th>NO</th>
    <th>NOMOR</th>
    <th>NAMA</th>
    <th>TEMPAT/TGL LAHIR</th>
    <th>NAMA AYAH</th>
    <th>NILAI</th>
  </tr>
  <?php $no=0; do { $no++; ?>
    <tr>
      <td><?php echo $no; ?></td>
      <td><?php echo $row_rec_siswa_tampil['siswa_no_psb']; ?></td>
      <td><?php echo $row_rec_siswa_tampil['siswa_nama']; ?></td>
      <td><?php echo $row_rec_siswa_tampil['siswa_tmplahir']; ?>, <?php echo $row_rec_siswa_tampil['siswa_tgllahir']; ?></td>
      <td><?php echo $row_rec_siswa_tampil['siswa_ayah_nama']; ?></td>
      <td><?php echo $row_rec_siswa_tampil['siswa_nilai']; ?></td>
    </tr>
    <?php } while ($row_rec_siswa_tampil = mysql_fetch_assoc($rec_siswa_tampil)); ?>
</table>

<?php }  ?>

<?php if (isset($_GET['jurusan_id']) && (empty($totalRows_rec_siswa_tampil) || ($totalRows_rec_siswa_tampil = 0)) ) { ?>
	<div class="alert alert-danger">Data tidak ditemukan</div>
<?php }  ?>