<?php
/**
 * Created by IntelliJ IDEA.
 * User: Aki
 * Date: 6/28/2019
 * Time: 7:58 PM
 */

$cid=$_POST['id'];

include 'db-connaction.php';
if (!$connection){
    echo mysqli_connect_error();
}

$sql="delete from customer where id='$cid'";

$result=mysqli_query($connection,$sql);

if ($result){
    echo "Customer Delete";
}else{
    echo mysqli_error($connection);
}

?>