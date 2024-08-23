<?php
require_once 'header.php';
require_once 'nav/sidebar.php';

$cat = mysqli_query($dbcon, "SELECT * FROM faculty");
$cat_count = mysqli_num_rows($cat);

if (isset($_POST['upload'])) {

  $title = stripslashes($_POST["title"]);
  $abstract = stripslashes($_POST["abstract"]);
  $body = stripslashes($_POST["body"]);
  $faculty = stripslashes($_POST["faculty"]);
  $department = stripslashes($_POST["department"]);

  $title = mysqli_real_escape_string($dbcon, $title);
  $abstract = mysqli_real_escape_string($dbcon, $abstract);
  $body = mysqli_real_escape_string($dbcon, $body);
  $faculty = mysqli_real_escape_string($dbcon, $faculty);
  $department = mysqli_real_escape_string($dbcon, $department);

  $date = date('Y-m-d H:i');

    $sql = "INSERT INTO projects (title, body, abstract, department, faculty, date) VALUES('$title', '$body', '$abstract', '$department', '$faculty', '$date')";

    // Execute query
    $save = mysqli_query($dbcon, $sql) or die("Failed to post: " . mysqli_error($dbcon));

    if ($save) {
      echo "<script>window.alert('Blog added successfully!'); window.location='blog.php';</script>";
      // echo "<script>window.alert('Blog added successfully!');</script>";
    } else {
      echo "<script>window.alert('Problem adding blog post to database!');</script>";
    }
  
} else {
?>

  <div class="main-content">
    <section class="section">
      <div class="section-body">

        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-statistic-4">
                <div class="container">
                  <h3>Manage Projects</h3>
                  <div class="btn-group">
                    <a href="./add_project.php" class="btn btn-primary">Add New Project</a>
                    <a href="./project.php" class="btn btn-secondary">View All Projects</a>
                    <!-- <a href="./project_category.php" class="btn btn-secondary">Add New Project Caategory</a> -->
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h4><span class="fa fa-edit"></span> &nbsp;Write Your Project</h4>
                <div class="card-header-action">
                  <a href="#" class="btn btn-primary" onclick="window.history.back(); return false;">
                    <span class="fa fa-arrow-left"></span> Back
                  </a>
                </div>
              </div>
              <div class="card-body">
                <form method="POST" class="form-group" enctype="multipart/form-data">
                  <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Project Title</label>
                    <div class="col-sm-12 col-md-7">
                      <input type="text" class="form-control" name="title" required>
                    </div>
                  </div>
                  <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Department</label>
                    <div class="col-sm-12 col-md-7">
                      <input type="text" class="form-control" name="department" required>
                    </div>
                  </div>
                  <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Faculty</label>
                    <div class="col-sm-12 col-md-7">
                      <select name="faculty" class="form-control selectric">
                        <option disabled="disabled" selected="selected">--Faculty--</option>
                        <?php
                        while ($catt = mysqli_fetch_array($cat)) {
                        ?>
                          <option value="<?php echo $catt['faculty'] ?>"><?php echo $catt['faculty'] ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                  <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Abstract</label>
                    <div class="col-sm-12 col-md-7">
                      <textarea class="summernote" name="abstract" required></textarea>
                      <!-- <textarea id="editor" name="abstract" required></textarea> -->

                    </div>
                  </div>
                  <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Body</label>
                    <div class="col-sm-12 col-md-7">
                      <textarea class="summernote" name="body" required></textarea>
                      <!-- <textarea id="editor" name="body" required></textarea> -->
                    </div>
                  </div>
                  <!-- <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Thumbnail</label>
                    <div class="col-sm-12 col-md-7">
                      <div id="image-preview" class="image-preview">
                        <label for="image-upload" id="image-label">Choose File</label>
                        <input type="file" name="picture" accept="image/*" required id="image-upload" />
                      </div>
                    </div>
                  </div> -->
                  <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                    <div class="col-sm-12 col-md-7">
                      <!-- <button class="btn btn-primary" name="upload">Create Post</button> -->
                      <button type="submit" class="btn btn-primary" name="upload">Add Project</button>
                      <!-- <input type="submit" name="upload" class="btn btn-primary" value="Create Post"> -->
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>

    </section>
  </div>

<?php
}
include "footer.php";
?>