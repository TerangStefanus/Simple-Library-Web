<?php 
	session_start();
	include '../dbconnect.php';
			
	if(isset($_POST["addbook"])) {
		$judul=$_POST['judul'];
		$quantity=$_POST['quantity'];
		$halaman=$_POST['halaman'];
		$penulis=$_POST['penulis'];
		$category=$_POST['category'];
		$pri=$_POST['genre'];
		$description=$_POST['description'];
		
		$file_name = $_FILES['uploadimage']['name'];
		$ext = pathinfo($file_name, PATHINFO_EXTENSION);
		$random = crypt($file_name, time());
		$ukuran_file = $_FILES['uploadimage']['size'];
		$tipe_file = $_FILES['uploadimage']['type'];
		$tmp_file = $_FILES['uploadimage']['tmp_name'];
		$path = "../images/".$random.'.'.$ext;
		$pathdb = "images/".$random.'.'.$ext;


		if($tipe_file == "image/jpeg" || $tipe_file == "image/png"){
		  if($ukuran_file <= 5000000){ 
			if(move_uploaded_file($tmp_file, $path)){ 
			
			  $query = "insert into books (quantity, judul, images, halaman, penulis, category, genre, description)
			  values('$quantity','$judul','$pathdb','$halaman','$penulis','$category','$genre', '$description')";
			  $sql = mysqli_query($conn, $query); // Eksekusi/ Jalankan query dari variabel $query
			  
			  if($sql){ 
				
				echo "<br><meta http-equiv='refresh' content='5; URL=book_list.php'> You will be redirected to the form in 5 seconds";
					
			  }else{
				// Jika Gagal, Lakukan :
				echo "Sorry, there's a problem while submitting.";
				echo "<br><meta http-equiv='refresh' content='5; URL=book_list.php'> You will be redirected to the form in 5 seconds";
			  }
			}else{
			  // Jika gambar gagal diupload, Lakukan :
			  echo "Sorry, there's a problem while uploading the file.";
			  echo "<br><meta http-equiv='refresh' content='5; URL=book_list.php'> You will be redirected to the form in 5 seconds";
			}
		  }else{
			// Jika ukuran file lebih dari 1MB, lakukan :
			echo "Sorry, the file size is not allowed to more than 1mb";
			echo "<br><meta http-equiv='refresh' content='5; URL=book_list.php'> You will be redirected to the form in 5 seconds";
		  }
		}else{
		  // Jika tipe file yang diupload bukan JPG / JPEG / PNG, lakukan :
		  echo "Sorry, the image format should be JPG/PNG.";
		  echo "<br><meta http-equiv='refresh' content='5; URL=book_list.php'> You will be redirected to the form in 5 seconds";
		}
	
	};
?>

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<!-- CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="../css/style_admin.css">

<!-- JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

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
                <a href="index.php"><div class="item">Dashboard</div></a>
                <a href="user_list.php"><div class="item">User List</div></a>
                <a href="book_list.php"><div class="item active">Book List</div></a>
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
				<div class="col" style="float:left;">Book List</div>
                <div class="logout"><a href="logout.php">SIGN OUT <i class="fa fa-sign-out"></i></a></div>
            </div>
            <div class="body">
            </div>
            <div class="container">         
			<div id="dashboardTab" class="container column is-10">
				<div class="section">
				<form class="form-inline" action="book_list.php" method="GET">
					<input class="form-control form-control-sm ml-3" type="text" placeholder="Search" name="keyword" autocomplete="off" value="<?php if(isset($_GET['keyword'])) { echo $_GET['keyword']; } ?>">
					<button class="fa fa-search" type="submit" name="search"></button>
				</form>
				<table class="table">
                  <thead>
				  	<tr>
						<th scope="col">No.</th>
						<th scope="col">Image</th>
						<th scope="col">ID</th>
						<th scope="col">Title</th>
						<th scope="col">Stocks</th>
						<th scope="col">Page</th>
						<th scope="col">Author</th>
						<th scope="col">Category</th>
						<th scope="col">Genre</th>
						<th scope="col"></th>
					</tr>
                  </thead>
                  <tbody>
				 	<?php
					if(isset($_GET['keyword'])){
						$keyword = $_GET['keyword'];

						$query = "SELECT * FROM books WHERE judul LIKE '%".$keyword."%' OR category LIKE '%".$keyword."%' ORDER BY id ASC";
					}else{
						$query = "SELECT * FROM books ORDER BY id ASC";
					}

					$result = mysqli_query($conn, $query);

					if(!$result){
						die("Query error : ".mysqli_errno($conn)."-".mysqli_error($conn));
					}

					$no=1;

					while($p = mysqli_fetch_assoc($result)){
					?>

						<tr>
							<td><?php echo $no++ ?></td>
							<td><img src="../<?php echo $p['images'] ?>" width="150px"\></td>
							<td><?php echo $p['id'] ?></td>
							<td><?php echo $p['judul'] ?></td>
							<td><?php echo $p['quantity'] ?></td>
							<td><?php echo $p['halaman'] ?></td>
							<td><?php echo $p['penulis'] ?></td>
							<td><?php echo $p['category'] ?></td>
							<td><?php echo $p['genre'] ?></td>
							<td>
								<a class="btn btn-info" href="../proses/edit_book.php?id=<?php echo $p['id']?>" >Edit</a> 
								<a class="btn btn-danger" href="../proses/delete_book.php?id=<?php echo $p['id']?>" >Delete</a> 
							</td>							
						</tr>
					<?php
					}
					?>
							
                  </tbody>
                </table>
			</div>
			
			<!-- Button trigger modal -->
			<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
			Add Book
			</button>

			<!-- Modal ADD-->
			<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Silahkan isi buku</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
							</button>
						</div>
				<div class="modal-body">
					<form action="" method="post" enctype="multipart/form-data" >
								<div class="form-group">
									<label>Book title</label>
									<input name="title" type="text" class="form-control" required autofocus>
								</div>
								<div class="form-group">
									<label>Stocks</label>
									<input name="quantity" type="number" class="form-control">
                                </div>
                                <div class="form-group">
									<label>Pages</label>
									<input name="size" type="text" class="form-control">
                                </div>
                                <div class="form-group">
									<label>Author</label>
									<input name="color" type="text" class="form-control" >
								</div>
								<div class="form-group">
									<label>Category</label>
									<select name="category" class="form-control">
										<option value="Novel">Novel</option>
									</select>
								</div>
								<div class="form-group">
									<label>Genre</label>
									<select name="category" class="form-control">
										<option value="Fantsy">FantaSea</option>
										<option value="Horror">Horror</option>
										<option value="Scifi">Scifi</option>
									</select>
								</div>
								<div class="form-group">
									<label>Images</label>
									<input name="uploadimage" type="file" class="form-control">
								</div>
								<div class="form-group">
    								<label for="description">Description</label>
    								<textarea class="form-control" name="description" rows="3"></textarea>
  								</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
						<input name="addbook" type="submit" class="btn btn-primary" value="Add">
					</div>
					</form>
				</div>
			</div>
			<!-- end modal add -->
			<!-- modal edit -->
				
			<!-- end edit -->
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