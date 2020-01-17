<h2>Tambah User</h2>

<form class="well" method="post" name="form1" action="user_proses.php">
  <table class="table table-hover">
    <tr>
      <td style="width:150px;">Username</td>
      <td><input class="form-control" type="text" name="user_name"></td>
    </tr>
    <tr>
      <td>Password</td>
      <td><input class="form-control" type="password" name="user_password"></td>
    </tr>
    <tr>
      <td>Email</td>
      <td><input class="form-control" type="text" name="user_email"></td>
    </tr>
    <tr>
      <td>Nama Lengkap</td>
      <td><input class="form-control" type="text" name="user_nama_lengkap"></td>
    </tr>
    <tr>
      <td>Level</td>
      <td><select class="form-control" name="user_level" id="user_level">
        <option value="1">Administrator</option>
        <option value="2">Calon Siswa</option>
      </select></td>
    </tr>
    <tr>
      <td>Status</td>
      <td><input type="radio" name="user_aktif" id="radio" value="Y">
        Aktif 
        <input type="radio" name="user_aktif" id="radio2" value="N">
        Blokir</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input class="btn btn-primary" type="submit" value="Simpan">
      		<a href="index.php?hal=user_tampil" class="btn btn-danger">Batal</a>
      </td>
    </tr>
  </table>
  <input type="hidden" name="MM_insert" value="form1">
</form>