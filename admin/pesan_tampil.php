<?php 

$query_rec_pesan_tampil = "SELECT *, (SELECT user_nama_lengkap FROM tb_user WHERE user_id=pesan_id_user) AS NM FROM tb_pesan WHERE pesan_parent=0 ORDER BY pesan_tgl DESC";
$rec_pesan_tampil = mysql_query($query_rec_pesan_tampil, $koneksi) or die(mysql_error());
$row_rec_pesan_tampil = mysql_fetch_assoc($rec_pesan_tampil);
$totalRows_rec_pesan_tampil = mysql_num_rows($rec_pesan_tampil);
?>

<h2>Daftar Pesan</h2>

<table class="table table-bordered" id="dtb">
<thead>
  <tr>
    <th>Pengirim</th>
    <th>Tanggal</th>
    <th>Pesan</th>
  </tr>
</thead>
<tbody>
  <?php do { ?>
    <tr>
      <td><?php echo $row_rec_pesan_tampil['NM']; ?></td>
      <td><?php echo $row_rec_pesan_tampil['pesan_tgl']; ?></td>
      <?php if ($row_rec_pesan_tampil['pesan_baca'] == 'Y') { ?>
      	<td><a href="index.php?hal=pesan_balas&pesan_id=<?php echo $row_rec_pesan_tampil['pesan_id']; ?>"><?php echo $row_rec_pesan_tampil['pesan_judul']; ?></a></td>
      <?php } else { ?>
      	<td><b><a href="index.php?hal=pesan_balas&pesan_id=<?php echo $row_rec_pesan_tampil['pesan_id']; ?>"><?php echo $row_rec_pesan_tampil['pesan_judul']; ?></a></b></td>
      <?php } ?>
    </tr>
    <?php } while ($row_rec_pesan_tampil = mysql_fetch_assoc($rec_pesan_tampil)); ?>
</tbody>
</table>