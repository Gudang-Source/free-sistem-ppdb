<?php 

$query_rec_jur_list = "SELECT * FROM tb_jurusan";
$rec_jur_list = mysql_query($query_rec_jur_list, $koneksi) or die(mysql_error());
$row_rec_jur_list = mysql_fetch_assoc($rec_jur_list);
$totalRows_rec_jur_list = mysql_num_rows($rec_jur_list);


if (isset($_SESSION['id_jur'])) {
	$colname_rec_siswa_tampil = $_SESSION['id_jur'];

	$query_rec_siswa_tampil = "SELECT * FROM tb_siswa WHERE siswa_id_jur = '$colname_rec_siswa_tampil' AND siswa_terima='Y' ORDER BY siswa_nilai DESC, siswa_no_psb ASC";
	$rec_siswa_tampil = mysql_query($query_rec_siswa_tampil) or die(mysql_error());
	$row_rec_siswa_tampil = mysql_fetch_assoc($rec_siswa_tampil);
	$totalRows_rec_siswa_tampil = mysql_num_rows($rec_siswa_tampil);
}

?>


<?php if (isset($_SESSION['id_jur']) && $totalRows_rec_siswa_tampil > 0) { ?>

<p style="text-align:center">
    <span style="font-size:25px;"><?php echo $sekolah; ?></span><br>
    <span style="font-size:18px;"><?php echo $alamat; ?></span><br><br>
    <span style="font-size:20px;">PENERIMAAN PESERTA DIDIK ONLINE TAHUN <?php echo $tahun; ?> </span><br>
</p>

<table class="gridtable">
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

<?php if (isset($_SESSION['id_jur']) && (empty($totalRows_rec_siswa_tampil) || ($totalRows_rec_siswa_tampil = 0)) ) { ?>
	<div class="alert alert-danger">Data tidak ditemukan</div>
<?php }  ?>