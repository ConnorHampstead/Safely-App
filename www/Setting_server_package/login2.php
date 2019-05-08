<?php
// Initialize the session

    session_start();
    $dbServerName = "localhost";
    $dbUserName = "App";
    $dbPassword = "orange";
    $dbName = "new_schema";
    // create connection
    $conn = new mysqli($dbServerName,$dbUserName,$dbPassword,$dbName);
    
    if (mysqli_connect_error()){
        die('Connect Error ('.mysql_connect_errno().')'.mysqli_connect_error());
    }else{
        echo "Connected"."<br>";
    }

 
        

        $email = $_POST["email"];
        $password  = $_POST["password"];

        $sql = "SELECT userID FROM user WHERE Email = '$email' and password =  $password";
        $result=$conn->query($sql);
        
        $row_cnt = $result->num_rows;
        if($row_cnt==1){
            while($row = $result->fetch_assoc()) {
                $_SESSION['userID'] = $row['userID'];
                echo"You are a validated user."."<br> ";
                echo  $_SESSION['userID'] ;
                
            }

            

            $conn->close();
            header('Location: index.html');
            echo"";
        }else{
            echo"Sorry, your credentials are not valid, Please try again.";

            $conn->close();
            header('Location: login.html');
        
        }
            
        

       
?>
 
