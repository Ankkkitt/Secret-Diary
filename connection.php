<?php
// development part
// $server = "localhost";
// $user = "root";
// $password = "";
// $db = "diary";

// remote mysql connection
$server = "remotemysql.com";
$user = "qfrht2vMKA";
$password = "M32P3uY7SS";
$db = "qfrht2vMKA";


$con = mysqli_connect($server, $user, $password, $db);
if($con){

}else{
  ?>
    <script>
      alert("connection not successfull !!");
    </script>
  <?php
}


?>
