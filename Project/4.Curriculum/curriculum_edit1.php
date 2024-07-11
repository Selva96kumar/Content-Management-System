<!DOCTYPE html>
<html>
    <head>
        <title>SQL</title>
    </head>
    <body>
        <?php

            $connect = mysqli_connect("localhost","root","","department");
            if($connect == false)  die("Error in Connecting with MySQL");
            
            $check_query = mysqli_query($connect,"SHOW TABLES LIKE 'curriculum';");
            $check = mysqli_fetch_array($check_query);
            if($check == null){
                $create_query = mysqli_query( $connect ," CREATE TABLE curriculum( 
                    s_no INT(10) PRIMARY KEY AUTO_INCREMENT, 
                    name VARCHAR(100) ,  
                    file VARCHAR(1000)
                );");
            }
            
            $rows = mysqli_query( $connect , "SELECT * FROM curriculum ;");
            $num_rows = mysqli_num_rows($rows);
            if($num_rows == 0) {
                die( "No Data Found ! ");
            }

            $flag = 0;
            for($i = 0 ; $i < $num_rows ;$i++){
                $row = mysqli_fetch_array($rows);
                if((int)$_POST['s_no'] == (int)$row['s_no']){
                    $s_no = $row['s_no'];
                    $name = $row['name'];
                    $file = $row['file'];
                    $flag = 1;
                }
            }

            if($flag == 1){
                $form = <<<ANYTHING
                <form action="curriculum_edit2.php" method="post" enctype="multipart/form-data">
                    <label for="s_no">
                        Serial No :
                    </label>
                    <input type="text" name="s_no" value = "$s_no">
                    <label for="name">
                        Name : 
                    </label>
                    <input type="text" name="name" value = "$name">
                    <label for="file">
                        File Name : 
                    </label>
                    <input type="file" name="file" >
                    <button type="submit" name="old_file" value="$file"> Edit </button>
                    <button type="reset"> Reset </button>
                </form>
                ANYTHING;
                echo $form;
            }
            else echo "Not Found Any Matching Data";
            
        ?>
    </body>
</html>