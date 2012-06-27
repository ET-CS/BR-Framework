<?php
    # read configuration for this site
    include "../config.php";
?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Admin - BR framework</title>
    </head>
    <body>
        <header>
            <h1>BR Framework</h1>
        </header>
        <?php 
            session_start();
            if ($_GET['login']) {                    
                if ($_POST['username'] == 'admin'
                    && $_POST['password'] == Password) {
                    $_SESSION['loggedin'] = 1;
                    header("Location: index.php");
                    exit;
                } else echo "<b>Wrong details</b><br/>";
            }
        ?>
        Log in:
        <form action="?login=1" method="post">
            Username: <input type="text" name="username" /><br />
            Password: <input type="password" name="password" /><br />
            <input type="submit" />
        </form>        
    </body>
</html>
