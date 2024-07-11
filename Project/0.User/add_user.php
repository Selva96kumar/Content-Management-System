<?php
    session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>SQL</title>
    </head>
    <body>
        <?php

            $connect = mysqli_connect("localhost","root","","department");
            if($connect == false)  die("Error in Connecting with MySQL");

            
            $check_query = mysqli_query($connect,"SHOW TABLES LIKE 'user';");
            $check = mysqli_fetch_array($check_query);
            if($check == null){
                $create_query = mysqli_query( $connect ," CREATE TABLE user( 
                    s_no INT(10) PRIMARY KEY AUTO_INCREMENT, 
                    user_name VARCHAR(100) , 
                    password VARCHAR(1000)
                );");
            }

            $name = $_POST['user_name'];
            $password = $_POST['password']; 
            $insert_query = mysqli_query($connect ,
                            "INSERT INTO user(user_name , password) VALUES ('$name' , '$password');"
                            );
            if($insert_query == true) echo "Added Successfully ! ";
            else echo "Cannot Addedd SuccessFully";
            
        ?>
    </body>
</html>