<?php 

$siswa = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : "";

$query_rec_menu_pesan = "SELECT * FROM tb_pesan WHERE pesan_id_user='$siswa' ORDER BY pesan_id DESC";
$rec_menu_pesan = mysql_query($query_rec_menu_pesan, $koneksi) or die(mysql_error());
$row_rec_menu_pesan = mysql_fetch_assoc($rec_menu_pesan);
$totalRows_rec_menu_pesan = mysql_num_rows($rec_menu_pesan);


if (!empty($siswa)) {	
?>

<h2>Pesan
	<a href="index.php?hal=menu_pesan_input" class="btn btn-primary btn-sm pull-right">Pesan Baru</a>
</h2>

<?php 
if (isset($_SESSION['pesan'])) {
	echo '<div class="alert alert-info">' . $_SESSION['pesan'] . '</div>';
} 
?>

<?php
	if ($totalRows_rec_menu_pesan > 0) { 
	?>
	
	<table class="table table-hover" id="dtb">
	<thead>
		<tr>
        	<th style="width:170px">Tanggal</th>
			<th>Pesan</th>
		</tr>
	</thead>
	<tbody>
	  <?php do { ?>
		<tr>
          <td><?php echo $row_rec_menu_pesan['pesan_tgl']; ?></td>
		  <td><a href="index.php?hal=menu_pesan_detail&pesan_id=<?php echo $row_rec_menu_pesan['pesan_id']; ?>"><?php echo $row_rec_menu_pesan['pesan_judul']; ?></a></td>
		</tr>
		<?php } while ($row_rec_menu_pesan = mysql_fetch_assoc($rec_menu_pesan)); ?>
	</tbody>
	</table>
		
	<?php } else {
		echo '<div class="alert alert-danger">Anda belum memiliki Pesan</div>';	
	}
} else {
	echo '<div class="alert alert-danger">Silakan login untuk melihat Pesan</div>';	
}
