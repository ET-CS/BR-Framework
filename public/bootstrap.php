<?php
    define('config_dir','../');
    include config_dir."config_paths.php";
    # read configuration for this site    
    include config_dir."config.php";
    # load framework
    include config_dir.DIR_SYSTEM."framework.php";
    # load modules engine
    include config_dir.DIR_SYSTEM."modules.php";    
?>
