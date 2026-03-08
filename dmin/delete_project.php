<?php
require_once '../include/connect.php';
// require_once '../security.php';

if (isset($_GET['id'])) {
    // $id = mysqli_real_escape_string($dbcon, (int) $_GET['id']);
    $id = $_GET['id'];
    $sql = "DELETE FROM projects WHERE id = '$id'";
    $result = mysqli_query($dbcon, $sql);

    if ($result) {
        echo "<script>window.alert('Project deleted successfully!');</script>";
        header('location: project.php');

    } else {
        echo "Failed to delete." . mysqli_connect_error();
    }
}
mysqli_close($dbcon);