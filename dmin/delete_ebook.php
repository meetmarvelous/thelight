<?php 
include('../include/dbcon.php');
// session_start();

$getid = $_GET['id'];

mysqli_query($dbcon,"DELETE FROM ebook where ebook_id ='$getid'");
header("location: ebook.php");
// echo "<script>window.alert('successfully deleted'); window.location='ebook.php';<script>";
