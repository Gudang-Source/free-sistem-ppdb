<h2>Status Pendaftaran</h2>

<?php 

$no_psb = isset($_GET['no_psb']) ? $_GET['no_psb'] : "";

$sql = "SELECT *, (SELECT jur_nama FROM tb_jurusan WHERE jur_id=siswa_id_jur) AS JUR FROM tb_siswa WHERE siswa_no_psb='$no_psb'";
$query = mysql_query($sql);
$siswa = mysql_fetch_assoc($query);

if (mysql_num_rows($query) > 0 ) {
?>
    <table class="table table-bordered">
      <tr>
        <th>NOMOR</th>
        <th>NAMA</th>
        <th>NILAI</th>
        <th>JURUSAN</th>
        <th>STATUS</th>
      </tr>
      <?php do { ?>
        <tr>
          <td><?php echo $siswa['siswa_no_psb']; ?></td>
          <td><?php echo $siswa['siswa_nama']; ?></td>
          <td><?php echo $siswa['siswa_nilai']; ?></td>
          <td><?php echo $siswa['JUR']; ?></td>
          <td>
            <?php
                if ($siswa['siswa_terima'] == NULL) {
                    echo "Belum<br>Diproses";	
                } elseif ($siswa['siswa_terima'] == "Y") {				
                    echo "<span class='text-success'>Diterima</span>";
                } else {
                    echo "<span class='text-danger'>Ditolak</span>";
                }
            ?>
          </td>
        </tr>
        <?php } while ($siswa = mysql_fetch_assoc($query)); ?>
    </table>
<?php } else {
	echo '<div class="alert alert-danger">Data tidak ditemukan</div>';	
}