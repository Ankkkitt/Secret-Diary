<?php 

session_start();
include 'connection.php';

if(isset($_POST['submit'])){

    $notes = $_POST['text'];
    $user = $_SESSION['username'];
    // echo "Notes : ".$notes."\n";
    // echo "<br>";
    // echo $_SESSION['username'];
    $noteSql = "UPDATE `signup` SET `notes`='$notes' WHERE `name`='$user'";
    $notesQuery = mysqli_query($con, $noteSql);

    if($notesQuery){
      ?>
        <script>
          alert("Your data saved successfully");
          window.location.href="book.php?name=<?php echo $_SESSION['username']  ?>";
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




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Secret Diary </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
    integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/9e8524743e.js" crossorigin="anonymous"></script>
    <style>
      body { 
        background-color: #8EC5FC;
        background-image: linear-gradient(62deg, #8EC5FC 0%, #E0C3FC 100%);
      }
    </style>
</head>
<body>
<div class="d-flex flex-row justify-content-between mx-4 my-4">
  <h1 class="head">Secret Diary</h1>
  <button class="btn btn-outline-danger" type="submit" id="logout"><a class=" text-danger link" href="logout.php">Logout</a></button>
</div>
<div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
          <div class="card-body">
            <h5 class="card-title text-center">Save Your Notes here</h5>
            <form class="form-signin" action="book.php" method="POST">
              <textarea name="text" id="" cols="52" rows="10" id="text"></textarea>
              <button class="btn btn-lg btn-outline-dark btn-block text-uppercase" type="submit" name="submit">Save</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
    <!-- <div class="container">
        <div class="text">
            <textarea name="text" id="" cols="30" rows="10"></textarea>
            <button class="btn btn-lg btn-outline-dark btn-block text-uppercase" type="submit" name="submit">Register</button>
        </div>
    </div> -->

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