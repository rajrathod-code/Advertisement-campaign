<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin Login</title>
    <link rel="stylesheet" href="assets/css/vendor.css" />
    <link rel="stylesheet" href="assets/css/style.css" />
</head>

<body>
    <?php
    
    if(isset($_POST['admin_login'])) {
        include("dbcon.php");
        
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
        // $_SESSION['ademail'] = $email;
        $password =$_POST['password'];
        $qry = "SELECT * FROM `admin` WHERE email = '$email' AND password = '$password'";
        $run=$con->query($qry);
        $result=$run->fetch(PDO::FETCH_ASSOC);
        if($result){
            session_start();
          $_SESSION['adloggedin']=TRUE;
          header("location:adminprofile.php");

        }else{
            ?>
            <script>
                alert("Email or Password is not correct");
            </script>
            <?php
        }
      }
    ?>
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
                <a class="nav-link" href="portal.php"  role="button">
                  Client Login
                </a>
                
              </li>
            </ul>
          </div>
        </nav>
      </div>
    </header>

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
                                    <form action="adminlogin.php" method="POST">
                                        <div class="form-group">
                                            <label for="exampleFormControlInput1">Email address</label>
                                            <input type="email" name="email" class="form-control"
                                                id="exampleFormControlInput1" placeholder="name@example.com">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlInput2">Password</label>
                                            <input type="password" name="password" class="form-control"
                                                id="exampleFormControlInput2">
                                        </div>
                                        <button style="background-color: blue;color:white " class="w-100 btn btn-lg"
                                            style="border: 2px solid black;" type="submit" name="admin_login">Log In </button>
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