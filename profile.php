<?php
session_start();
$email = $_SESSION['email'] ?? '';

// print_r($email);

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != TRUE) {
  header("location: portal.php");

  exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Profile</title>
  <link rel="stylesheet" href="assets/css/vendor.css" />
  <link rel="stylesheet" href="assets/css/style.css" />
</head>

<body>
  <?php
  include("dbcon.php");
  if (isset($_POST['verify'])) {
    $name = "";
    $adtitle = "";
    $sd = "";
    $numview = "";
    $pemail = "";
    $pemail = $_POST['pemail'];
    $name = $_POST['name'];
    $adtitle = $_POST['adtitle'];
    $sd = $_POST['sd'];
    $numview = $_POST['numview'];
    if ($name != "" && $adtitle != "" && $sd != "" && $numview != "") {

      $filename = $_FILES['baneer']['name'];
      $destination = "local/" . $filename;
      $extention = pathinfo($filename, PATHINFO_EXTENSION);

      $file = $_FILES['baneer']['tmp_name'];

      $size = $_FILES['baneer']['size'];

      if (!in_array($extention, ['jpg', 'png', 'jpeg', 'PNG'])) {
  ?>
        <script>
          alert("File Bust be a Image");
        </script>
      <?php
      } elseif ($_FILES['baneer']['size'] > 1000000) {
      ?>
        <script>
          alert("Image Is too large");
        </script>
        <?php
      } else {
        if (move_uploaded_file($file, $destination)) {
          $qry = "INSERT INTO `panding`(`name`, `email`,`adtitle`, `sd`, `numviews`,`banner`) VALUES ('$name' ,'$pemail', '$adtitle' , '$sd' ,'$numview' ,'$filename')";
          $run = $con->query($qry);
          if ($run) {
        ?>
            <script>
              alert("Your Advertisment is numder Review By admin");
            </script>
      <?php
          }
        }
      }
    } else {
      ?>
      <script>
        alert("Form is Empty");
      </script>
  <?php
    }
  }
  ?>
  <?php
  $qry1 = "SELECT * FROM `panding` WHERE email = '$email' ";
  $run = $con->query($qry1);
  $result1 = $run->fetchAll(PDO::FETCH_ASSOC);
  ?>

  
  <?php
  $qry2 = "SELECT * FROM `panding` WHERE email = '$email' ";
  $run2 = $con->query($qry2);
  $result2 = $run2->fetch(PDO::FETCH_ASSOC);
  ?>
  <!-- Update operation -->
  <?php
  include("dbcon.php");
  if (isset($_POST['update'])) {
    $adtitle1="";
    $adtitle1 = $_POST['getadtitle'];
    ?>
    <script>
      alert("<?php echo $adtitle1; ?>")
    </script>
    <?php

    $updatename = "";
    $updateadtitle = "";
    $updatesd = "";
    $updatenumview = "";
    $updatepemail = "";
    $updatepemail = $_POST['updatepemail'];
    $updatename = $_POST['updatename'];
    $updateadtitle = $_POST['updateadtitle'];
    $updatesd = $_POST['updatesd'];
    $updatenumview = $_POST['updatenumview'];
    if ($updatename != "" && $updateadtitle != "" && $updatesd != "" && $updatenumview != "") {

      $updatefilename = $_FILES['updatebaneer']['name'];
      $updatedestination = "local/" . $updatefilename;
      $updateextention = pathinfo($updatefilename, PATHINFO_EXTENSION);

      $updatefile = $_FILES['updatebaneer']['tmp_name'];

      $updatesize = $_FILES['updatebaneer']['size'];

      if (!in_array($updateextention, ['jpg', 'png', 'jpeg', 'PNG'])) {
  ?>
        <script>
          alert("File Bust be a Image");
        </script>
      <?php
      } elseif ($_FILES['updatebaneer']['size'] > 1000000) {
      ?>
        <script>
          alert("Image Is too large");
        </script>
        <?php
      } else {
        if (move_uploaded_file($updatefile, $updatedestination)) {
          $updateqry = "UPDATE `panding` SET `name`='$updatename',`email`='$updatepemail',`adtitle`='$updateadtitle',`sd`='$$updatesd',`numviews`='$updatenumview',`banner`='$updatefilename' WHERE adtitle = '$adtitle1'";
          $updaterun = $con->query($updateqry);
          if ($updaterun) {
        ?>
            <script>
              alert("Your Advertisment is updated successfully");
            </script>
      <?php
          }else{
            ?>
            <script>
              alert("Query is not running");
            </script>
            <?php
          }
        }
      }
    } else {
      ?>
      <script>
        alert("Form is Empty");
      </script>
  <?php
    }
  }
  ?>
  <?php 

  $qry = "DELETE FROM `panding` WHERE 0"


?>
  <!-- Add Advertisment modal -->
  <div class="modal fade" id="addadvertismentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header justify-content-end">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true" class="icon-x"></span>
          </button>
        </div>
        <div class="modal-body text-center">
          <h3>Add your Advertisment</h3>

          <form action="profile.php" method="POST" enctype="multipart/form-data">

            <div class="form-group">
              <label for="exampleFormControlInput1">Your Name / Company Name</label>
              <input name="name" type="text" class="form-control" id="exampleFormControlInput1" autocomplete='off' required>
            </div>

            <div class="form-group">
              <label for="exampleFormControlInput7">Enter Email Address</label>
              <input name="pemail" type="email" class="form-control" id="exampleFormControlInput7" autocomplete='off' required>
            </div>

            <div class="form-group">
              <label for="exampleFormControlInput3">Advertisement Title</label>
              <input name="adtitle" type="text" class="form-control" id="exampleFormControlInput3" autocomplete='off' required>
            </div>

            <div class="form-group">
              <label for="exampleFormControlInput4">Short Discription</label>
              <textarea name="sd" type="text" name="sd" class="form-control" id="exampleFormControlInput4" autocomplete='off' cols="30" rows="4" required></textarea>
            </div>

            <div class="form-group">
              <label for="exampleFormControlInput5">Number of views You Want</label>
              <input name="numview" type="number" class="form-control" id="exampleFormControlInput5" autocomplete='off' required>
            </div>

            <div class="form-group">
              <label for="exampleFormControlInput6">Insert the Banner for your Advertisment</label>
              <input name="baneer" type="file" class="form-control" id="exampleFormControlInput6" autocomplete='off' required>
            </div>

            <div class="modal-footer">
              <button type="submit" class="btn btn-primary btn-block" name="verify">Sent for Verification</button>
            </div>
          </form>

        </div>

      </div>
    </div>
  </div>

  <!-- Update Advertisment modal -->
  <div class="modal fade" id="updateadvertismentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header justify-content-end">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true" class="icon-x"></span>
          </button>
        </div>
        <div class="modal-body text-center">
          <h3>Update your Advertisment</h3>

          <form action="profile.php" method="POST" enctype="multipart/form-data">

            <div class="form-group">
              <label for="exampleFormControlInput1">Your Name / Company Name</label>
              <input name="updatename" type="text" class="form-control" id="exampleFormControlInput1" autocomplete='off' required>
            </div>

            <div class="form-group">
              <label for="exampleFormControlInput7">Enter Email Address</label>
              <input name="updatepemail" type="email" class="form-control" id="exampleFormControlInput7" autocomplete='off' required>
            </div>

            <div class="form-group">
              <label for="exampleFormControlInput3">Advertisement Title</label>
              <input name="updateadtitle" type="text" class="form-control" id="exampleFormControlInput3" autocomplete='off' required>
            </div>

            <div class="form-group">
              <label for="exampleFormControlInput4">Short Discription</label>
              <textarea name="updatesd" type="text" name="sd" class="form-control" id="exampleFormControlInput4" autocomplete='off' cols="30" rows="4" required></textarea>
            </div>

            <div class="form-group">
              <label for="exampleFormControlInput5">Number of views You Want</label>
              <input name="updatenumview" type="number" class="form-control" id="exampleFormControlInput5" autocomplete='off' required>
            </div>

            <div class="form-group">
              <label for="exampleFormControlInput6">Insert the Banner for your Advertisment</label>
              <input name="updatebaneer" type="file" class="form-control" id="exampleFormControlInput6" autocomplete='off' required>
            </div>

            <div class="modal-footer">
              <button type="submit" class="btn btn-primary btn-block" name="update">Update</button>
            </div>
          </form>

        </div>

      </div>
    </div>
  </div>





  <?php
  $sql = "SELECT * FROM `user` WHERE email = '$email'";
  $run = $con->query($sql);
  $result = $run->fetch(PDO::FETCH_ASSOC);
  ?>

  <!-- / modal -->
  <!-- header -->
  <header class="header-sticky header-light bg-white">
    <div class="container">
      <nav class="navbar navbar-expand-lg navbar-light">

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="burger"><span></span></span></button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav align-items-center mr-auto">
            <li class="nav-item">
              <a class="nav-link" href="index.php" role="button">
                Home
              </a>
            </li>
           
           
          </ul>

          <ul class="navbar-nav align-items-center mr-0">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown-2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <?php echo $result['name']; ?>
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="logout.php">Logout</a>
                
              </div>
            </li>
          </ul>
        </div>
      </nav>
    </div>
  </header>
  <!-- header -->


  <section class="p-0 bg-light">
    <div class="image image-overlay image-cover" style="background-image:url(assets/images/demo/minimal/portfolio-bg-2.jpg)" data-top-top="transform: translateY(0px);" data-top-bottom="transform: translateY(-250px);"></div>
    <div class="container">
      <div class="row justify-content-center align-items-end vh-50 mb-5">
        <div class="col col-md-10 col-lg-8">
          <div class="row align-items-center">

            <div class="col">
              <div class="row align-items-center">
                <div class="col-md-8">
                  <h2 class="mb-0"><?php echo $result['name']; ?> </h2>
                  <!-- <span class="text-muted">Senior Visual Designer</span> -->
                </div>


                <div class="card-body">
                  <button name="" type="button" class="btn btn-dark" data-toggle="modal" data-target="#addadvertismentModal">
                    Add Advertisment </button>
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

             

              <?php foreach ($result1 as $pic) : ?>
                <!-- post -->
                <form action="profile.php" method="POST">
                <div class="row mb-1">
                  <div class="col">
                    <article class="card">
                      <div class="card-header">
                        <div class="row align-items-center">
                          <div class="col-6">
                            <div class="media align-items-center">

                              <div class="media-body">
                     
                                <input type="text" name="getadtitle" value="<?php echo $pic['adtitle']; ?>">
                                </form>
                              </div>
                            </div>
                          </div>
                          <div class="col-6 text-right">
                          <?php if($pic['status'] == 0){
                            echo'
                              <div class="container text-center" style="background-color: yellow; color:black; width:200px; height:30px;align-items:center;">To Be Approved</div>';
                          }elseif($pic['status'] == 1)
                          {
                            echo'
                            <div  style="background-color: green; color:white">Approved</div>';
                          }
                           ?>
                        </div>
                      </div>

                      <div class="card-body overflow-hidden">
                        <div class="owl-carousel gallery visible" data-items="[2,2]" data-margin="10" data-nav="true">
                          <figure class="photo equal equal-double" style="align-items: center;">
                            <a href="<?php echo 'local/' . $pic['banner'] ?>" title="Image title">
                              <img src="<?php echo 'local/' . $pic['banner'] ?>" alt="Image">
                            </a>
                          </figure>
                          <div class="container" style="text-align: center;">
                            <?php echo $pic['sd']; ?>
                          </div>

                        </div>
                      </div>
                      
                      <?php if($pic['status'] == 0){
                        ?>
                      <div class="card-footer">
                       <div class="row">
                        <div class="col">
                          <a href="" class="btn btn-ico btn-sm rounded btn-outline-light text-red"><i class="icon-heart2 fs-22"></i></a>
                        </div>
                        <div class="col text-right">
                          <div class="dropdown">
                            <a class="btn btn-ico btn-outline-light text-dark rounded btn-sm" href="#" role="button" id="dropdownMenuLink-2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <i class="icon-more-vertical fs-22"></i>
                            </a>

                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink-2">
                              <!-- <form action="profile.php" method="POST"> -->
                              <button type="button"  class="form-control" data-toggle="modal" data-target="#updateadvertismentModal">Update Advertisment</button>
                              <button type="submit" class="form-control">Delete Advertisment</button>
                              <!-- </form> -->
                            </div>
                          </div>
                        </div>
                      </div>
                      <?php 
                      }
                      
                      ?>
                    </div>
                    </article>
                  </div>
                </div>
              <?php endforeach; ?>
              <!-- / post -->

              

            </div>
          </div>
        </div>
        <!-- / tab -->


        <!-- tab connections -->
        
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