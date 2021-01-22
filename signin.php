<?php

if(isset($_SESSION['siginup']) == TRUE)
{
  header("location: login.php");
  exit;
}
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Hugo 0.79.0">
  <title>Signup</title>

  <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sign-in/">



  <!-- Bootstrap core CSS -->
  <!-- <link rel="stylesheet" href="bootstrap.min.css"> -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

  <!-- Favicons -->
  <!-- <link rel="apple-touch-icon" href="/docs/5.0/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
  <link rel="icon" href="/docs/5.0/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
  <link rel="icon" href="/docs/5.0/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
  <link rel="manifest" href="/docs/5.0/assets/img/favicons/manifest.json">
  <link rel="mask-icon" href="/docs/5.0/assets/img/favicons/safari-pinned-tab.svg" color="#7952b3">
  <link rel="icon" href="/docs/5.0/assets/img/favicons/favicon.ico">
  <meta name="theme-color" content="#7952b3"> -->


  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }
  </style>


  <!-- Custom styles for this template -->
  <link href="login.css" rel="stylesheet">
</head>

<body class="text-center">

  <!-- Backend coding for sigin.php -->
  <?php
// Database Connection:
include('dbcon.php');
$email = "";
$password = "";

// Form Validatoin:
if(isset($_POST['signup_btn']))
{
echo "button is cliked";
if(empty($_POST['email']))
{
  ?>

  <html>
  <div class="alert alert-danger" role="alert">
    <h4 class="alert-heading">Error</h4>
    <p>Email Should not be Empty</p>

  </div>

  </html>



  <?php  
 
}
else{

}

$uppercase = preg_match('@[A-Z]@', $_POST['password']);
$lowercase = preg_match('@[a-z]@', $_POST['password']);
$number    = preg_match('@[0-9]@', $_POST['password']);
$specialChars = preg_match('@[^\w]@', $_POST['password']);

if(empty($_POST['password']) || empty($_POST['cpassword']))
{
  ?>

  <html>
  <div class="alert alert-danger" role="alert">
    <h4 class="alert-heading">Error</h4>
    <p>Password should not be Empty</p>

  </div>

  </html>

  <?php
}
elseif(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($_POST['password']) < 8 || strlen($_POST['cpassword']) < 8){
  ?>


  <html>
  <div class="alert alert-danger" role="alert">
    <h4 class="alert-heading">Error</h4>
    <p>Password should be at least 8 characters in length and should include at least one upper case letter, one number,
      and one special character.</p>

  </div>

  </html>



  <?php
}

else if($_POST['password'] == $_POST['cpassword']){
  // Data Manupulation in from code :
  //Generate Vkey:
  $vkey = md5(time().$_POST['password']);
    $password = md5($_POST['password']);
    // $email = $_POST['email'];
  $qry_ = "SELECT * FROM `user`";
  $run_qry = mysqli_query($con,$qry_);
  $result = mysqli_fetch_assoc($run_qry);
        if($result['email'] === $_POST['email'])  
  {
    ?>
  <html>
  <div class="alert alert-danger" role="alert">
    <h4 class="alert-heading">Error!</h4>
    <p>Email is already exist.</p>
  </div>

  </html>
  <?php
  }
  else
  {
    $email = $_POST['email'];
    $qry = "INSERT INTO `user` (`id`, `email`, `password`,`vkey`) VALUES (NULL, '$email', '$password','$vkey';";
    $run = mysqli_query($con,$qry);
    ?>
  <html>
  <div class="alert alert-success" role="alert">
    <h4 class="alert-heading">Success!</h4>
    <p>Your Account is created Successfully.</p>
    <hr>
    <p class="mb-0">Now Please Login and Enjoy.</p>
  </div>

  </html>
  <?php

    //Generate Vkey
 

  session_start();
  $_SESSION['siginup'] = TRUE;  
  }
 

}


}
?>

  <main class="form-signin">
    <form method="POST" action="signin.php">
      <img class="mb-4" src="img/cms.jpg" alt="" width="72" height="57">
      <h1 class="h3 mb-3 fw-normal">Please Signup</h1>
      <label class="visually-hidden">Email address</label>
      <input type="email" class="form-control" placeholder="Email address" name="email" autofocus>
      <label for="password" class="visually-hidden">Password</label>
      <input type="password" id="password" class="form-control" placeholder="Password" name="password">
      <label for="cpassword" class="visually-hidden">Conform Password</label>
      <input type="password" id="cpassword" class="form-control" placeholder="Conform Password" name="cpassword">
      <small class="form-text text-muted">Make sure to type same Password. </small>

      <button class="w-100 btn btn-lg btn-primary" type="submit" name="signup_btn">Sign up</button>
      <br><br>
      <button class="w-100 btn btn-lg" style="border: 2px solid black;" type="submit" name="login_btn"> <a
          href="login.php">Log In</a> </button>
      <p class="mt-5 mb-3 text-muted">&copy; 2017-2020</p>
    </form>
  </main>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"
    integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js"
    integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj"
    crossorigin="anonymous"></script>

</body>

</html>