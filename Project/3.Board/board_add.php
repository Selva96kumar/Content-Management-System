<!DOCTYPE html>
<html>
    <head>
        <title>SQL</title>
    </head>
    <body>
        <?php

            $connect = mysqli_connect("localhost","root","","department");
            if($connect == false)  die("Error in Connecting with MySQL");

            
            $check_query = mysqli_query($connect,"SHOW TABLES LIKE 'board_of_studies';");
            $check = mysqli_fetch_array($check_query);
            if($check == null){
                $create_query = mysqli_query( $connect ," CREATE TABLE board_of_studies( 
                    s_no INT(10) PRIMARY KEY AUTO_INCREMENT, 
                    name VARCHAR(100) , 
                    role VARCHAR(1000) , 
                    address VARCHAR(1000)
                );");
            }

            $name = $_POST['name'];
            $role = $_POST['role'];
            $address = $_POST['address'];
            $insert_query = mysqli_query($connect ,
                            "INSERT INTO board_of_studies(name , role , address) VALUES ('$name' , '$role' , '$address');"
                            );
            if($insert_query == true) echo "Added Successfully ! ";
            else echo "Cannot Addedd SuccessFully";
            
        ?>
    </body>
</html>