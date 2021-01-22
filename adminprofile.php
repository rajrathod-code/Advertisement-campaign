<?php
session_start();
if (!isset($_SESSION['adloggedin']) || $_SESSION['adloggedin'] != TRUE) {
    header("location: adminlogin.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin Profile</title>
    <link rel="stylesheet" href="assets/css/vendor.css" />
    <link rel="stylesheet" href="assets/css/style.css" />
  </head>
  <body>
<?php
    include("dbcon.php");

    $sql = "SELECT * FROM `panding`";
    $run = $con->query($sql);
    $result = $run->fetchAll(PDO::FETCH_ASSOC);
   
    if(isset($_POST['aprrov']))
    {
      $adtitle="";
      $adtitle = $_POST['adtitle'];
      $sql = "UPDATE `panding` SET `status`=1 WHERE `adtitle` = '$adtitle' ";
      $run =$con->query($sql);
      if($run)
      {
        ?>
        <script>
        alert("Advertisment is aprroved");
        </script>
        <?php
      }
    }elseif (isset($_POST['delete'])) {
      $adtitle1="";
      $adtitle1 = $_POST['adtitle'];
      $qry = "DELETE FROM `panding` WHERE  `adtitle` = '$adtitle1'";
      $run = $con->query($qry);
      if($run)
      {
        ?>
        <script>
          alert("Advertisment is deleted Successfully")
        </script>
        <?php
      }
    }
?>

    <!-- header -->
    <header class="header-sticky header-light bg-white">
      <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light">
         
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="burger"><span></span></span></button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav align-items-center mr-auto">
              <li class="nav-item">
                <a class="nav-link" href="index.php" role="button">
                 <b>Home</b> 
                </a>
  </li>
             
            </ul>

            <ul class="navbar-nav align-items-center mr-0">
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="adminprofile.php" id="navbarDropdown-2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Admin
                </a>
                
              </li>
            </ul>
          </div>
        </nav>
      </div>
    </header>
    <!-- header -->


    <section class="p-0 bg-light">
      <div class="image image-overlay image-cover" style="background-image:url(assets/images/demo/minimal/portfolio-bg-2.jpg)"
      data-top-top="transform: translateY(0px);" 
      data-top-bottom="transform: translateY(-250px);"></div>
      <div class="container">
        <div class="row justify-content-center align-items-end vh-50 mb-5">
          <div class="col col-md-10 col-lg-8">
            <div class="row align-items-center">
              <div class="col">
                <div class="row align-items-center">
                  <div class="col-md-8">
                    <h2 class="mb-0"><b>Admin</b></h2>
                  
                  </div>
                 
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>


    <section class="bg-light p-0">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col col-md-10 col-lg-8">
            <div class="nav nav-tabs mb-1">
              <a class="nav-item nav-link active" data-toggle="tab" href="#demo-2-1">Dashboard</a>
              
            </div>
          </div>
        </div>
      </div>
    </section>



    <section class="bg-light pt-2">

      <div class="container">
        <div class="tab-content" id="demo-2">

          <!-- tab info -->
          <div class="tab-pane show active" id="demo-2-1" role="tabpanel" aria-labelledby="demo-2-1">
            <div class="row justify-content-center">
              <div class="col-md-10 col-lg-8">
                
                <!-- stats -->
                <!-- <div class="row gutter-1 mb-2">
                  <div class="col-6 col-md-4 col-lg-3">
                    <div class="equal">
                      <div class="boxed bg-primary text-white">
                        <div class="equal-header">
                          <b class="h2">89</b>
                        </div>
                        <div class="equal-footer">
                          <span class="text-muted">friends</span>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-6 col-md-4 col-lg-3">
                    <div class="equal">
                      <div class="boxed">
                        <div class="equal-header">
                          <b class="h2">14</b>
                        </div>
                        <div class="equal-footer">
                          <span class="text-muted">likes</span>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-6 col-md-4 col-lg-3">
                    <div class="equal">
                      <div class="boxed">
                        <div class="equal-header">
                          <b class="h2">9</b>
                        </div>
                        <div class="equal-footer">
                          <span class="text-muted">articles</span>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-6 col-md-4 col-lg-3">
                    <div class="equal">
                      <div class="boxed">
                        <div class="equal-header">
                          <b class="h2">119</b>
                        </div>
                        <div class="equal-footer">
                          <span class="text-muted">following</span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div> -->
                <!-- / stats -->

                <!-- post -->
                <?php foreach($result as $ans): ?>
              <form action="adminprofile.php" method="POST">  
                <div class="row mb-1">
                  <div class="col">
                    <article class="card">
                      <div class="card-header">
                        <div class="row align-items-center">
                          <div class="col-6">
                            <div class="media align-items-center">
                            
                              <div class="media-body">
                              <input type="text" name="adtitle" value="<?php echo $ans['adtitle']; ?>">
                                <span class="mt-0"></span>
                              </div>
                            </div>
                          </div>
                          <div class="col-6 text-right">
                          <?php if($ans['status'] == 0){
                            echo'
                              <button type="submit" class="form-control" name="aprrov" style="background-color: yellow; color:black">To Be Approved</button>';
                          }elseif($ans['status'] == 1)
                          {
                            echo'
                            <button type="submit" class="form-control" name="aprrov" style="background-color: green; color:white">Approved</button>';
                          }
                           ?>
                           
                           
                          </div>

                        </div>
                      </div>
                      <div class="card-body overflow-hidden">
                        <div class="owl-carousel gallery visible" data-items="[2,2]" data-margin="10" data-nav="true">
                          <figure class="photo equal equal-double">
                          <a  href="<?php echo 'local/' . $ans['banner'] ?>" title="Image title">
                              <img name="image" src="<?php echo 'local/' . $ans['banner'] ?>" alt="Image">
                            </a>
                            
                          </figure>
                          <div class="container" style="text-align: center;">
                            <textarea name="sd" cols="30" rows="10"><?php echo $ans['sd']; ?></textarea>
                          </div>
                          
                        </div>
                      </div>
                      <div class="card-footer">
                        <div class="row">
                          <div class="col">
                            <a href="" class="btn btn-ico btn-sm rounded btn-outline-light text-red"><i class="icon-heart2 fs-22"></i></a>
                          </div>
                          <div class="col text-right">
                            <div class="dropdown">
                              <a class="btn btn-ico btn-outline-light text-dark rounded btn-sm" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="icon-more-vertical fs-22"></i>
                              </a>

                              <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                               <button class="form-control" name="delete">Delete Advertisment</button>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </article>
                  </div>
                </div>
                <?php endforeach; ?>
                </form>
                <!-- / post -->

                <!-- post -->
                <div class="row">
                  <div class="col">
                    <article class="card">
                      <div class="card-header">
                        <div class="row align-items-center">
                          <div class="col-6">
                            <div class="media align-items-center">
                              
                              <div class="media-body">
                                <span class="mt-0">Admin</span>
                              </div>
                            </div>
                          </div>
                          <div class="col-6 text-right">
                            
                          </div>
                        </div>
                      </div>
                      <div class="card-body overflow-hidden">
                        <blockquote class="blockquote">
                          <p class="mb-0">All The Advertisment is show over here.</p>
                          
                        </blockquote>
                      </div>

                    </article>
                  </div>
                </div>
                <!-- / post -->

              </div>
            </div>
          </div>
          <!-- / tab -->


          
         



              
          <!-- / tab -->

          <!-- tab settings -->
         
          <!-- / tab -->
        </div>
      </div>
    </section>



    <!-- footer -->
    <footer class="separator-top">
      <div class="container py-5">
        <div class="row justify-content-between align-items-center">
          <div class="col-md-5 text-center text-md-left">
            <ul class="nav">
              <li class="nav-item">
                <a class="nav-link" href="#">Contacts</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">About Us</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Legal Information</a>
              </li>
            </ul>
          </div>
         
          <div class="col-md-5 text-center text-md-right">
            <ul class="socials">
              <li><a href="" class="icon-facebook text-facebook fs-20"></a></li>
              <li><a href="" class="icon-instagram text-instagram fs-20"></a></li>
              <li><a href="" class="icon-twitter text-twitter fs-20"></a></li>
              <li><a href="" class="icon-linkedin text-linkedin fs-20"></a></li>
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