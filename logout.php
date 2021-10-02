<?php
session_start();
if(empty($_SESSION['username'])) {
      ?>
        <script>
          alert("User not logged in\nFirst login on Secret Diary...");
          window.location.href='login.php';
        </script>
    <?php
}
    
    session_destroy();
    ?>
        <script>
          alert("Logout Successfull!\nCome back soon, <?php echo $_SESSION['username']?>");
          window.location.href='login.php';
        </script>
    <?php
?>