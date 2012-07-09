<?php
    $pluginpath = '';
    function includeModules($path, $level) {        
        global $pluginpath;        
        if ($handle = opendir($path)) {
            /* loop over the directory. */
            while (false !== ($entry = readdir($handle))) {
                if ($entry != "." && $entry != "..") {
                    if (is_dir($path.$entry) === true){
                        //currently not scanning modules deeper. uncomment for recursive scanning
                        if ($level < MODULES_SCAN_LEVEL+1)
                            includeModules($path.$entry."/", $level+1);
                    }else{
                        $page = file_get_contents($path.$entry);
                        $pos = strpos($page, "/*");
                        $pos2 = strpos($page, "*/");
                        $part = substr($page, $pos, $pos2);
                        if (strpos($part, "Plugin Name:")) {
                            $pluginpath = $path;
                            include $path.$entry;
                            #echo $entry.' loaded.';
                        }                                
                    }
                }
            }
            closedir($handle);
            $pluginpath = '';
        }
    }
    
    #if (is_dir('res/modules')) echo 'yes!';        
    #if (is_dir('../sys/modules')) echo 'yes!';
    
    $root = '../';
    
    if (is_dir($root.DIR_SYSTEM_MODULES)) {
        #echo DIR_SYSTEM_MODULES;
        includeModules($root.DIR_SYSTEM_MODULES, 1);
    }
    
    if (is_dir($root.DIR_MODULES)) {
        #echo DIR_MODULES;
        includeModules($root.DIR_MODULES, 1);
    }
    
    if (is_dir(DIR_PUBLIC_MODULES)) {
        #echo DIR_PUBLIC_MODULES;
        includeModules(DIR_PUBLIC_MODULES, 1);
    }
    
?>
