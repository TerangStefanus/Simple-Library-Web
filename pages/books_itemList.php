<?php
    session_start();
    include '../dbconnect.php';
    include '../template/navbar.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        include 'head/head_user.php';
    ?>
    <title>Books Item List</title>
</head>
<body>
    <h1>Our Books Collection</h1>
    <div class="view">
        <div class="grid-view card" style="display: block;">
        <?php 
            $brgs=mysqli_query($conn,"SELECT * from books WHERE category = 'Novel' order by id ASC ");
            $no=1;
            while($p=mysqli_fetch_array($brgs)){

        ?>
            <!-- Baris Pertama -->
            <form>
            <div class="card">
                <div class="card-header">
                <a href="book_detail.php?id=<?php echo $p['id'] ?>"><img title=" " alt=" " src="../<?php echo $p['images'] ?>" width="100%"/></a>
                </div>
                <div class="card-body">
                    <a href="../pages/book_detail.php?id=<?php echo $p['id'] ?>" class="btn btn-primary">Book Detail</a>
                    <p class="title"><?php echo $p['judul'] ?></p> 
                    <p class="content"><strong>Genre</strong> : <?php echo $p['genre'] ?></p>
                </div>
            </div>              
            </form>

            <?php
                }
            ?>
        </div>
    </div>
<?php
    include '../template/footer.php';
    include './modal_auth.php';
?>
</body>
<style>
    .btn{
        margin-top: -35px;
        width: 100%;
    }
</style>
</html>