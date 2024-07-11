<?php
    session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>SQL</title>
    </head>
    <body>
    <form action="add_user.php" method="post">
        <label for="user_name">
            Username : 
        </label>
        <input type="text" name="user_name">
        <label for="password">
            Password : 
        </label>
        <input type="text" name="password">
        <button type="submit"> Add User</button>
        <button type="reset"> Reset </button>
    </form>
    </body>
</html>