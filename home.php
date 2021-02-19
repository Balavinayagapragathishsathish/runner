<html>
    <head>
        <title>Home</title>
        <link rel="stylesheet" href="app.css"> 

    </head>
    <body>
        <!-- Navigation bar -->
        <ul>
        <li><a class="active" href="">Home</a></li>
        <li><a href="http://localhost:4200/profile">Profile</a></li>
        <li><a href="http://localhost:4200/input">Distance covered</a></li>
        <li style="float:right"><a href="http://localhost:4200/logout">Logout</a></li>
        </ul>

        <h1>Overall Runners Rank</h1>
            <?php  
            $mysqli = new mysqli("localhost","root","Bala@1999","run");
            // Check connection
            if ($mysqli -> connect_errno) {
                echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
                exit();
            }
            else {      
                /** 
                 * Getting the users from display table in descending order
                 * Providing rank number to the users
                 * Displaying the result in table format
                 */
                $sql = "select * from display order by total desc"; 
                $rank = 0;
                $num = 0;
                $result = $mysqli->query($sql);
            
                echo "<table id='customers'>"; 
                echo "<th> Name</th>";
                echo "<th> Total distance ran</th>";   
                echo "<th> Rank</th>";                 
                while($row = $result->fetch_assoc()) { 
                    echo "<tr><td>" . $row['uname'] . "</td><td>" . $row['total'] . "</td>";  
                    if($row['total']!= $num) {
                        $rank =$rank + 1;
                        echo "<td> $rank</td></tr>";
                        $num = $row['total'];
                    }
                    else {
                        echo "<td> $rank</td></tr>";
                        $num = $row['total'];            
                    }
                }
                echo "</table>";
            } 
            ?>   
            <h1>Weekly runners report</h1>
            <?php
            //WEEKLY REPORT
            /** Displaying all the users distance ran for past 7 days 
             * 
             */
                $columns = array();
                $sql = "show fields from distance";
                $result = $mysqli->query($sql);
                $ans = array();
                if ($result->num_rows > 0) {
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                            array_push($columns,$row["Field"]);   
                    }
                }
                else {
                    echo "0 results";
                }
                $sql = "select * from distance where  date >= DATE_SUB(CURDATE(), INTERVAL 7 DAY)";
                $result = $mysqli->query($sql);             
                echo "<table id='customers'>"; 
                echo "<tr>";
                for($i=0;$i<=count($columns)-1  ;$i++){
                    echo "<th> " . $columns[$i] . "</th>" ;              
                }         
                echo "</tr>";
                while($row = $result->fetch_assoc()) { 
                    echo "<tr>";
                    for($i=0;$i<=count($columns)-1;$i++){
                        if($row[$columns[$i]]>0)
                            echo "<td> " . $row[$columns[$i]] . "</td>" ;  
                        else
                            echo "<td> 0 </td>" ;  
                    }
                    echo "</tr>";
                }                
                echo "</table>";                        
                $conn->close();
            ?>     
    </body>
</html>
