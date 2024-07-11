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
        $event_name = $_POST['event_name'];
        $dir_name = "Images/".$event_name;
        $images = array_diff(scandir($dir_name), array('..', '.'));
        $count = count($images);
        for($i = 2; $i < $count+2 ; $i++){
            echo'<img src="'.$dir_name.'/'.$images[$i].'" alt="'.$event_name.'">';
        }
    ?>
    
</body>
</html>