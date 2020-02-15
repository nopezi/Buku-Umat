<?php include '../config/class.php';?>
<!DOCTYPE html>
<html>
<head>
	<title>Login Admin</title>
	<link rel="stylesheet" type="text/css" href="../assets/bootstrap/css/bootstrap.css">
</head>
<body>
	<div class="container" style="padding-top: 150px">
		<div class="row">
			<div class="col-md-4 col-md-offset-4">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h3 class="panel-title">Login Administrator</h3>
					</div>
					<div class="panel-body">
						<form method="post">
							<div class="form-group">
								<label>E-Mail</label>
								<input type="text" class="form-control" name="em">
							</div>
							<div class="form-group">
								<label>Password</label>
								<input type="password" class="form-control" name="ps">
							</div>
							<button class="btn btn-primary" name="login">Login</button>
						</form>
						<?php
						// jika ada tombol login maka
						if(isset($_POST['login']))
						{
							// obyek admin mengakses fungsi login admin(akun dari form)
							$hasil = $admin->login_admin($_POST['em'], $_POST['ps']);
							
							
							// jk hasil sama dengan sukses, mk masuk index.php admin
							if($hasil=="sukses")
							{
								echo "<div class='alert alert-info'>Login Sukses</div>";
								echo "<meta http-equiv='refresh' content='0;url=index.php'>";

							}
							// selain itu gagal 
							else{
								echo "<div class='alert alert-danger'>Login Gagal</div>";
								echo "<meta http-equiv='refresh' content='1;url=login.php'>";
							}
						}

						 ?>
					</div>				
				</div>				
			</div>
		</div>
	</div>
</body>
</html>
