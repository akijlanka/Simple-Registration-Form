<?php
/**
 * Created by IntelliJ IDEA.
 * User: Aki
 * Date: 6/20/2019
 * Time: 9:42 AM
 */?>

<?php

//$json=file_get_contents("php://input");
//$customer=json_decode($json, true);
//
//
//$cid=$customer[0]["value"];
//$name=$customer[1]["value"];
//$add=$customer[2]["value"];
//$salary=$customer[3]["value"];


$cid=$_POST['id'];
$name=$_POST['name'];
$add=$_POST['address'];
$salary=$_POST['salary'];


include 'db-connaction.php';
if (!$connection){
    echo mysqli_connect_error();
}

$sql="insert into customer values ('$cid','$name','$add','$salary')";

$result=mysqli_query($connection,$sql);

if ($result){
    echo "Customer Add";
}else{
    echo mysqli_error($connection);

//    mysqli_error();
//die(mysqli_error($connection));
}

?>
