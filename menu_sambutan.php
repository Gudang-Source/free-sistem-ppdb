<h2>Sambutan Kepala Sekolah</h2>

<?php 
$sql = "SELECT * FROM tb_setting WHERE set_name='sambutan'";
$value = mysql_result(mysql_query($sql), 0, 'set_value');
$file = mysql_result(mysql_query($sql), 0, 'set_file');

?>

<p><?php echo htmlspecialchars_decode($value); ?> </p>