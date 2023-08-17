<?php

if( isset($_GET["id"])){

    $id= $_GET["id"];

    $server= "localhost";
$username= "root";
$password= "";
$database= "list";

$connection= new mysqli($server,$username,$password,$database);

$sql=" DELETE FROM names WHERE id= $id";
$connection->query($sql);

}

header("location: /proj2/index.php");
exit;

?>