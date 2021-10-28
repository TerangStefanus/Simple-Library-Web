<?php
    session_start();
    include '../template/navbar.php';
    include '../dbconnect.php';

    $id = $_GET['id'];
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        include 'head/head_user.php';
    ?>
    <title>Book Detail</title>
</head>
<body>
    <div class="book_wrapper">
        <form method="POST" action="">
        <div class="row"><?php
        $p = mysqli_fetch_array(mysqli_query($conn,"Select * from books where id='$id'"));
        ?>
            <div class="col-md-3">
                  <img id="example" src="../<?php echo $p['images']?>" alt=" " class="img-responsive" width="300px">
            </div>
            <div class="col-md-5">
                <div><a href="javascript:history.go(-1)" class="backbtn">🡠 Back</a></div><br> 
                <h5>
                    <?php echo $p['judul'] ?>
                </h5> <!-- Menampilkan nama produk -->
                <h6><?php echo $p['genre'] ?></h6><br> <!-- Menampilkan harga produk -->
                <h6>Author</h6> 
                    <h5><?php echo $p['penulis'] ?></h5>
                <br>
                <h6>Pages</h6>
                    <h5><?php echo $p['halaman'] ?></h5>
            </div>
        </div>
        <div class="row">
            <div class="col-md-7">
                <h5>Description</h5> <!-- Deskripsi Produk -->
                <p><?php echo $p['description'] ?></p>
            </div>
        </div>
    </form>
    </div>

<?php
    include '../template/footer.php';
    include './modal_auth.php';
?>
</body>
<style>
    
</style>
</html>