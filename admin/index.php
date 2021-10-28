<?php 
	session_start();
	include '../dbconnect.php';
		
	$usercount = mysqli_query($conn,"select count(id) as jumlahuser from users where role='member'");
	$usercount2 = mysqli_fetch_assoc($usercount);
	$usercount3 = $usercount2['jumlahuser'];
	
	?>

<head>
    <meta name="viewport" content="width-device-width, initial scale-1.0">
    <link rel="stylesheet" href="../css/style_admin.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	
    <title>Dashboard</title>
</head>
    <div id="app">
        <div class="sidebar">
            <div class="header">
				<div>
				<img src="https://res.cloudinary.com/mhmd/image/upload/v1556074849/avatar-1_tcnd60.png" alt="..." width="65" class="mr-3 rounded-circle img-thumbnail shadow-sm">
					<h4 class="m-0">Administrator</h4>
					<p class="font-weight-light text-muted mb-0">Kelompok 7</p>
				</div>
            </div>
            <div class="body">
				<a href="index.php"><div class="item active">Dashboard</div></a>
                <a href="user_list.php"><div class="item">User List</div></a>
                <a href="book_list.php"><div class="item">Book List</div></a>
                <a href="logout.php"><div class="item">Log out</div></a>
            </div>
        </div>
        <div class="content">
            <div class="header">
                <div class="hamburger" onclick="toggleSidebar()">
                    <div></div>
                    <div></div>
                    <div></div>
				</div>
				<div class="col" style="float:left;">Dashboard</div>
                <div class="logout"><a href="logout.php">SIGN OUT <i class="fa fa-sign-out"></i></a></div>
            </div>
            <div class="body">
            </div>
            <div class="container">         
			<div class="card-group">
				<div class="card">
					<div class="card-body">
					<h5 class="card-title" align="center">User Total</h5>
					<p class="card-text" align="center"><?php echo $usercount3 ?></p>
					<p class="card-text" align="center"><small class="text-muted">Last updated 3 mins ago</small></p>
					</div>
				</div>
			</div>
            </div>
        </div>
	</div>
	
	<script>
        function toggleSidebar(){
            const side = document.querySelector('#app .sidebar');
            side.classList.toggle('sidebar-hide');
        }
    </script>