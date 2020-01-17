<h2>Daftar Akun Baru</h2>

<?php 
if (isset($_SESSION['pesan'])) {
	echo '<div class="alert alert-info">' . $_SESSION['pesan'] . '</div>';
} 
?>

<div class="row">
	<div class="col-md-12">
        <form class="well" method="POST" action="proses_akun.php">
            <div class="form-group">
                <label>Username</label>
                <input type="text" class="form-control" name="username" placeholder="Username" required>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control" name="password" placeholder="Password" required>
            </div>
            <div class="form-group">
                <label>Nama Lengkap</label>
                <input type="text" class="form-control" name="namalengkap" placeholder="Nama Lengkap" required>
            </div>
			 <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control" name="email" placeholder="Email jika ada">
            </div>
          
            	<input type="submit" class="btn btn-primary" value="Daftar">
            <input type="hidden" name="form_daftar" value="daftar">
        </form>    
    </div>    	
</div>