<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <?php
        $flag = 1;
        $connect = mysqli_connect("localhost","root","","department");
        if($connect == false){ echo("Error in Connecting with MySQL"); $flag = 0;};

        $check_query = mysqli_query($connect,"SHOW TABLES LIKE 'gallery';");
        $check = mysqli_fetch_array($check_query);
        if($check == null){
            $flag = 0;
        }
        if($flag){
            $rows = mysqli_query( $connect , "SELECT * FROM gallery;");
            $num_rows = mysqli_num_rows($rows);

            echo '<form action="gallery_image_view.php" method="post">';
            for($i = 0 ; $i < $num_rows ;$i++){
                $row = mysqli_fetch_array($rows);
                $event_name = $row['event_name'];
                echo $event_name . " : ";
                echo '<button name="event_name" type="submit" value="'.$event_name.'">View</button>'.'<br>';
            }
            echo '</form>';
        }

    ?>

    <form action="gallery_add_album.php" method="post">
        <label for="event_name" >
            Event Name : 
        </label>
        <input type="text" name="event_name">
        <button type="submit">Add Event</button>
    </form>
</body>
</html>