<?php
session_start();
include 'connection.php';

if(isset($_POST['submit'])){

  $name = $_POST['name'];
  $email = $_POST['email'];
  $password = $_POST['password'];

  //password protection required
  $password_encrypt = password_hash($password, PASSWORD_BCRYPT);
  
  // to check whether entered email does not exist already.
  $email_query = "SELECT * FROM signup WHERE email='$email' ";
  $query = mysqli_query($con, $email_query);

  $emailCount = mysqli_num_rows($query);

  if($emailCount > 0){
    ?>
    <script>
      alert("Email already exists !!");
    </script>
    <?php
  }else{
    $sql = " INSERT INTO `signup` (`name`, `email`, `pass`) VALUES ('$name', '$email', '$password_encrypt')";
    $sqlQuery = mysqli_query($con, $sql);

    if($sqlQuery){
      ?>
        <script>
          alert("You have successfully registered on Apna Diary");
          window.location.href='login.php';
        </script>
      <?php
    }else{
      ?>
        <script>
          alert(" Some Technical error .");
        </script>
      <?php
    }
  }

}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Secret Diary | Registeration</title>
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
<div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
          <div class="card-body">
            <h1 class="card-title text-center">Sign Up</h1>

            <form class="form-signin" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">

             <div class="form-label-group my-4">
                <input type="text" name="name" id="inputname" class="form-control" placeholder="Enter your name" required>
                <!-- <label for="inputname"><i class="fas fa-user-check mr-2"></i>Name</label> -->
             </div>

              <div class="form-label-group my-4">
                <input type="email" id="inputEmail" class="form-control" placeholder="Email address" name="email" required>
                <!-- <label for="inputEmail"><i class="fas fa-envelope mr-2"></i> Email address</label> -->
              </div>



              <div class="form-label-group my-4">
                <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="password" required>
                <!-- <label for="inputPassword"> <i class="fas fa-unlock-alt"></i>&nbsp Password</label> -->
              </div>

              <button class="btn btn-lg btn-outline-dark btn-block text-uppercase" type="submit" name="submit">Register</button>
              <p class="text-center mt-2">Already have an account <a href="login.php">Sign In</a> </p>
              
            </form>
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