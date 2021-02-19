<html">
   
   <head>
      <title>register php </title>
   </head>
   
   <body>

      <?php  
      if (isset($_POST['Uname']) && (isset($_POST['pass'])) && isset($_POST['email']))
      { 
         $uname = $_POST['Uname']; 
         $pass = $_POST['pass'];
         $email = $_POST['email'];

      } 
      else {
           header("Location: http://localhost:4200/input"); 
     echo "Failed";
      } 
      ?>
      <?php

$mysqli = new mysqli("localhost","root","Bala@1999","run");

// Check connection
if ($mysqli -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}
else {
   $sql = "insert into temp(name,password,email) values('$uname','$pass','$email')";
   $result = $mysqli->query($sql);
   echo '<script> 
   alert("Registration successful");
   location.replace("http://localhost:4200/login");
  </script>';
   $conn->close();
}
?>     

   </body>
   
</html>
