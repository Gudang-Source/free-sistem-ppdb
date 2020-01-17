<?php 
$pesan_detail = "-1";
if (isset($_GET['pesan_id'])) {
  $pesan_detail = $_GET['pesan_id'];
}

$query_rec_menu_pesan = "SELECT * FROM tb_pesan WHERE pesan_id='$pesan_detail'";
$rec_menu_pesan = mysql_query($query_rec_menu_pesan, $koneksi) or die(mysql_error());

$judul = mysql_result($rec_menu_pesan, 0, 'pesan_judul');
$tgl = mysql_result($rec_menu_pesan, 0, 'pesan_tgl');
$isi = mysql_result($rec_menu_pesan, 0, 'pesan_text');

$sql_parent = "SELECT * FROM tb_pesan WHERE pesan_parent='$pesan_detail'";
$que_parent = mysql_query($sql_parent, $koneksi) or die(mysql_error());

?>

<h2>Pesan
	<a href="index.php?hal=menu_pesan" class="btn btn-primary btn-sm pull-right">Kembali</a>
</h2>

<div class="well">
	<div style="font-size:14px;font-weight:bold;"><?php echo $judul; ?></div>
	<div style="font-size:12px;color:#ccc;"><i><?php echo $tgl; ?></i></div><br>
	<?php echo $isi; ?>
</div>

<blockquote>
	<div class="well">
		<?php
    		if (mysql_num_rows($que_parent) > 0) {
				$balas = mysql_result($que_parent, 0, 'pesan_text');
				$bls_tgl = mysql_result($que_parent, 0, 'pesan_tgl');
				echo $balas;
			?>
            	<div style="margin-top:5px;font-size:12px;color:#ccc;"><i><?php echo $bls_tgl; ?> Oleh: Admin</i></div>
            <?php } else { ?>            
            	<i>Menunggu balasan...</i>
            <?php } ?>
	</div>        
</blockquote>
