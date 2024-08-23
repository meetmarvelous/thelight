<?php
require_once '../include/connect.php';
require_once '../security.php';

if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($dbcon, (int) $_GET['id']);
    $sql = "DELETE FROM blog_category WHERE id = '$id'";
    $result = mysqli_query($dbcon, $sql);

    if ($result) {
        header('location: add_blog_category.php');
      // echo "<script>window.alert('Blog deleted successfully!');</script>";

    } else {
        echo "Failed to delete." . mysqli_connect_error();
    }
}
mysqli_close($dbcon);