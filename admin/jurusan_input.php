<h2>Tambah Jurusan</h2>
<form class="well" method="post" name="form1" action="jurusan_proses.php">
  <table class="table table-hover">
    <tr>
      <td style="width:150px">Kode</td>
      <td><input class="form-control" type="text" name="jur_kode"></td>
    </tr>
    <tr>
      <td>Nama</td>
      <td><input class="form-control" type="text" name="jur_nama"></td>
    </tr>
    <tr>
      <td>Keterangan</td>
      <td><input class="form-control" type="text" name="jur_keterangan"></td>
    </tr>
    <tr>
      <td>Kuota:</td>
      <td><input class="form-control" type="text" name="jur_kuota"></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input class="btn btn-primary" type="submit" value="Simpan">
      <a class="btn btn-danger" href="index.php?hal=jurusan_tampil">Batal</a></td>
    </tr>
  </table>
  <input type="hidden" name="MM_insert" value="form1">
</form>
