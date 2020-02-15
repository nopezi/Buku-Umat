<div class="topbar">
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-md-offset-6">
				<div class="contact">
					<ul>
					   
						<li>
						   <a href="http://bit.ly/WhatsappBukuUmat" style="color:#fff;">
						    <i class="fa fa-whatsapp text-center"></i> 0819-1050-2655
						    </a>
					    </li>
						
						<li>
						    <a href="https://goo.gl/maps/pN8H1w7d3KjT6XJa7" style="color:#fff">
						    <i class="fa fa-map-marker text-center"></i> Jl. Sidikan no. 66 Rt. 34 Rw. 09 - Jogja</li>
                            </a>
					</ul>
				</div>
				
			</div>
		</div>
	</div>
</div>

<header class="header">
	<div class="container">
		<div class="row">
			<div class="col-md-3">
				<div class="logo">
					<!-- ukuran logo 230 x 115 -->
					<a href="index.php" style="font-family: 'Pacifico', cursive;font-size:35px;text-decoration:none;color:#fff">
						BukuUmat
					<!--<img src="assets/logo/logo2.png">-->
					</a>
				</div>
			</div>
			<div class="col-md-6">
				<div class="search">
					<form method="GET" action="produk.php">
						<div class="form-group">
							<div class="input-group" >
								<input type="text" class="form-control" name="cari">
								
								<span class="input-group-btn">
									<button class="btn btn-color"><i class="fa fa-search"></i></button>
								</span>
							</div>
						</div>
					</form>
				</div>
			</div>
			<div class="col-md-3">
				<div class="keranjang">
					<div class="btn-group">
						<a href="keranjang.php" class="btn btn-color">
							<i class="fa fa-shopping-bag"></i>
							<?php if (isset($_SESSION['keranjang'])): ?>
								<span class="badge"><?php echo array_sum($_SESSION['keranjang']); ?></span> 
								<?php else: ?>
									<span class="badge"></span>
							<?php endif ?>
						</a>

					</div>
				</div>
			</div>
		</div>
	</div>
</header>

<nav class="navbar navbar-default" rol="navigation">
	<div class="container">

		<div class="navbar-header"></div>
		<button class="navbar-toggle" data-toggle="collapse" data-target=".naff">
			<span class="sr-only"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
		<div class="navbar-collapse collapse naff">
			<ul class="nav navbar-nav">
				<li class="<?php if($aktif=="home"){echo "active";} ?>"><a href="index.php">Home</a></li>
				<li class="<?php if($aktif=="produk"){echo "active";} ?>"><a href="produk.php">Produk</a></li>
				<li class="<?php if($aktif=="request"){echo "active";} ?>"><a href="request.php">Request Buku</a></li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li class="<?php if($aktif=="konfirmasi"){echo "active";} ?> dropdown"><a href="konfirmasi.php" class="dropdown" data-toggle="dropdown">Cek Invoice</a>
					<ul class="dropdown-menu" style="width: 300px;">
						<li>
							<div style="padding:20px 10px;">
								<form action="konfirmasi.php">
									<div class="form-group">
										<input type="text" class="form-control" placeholder="No. Invoice Anda" style="height: 40px;" name="id">
									</div>
									<button class="btn btn-block btn-success">Cek</button>
								</form>
							</div>
						</li>
					</ul>
				</li>
			</ul>
		</div>
	</div>
</nav>