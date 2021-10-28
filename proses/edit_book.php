<?php 
	session_start();
	include '../dbconnect.php';
    $id = $_GET['id'];	
    $brgs=mysqli_query($conn,"SELECT * from books where id = '$id'");
  // $produk = mysqli_fetch_array($brgs);
  // var_dump($produk);
  // die();
	if(isset($_POST["editbook"])) {
        $id=$_POST['id'];
		$judul=$_POST['judul'];
		$quantity=$_POST['quantity'];
		$halaman=$_POST['halaman'];
		$penulis=$_POST['penulis'];
        $genre=$_POST['genre'];
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
          $query = "update books set quantity='$quantity', judul='$judul', images='$pathdb', halaman='$halaman', penulis='$penulis', genre='$genre', description='$description' where id='$id'";
          $sql = mysqli_query($conn, $query); // Eksekusi/ Jalankan query dari variabel
          
          if($sql){ 
          
          echo "<br><meta http-equiv='refresh' content='5; URL=../admin/book_list.php'> You will be redirected to the form in 5 seconds";
            
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
                <a href="../admin/index.php"><div class="item">Dashboard</div></a>
                <a href="../admin/user_list.php"><div class="item">User List</div></a>
                <a href="../admin/book_list.php"><div class="item active">Book List</div></a>
                <a href="../admin/logout.php"><div class="item">Log out</div></a>
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
                <div class="logout">SIGN OUT <i class="fa fa-sign-out"></i></div>
            </div>
            <div class="body">
            </div>
            <div class="container">         
			<div id="dashboardTab" class="container column is-10">
          <?php 
						while($p=mysqli_fetch_array($brgs)){
					?>
            <form action="" method="post" enctype="multipart/form-data" >
                <input name="id" type="hidden" value="<?php echo $p['id'] ?>" class="form-control">    
                <div class="form-group">
                    <label>Judul</label>
                    <input name="judul" type="text" class="form-control" required autofocus value="<?php echo $p['judul'];?>">
                </div>
                <div class="form-group">
                    <label>Jumlah</label>
                    <input name="quantity" type="number" class="form-control" value="<?php echo $p['quantity'];?>">
                </div>
                <div class="form-group">
                    <label>Jumlah Halaman</label>
                    <input name="halaman" type="text" class="form-control" value="<?php echo $p['halaman'];?>">
                </div>
                <div class="form-group">
                    <label>Nama Penulis</label>
                    <input name="penulis" type="text" class="form-control" value="<?php echo $p['penulis'];?>">
                </div>
                <div class="form-group">
					<label>Genre</label>
					<select name="genre" class="form-control">
						<option value="Fantasy">Fantasy</option>
						<option value="Horror">Horror</option>
						<option value="Scifi">Scifi</option>
					</select>
				</div>
                <div class="form-group">
                    <label>Category</label>
                    <input name="category" type="text" class="form-control" value="<?php echo $p['category'];?>">
                </div>
                <div class="form-group">
                    <label>Images</label>
                    <input name="uploadimage" type="file" class="form-control" src="../images/<?php echo $p['images'];?>">
                </div>
                <div class="form-group">
    				<label for="description">Description</label>
    				<textarea class="form-control" name="description" rows="3"><?php echo $p['description']?></textarea>
  				</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                    <input name="editbook" type="submit" class="btn btn-primary" value="Update">
                </div>
          <?php 
          }
          ?>
			</form>
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
