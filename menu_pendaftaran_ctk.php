<?php 

$no_psb = isset($_GET['no_psb']) ? $_GET['no_psb'] : "";

$sql = "SELECT *, (SELECT jur_nama FROM tb_jurusan WHERE jur_id=siswa_id_jur) AS JUR FROM tb_siswa WHERE siswa_no_psb='$no_psb'";
$query = mysql_query($sql);
$siswa = mysql_fetch_assoc($query);

if (mysql_num_rows($query) > 0 ) {
?>

<p style="text-align:center">
    <span style="font-size:25px;"><b><?php echo $sekolah; ?></b></span><br>
    <span style="font-size:18px;"><?php echo $alamat; ?></span><br><br>
<span style="font-size:20px;"><b>KARTU PENDAFTARAN PPDB TAHUN <?php echo $tahun; ?></b></span></p>
<table width="500" class="gridtable">
  <tr>
    <td rowspan="5" style="width: 120px; text-align:center">Foto 3x4</td>
    <td style="width: 170px;"><strong>NOMOR</strong></td>
    <td><?php echo $siswa['siswa_no_psb']; ?></td>
  </tr>
  <tr>
    <td><strong>NAMA</strong></td>
    <td><?php echo $siswa['siswa_nama']; ?></td>
  </tr>
  <tr>
    <td><strong>TEMPAT/TGL LAHIR</strong></td>
    <td><?php echo $siswa['siswa_tmplahir']; ?> / <?php echo tanggal_indonesia1($siswa['siswa_tgllahir']); ?></td>
  </tr>
  <tr>
    <td><strong>JURUSAN</strong></td>
    <td><?php echo $siswa['JUR']; ?></td>
  </tr>
  <tr>
    <td><strong>STATUS</strong></td>
    <td>
    	<?php
                if ($siswa['siswa_terima'] == NULL) {
                    echo "Belum<br>Diproses";	
                } elseif ($siswa['siswa_terima'] == "Y") {				
                    echo "<span class='text-success'>DITERIMA</span>";
                } else {
                    echo "<span class='text-danger'>DITOLAK<strong></strong></span>";
                }
            ?>
    </td>
  </tr>
</table>
<p>Untuk dimohon segera Daftar Ulang/Registrasi ke Panitia PPDB Sekolah.
<div style="text-align:right"><i>Dicetak pada : <?php echo date('Y-m-d H:i:s'); ?></i></div>
</p>

<?php } else {
	echo '<div class="alert alert-danger">Data tidak ditemukan</div>';	
}