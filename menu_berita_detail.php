<?php 

$colname_rec_berita_detail = "-1";
if (isset($_GET['berita_id'])) {
  $colname_rec_berita_detail = $_GET['berita_id'];
}

$query_rec_berita_detail = sprintf("SELECT * FROM tb_berita WHERE berita_id = %s", GetSQLValueString($colname_rec_berita_detail, "int"));
$rec_berita_detail = mysql_query($query_rec_berita_detail, $koneksi) or die(mysql_error());
$row_rec_berita_detail = mysql_fetch_assoc($rec_berita_detail);
$totalRows_rec_berita_detail = mysql_num_rows($rec_berita_detail);
?>

<?php do { ?>
<div style="font-size:16px; font-weight:bold; color:#06F"><?php echo $row_rec_berita_detail['berita_judul']; ?></div>
<div style="font-size:12px;color:#ccc; border-bottom: 1px dotted #ccc;"><i><?php echo $row_rec_berita_detail['berita_tgl']; ?></i></div>
<div><?php echo htmlspecialchars_decode($row_rec_berita_detail['berita_text']); ?></div>
<?php } while ($row_rec_berita_detail = mysql_fetch_assoc($rec_berita_detail)); ?>