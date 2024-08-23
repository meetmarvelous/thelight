<?php
include("header.php");
include("nav.php");
include("nav/nav_index.php");
?>

<?php
$book = mysqli_query($dbcon, "SELECT * FROM ebook");
$book_count = mysqli_num_rows($book);
$ebook = mysqli_fetch_array($book);
$user = mysqli_query($dbcon, "SELECT * FROM user");
$user_count = mysqli_num_rows($user);
$blo = mysqli_query($dbcon, "SELECT * FROM blog");
$blog_count = mysqli_num_rows($blo);


$getid = $_GET['id'];
$ebook_edit = mysqli_query($dbcon, "SELECT * FROM ebook where ebook_id='$getid'");
$that_ebook = mysqli_fetch_array($ebook_edit);

?>

<div class="main-content">
  <section class="section">
    <div class="section-body">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-statistic-4">
              <div class="container">
                <h3>Edit Ebook</h3>
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
        // $typ = stripslashes($_POST["type"]);
        $year = stripslashes($_POST["year"]);

        $title = mysqli_real_escape_string($dbcon, $title);
        $code = mysqli_real_escape_string($dbcon, $code);
        $department = mysqli_real_escape_string($dbcon, $department);
        $faculty = mysqli_real_escape_string($dbcon, $faculty);
        // $typ = mysqli_real_escape_string($dbcon, $typ);
        $year = mysqli_real_escape_string($dbcon, $year);

        $sql = "UPDATE ebook SET title='$title', code='$code', department='$department', faculty='$faculty', year='$year' where ebook_id='$getid' ";

        // Execute query
        $save = mysqli_query($dbcon, $sql);

        if ($save) {
          echo "<script>window.alert('File Info edited successfully!'); window.location='ebook.php';</script>";
        } else {
          echo "<script>window.alert('Problem inserting file data to database!');</script>";
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
                    <input type="text" name="title" class="form-control" value="<?php echo $that_ebook['title'] ?>" required>
                  </div>
                  <div class="col-md-6 col-sm-6 col-xs-6">
                    <label>Code</label>
                    <input type="text" name="code" class="form-control" value="<?php echo $that_ebook['code']; ?>" required>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6 col-sm-6 col-xs-6">
                    <label>Department</label>
                    <input type="text" name="department" class="form-control" value="<?php echo $that_ebook['department']; ?>" required>
                  </div>
                  <div class="col-md-6 col-sm-6 col-xs-6">
                    <label>Faculty</label>
                    <input type="text" name="faculty" class="form-control" value="<?php echo $that_ebook['faculty']; ?>" required>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6 col-sm-6 col-xs-6">
                    <label>Year</label>
                    <input type="text" name="year" class="form-control" value="<?php echo $that_ebook['year']; ?>" required>
                  </div>
                  <div class="col-md-6 col-sm-6 col-xs-6">
                    
                  </div>
                </div>

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