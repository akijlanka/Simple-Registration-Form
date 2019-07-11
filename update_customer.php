<?php
/**
 * Created by IntelliJ IDEA.
 * User: Aki
 * Date: 6/28/2019
 * Time: 7:58 PM
 */?>

<?php

$cid=$_POST['id'];
$name=$_POST['name'];
$add=$_POST['address'];
$salary=$_POST['salary'];

include 'db-connaction.php';
if (!$connection){
    echo mysqli_connect_error();
}

$sql="update customer set name='$name', address='$add', salary='$salary' where id='$cid'";

$result=mysqli_query($connection,$sql);

if ($result){
    echo "Customer Update";
}else{
    echo mysqli_error($connection);
}

?>
