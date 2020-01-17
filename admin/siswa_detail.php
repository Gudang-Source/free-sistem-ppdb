<?php 

$colname_DetailRS1 = "-1";
if (isset($_GET['siswa_no_psb'])) {
  $colname_DetailRS1 = $_GET['siswa_no_psb'];
}

$query_DetailRS1 = sprintf("SELECT *, (SELECT jur_nama FROM tb_jurusan WHERE jur_id=siswa_id_jur) AS JUR,
							(SELECT berkas_upload_name FROM tb_berkas WHERE berkas_id_user=siswa_id_user ORDER BY berkas_id DESC LIMIT 1) as BRK
							 FROM tb_siswa WHERE siswa_no_psb = %s", GetSQLValueString($colname_DetailRS1, "text"));
$DetailRS1 = mysql_query($query_DetailRS1, $koneksi) or die(mysql_error());
$row_DetailRS1 = mysql_fetch_assoc($DetailRS1);
$totalRows_DetailRS1 = mysql_num_rows($DetailRS1);


?>

<h2>Detail Pendaftar: <?php echo $row_DetailRS1['siswa_no_psb']; ?>
<a href="index.php?hal=siswa_tampil" class="btn btn-primary btn-sm pull-right">Kembali</a>
</h2>

<table class="table table-hover">  
  <tr>
    <td style="width:150px;"><strong>NOMOR</strong></td>
    <td><?php echo $row_DetailRS1['siswa_no_psb']; ?> </td>
  </tr>
  <tr>
    <td><strong>JURUSAN</strong></td>
    <td><?php echo $row_DetailRS1['JUR']; ?> </td>
  </tr>
  <tr>
    <td><strong>NAMA LENGKAP</strong></td>
    <td><?php echo $row_DetailRS1['siswa_nama']; ?> </td>
  </tr>
  <tr>
    <td><strong>NIS</strong></td>
    <td><?php echo $row_DetailRS1['siswa_nis']; ?> </td>
  </tr>
  <tr>
    <td><strong>JENIS KELAMIN</strong></td>
    <td><?php echo $row_DetailRS1['siswa_jk']; ?> </td>
  </tr>
  <tr>
    <td><strong>TEMPAT LAHIR</strong></td>
    <td><?php echo $row_DetailRS1['siswa_tmplahir']; ?> </td>
  </tr>
  <tr>
    <td><strong>TGL LAHIR</strong></td>
    <td><?php echo $row_DetailRS1['siswa_tgllahir']; ?> </td>
  </tr>
  <tr>
    <td><strong>AGAMA</strong></td>
    <td><?php echo $row_DetailRS1['siswa_agama']; ?> </td>
  </tr>
  <tr>
    <td><strong>ALAMAT</strong></td>
    <td><?php echo $row_DetailRS1['siswa_alamat']; ?> </td>
  </tr>
  <tr>
    <td><strong>NAMA AYAH</strong></td>
    <td><?php echo $row_DetailRS1['siswa_ayah_nama']; ?> </td>
  </tr>
  <tr>
    <td><strong>ALAMAT AYAH</strong></td>
    <td><?php echo $row_DetailRS1['siswa_ayah_alamat']; ?> </td>
  </tr>
  <tr>
    <td><strong>PEKERJAAN AYAH</strong></td>
    <td><?php echo $row_DetailRS1['siswa_ayah_pek']; ?> </td>
  </tr>
  <tr>
    <td><strong>HP AYAH</strong></td>
    <td><?php echo $row_DetailRS1['siswa_ayah_hp']; ?> </td>
  </tr>
  <tr>
    <td><strong>ASAL SEKOLAH</strong></td>
    <td><?php echo $row_DetailRS1['siswa_sekolah_asal']; ?> </td>
  </tr>
  <tr>
    <td><strong>STATUS SEKOLAH</strong></td>
    <td><?php echo $row_DetailRS1['siswa_sekolah_sta']; ?> </td>
  </tr>
  <tr>
    <td><strong>ALAMAT SEKOLAH</strong></td>
    <td><?php echo $row_DetailRS1['siswa_sekolah_alm']; ?> </td>
  </tr>
  <tr>
    <td><strong>NO STTB</strong></td>
    <td><?php echo $row_DetailRS1['siswa_no_sttb']; ?> </td>
  </tr>
  <tr>
    <td><strong>NO SKHUN/STL</strong></td>
    <td><?php echo $row_DetailRS1['siswa_no_skhun']; ?> </td>
  </tr>
  <tr>
    <td><strong>TAHUN LULUS</strong></td>
    <td><?php echo $row_DetailRS1['siswa_thn_lls']; ?> </td>
  </tr>
  <tr>
    <td><strong>NILAI</strong></td>
    <td><?php echo $row_DetailRS1['siswa_nilai']; ?> </td>
  </tr>
  <tr>
    <td><strong>BERKAS</strong></td>
    <td>
    	<?php if (!empty($row_DetailRS1['BRK'])) { ?>    
    	<a href="../File/Berkas/<?php echo $row_DetailRS1['BRK']; ?>"><?php echo $row_DetailRS1['BRK']; ?></a>
        <?php } else { ?>
        <span class="label label-danger">Tidak ada berkas</span>
        <?php } ?>
        </td>
  </tr>
</table>
