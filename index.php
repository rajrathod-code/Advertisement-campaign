<?php
include("dbcon.php");
   session_start();
   $email = $_SESSION['email']??'';
   
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Welcome to Your Advertisment Plateform</title>
    <link rel="stylesheet" href="assets/css/vendor.css" />
    <link rel="stylesheet" href="assets/css/style.css" />

  </head>
  <body>
<?php
  include("dbcon.php");
  $qry = "SELECT * FROM `panding` WHERE status = 1";
  $run = $con->query($qry);
  $result = $run->fetchAll(PDO::FETCH_ASSOC);
?>

    <!-- header -->
    <header class="header-sticky header-dark">
      <div class="container">
        <nav class="navbar navbar-expand-lg navbar-dark">
        
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="burger"><span></span></span></button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav align-items-center mr-auto">
              <li class="nav-item">
                <a class="nav-link" href="index.php" role="button">
                  Home
                </a>
              </li>
             
              
            </ul>
            <?php
            if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=TRUE){
              echo'
            <ul class="navbar-nav align-items-center mr-0">
            <li class="nav-item dropdown">
              <a class="nav-link" href="adminlogin.php">Admin Login</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link" href="portal.php">Client login</a>
            </li>
          </ul>';
            }elseif(isset($_SESSION['loggedin']) || $_SESSION['loggedin']=TRUE){
              $sql = "SELECT * FROM `user` WHERE email = '$email'";
              $run = $con->query($sql);
              $result1=$run->fetch(PDO::FETCH_ASSOC);
              ?>
              <ul class="navbar-nav align-items-center mr-0">
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown-2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <?php echo $result1['name']; ?>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="profile.php">Profile</a>
                <a class="dropdown-item" href="logout.php">Logout</a>
              </div>
                
              </li>
            </ul>
            <?php
            }
            ?>
            
          </div>
        </nav>
      </div>
    </header>
    <!-- header -->



    <!-- cover -->
    <section class="layers p-0">
      <div class="layers-foreground">
        <div class="container text-white">
          <div class="row justify-content-center align-items-center vh-100">
            <div class="col-md-8 text-center text-shadow">
              <h1 class="display-3 mb-2"><b>Advertisement</b> campaign</h1>
              <p class="lead mb-3">Join us with focus on clean and functional interface that delivers a bold visual experience.</p>
              <a href="portal.php" class="btn btn-white btn-rounded">Post Your Advertisment</a>
              <!-- <a data-scroll href="#preview" class="btn btn-rounded btn-outline-white ml-md-1">Previews</a> -->
            </div>
          </div>
        </div>
      </div>
      <div class="layers-background bg-dark pattern">
        <div class="layers-background-overlay"
          data-top-top="opacity: 0;" 
          data-top-bottom="opacity: 0.9"></div>
        <div class="container-full">
          <div class="row justify-content-end">
            <div class="col-12">
              <div class="row gutter-2">
                <div class="col-6 col-md-2" data-aos="fade-up">
                  <div class="gutter-2" data-top-top="transform: translateY(80vh);" data-top-bottom="transform: translateY(-10vh);">
                    <figure class="photo">
                      <img src="img/image1.jpg" alt="Image">
                    </figure> 
                    <figure class="photo">
                      <img src="img/image2.jpg" alt="Image">
                    </figure>
                    <figure class="photo">
                      <img src="img/image3.jpg" alt="Image">
                    </figure>
                    <figure class="photo">
                      <img src="img/image4.jpg" alt="Image">
                    </figure>
                    <figure class="photo">
                      <img src="img/image5.jpg" alt="Image">
                    </figure>
                    <figure class="photo">
                      <img src="img/image6.jpg" alt="Image">
                    </figure>
                    <figure class="photo">
                      <img src="img/image7.jpg" alt="Image">
                    </figure>
                    <figure class="photo">
                      <img src="img/image8.jpg" alt="Image">
                    </figure>
                  </div>
                </div>
                <div class="col-6 col-md-3" data-aos="fade-up" data-aos-delay="250">
                  <div class="gutter-2" data-top-top="transform: translateY(70vh);" data-top-bottom="transform: translateY(-10vh);">
                    <figure class="photo">
                      <img src="img/image4.jpg" alt="Image">
                    </figure>
                    <figure class="photo">
                      <img src="img/image5.jpg" alt="Image">
                    </figure>
                    <figure class="photo">
                      <img src="img/image6.jpg" alt="Image">
                    </figure>
                    <figure class="photo">
                      <img src="img/image7.jpg" alt="Image">
                    </figure>
                    <figure class="photo">
                      <img src="img/image8.jpg" alt="Image">
                    </figure>
                    <figure class="photo">
                      <img src="img/image9.jpg" alt="Image">
                    </figure>
                    <figure class="photo">
                      <img src="img/image10.jpg" alt="Image">
                    </figure>
                    <figure class="photo">
                      <img src="img/image1.jpg" alt="Image">
                    </figure>
                    <figure class="photo">
                      <img src="img/image2.jpg" alt="Image">
                    </figure>
                    <figure class="photo">
                      <img src="img/image3.jpg" alt="Image">
                    </figure>
                    <figure class="photo">
                      <img src="img/image4.jpg" alt="Image">
                    </figure>
                  </div>
                </div>
                <div class="col-6 col-md-4" data-aos="fade-up" data-aos-delay="500">
                  <div class="gutter-2" data-top-top="transform: translateY(85vh);" data-top-bottom="transform: translateY(-25vh);">
                  <figure class="photo">
                      <img src="img/image8.jpg" alt="Image">
                    </figure>
                    <figure class="photo">
                      <img src="img/image9.jpg" alt="Image">
                    </figure>
                    <figure class="photo">
                      <img src="img/image10.jpg" alt="Image">
                    </figure>
                    <figure class="photo">
                      <img src="img/image1.jpg" alt="Image">
                    </figure>
                    <figure class="photo">
                      <img src="img/image2.jpg" alt="Image">
                    </figure>
                    <figure class="photo">
                      <img src="img/image3.jpg" alt="Image">
                    </figure>
                    <figure class="photo">
                      <img src="img/image4.jpg" alt="Image">
                    </figure>
                    <figure class="photo">
                      <img src="img/image6.jpg" alt="Image">
                    </figure> 
                  </div>
                </div>
                <div class="col-6 col-md-3" data-aos="fade-up" data-aos-delay="750">
                  <div class="gutter-2" data-top-top="transform: translateY(80vh);" data-top-bottom="transform: translateY(-50vh);">
                  <figure class="photo">
                      <img src="img/image10.jpg" alt="Image">
                    </figure>
                    <figure class="photo">
                      <img src="img/image9.jpg" alt="Image">
                    </figure>
                    <figure class="photo">
                      <img src="img/image8.jpg" alt="Image">
                    </figure>
                    <figure class="photo">
                      <img src="img/image7.jpg" alt="Image">
                    </figure>
                    <figure class="photo">
                      <img src="img/image6.jpg" alt="Image">
                    </figure>
                    <figure class="photo">
                      <img src="img/image5.jpg" alt="Image">
                    </figure>
                    <figure class="photo">
                      <img src="img/image4.jpg" alt="Image">
                    </figure>
                    <figure class="photo">
                      <img src="img/image3.jpg" alt="Image">
                    </figure> 
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- / cover -->


    

    
    <section id="preview" class="bg-white separator-top">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-12 text-center">
            <h2 class="display-3">Advertisements</h2>
            <hr>
           
          </div>
        </div>
        <div class="row demo-preview">
          <div class="col">
            <div class="tab-content" id="demo-1">

              <!-- landing pages -->
              <div class="tab-pane show active" id="tab-1-1" role="tabpanel" aria-labelledby="tab-1-1">
                <div class="row gutter-1 gutter-md-3">
                  <?php foreach($result as $data): ?>
                  <div class="col-6 col-lg-4">
                    <article class="card card-minimal">
                      <a href="<?php echo 'local/' . $data['banner'] ?>" title="Image title" class="card-img-container">
                              <img class="card-img" src="<?php echo 'local/' . $data['banner'] ?>" alt="Image">
                            </a>
                      <div class="card-body">
                        <h3 class="card-title text-center"><?php echo $data['adtitle'] ?></h3>
                        <h5>Description:</h5>
                        <?php echo $data['sd']; ?>

                      </div>
                    </article>
                  </div>
                  <?php endforeach;?>
                </div>
              </div>
              
            </div>
          </div>
        </div>
      </div>
    </section>






    <!-- footer -->
    <footer class="bg-dark text-white">
      <div class="container py-5">
        <div class="row justify-content-between align-items-center">
          <div class="col-md-5 text-center text-md-left">
            <ul class="nav">
              <li class="nav-item">
                <a class="nav-link" href="index.php">Made By Raj Rathod</a>
              </li>
              
            </ul>
          </div>
          
          <div class="col-md-5 text-center text-md-right">
            <ul class="socials">
              <li><a href="" class="icon-facebook fs-20"></a></li>
              <li><a href="" class="icon-instagram fs-20"></a></li>
              <li><a href="" class="icon-twitter fs-20"></a></li>
              <li><a href="" class="icon-linkedin fs-20"></a></li>
            </ul>
          </div>
        </div>
      </div>
    </footer>
    <!-- / footer -->


    <script src="assets/js/vendor.js"></script>
    <script src="assets/js/app.js"></script>
  </body>
</html>