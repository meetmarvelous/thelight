<?php
require_once 'header.php';
require_once 'nav/sidebar.php';


$blo = mysqli_query($dbcon, "SELECT * FROM posts");
$blog_count = mysqli_num_rows($blo);
$blogcat = mysqli_query($dbcon, "SELECT * FROM blog_category");
$cat_count = mysqli_num_rows($blogcat);

$id = (int)$_GET['id'];
if ($id < 1) {
  header("location: index.php");
  exit();
}

$sql = "SELECT * FROM posts WHERE id = '$id'";
$result = mysqli_query($dbcon, $sql);
if (mysqli_num_rows($result) == 0) {
  echo '<script>alert("Post not found."); window.location.href = "index.php";</script>';
  exit();
}
$row = mysqli_fetch_assoc($result);
$id = $row['id'];
$title = $row['title'];
// $description = $row['description'];
$description = nl2br($row['description']); // Apply nl2br and htmlspecialchars
$slug = $row['slug'];
$category = $row['category'];
$picture = $row['picture'];
// $permalink = "p/" . $id . "/" . $slug;
$permalink = "view.php?id=" . $id;
?>

<?php

// If upload button is clicked ...
if (isset($_POST['upload'])) {
  $id = $_POST['id'];
  $title = stripslashes($_POST["title"]);
  $slug = stripslashes($_POST['slug']);
  $description = stripslashes($_POST["description"]);
  $category = stripslashes($_POST["category"]);
  // $date_add = date("d/m/Y");

  $title = mysqli_real_escape_string($dbcon, $title);
  $slug = slug(mysqli_real_escape_string($dbcon, $slug));
  $description = mysqli_real_escape_string($dbcon, $description);
  $category = mysqli_real_escape_string($dbcon, $category);


  $sql2 = "UPDATE posts SET title = '$title', description = '$description', slug = '$slug', category = '$category' WHERE id = $id";

  // Execute query
  $save = mysqli_query($dbcon, $sql2);

  if ($save) {
    // echo "<script>window.alert('Blog edited successfully!'); window.location='blog.php';</script>";
    // echo '<script>alert("Post updated successfully."); window.location.href = "view.php?id=' . $id . '";</script>';
    echo '<script>alert("Post updated successfully.");</script>';
  } else {
    echo '<script>alert("Failed to edit: ' . addslashes(mysqli_error($dbcon)) . '");</script>';
  }
}

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
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <button class="btn btn-primary" onclick="window.history.back();"><span class="fa fa-arrow-left"> </span> Back</button>
            </div>
            <div class="card-body">
              <form method="POST" class="form-group" enctype="multipart/form-data">
              <input type="hidden" name="id" value="<?php echo $id; ?>">
                <div class="row">
                  <div class="col-md-6 col-sm-6 col-xs-6">
                    <label>Blog Title</label>
                    <textarea class="form-control" name="title" placeholder="" required><?php echo htmlspecialchars($title); ?></textarea>

                  </div>
                  <div class="col-md-6 col-sm-6 col-xs-6">
                    <label>Blog Slug</label>
                    <textarea class="form-control" name="slug" placeholder="" required><?php echo htmlspecialchars($slug); ?></textarea>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <label>Description</label>
                    <textarea id="editor" name="description" required><?php echo htmlspecialchars($description); ?></textarea>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6 col-sm-6 col-xs-6">
                    <div class="form-group">
                      <label>Category</label>
                      <select name="category" class="form-control selectric">

                        <option disabled="disabled" selected="selected">--Blog Category--</option>
                        <?php 
                          while ($cat = mysqli_fetch_array($blogcat)) {
                          $selected = ($cat['category'] == $category) ? 'selected' : '';
                        ?>
                          <option value="<?php echo htmlspecialchars($cat['category']); ?>" <?php echo $selected; ?>>
                            <?php echo htmlspecialchars($cat['category']); ?>
                          </option>
                        <?php } ?>
                      </select>
                    </div>
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