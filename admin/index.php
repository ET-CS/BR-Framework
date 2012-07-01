<?php  
    # admin bootstrap
    include "bootstrap.php";    
?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Admin - <?php echo frameworkName ?></title>
    </head>
    <body>
        <header>
            <h1><?php echo frameworkName ?></h1>
        </header>
            <?php 
                session_start();
                if ($_SESSION['loggedin'] != 1) {
                   header("Location: login.php");
                   exit;
                }
            ?>
        <nav>
            <ul>
                <li><a href="">Home</a></li>                
                <li>Modules</li>
                <li>Settings</li>                
                <li><a href="../">Back to site</a></li>
                <li><a href="logout.php">Logout</a></li>                
            </ul>
        </nav>
        <h1>Installed Modules:</h1>
        <?php
            function scanModules($path, $level) {
                if ($handle = opendir($path)) {
                    /* loop over the directory. */                    
                    while (false !== ($entry = readdir($handle))) {
                        if ($entry != "." && $entry != "..") {
                            if (is_dir($path.$entry) === true){
                                //currently not scanning modules deeper. uncomment for recursive scanning
                                if ($level < MODULES_SCAN_LEVEL+1)
                                    scanModules($path.$entry."/", $level+1);
                            }else{
                                $page = file_get_contents($path.$entry);
                                $pos = strpos($page, "/*");
                                $pos2 = strpos($page, "*/");
                                $part = substr($page, $pos+2, $pos2);                                
                                if (strpos($part, "Plugin Name:")) {
                                    $lines=explode("\n",$part);
                                    foreach ($lines as &$line) {
                                        if ($line!="") {
                                            $explode=explode(':',$line);
                                            $item=trim($explode[0]);
                                            $value=trim($explode[1]);
                                            #echo $item.'='.$value.'<br/>';                                    
                                            if ($item=="Plugin Name") {$name=$value;}
                                            if ($item=="Description") {$desc=$value;}
                                            if ($item=="Version") {$version=$value;}
                                            if ($item=="Author") {$author=$value;}
                                            if ($item=="Author URI") {$authoruri=$value;}
                                            if ($item=="License") {$license=$value;}
                                            if ($item=="Compatibility") {$compatibility=$value;}
                                        }
                                    }                                
                                    echo '<tr><td><span style="font-weight:bolder;">'.$name.'</span><br/><span style="font-size:0.85em">';
                                    echo '<a href="'.$path.'settings.php">Settings</a>'; 
                                    echo ' | ';
                                    echo '<a href="'.$path.'help.php">Help</a>';
                                    echo '</span></td><td>'.$desc.'<br/>version: '.$version.' by <a href="'.$authoruri.'">'.$author.'</a> | License: '.$license.'</td></tr>';
                                    include $path.$entry;
                                }                                
                            }
                        }
                    }
                    closedir($handle);
                }
            }            
            echo '<table border="1" style="background-color:FFFFCC" width="80%" cellpadding="6" cellspacing="0">';
            echo '<tr style="background-color:lightgrey;"><td width="170">Name</td><td>Description</td></tr>';
            scanModules("../".DIR_SYSTEM_MODULES, 1);
            scanModules("../".DIR_MODULES, 1);
            echo '</table>';
        ?>
        <br/><br/><p>DB not configured. <a href="../config.php">Configure now</a></p>
        <footer>Powered by <?php echo frameworkName ?></footer>
    </body>
</html>
