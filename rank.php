<html>
   <head>
      <title>Test</title>
   </head>
   <body>
      <?php
         $mysqli = new mysqli("localhost","root","Bala@1999","run");
         // Check connection
         if ($mysqli -> connect_errno) {
            echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
            exit();
         }
         else {
            /** 
             * Obtaning all users and storing in column array
             * Finding the sum of the distance ran by individual user
             * Storing the calculated sum in display table
             * Transfering control to home page
             */
            $columns = array();
            $sql = "show fields from distance";
            $result = $mysqli->query($sql);
            $ans = array();
            if ($result->num_rows > 0) {
            // output data of each row
               while($row = $result->fetch_assoc()) {
                  if($row["Field"]!="date") {
                  array_push($columns,$row["Field"]);
                  }
               }
            } 
            else {
            echo "0 results";
            }
            for($i=0;$i<=count($columns);$i++){
            $sql = "SELECT sum(" . $columns[$i].") from distance";
            $result = $mysqli->query($sql);

            if ($result->num_rows > 0) {
               // output data of each row
               while($row = $result->fetch_assoc()) {
                  $temp =  $row["sum(".$columns[$i].")"];
                  if($temp != 0) {
                     array_push($ans,$temp); }
                  else{
                  array_push($ans,0);             
                  }
               }
            } 
         }
         // Add total distance in display table
         for($i=0;$i<=count($columns);$i++){
            $sql ="update display set total = ".$ans[$i]." where uname = '". $columns[$i]  . "'";
            $result = $mysqli->query($sql);  
         }
         echo '<script>   location.replace("http://localhost/runner/home.php");    </script>';     
         $conn->close();
         }
      ?>
   </body>
</html>
