<h2>Pendaftaran</h2>

<?php 

$siswa = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : "";

$sql = "SELECT *, (SELECT jur_nama FROM tb_jurusan WHERE jur_id=siswa_id_jur) AS JUR FROM tb_siswa WHERE siswa_id_user='$siswa'";
$query = mysql_query($sql);
$siswa = mysql_fetch_assoc($query);
$ada = mysql_num_rows($query);

$query_rec_jur_list = "SELECT * FROM tb_jurusan WHERE (SELECT COUNT(*) FROM tb_siswa WHERE siswa_terima='Y' AND siswa_id_jur=jur_id) < jur_kuota";
$rec_jur_list = mysql_query($query_rec_jur_list, $koneksi) or die(mysql_error());
$row_rec_jur_list = mysql_fetch_assoc($rec_jur_list);
$totalRows_rec_jur_list = mysql_num_rows($rec_jur_list);
 
 
if (!empty($_SESSION['user_id'])) { 

	if ($ada) { 
	?>
	
		<?php 
		$validasi = mysql_result($query, 0, 'siswa_validasi');
        if ($validasi == 'N') { ?>
        <div class="alert alert-warning">
            Pastikan anda telah mengisi data dengan benar, Klik Validasi jika telah selesai. Administrator akan memproses data anda.
        </div>
        <?php } ?>
        
        <?php 
        if (isset($_SESSION['pesan'])) {
            echo '<div class="alert alert-success">' . $_SESSION['pesan'] . '</div>';
        } 
        ?>
        
        
        <table class="table table-bordered">
          <tr>
            <th>NOMOR</th>
            <th>NAMA</th>
            <th>NILAI</th>
            <th>JURUSAN</th>
            <th colspan="2">VALIDASI</th>
            <th>STATUS</th>
          </tr>
          <?php do { ?>
            <tr>
              <td><?php echo $siswa['siswa_no_psb']; ?></td>
              <td><?php echo $siswa['siswa_nama']; ?></td>
              <td><?php echo $siswa['siswa_nilai']; ?></td>
              <td><?php echo $siswa['JUR']; ?></td>
              <td>
                <?php 
                    if ($siswa['siswa_validasi'] == 'N') {
                        echo "<a href='index.php?hal=menu_pendaftaran_edit&no_psb=$siswa[siswa_no_psb]'>Edit</a>"; 
                    } else {
                        echo '<img src="Asset/images/Y.png" alt="[VALID]">';	
                    }
                    
                ?>
              </td>
              <td>
                <?php
                    if ($siswa['siswa_validasi'] == 'N') {
                        echo '<a href="proses_validasi.php?validasi=1" onClick="return confirm(\'Apakah Anda yakin untuk validasi data ini? Proses tidak bisa dikembalikan\')"><span class="glyphicon glyphicon-cog"></span></a>'; 
                    } else {
                        echo '<a href="#" onClick="NewWin=window.open(\'print.php?cetak=menu_pendaftaran_ctk&no_psb=' . $siswa['siswa_no_psb'] . '\',\'NewWin\',\'toolbar=no,status=no,width=800,height=500,scrollbars=yes\');"><span class="glyphicon glyphicon-print"></span></a>';	
                    }
                ?>
                </td>
              <td>
                <?php
                    if ($siswa['siswa_terima'] == NULL) {
                        echo "Belum<br>Diproses";	
                    } elseif ($siswa['siswa_terima'] == "Y") {				
                        echo "<span class='text-success'>Diterima</span>";
                    } else {
                        echo "<span class='text-danger'>Ditolak</span>";
                    }
                ?>
              </td>
            </tr>
            <?php } while ($siswa = mysql_fetch_assoc($query)); ?>
        </table>
	
	<?php } else { ?>
	   
		
		<div class="alert alert-info">
			Isilah form berikut ini dengan data yang sebenarnya. Pilihan Jurusan tersedia jika kuota masih ada. 
		</div>
		
        <?php 
		if (isset($_SESSION['pesan'])) {
			echo '<div class="alert alert-danger">' . $_SESSION['pesan'] . '</div>';
		} 
		?>
        
		<form action="proses_daftar.php" method="post" enctype="multipart/form-data" name="form1" class="well">
		  <table class="table table-hover">
			<tr>
			  <td style="width:150px;">Pilihan Jurusan</td>
			  <td><select class="form-control" name="siswa_id_jur" id="siswa_id_jur" required>
					<option value="">-- Pilih Jurusan -- </option>
				<?php
		do {  
		?>
				<option value="<?php echo $row_rec_jur_list['jur_id']?>"><?php echo $row_rec_jur_list['jur_kode']?> - <?php echo $row_rec_jur_list['jur_nama']?></option>
				<?php
		} while ($row_rec_jur_list = mysql_fetch_assoc($rec_jur_list));
		  $rows = mysql_num_rows($rec_jur_list);
		  if($rows > 0) {
			  mysql_data_seek($rec_jur_list, 0);
			  $row_rec_jur_list = mysql_fetch_assoc($rec_jur_list);
		  }
		?>
			  </select></td>
			</tr>
			<tr>
			  <td style="width:150px;">Nama Lengkap</td>
			  <td><input class="form-control" type="text" name="siswa_nama" required></td>
			</tr>
			<tr>
			  <td>NIS</td>
			  <td><input class="form-control" type="text" name="siswa_nis" required></td>
			</tr>
			<tr>
			  <td>Jenis Kelamin</td>
			  <td><select class="form-control" name="siswa_jk" id="siswa_jk">
				<option value="L">Laki-laki</option>
				<option value="P">Perempuan</option>
			  </select></td>
			</tr>
			<tr>
			  <td>Tempat Lahir</td>
			  <td><input class="form-control" type="text" name="siswa_tmplahir"></td>
			</tr>
			<tr>
			  <td>Tanggal Lahir</td>
			  <td>
				<div style="width:300px;" class="input-group date" data-date="" data-date-format="yyyy-mm-dd">
					<input class="form-control" type="text" name="siswa_tgllahir" value="" placeholder="Mulai Tanggal" readonly>
					<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
				</div>
			  </td>
			</tr>
			<tr>
			  <td>Agama</td>
			  <td><select class="form-control" name="siswa_agama" id="siswa_agama">
				<option value="Islam">Islam</option>
				<option value="Katolik">Katolik</option>
				<option value="Protestan">Protestan</option>
				<option value="Hindu">Hindu</option>
				<option value="Budha">Budha</option>
			  </select></td>
			</tr>
			<tr>
			  <td>Alamat</td>
			  <td><textarea class="form-control" name="siswa_alamat"></textarea></td>
			</tr>
			<tr>
			  <td>Nama Ayah</td>
			  <td><input class="form-control" type="text" name="siswa_ayah_nama"></td>
			</tr>
			<tr>
			  <td>Alamat Ayah</td>
			  <td><textarea class="form-control" name="siswa_ayah_alamat"></textarea></td>
			</tr>
			<tr>
			  <td>Pekerjaan Ayah</td>
			  <td><input class="form-control" type="text" name="siswa_ayah_pek"></td>
			</tr>
			<tr>
			  <td>HP Ayah</td>
			  <td><input class="form-control" type="text" name="siswa_ayah_hp"></td>
			</tr>
			<tr>
			  <td>Asal Sekolah</td>
			  <td><input class="form-control" type="text" name="siswa_sekolah_asal"></td>
			</tr>
			<tr>
			  <td>Status Sekolah</td>
			  <td><input class="form-control" type="text" name="siswa_sekolah_sta"></td>
			</tr>
			<tr>
			  <td>Alamat Sekolah</td>
			  <td><textarea class="form-control" name="siswa_sekolah_alm"></textarea></td>
			</tr>
			<tr>
			  <td>No STTB</td>
			  <td><input class="form-control" type="text" name="siswa_no_sttb"></td>
			</tr>
			<tr>
			  <td>No SKHUN/STL</td>
			  <td><input class="form-control" type="text" name="siswa_no_skhun"></td>
			</tr>
			<tr>
			  <td>Tahun Lulus</td>
			  <td><input class="form-control" type="text" name="siswa_thn_lls"></td>
			</tr>
			<tr>
			  <td>Nilai</td>
			  <td><input class="form-control" type="text" name="siswa_nilai"></td>
			</tr>
			<tr>
			  <td>Berkas</td>
			  <td><input type="file" name="siswa_berkas"><p class="help-block">Scan SKHUN/STL, Format .JPG</p></td>
			</tr>
			<tr>
			  <td>&nbsp;</td>
			  <td><input class="btn btn-success" type="submit" value="Daftar"></td>
			</tr>
		  </table>
		  <input type="hidden" name="MM_insert" value="form1">
		  <input type="hidden" name="siswa_id_user" value="<?php echo $_SESSION['user_id']; ?>">
		</form>

<?php }
 } else { ?>
	<div class="row">
		<div class="col-md-12">
			<div class="alert alert-danger">Silakan Login</div>        
		</div>    	
	</div>
<?php }
