<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
</head>
    <?php
        $phpFileUploadErrors = array(
            0 => 'There is no error, the file uploaded with success',
            1 => 'The uploaded file exceeds the upload_max_filesize directive in php.ini',
            2 => 'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form',
            3 => 'The uploaded file was only partially uploaded',
            4 => 'No file was uploaded',
            6 => 'Missing a temporary folder',
            7 => 'Failed to write file to disk.',
            8 => 'A PHP extension stopped the file upload.',
        );

        $folder = substr($_POST['event_name'],7);
        $dir = "Images/$folder/";
        $flag = 1;
        $count = count($_FILES['images']['name']);
        for($i = 0  ; $i < $count ; $i++){
            $file_name = $dir . basename($_FILES['images']['name'][$i]);
            if(!move_uploaded_file($_FILES['images']['tmp_name'][$i] , $file_name)){
                $flag = 0;
                echo ($phpFileUploadErrors[$_FILES['images']['error'][$i]]);
            }
        }
        if($flag){
            echo "Files Are Uploded Successfully".'<br>';
            echo '<form action="gallery_image_view.php" method="post">';
            echo "Click To View Photos : ";
            echo '<button name="event_name" type="submit" value="'.$folder.'">View</button>'.'<br>';
            echo '</form>';
        }
        
    ?>
</body>
</html>