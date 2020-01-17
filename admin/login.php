<?php 
if (!isset($_SESSION)) {
  session_start();
}

if (empty($_SESSION['user_id'])) { 

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Skripsi">
    <meta name="author" content="Sri Wahyuni">
    <title>PPDB Online :: Dashboard</title>
	
    <link href="../Asset/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
    	<div class="container">
        	<div class="row">
            <div class="col-md-4"></div>
        	<div class="col-md-4">				
                <div style="height:100px;"></div>
				<h3 class="text-center">Login Dashboard</h3>
                <form class="well" method="POST" action="login_proses.php">
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" class="form-control" name="username" placeholder="Username" required>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Password" required>
                    </div>
                        <input type="submit" class="btn btn-primary" value="Login">
						<a class="btn btn-success" href="../index.php">Halaman Utama</a>
                    <input type="hidden" name="form_login" value="login">
                </form>
				<?php if (isset($_SESSION['pesan'])) {
                    echo '<div class="alert alert-danger">' . $_SESSION['pesan'] . '</div>';
                } ?>
            </div>
            <div class="col-md-4"></div>
        </div>
	</body>
</html>

<?php 
	unset($_SESSION['pesan']);

	} else {
		header("location:index.php");	
}