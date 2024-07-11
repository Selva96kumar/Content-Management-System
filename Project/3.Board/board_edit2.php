<!DOCTYPE html>
<html>
    <head>
        <title>SQL</title>
    </head>
    <body>
        <?php

            $connect = mysqli_connect("localhost","root","","department");
            if($connect == false)  die("Error in Connecting with MySQL");

            $s_no = $_POST['s_no'];
            $name = $_POST['name'];
            $role = $_POST['role'];
            $address = $_POST['address'];
            $insert_query = mysqli_query($connect ,
                            "UPDATE board_of_studies SET name = '$name' , role = '$role' , address = '$address' WHERE s_no = $s_no;"
                            );
            if($insert_query == true) echo "Added Successfully ! ";
            else echo "Cannot Addedd Success Fully";
            
        ?>
    </body>
</html>