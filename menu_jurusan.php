<?php 

$query_rec_menu_jurusan = "SELECT * FROM tb_jurusan";
$rec_menu_jurusan = mysql_query($query_rec_menu_jurusan, $koneksi) or die(mysql_error());
$row_rec_menu_jurusan = mysql_fetch_assoc($rec_menu_jurusan);
$totalRows_rec_menu_jurusan = mysql_num_rows($rec_menu_jurusan);
?>
<h2>Jurusan</h2>

<table class="table table-bordered">
  <tr>
    <th>No</th>
    <th>Kode</th>
    <th>Nama</th>
    <th>Keterangan</th>
  </tr>
  <?php $no=0; do { $no++;?>
    <tr>
      <td><?php echo $no; ?></td>
      <td><?php echo $row_rec_menu_jurusan['jur_kode']; ?></td>
      <td><?php echo $row_rec_menu_jurusan['jur_nama']; ?></td>
      <td><?php echo $row_rec_menu_jurusan['jur_keterangan']; ?></td>
    </tr>
    <?php } while ($row_rec_menu_jurusan = mysql_fetch_assoc($rec_menu_jurusan)); ?>
</table>
