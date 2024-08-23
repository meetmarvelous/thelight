<?php
require_once 'header.php';
require_once 'nav/sidebar.php';

$blogcat = mysqli_query($dbcon, "SELECT * FROM blog_category");
$cat_count = mysqli_num_rows($blogcat);

if (isset($_POST['upload'])) {

  $title = stripslashes($_POST["title"]);
  $description = stripslashes($_POST["description"]);
  $category = stripslashes($_POST["category"]);

  $title = mysqli_real_escape_string($dbcon, $title);
  $description = mysqli_real_escape_string($dbcon, $description);
  $category = mysqli_real_escape_string($dbcon, $category);

  $slug = slug($title);
  $date = date('Y-m-d H:i');
  $posted_by = mysqli_real_escape_string($dbcon, $_SESSION['username']);


  // code to store image file
  $fileInfo = PATHINFO($_FILES["picture"]["name"]);
  $fileInfo['extension'] = strtolower($fileInfo['extension']);

  if ($fileInfo['extension'] == "png" or $fileInfo['extension'] == "jpg" or $fileInfo['extension'] == "jpeg") {

    $filename = $_FILES["picture"]["name"];
    $tempname = $_FILES["picture"]["tmp_name"];

    $newFileName = $fileInfo['filename'] . "-" . time() . "." . $fileInfo['extension'];
    $folder = "../images/" . $newFileName;

    // Now let's move the uploaded file into the folder: ebook    
    move_uploaded_file($tempname, $folder);

    $sql = "INSERT INTO posts (title, description, slug, picture , posted_by, category, date) VALUES('$title', '$description', '$slug', '$newFileName', '$posted_by', '$category', '$date')";

    // Execute query
    $save = mysqli_query($dbcon, $sql) or die("Failed to post: " . mysqli_error($dbcon));
    
    if ($save) {
      echo "<script>window.alert('Blog added successfully!'); window.location='blog.php';</script>";
      // echo "<script>window.alert('Blog added successfully!');</script>";
    } else {
        echo "<script>window.alert('Problem adding blog post to database!');</script>";
    }

  } else {
    echo "<script>window.alert('This Image type is not supported yet. PNG,JPEG and JPG File only!');</script>";
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
                  <h3>Manage Blogs</h3>
                  <div class="btn-group">
                    <a href="add_blog.php" class="btn btn-primary">Add New Blog Post</a>
                    <a href="blog.php" class="btn btn-secondary">View All Blogs</a>
                    <a href="add_blog_category.php" class="btn btn-secondary">Add New Blog Category</a>
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
              <h4><span class="fa fa-edit"></span> &nbsp;Write Your Post</h4>
              <div class="card-header-action">
                <a href="#" class="btn btn-primary" onclick="window.history.back(); return false;">
                  <span class="fa fa-arrow-left"></span> Back
                </a>
              </div>
            </div>
              <div class="card-body">
                <form method="POST" class="form-group" enctype="multipart/form-data">
                  <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Blog Title</label>
                    <div class="col-sm-12 col-md-7">
                      <input type="text" class="form-control" name="title" required>
                    </div>
                  </div>
                  <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Category</label>
                    <div class="col-sm-12 col-md-7">
                      <select name="category" class="form-control selectric">
                        <option disabled="disabled" selected="selected">--Blog Category--</option>
                        <?php
                        while ($cat = mysqli_fetch_array($blogcat)) {
                        ?>
                          <option value="<?php echo $cat['category'] ?>"><?php echo $cat['category'] ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                  <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Content</label>
                    <div class="col-sm-12 col-md-7">
                      <!-- <textarea class="summernote" name="description" required></textarea> -->
                      <textarea id="editor" name="description" required></textarea>
                      <!-- <textarea id="description" rows="30" cols="50" class="form-control" name="description" required></textarea> -->

                    </div>
                  </div>
                  <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Thumbnail</label>
                    <div class="col-sm-12 col-md-7">
                      <div id="image-preview" class="image-preview">
                        <label for="image-upload" id="image-label">Choose File</label>
                        <input type="file" name="picture" accept="image/*" required id="image-upload" />
                      </div>
                    </div>
                  </div>
                  <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                    <div class="col-sm-12 col-md-7">
                      <!-- <button class="btn btn-primary" name="upload">Create Post</button> -->
                      <button type="submit" class="btn btn-primary" name="upload">Create Post</button>
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