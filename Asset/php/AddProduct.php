<?php
require 'ConnectDb.php';
$code=$_POST["id-pet"];
$Name = $_POST["name-pet"];
$type = $_POST["type-pet"];
$tmp_name = $_FILES['image-pet']['tmp_name'];
$filename = $_FILES['image-pet']['name'];
move_uploaded_file($tmp_name,"~/imgProducts/".$filename);
$sql ="INSERT INTO  thucung (CODE,NAME,TYPE,URLimage) VALUES ('{$code}','{$Name}','{$type}','~/Asset/php/imgProducts/{$filename}')";
$conn->query($sql);
header("Location:../../index.php");
//Trần hồng thang
exit;