<h2>Pesan Baru</h2>

<form class="well" method="post" name="form1" action="proses_pesan.php">
  <table class="table table-hover" id="dtb">
    <tr>
      <td style="width:150px;">Judul</td>
      <td><input class="form-control" type="text" name="pesan_judul" required></td>
    </tr>
    <tr>
      <td>Isi Pesan</td>
      <td><textarea class="form-control" name="pesan_text" rows="8" required></textarea></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input class="btn btn-success" type="submit" value="Kirim"></td>
    </tr>
  </table>
  <input type="hidden" name="MM_insert" value="form1">
</form>