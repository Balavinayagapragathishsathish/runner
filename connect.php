<html>
   <head>
      <title>Connecting MySQL Server</title>
   </head>
   <body>
      <?php  
         /**
          * Receiving the post values from login.hbs
          * @variable uname - username
          * @variable pass - password
          * 
         **/
         if (isset($_GET['uname']) && (isset($_GET['pass'])))
         { 
            $uname = $_GET['uname'];
            $pass = $_GET['pass']; 
         } 
         else {
            header("Location: http://localhost:4200/input"); 
         }
      ?>
      <?php
         /**
          * Establising DB connection in run database
          * Checking for username and password in Person table
          * Transfering control to input distance or login page
          */

         $mysqli = new mysqli("localhost","root","Bala@1999","run");
         // Check connection
         if ($mysqli -> connect_errno) {
            echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
            exit();
         }
         else {
            $sql = "SELECT uname, password FROM Person";
            $result = $mysqli->query($sql);
            if ($result->num_rows > 0) {
               // check with each row
               while($row = $result->fetch_assoc()) {

                  if($row["uname"]==$uname)  {
                     if($row["password"]==$pass) {
                        echo '<script> location.replace("http://localhost:4200/home");</script>'; 
                     }

                     else {
                     echo '<script> alert("password incorrect");
                     location.replace("http://localhost:4200/login"); </script>'; 
                     }
                  }
               }
		echo $uname;
                echo '<script> alert("username incorrect");
               location.replace("http://localhost:4200/login"); </script>';   
            } 
         $conn->close();
         }
      ?>
   </body>
</html>
