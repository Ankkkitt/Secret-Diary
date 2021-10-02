<?php

session_start();
include 'connection.php';

if(isset($_POST['submit'])){

  $email = $_POST['email'];
  $password = $_POST['password'];

  // checking whether the entered email is present in our database
  $emailCheck = "SELECT * FROM signup WHERE email='$email' ";
  $query = mysqli_query($con, $emailCheck);

  $emailCount = mysqli_num_rows($query);
  if($emailCount){

    // fetching all the details 
    $emailPassword = mysqli_fetch_assoc($query);
    // getting the username of user
    $_SESSION['username'] = $emailPassword['name'];
    // getting password that belong to that email
    $finalPassword = $emailPassword['pass'];

    
    // checking whether password entered now is same as password entered during registration
    if(password_verify( $password, $finalPassword )){

      ?>
        <script>
          alert("Login Successfull !\n Welcome to Secret Diary, <?php echo $_SESSION['username']?>");
          window.location.href="book.php?name=<?php echo $_SESSION['username']  ?>";
        </script>
        
      <?php
     
    }else{
      ?>
        <script>
          alert("Password is incorrect !!");
        </script>
      <?php
    }

    }else{
      ?>
        <script>
          alert("Email does not exists in our database !!");
        </script>
      <?php
    }
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Secret Diary | login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
    integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <style>
      body { 
        background-color: #8EC5FC;
        background-image: linear-gradient(62deg, #8EC5FC 0%, #E0C3FC 100%);
      }
    </style>
</head>
<body>

<div class="container my-4">
<div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
          <div class="card-body">
            <h5 class="card-title text-center">Sign In</h5>
            <form class="form-signin" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
              <div class="form-label-group my-4">
                <input type="email" id="inputEmail" class="form-control" name="email" placeholder="Email address" required autofocus>
                <!-- <label for="inputEmail"><i class="fas fa-envelope mr-2"></i> Email address</label> -->
              </div>

              <div class="form-label-group my-4">
                <input type="password" id="inputPassword" class="form-control" name="password" placeholder="Password" required>
              </div>
              <button class="btn btn-lg btn-outline-dark btn-block text-uppercase" type="submit" name="submit">Sign in</button>
              <p class="text-center mt-2">Don't have an account <a href="index.php">Register</a> </p>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>



  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
    integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
    integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV"
    crossorigin="anonymous"></script>
</body>
</html>