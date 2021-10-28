<?php
    session_start();
    include '../template/navbar.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php
      include 'head/head_user.php';
    ?>
    <title>Luminos Library</title>
</head>
<body>
<section id="carousel">
    <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
        <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner">
        <div class="carousel-item active" data-interval="5000">
        <img src="../images/carousel1.png" class="d-block w-100" alt="Carousel1">
          <div class="carousel-caption d-none d-md-block">
            
          </div>
        </div>
        <div class="carousel-item" data-interval="5000">
        <img src="../images/carousel2.png" class="d-block w-100" alt="Carousel2">
          <div class="carousel-caption d-none d-md-block">
            
          </div>
        </div>
        <div class="carousel-item" data-interval="5000">
        <img src="../images/carousel3.jpg" class="d-block w-100" alt="Carousel3">
          <div class="carousel-caption d-none d-md-block">
            
          </div>
        </div>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
</section>
  <div class="landing-grid">
    <div class="row no-gutters">
      <div class="col">
        <div style="height: 1000px; background-color: #f7b85f;"><a href="books_itemList.php"><img src="../images/Book1.png" height="1000px"><div class="capt1">Book Collection</div></a></div>
    </div>
      <div class="col">
        <div style="height: 333px; background-color: #7ce0f2"><a href="fantasy_itemList.php"><img src="../images/Fiction1.png" style="margin-left:500px;" height="333px"><div class="capt2">Whole New <br>Fantasy</div></a></div>
        <div style="height: 333px; background-color: #470905"><a href="horror_itemList.php"><img src="../images/horror1.png" height="333px" style="margin-top:70px"><div class="capt3">Scary &<br>Furious</div></a></div>
        <div style="height: 333px; background-color: #070e17"><a href="scifi_itemList.php"><img src="../images/future1.png" style="margin-left:250px;" height="333px"><div class="capt4">Future <br>is Here</div></a></div>
      </div> 
    </div>
  </div>
</body>

<?php
    include '../template/footer.php';
    include './modal_auth.php';
?>

<style>
    .carousel-item{
        width: 1920px;
        height: 640px;
        padding-left: -200px;
    }
    
    .landing-grid{
      max-width: 1920px;
      margin-top: 16px;
    }

    .capt1{
        width: 650px;
        color: rgba(255,255,255,1);
        position: absolute;
        top: 30px;
        font-size: 80px;
        opacity: 1;
        writing-mode: vertical-rl;
    }

    .capt2{
      width: 225px;
      color: rgba(255,255,255,1);
      position: absolute;
      top: 5px;
      left: 95px;
      font-size: 50px;
      opacity: 1;
      text-align: left;
    }

    .capt3{
      width: 220px;
      color: rgba(255,255,255,1);
      position: absolute;
      top: 320px;
      left: 500px;
      font-size: 75px;
      opacity: 1;
      text-align: right;
    }

    .capt4{
      width: 350px;
      color: rgba(255,255,255,1);
      position: absolute;
      top: 650px;
      left: 40px;
      font-size: 85px;
      opacity: 1;
      text-align: left;
    }

</style>

</html>