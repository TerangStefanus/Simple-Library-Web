<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/style_user.css">

	<!-- JS -->
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<title>Navbar</title>
</head>
<body>
	<section id="nav-bar">
		<div class="navbar-bg">
			<nav class="navbar navbar-expand-lg">
				<a href="#" class="navbar-brand"><img src="../images/logo1.png" width="50" height="50"></a>
				<div class="collpase navbar-collapse" id="navbarSupportedContent">
					<!-- Navbar bagian kiri -->
					<ul class="navbar-nav mr-auto">
						<li>
							<li class="nav-item">
								<a class="nav-link" href="../pages/landing_page.php">
									Home
								</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="../pages/books_itemList.php">
									Books
								</a>
							</li>
							<li class="nav-item dropdown">
								<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown">
									Genre
								</a>
								<div class="dropdown-menu dropdown-menu-center" aria-labelledby="navbarDropdown">
									<a class="dropdown-item" href="../pages/fantasy_itemList.php">Fantasy</a>
									<div class="dropdown-divider"></div>
									<a class="dropdown-item" href="../pages/horror_itemList.php">Horror</a>
									<div class="dropdown-divider"></div>
									<a class="dropdown-item" href="../pages/scifi_itemList.php">Sci-Fi</a>
								</div> 
							</li>
						</li>
					</ul>
					<!-- Navbar bagian kanan -->
					<ul class="navbar-nav ml-auto">
						<li class="nav-item">
							<a class="nav-link" href="#">
								<i class="fa fa-search"></i>
							</a>
						</li>
						<?php
						// var_dump($_SESSION);
						// die();
						if ( !isset($_SESSION['isLogin']) ) {
						?>
							<li class="nav-item dropdown" href="#" style="margin-right:40px">
								<a class="nav-link" id="navbarDropdown" role="button" data-toggle="dropdown">
									<i class="fa fa-user"></i>
								</a>
								<div class="dropdown-menu dropdown-menu-center" aria-labelledby="navbarDropdown">
									<ul>
										<li><a href="#" data-toggle="modal" data-target="#signIn">Sign In/Up</a></li>
									</ul>
								</div>
							</li>
						<?php 
						} else {
						?>
							<li class="nav-item dropdown" href="#">
								<a class="nav-link" id="navbarDropdown" role="button" data-toggle="dropdown">
									<i class="fa fa-user"></i>
								</a>
								<div class="dropdown-menu dropdown-menu-center" aria-labelledby="navbarDropdown">
									<a class="dropdown-item" href="../pages/userProfile.php">My Profile</a>
									<div class="dropdown-divider"></div>
									<a class="dropdown-item" href="../pages/managePersonalDetails.php">Settings</a>
									<div class="dropdown-divider"></div>
									<a class="dropdown-item" href="../admin/logout.php">Logout</a>
								</div>
							</li>
						<?php
						}
						?>
					</ul>
				</div>
			</nav>
		</div>
	</section>
</body>
</html>