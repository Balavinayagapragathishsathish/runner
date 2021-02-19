<html>
   <head>
      <title>Distance </title>
   </head>
   <body>
      <?php  
      /**
       * 
      * Getting the username and distance from input.hbs 
      * @variable uname - Username
      * @variable ran_distance - distance covered by the user today
      */
      if (isset($_GET['distance']) && isset($_GET['uname']))
      { 
         $ran_distance = $_GET['distance']; 
         $uname= $_GET['uname'];
      } 
      else {
         //header("Location: http://localhost:4200/input"); 
         echo "Failed";
      } 
      ?>

      <?php
      /**
      * Establising DB connection in run database
      * Inserting the distance in distance table
      * Transferring control to rank the user
      */
      $mysqli = new mysqli("localhost","root","Bala@1999","run");
      // Check connection
      if ($mysqli -> connect_errno) {
         echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
         exit();
      }
      else {
         $sql = "insert into distance (date) values (curdate());";
         $result = $mysqli->query($sql);
         $sql ="update distance set " . $uname ." = ".$ran_distance." where date=CURDATE()";

         $result = $mysqli->query($sql);
         echo '<script> location.replace("http://localhost/runner/rank.php");     </script>'; 
         $conn->close();
      }
      ?>     
   </body>
</html>
