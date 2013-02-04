Testing installation...
<br/>
<h3>admin</h3>
<?php 
function test_file($file) {
    echo $file.': ';
    echo (is_file('bootstrap.php')==1)?'exist':'FAILED';
    echo '<br/>';
}
test_file('bootstrap.php');
test_file('index.php');
test_file('login.php');
test_file('logout.php');
?>



