<?php include "bootstrap.php"; ?>
<!DOCTYPE html>
<html>
    <head>
        <title>BR-Framework Demo</title>
    </head>
    <body style="margin: 50px 150px 0px 150px; background-color: beige;">
        <section style="text-align: center;">
            <div style="padding: 50px; background-color: khaki; border: 1px #000000 solid;">
                <header>
                    <h1>BR-<span style="color:#b83000;">Framework</span> <?php echo frameworkVersion ?></h1>
                </header>
                <p>Congratulations! you've successfully installed BR-Framework <?php echo frameworkVersion ?>.</p>                
                <h3>What next?</h3>
                <ul>
                    <ui>Visit the <a href="admin">Admin Panel</a></ui>
                    <ui>Install Modules</ui>
                    <ui>Write your application</ui>
                </ul>
                
                <br/><br/>
            </div>
        </section>                    
        <footer style="font-size:0.8em; margin: 10px;">Powered by BR-Framework &copy;<?php echo frameworkCopyrightYear ?></footer>
    </body>
</html>