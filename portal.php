
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login </title>
    <link rel="stylesheet" href="assets/css/vendor.css" />
    <link rel="stylesheet" href="assets/css/style.css" />
  </head>
  <body>
  <?php
    include("dbcon.php");
      if(isset($_POST['signup']))
      {
        include("dbcon.php");
        $email = "";
        $password = "";
        $name="";
        $name=$_POST['name'];
        $_SESSION['name'] = $name;
        if(empty($_POST['email'])){
          ?>
          <script>
            alert("Email should not be empty");
          </script>
          <?php
        }else{}

                
        $uppercase = preg_match('@[A-Z]@', $_POST['password']);
        $lowercase = preg_match('@[a-z]@', $_POST['password']);
        $number    = preg_match('@[0-9]@', $_POST['password']);
        $specialChars = preg_match('@[^\w]@', $_POST['password']);    

        if(empty($_POST['password']) || empty($_POST['repassword'])){
          ?>
          <script>
            alert("Password should not be empty");
          </script>
          <?php
        }elseif(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($_POST['password']) < 8 || strlen($_POST['repassword']) < 8){
          ?>
          <script>
            alert("Password should be at least 8 characters in length and should include at least one upper case letter, one number,and one special character.");
          </script>
          <?php
        }elseif ($_POST['password'] == $_POST['repassword']) {
          $password = md5($_POST['password']);
          $qry = "SELECT * FROM `user`";
          $run = $con->query($qry);
          $result = $run->fetch(PDO::FETCH_ASSOC);
          if($result['email'] === $_POST['email']){
            ?>
          <script>
            alert("Email is alredy Exist");
          </script>
          <?php
          }else{
            $email = $_POST['email'];
            $qry_ = "INSERT INTO `user`(`name`,`email`, `password`) VALUES ('$name','$email','$password')";
            $run = $con->query($qry_);
            if($run){
              ?>
          <script>
            alert("Account created Successfully");
          </script>
          <?php
        
            }else{
              ?>
          <script>
            alert("Sorry Account is not created Successfully");
          </script>
          <?php
            }

          }
          session_start();
          $_SESSION['signup'] = TRUE;
          
        }



      }elseif (isset($_POST['login'])) {
        include("dbcon.php");
        session_start();
        $email ="";
        $password = "";
        if(empty($_POST['email'])){
          ?>
          <script>
            alert("Email Should not be Empty");
          </script>
          <?php
        }elseif(empty($_POST['password'])) {
          ?>
          <script>
            alert("Password Should not be Empty");
          </script>
          <?php
        }
        $email = $_POST['email'];
        $_SESSION['email'] = $email;
        
        $password = md5($_POST['password']);
        $qry = "SELECT * FROM `user` WHERE email = '$email' AND password = '$password'";
        $run=$con->query($qry);
        $result=$run->fetch(PDO::FETCH_ASSOC);
        if($result){
         
          $_SESSION['loggedin']=TRUE;
          
          header("location:profile.php");

        }else{
          ?>
          <script>
            alert("Email or Password is not correct");
          </script>
          <?php
        }
      }
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

            <ul class="navbar-nav align-items-center mr-0">
              <li class="nav-item dropdown">
                <a class="nav-link" href="adminlogin.php"  role="button">
                  Admin Login
                </a>
                
              </li>
            </ul>
          </div>
        </nav>
      </div>
    </header>
    <!-- header -->


    <div class="viewport">
      <div class="image image-overlay" style="background-image:url(img/wooden-board-empty-table-top-blurred-background_1253-1584.jpg)"></div>
      <div class="container">
        <div class="row justify-content-center align-items-center vh-100">
          <div class="col-md-6 col-lg-5">
            <div class="accordion-group accordion-group-portal" data-accordion-group>
              <div class="accordion open" data-accordion>
                <div class="accordion-control" data-control>
                  <h5>Sign In</h5>
                </div>
                <div class="accordion-content" data-content>
                  <div class="accordion-content-wrapper">
                    <form action="portal.php" method="POST">
                      <div class="form-group">
                        <label for="exampleFormControlInput1">Email address</label>
                        <input type="email" name="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                      </div>
                      <div class="form-group">
                        <label for="exampleFormControlInput2">Password</label>
                        <input type="password" name="password" class="form-control" id="exampleFormControlInput2">
                      </div>
                      <button style="background-color: blue;color:white " class="w-100 btn btn-lg" style="border: 2px solid black;" type="submit" name="login" >Log In </button>
                    </form>
                  </div>
                </div>
              </div>
              <div class="accordion" data-accordion>
                <div class="accordion-control" data-control>
                  <h5>Create Account</h5>
                </div>
                <div class="accordion-content" data-content>
                  <div class="accordion-content-wrapper">
                    <form action="portal.php" method="POST">
                    <div class="form-group">
                        <label for="exampleFormControlInput3">Name</label>
                        <input type="text" class="form-control" id="exampleFormControlInput3" name="name" placeholder="Enter Your Name">
                      </div>
                      <div class="form-group">
                        <label for="exampleFormControlInput3">Email address</label>
                        <input type="email" class="form-control" id="exampleFormControlInput3" name="email" placeholder="name@example.com">
                      </div>
                      <div class="form-group">
                        <label for="exampleFormControlInput4">Password</label>
                        <input type="password" name="password" class="form-control" id="exampleFormControlInput4">
                      </div>
                      <div class="form-group">
                        <label for="exampleFormControlInput5">Repeat Password</label>
                        <input type="password" name="repassword" class="form-control" id="exampleFormControlInput5">
                      </div>
                      <button style="background-color: blue;color:white " class="w-100 btn btn-lg" style="border: 2px solid black;" type="submit" name="signup" >Signup </button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div> 
 


    <script src="assets/js/vendor.js"></script>
    <script src="assets/js/app.js"></script>
  </body>
</html>