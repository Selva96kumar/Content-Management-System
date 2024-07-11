<!DOCTYPE html>
<html>
    <head>
        <title>SQL</title>
    </head>
    <body>
        <?php

            $connect = mysqli_connect("localhost","root","","department");
            if($connect == false)  die("Error in Connecting with MySQL");


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

            $flag = 1;
            $s_no = $_POST['s_no'];
            $name = $_POST['name'];
            
            if($_FILES['file']['name'] != ""){

                $file = $_FILES['file']['name'];
                $file_name = "Files/" . $file;
                if(!move_uploaded_file($_FILES['file']['tmp_name'], $file_name)){
                    $flag = 0;
                    echo ($phpFileUploadErrors[$_FILES['file']['error']]);
                }
                else{
                    unlink("Files/".$_POST['old_file']);
                    $insert_query = mysqli_query($connect ,
                    "UPDATE curriculum SET name = '$name' , file = '$file' WHERE s_no = $s_no;"
                    );
                }
            }

            else{
                $insert_query = mysqli_query($connect ,
                            "UPDATE curriculum SET name = '$name' WHERE s_no = $s_no;"
                            );
            }
            
            if($insert_query && $flag) echo "Added Successfully ! ";
            else echo "Cannot Addedd Success Fully";
            
        ?>
    </body>
</html>