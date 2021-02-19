 <html>

  <head>
    <title>Profile</title>
      <link rel="stylesheet" href="app.css"> 
  </head>

  <body>
  <!-- Navigation bar -->
  <ul>
  <li><a  href="http://localhost/runner/home.php">Home</a></li>
  <li><a class="active" href="">Profile</a></li>
  <li><a href="http://localhost:4200/input">Distance covered</a></li>
  <li style="float:right"><a href="http://localhost:4200/logout">Logout</a></li>
  </ul>  
  <?php  
  // Getting username from url 
    if (isset($_GET['uname'])){ 
      $uname= $_GET['uname'];
    } 
    else {
      header("Location: http://localhost:4200/home"); 
      echo "Failed"; 
    }
  ?>
  <?php
    /** 
     * Getting user personal details from person table
     * Displaying the retrieved details
     */
    $mysqli = new mysqli("localhost","root","Bala@1999","run");

    // Check connection
    if ($mysqli -> connect_errno) {
      echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
      exit();
    }
    else    {   
      //Personal REPORT
      $sql = "select * from Person where uname = '".$uname."'";
      // echo $sql;
      $result = $mysqli->query($sql);             
      while($row = $result->fetch_assoc()) { 
        $password=$row["password"];
        $role=$row["role"];
        $lastname=$row["lastname"];
        $email=$row["email"];
        $phone=$row["phone"];
        $Address=$row["Address"];
        $facebook=$row["facebook"];
        $linkedin=$row["linkedin"];
        $github=$row["github"];
        $instagram=$row["instagram"];
      }
    } 
  ?>

  <br/>
  <div class="photo">
    <center> <br>
      <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin" width="150">
      <h2> <?php echo $uname ?> </h2>
      <p style ="color: grey font-size:100px ;" ><?php echo $role ?> </h5> 
    </center>
  </div>
  <div class="details">
      <table id="personal"> 
        <tr>  <th> First Name</th>
              <td> <?php echo $uname ?> </td>
        </tr>
        <tr>
          <th> Last Name</th>
          <td> <?php echo $lastname ?> </td>
        </tr>          
        <tr>
          <th> Email</th>
          <td> <?php echo $email ?> </td>            
        </tr>
        <tr>
          <th> Mobile</th>
          <td> <?php echo $phone ?> </td>            
        </tr>
        <tr>
          <th> Password </th>
          <td> <?php echo $password ?>   </td>            
        </tr>           
        <tr>
          <th> City</th>
          <td> <?php echo $Address ?>   </td>            
        </tr> 
      </table>
  </div>
  <div class="social">
    <table id="media"> 
      <tr>
        <th>  <img src="facebook.jpeg" alt="logo" width="50">
          Facebook
        </th>
        <td> <?php echo $facebook ?> </td>
      </tr>
      <tr>
        <th>  <img src="linked.jpeg" alt="logo" width="50">  Linkedin  </th>
        <td> <?php echo $linkedin ?> </td>            
      </tr>
      <tr>
        <th> <img src="github.jpeg" alt="logo" width="50">  Github</th>
        <td> <?php echo $github ?> </td>            
      </tr>
      <tr>
        <th> <img src="insta.png" alt="logo" width="50"> Instagram</th>
        <td> <?php echo $instagram ?>   </td>            
      </tr>           
    </table>
  </div>      
  <div class="chart">
    <?php 
    /**
     * Storing the user distance in distance array
     * Storing the corresponding date in date array
     * 
     */
      $sql = "select date ," .$uname . " from distance where  date >= DATE_SUB(CURDATE(), INTERVAL 6 DAY)";
      echo '<script>var date= [];
      var distance = [];
      var count=0; </script>';
      $result = $mysqli->query($sql);
      while($row = $result->fetch_assoc()) { 
        $temp = $row["date"];
        echo '<script> date.push('.$temp.')</script>';
        if($row[$uname]>0)    
          echo '<script> distance.push('.$row[$uname].')</script>';
        else   
          echo '<script> distance.push(0)</script>'; 
        echo '<script> count++; </script>';
      }    

    ?>
    <!-- Displaying the users daily ran distance in line chart -->
    <canvas id="myChart"></canvas>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
    <script>
    var date = ["Day1","Day 2","Day 3","Day 4","Day 5","Day 6"];
    var ctx = document.getElementById('myChart').getContext('2d');
    var chart = new Chart(ctx, {
      // The type of chart we want to create
      type: 'line',
      // The data for our dataset
        data: {
            labels: date,
            datasets: [{
              label: 'Your daily activity',
            //   backgroundColor: 'rgb(255, 99, 132)',
              borderColor: 'rgb(255, 99, 132)',
              data: distance
          }]
      },
      // Configuration options go here
      options: {
        maintainAspectRatio: false,
        scales: {
          yAxes: [{
            scaleLabel: {
              display: true,
              labelString: 'Date'
            }
          }]
        }     
      }
    });
    </script>

    </div>
    <div class="table">
      <?php  
      /**
       * Displaying the users ran distance in distance table
       */
        echo '<h1>Your records </h1>';
        $mysqli = new mysqli("localhost","root","Bala@1999","run");
        // Check connection
        if ($mysqli -> connect_errno) {
          echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
          exit();
        }
        else {      
          $sql = "select date , ". $uname." from distance";
          $result = $mysqli->query($sql);             
          echo "<table id='customers'>"; 
          echo "<tr>";
          echo "<th> Date</th>" ;      
          echo "<th> Distance</th>" ;                               
          echo "</tr>";
          while($row = $result->fetch_assoc()) { 
            echo "<tr> <td> " . $row["date"] . " </td>" ;  
            if($row[$uname]>0)
              echo "<td>". $row[$uname]. "</td> </tr>";   
            else
              echo "<td> 0 </td> </tr>";
          }
          echo "</table>";            
          $conn->close();
        } 
      ?>     
    <div>
  </body>

</html>
