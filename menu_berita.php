<?php

$query_rec_menu_berita = "SELECT * FROM tb_berita ORDER BY berita_tgl DESC";
$rec_menu_berita = mysql_query($query_rec_menu_berita, $koneksi) or die(mysql_error());
$row_rec_menu_berita = mysql_fetch_assoc($rec_menu_berita);
$totalRows_rec_menu_berita = mysql_num_rows($rec_menu_berita);
?>

<h2>Berita</h2>
<?php do { ?>
<div style="font-size:16px; font-weight:bold; color:#06F"><a href="index.php?hal=menu_berita_detail&berita_id=<?php echo $row_rec_menu_berita['berita_id']; ?>"><?php echo $row_rec_menu_berita['berita_judul']; ?></a></div>
<div style="font-size:12px;color:#ccc; border-bottom: 1px dotted #ccc;"><i><?php echo $row_rec_menu_berita['berita_tgl']; ?></i></div>
<div><?php echo htmlspecialchars_decode(substr($row_rec_menu_berita['berita_text'], 0, 200)); ?>...</div>
<?php } while ($row_rec_menu_berita = mysql_fetch_assoc($rec_menu_berita)); ?>

