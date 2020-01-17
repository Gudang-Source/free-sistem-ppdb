<?php

$query_rec_berita_tampil = "SELECT * FROM tb_berita";
$rec_berita_tampil = mysql_query($query_rec_berita_tampil, $koneksi) or die(mysql_error());
$row_rec_berita_tampil = mysql_fetch_assoc($rec_berita_tampil);
$totalRows_rec_berita_tampil = mysql_num_rows($rec_berita_tampil);
?>

<h2>Daftar Berita
	<a href="index.php?hal=berita_input" class="btn btn-primary btn-sm pull-right">Tambah Berita</a>
</h2>

<?php 
if (isset($_SESSION['pesan'])) {
	echo '<div class="alert alert-info">' . $_SESSION['pesan'] . '</div>';
} 
?>

<table class="table table-bordered" id="dtb">
<thead>
<tr>
  <th>Tanggal</th>
  <th>Judul</th>
  <th>Isi</th>
  <th>Aktif</th>
  <th>Aksi</th>
</tr>
</thead>
<tbody>
<?php do { ?>
  <tr>
    <td><?php echo $row_rec_berita_tampil['berita_tgl']; ?></td>
    <td><?php echo $row_rec_berita_tampil['berita_judul']; ?></td>
    <td><?php echo htmlspecialchars_decode(substr($row_rec_berita_tampil['berita_text'], 0, 150)). "..."; ?></td>
    <td><?php echo '<img src="../Asset/images/' . $row_rec_berita_tampil['berita_aktif'] . '.png">'; ?></td>
    <td>
    	<div class="btn-group" role="group">
    		<a class="btn btn-warning btn-xs" href="index.php?hal=berita_edit&berita_id=<?php echo $row_rec_berita_tampil['berita_id']; ?>"><i class="fa fa-pencil" aria-hidden="true"></i></a>
    		<a class="btn btn-danger btn-xs" href="berita_proses.php?hapus=<?php echo $row_rec_berita_tampil['berita_id']; ?>" onClick="return confirm('Apakah anda yakin menghapus berita ini?');"><i class="fa fa-trash" aria-hidden="true"></i></a>
         </div>   
    </td>
  </tr>
  <?php } while ($row_rec_berita_tampil = mysql_fetch_assoc($rec_berita_tampil)); ?>
</tbody>
</table>
