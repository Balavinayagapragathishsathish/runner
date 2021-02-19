<html>

   <head>
   <title>register php </title>
   </head>

   <body>

      <?php  
      /**
         * Receiving the post values from register.hbs
         * @variable uname - username
         * @variable pass - password
         * @number phone - Mobile number of the user
         * @Address - city name
         */
      if (isset($_POST['uname']) && (isset($_POST['pass'])) && isset($_POST['email']))
      { 
         $uname = $_POST['uname']; 
         $password = $_POST['pass'];
         $email = $_POST['email'];
         $role=$_POST['role']; 
         $lastname = $_POST['lastname'];
         $phone = $_POST['number'];
         $Address = $_POST['address'];
         $facebook = $_POST['facebook'];
         $linkedin = $_POST['linkedin'];
         $github = $_POST['github'];
         $instagram = $_POST['insta'];
      } 
      else {
         header("Location: http://localhost:4200/input"); 
         echo "Failed";
      } 
      ?>
      <?php
      /**
      * Establising DB connection in run database
      * Checking for user as already existing in Person table
      * Storing all input fields from register to Person table
      * Adding user in distance and display table
      * Transfering control to input distance or login page
      */
      $mysqli = new mysqli("localhost","root","Bala@1999","run");

      // Check connection
      if ($mysqli -> connect_errno) {
         echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
         exit();
      }
      else {
         $sql = "SELECT uname FROM Person";
         $result = $mysqli->query($sql);
         if ($result->num_rows > 0) {
         // check for exisiting user 
            while($row = $result->fetch_assoc()) {
               if($row["uname"]==$uname)
               {
                  echo '<script> alert("Name aleady exisit");
                     location.replace("http://localhost:4200/login"); </script>';
               }  
            }
         }
         //Add user in user Person table
         $sql = "insert into Person(role,uname,lastname,email,phone,Address,password,facebook,linkedin,github,instagram) 
            values ('$role','$uname','$lastname','$email','$phone','$Address','$password','$facebook','$linkedin','$github','$instagram')";
         $result = $mysqli->query($sql);

         // To add user in distance table
         $sql = "ALTER TABLE distance add ". $uname . " INT";
         $result = $mysqli->query($sql);

         //To add user in display table
         $sql = "insert into display(uname) values ('$uname')";
         $result = $mysqli->query($sql);   
         echo '<script>  location.replace("http://localhost:4200/input"); </script>'; 
         $conn->close();
      }
      ?>     

   </body>

</html>
