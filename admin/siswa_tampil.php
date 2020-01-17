<h2>Daftar Calon Siswa
	<div class="pull-right">
    	<a href="index.php?hal=siswa_jurnal" class="btn btn-primary btn-sm">Jurnal</a>
    </div>
</h2>

<?php 

	$sql = "SELECT *, (SELECT jur_nama FROM tb_jurusan WHERE jur_id=siswa_id_jur) AS JUR FROM tb_siswa";
	$query = mysql_query($sql);
	$siswa = mysql_fetch_assoc($query);
	$ada = mysql_num_rows($query);

?>

<?php 
if (isset($_SESSION['pesan'])) {
	echo '<div class="alert alert-info">' . $_SESSION['pesan'] . '</div>';
} 
?>

<table class="table table-bordered" id="dtb">
<thead>
  <tr>
    <th>NOMOR</th>
    <th>NAMA</th>
    <th>NILAI</th>
    <th>JURUSAN</th>
    <th>VLD</th>
    <th>STATUS</th>
    <th>PROSES</th>
  </tr>
</thead>
<tbody>
  <?php do { ?>
    <tr>
      <td><a href="index.php?hal=siswa_detail&siswa_no_psb=<?php echo $siswa['siswa_no_psb']; ?>"><?php echo $siswa['siswa_no_psb']; ?></a></td>
      <td><?php echo $siswa['siswa_nama']; ?></td>
      <td><?php echo $siswa['siswa_nilai']; ?></td>
      <td><?php echo $siswa['JUR']; ?></td>
      <td>
	    <?php 
		if (empty($siswa['siswa_validasi'])) {
			echo '<img src="../Asset/images/N.png" alt="[IMG]">';
		} else { 
			echo '<img src="../Asset/images/' . $siswa['siswa_validasi'] . '.png" alt="[IMG]">'; 
		} ?></td>
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
      <td>
	  	<div class="btn-group">
          <button type="button" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-cog"></span></button>
          <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="caret"></span>
            <span class="sr-only">Toggle Dropdown</span>
          </button>
          <ul class="dropdown-menu">
            <li><a href="siswa_proses.php?no_psb=<?php echo $siswa['siswa_no_psb']; ?>&status=terima">Terima</a></li>
            <li><a href="siswa_proses.php?no_psb=<?php echo $siswa['siswa_no_psb']; ?>&status=tolak">Tolak</a></li>
          </ul>
        </div>
      </td>
    </tr>
    <?php } while ($siswa = mysql_fetch_assoc($query)); ?>
</tbody>
</table>