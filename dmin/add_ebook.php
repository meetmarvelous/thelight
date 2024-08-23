<?php
include("header.php");
include("nav.php");
include("nav/nav_index.php");
?>

<?php
$book = mysqli_query($dbcon, "SELECT * FROM ebook");
$book_count = mysqli_num_rows($book);
$user = mysqli_query($dbcon, "SELECT * FROM user");
$user_count = mysqli_num_rows($user);
$blo = mysqli_query($dbcon, "SELECT * FROM blog");
$blog_count = mysqli_num_rows($blo);
?>

<div class="main-content">
  <section class="section">
    <div class="section-body">
      
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-statistic-4">
              <div class="container">
                <h3>Manage Ebooks</h3>
                <div class="btn-group">
                  <a href="add_ebook.php" class="btn btn-primary">Add New Ebook</a>
                  <a href="ebook.php" class="btn btn-secondary">View All Ebooks</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <?php

      // If upload button is clicked ...
      if (isset($_POST['upload'])) {

        $title = stripslashes($_POST["title"]);
        $code = stripslashes($_POST["code"]);
        $department = stripslashes($_POST["department"]);
        $faculty = stripslashes($_POST["faculty"]);
        $typ = stripslashes($_POST["type"]);
        $year = stripslashes($_POST["year"]);

        $title = mysqli_real_escape_string($dbcon, $title);
        $code = mysqli_real_escape_string($dbcon, $code);
        $department = mysqli_real_escape_string($dbcon, $department);
        $faculty = mysqli_real_escape_string($dbcon, $faculty);
        $typ = mysqli_real_escape_string($dbcon, $typ);
        $year = mysqli_real_escape_string($dbcon, $year);
        

        // code to store image file
        $fileInfo = PATHINFO($_FILES["anyfile"]["name"]);

        if ($fileInfo['extension'] == "pdf" or $fileInfo['extension'] == "docx") {
          // $filename = $_FILES["anyfile"]["name"];

          $filesize = $_FILES["anyfile"]["size"];
          $filetype = $_FILES["anyfile"]["type"];
          $tempname = $_FILES["anyfile"]["tmp_name"];

          // Convert size to MB 
          $mb_size = $filesize / 1048576;
          $size = number_format($mb_size, 2) . 'MB';
          $type = $typ . '(' . $fileInfo['extension'] . ')';
          $newFileName = $fileInfo['filename'] . "-" . time() . "." . $fileInfo['extension'];
          $folder = "../ebook/" . $newFileName;
          // Now let's move the uploaded file into the folder: ebook    
          move_uploaded_file($tempname, $folder);
          // Get all the submitted data from the form
          $sql = "INSERT INTO ebook (title, code, filename, department, faculty, type, year, size) VALUES ('$title','$code','$newFileName','$department','$faculty','$type','$year','$size')";

          // Execute query
          $save = mysqli_query($dbcon, $sql);

          if ($save) {
            echo "<script>window.alert('File uploaded successfully!'); window.location='ebook.php';</script>";
          } else {
            echo "<script>window.alert('Problem inserting file data to database!');</script>";
          }
        } else {
          echo "<script>window.alert('This file type is not supported yet. PDF and DOCX File only!');</script>";
        }
      }
      
      ?>

      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header"><button class="btn btn-primary" onclick="window.history.back();"><span class="fa fa-arrow-left"> </span> Back</button></div>
            <div class="card-body">
              <form method="POST" class="form-group" enctype="multipart/form-data">
                <div class="row">
                  <div class="col-md-6 col-sm-6 col-xs-6">
                    <label>Ebook Title</label>
                    <input type="text" name="title" class="form-control" required>
                  </div>
                  <div class="col-md-6 col-sm-6 col-xs-6">
                    <label>Code</label>
                    <input type="text" name="code" placeholder="e.g PHY203" class="form-control" required>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6 col-sm-6 col-xs-6">
                    <label>Department</label>
                    <input type="text" name="department" placeholder="e.g Physics" class="form-control" required>
                  </div>
                  <div class="col-md-6 col-sm-6 col-xs-6">
                    <label>Faculty</label>
                    <input type="text" name="faculty" placeholder="e.g Science" class="form-control" required>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6 col-sm-6 col-xs-6">
                    <label>Year</label>
                    <input type="text" name="year" placeholder="e.g 2020" class="form-control" required>
                  </div>
                  <div class="col-md-6 col-sm-6 col-xs-6">
                    <label>Type</label>
                    <input type="text" name="type" placeholder="e.g Document" class="form-control" required>
                  </div>
                </div>
                <label>File</label>
                <input type="file" name="anyfile" class="form-control">
                <br>
                <input type="submit" name="upload" class="btn btn-primary col-md-12" value="Save">
              </form>
            </div>
          </div>
        </div>
      </div>

  </section>
</div>



<?php
include "footer.php";
?>