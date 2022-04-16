<?php
require 'ConnectDb.php';
$code=$_GET['CODE'];
$URLimage=$_GET['URLimage'];
$sql ="DELETE FROM thucung WHERE CODE={$code}";
$conn->query($sql);
// unlink($URLimage);
// header("Location:../../index.php");
// exit;

echo "$URLimage";
