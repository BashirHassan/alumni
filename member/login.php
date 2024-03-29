<?php

session_start();
// Include config file
//include('config.php');
include ('connk.php');
// require 'class.php';

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    
    $query = "SELECT  email,password FROM admin WHERE email = :email AND password = :password";
    $bind = $pdo->prepare($query);
    $bind->bindParam(':email', $email, PDO::PARAM_STR);
    $bind->bindParam(':password', $password, PDO::PARAM_STR);
    $bind->execute();
    $stmt = $bind->fetchAll(PDO::FETCH_OBJ);

    $query1 = "SELECT  email,password FROM members WHERE email = :email AND password = :password";
    $bind1 = $pdo->prepare($query1);
    $bind1->bindParam(':email', $email, PDO::PARAM_STR);
    $bind1->bindParam(':password', $password, PDO::PARAM_STR);
    $bind1->execute();

    $stmt1 = $bind1->fetchAll(PDO::FETCH_OBJ);

    

    if ($stmt) {
        
        if ($bind->rowCount() > 0) {
            $_SESSION['alogin'] = $_POST['email'];
            //$_SESSION['alogin'] = $_POST['password'];
                header("location:../dashboard.php");
        }else{
            echo "<script>
            
            alert('Invalid details');
            </script>";
            header('location:login.php');
        }
    }else if ($stmt1) {
        if ($bind1->rowCount() > 0) {
            $_SESSION['member'] = $_POST['email'];
            // $_SESSION['password'] = $_POST['password'];
            
            header("location:member-index.php");
        }else{
        echo "<script>
        
        alert('Invalid details');
        </script>";
        header('location:login.php');
    }
}

}

?>


<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Muslim-Ummah G S U</title>

  <!-- Custom fonts for this theme -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

  <!-- Theme CSS -->
  <link href="css/freelancer.min.css" rel="stylesheet">

  <style>
    body{
      background-color: teal;
      padding-top: 90px;
    }
    
    .card{
        text-align: center;
    }

    .form-control{
        margin-bottom: 10px;
    }
  </style>

</head>

<body id="page-top">

  <div class="container">
    <div class="col-md-5 mx-auto">
        <div class="card">
            <div class="card-body">
                <!-- <?php echo $row['fullname'];?> -->
                <!-- member login form -->
                <form action="login.php" method="POST">

                    <!-- login logo -->
                    <img class="mb-4 mx-auto" src="img/logo.jpg" alt="" width="100" height="100">
                    <!-- login header -->
                    <h1 class="h3 mb-3 font-weight-normal">Account Login</h1>

                    <div class="form-group">
                        <input type="email" name="email" class="form-control" value="" placeholder="Email address">
                        <!-- <span class="help-block text-danger"><?php echo $email_err; ?></span>                                                                                                     -->
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" class="form-control" placeholder="Password">
                        <!-- <span class="help-block text-danger"><?php echo $password_err; ?></span>                                                                                                     -->
                    </div>
                    <hr>
                    <div class="form-group">     
                        <button type="submit" class="btn btn-primary btn-block" name="login">L o g i n</button>
                    </div>
                </form>

                <!-- membership register link -->
                <p class="mt-2 mb-1 text-default">Not a member? <a href="register.php">Register</a></p>
                <!-- copyright -->
                <p class="mt-2 mb-1 text-muted">&copy; Muslim-Ummah G S U <?php echo date('Y'); ?></p>

            </div>
        </div>
    </div>
  </div>

  

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Plugin JavaScript -->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Contact Form JavaScript -->
  <script src="js/jqBootstrapValidation.js"></script>
  <script src="js/contact_me.js"></script>

  <!-- Custom scripts for this template -->
  <script src="js/freelancer.min.js"></script>

</body>
  
</html>


