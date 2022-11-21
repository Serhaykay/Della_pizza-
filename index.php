<?php 
//MySQLi goes here
$conn = mysqli_connect('localhost','haykay','Temmylekan19','della_pizza');
if(!$conn){
    echo 'connection error: '.mysqli_connect_error();
}

?>

<!DOCTYPE html>
<html lang="en">
    <?php include('templates/header.php') ?>
    <?php include('templates/footer.php') ?>
</html>