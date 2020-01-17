<script type="text/javascript">
    tinymce.init({
		selector: '#mytextarea',
        plugins: "table",
        height: "200"
    });
</script>

<h2>Tambah Berita</h2>

<form class="well" method="post" name="form1" action="berita_proses.php">
  <table class="table table-hover">
    <tr>
      <td style="width:150px">Judul</td>
      <td><input class="form-control" type="text" name="berita_judul"></td>
    </tr>
    <tr>
      <td>Isi</td>
      <td><textarea class="form-control" name="berita_text" id="mytextarea"></textarea></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input class="btn btn-primary" type="submit" value="Simpan">
      <a class="btn btn-danger" href="index.php?hal=berita_tampil">Batal</a></td>
    </tr>
  </table>
  <input type="hidden" name="MM_insert" value="form1">
</form>