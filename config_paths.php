<?php
    # define directories constants
    define("DIR_ADMIN", "admin");
    
    define("DIR_SYSTEM", "sys/");
        define("DIR_SYSTEM_MODULES", DIR_SYSTEM . "modules/");            
        define("DIR_RESOURCES", DIR_SYSTEM . "res/");
            define("DIR_GLOBAL_STYLES", DIR_RESOURCES . "styles/");        
        
    define("DIR_VARIABLE", "var/");
        define("DIR_GALLERY", DIR_VARIABLE . "gallery/");
        define("DIR_MODULES", DIR_VARIABLE . "modules/");
        define("DIR_TEMPLATES", DIR_VARIABLE . "templates/");
            define("DIR_CURRENT_TEMPLATE", DIR_TEMPLATES . "ETCS/");            
?>
