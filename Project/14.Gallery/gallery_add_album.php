<!DOCTYPE html>
<html>
    <head>
        <title>Gallery</title>
    </head>
    <body>
        <?php
            $connect = mysqli_connect("localhost","root","","department");
            if($connect == false)  die("Error in Connecting with MySQL");

            $event_name = $_POST['event_name'];

            $check_query = mysqli_query($connect,"SHOW TABLES LIKE 'gallery';");
            $check = mysqli_fetch_array($check_query);
            if($check == null){
                mysqli_query( $connect ,"CREATE TABLE gallery( 
                    s_no INT(10) PRIMARY KEY AUTO_INCREMENT, 
                    event_name VARCHAR(1000) NOT NULL
                );");
            }

            $flag = 0;
            $result = mysqli_query($connect , "SELECT * FROM gallery");
            $num_rows = mysqli_num_rows($result);
            for($i = 0 ; $i < $num_rows ; $i++){
                $row = mysqli_fetch_array($result);
                if($row['event_name'] == $event_name){
                    $flag = 1;
                    die("Event Name is Already There ");
                }
            }
            if($flag == 0){
                mysqli_query($connect , "INSERT INTO gallery(event_name) VALUES ('$event_name');");
                mkdir("Images/$event_name");
                echo "Album Created Successfully<br>";
            } 
            

            echo "Please Add Photots To Your Album !<br>";

            $form = <<<ANYTHING
            <form action="gallery_add_image.php" method="post" enctype="multipart/form-data">
                Upload Files :<br />
                <input name="images[]" type="file"  multiple>
                <input type="submit" name="event_name" value="Add to $event_name">
            </form>
            ANYTHING;
            echo $form;
        ?>
    </body>
</html>