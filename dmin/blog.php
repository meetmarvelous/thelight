<?php
require_once 'header.php';
require_once 'nav/sidebar.php';

$pos = mysqli_query($dbcon, "SELECT * FROM posts");
$post_count = mysqli_num_rows($pos);
$number = $post_count;

// $sql = "SELECT COUNT(*) FROM posts";
// $result = mysqli_query($dbcon, $sql);
// $r = mysqli_fetch_row($result);
// $numbers = $r[0];
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
                  <a href="add_blog.php" class="btn btn-secondary">Add New Blog Post</a>
                  <a href="blog.php" class="btn btn-primary">View All Blogs</a>
                  <a href="add_blog_category.php" class="btn btn-secondary">Add New Blog Category</a>
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
              <h4><span class="fa fa-edit"></span> &nbsp;Manage All Blog Posts</h4>
              <div class="card-header-action">
                <a href="#" class="btn btn-primary" onclick="window.history.back(); return false;">
                  <span class="fa fa-arrow-left"></span> Back
                </a>
              </div>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped" id="table-1">
                  <thead>
                    <tr>
                      <th class="text-center">S/N
                      </th>
                      <th>Blog Title</th>
                      <th>Headings</th>
                      <th>Category</th>
                      <th>Date Added</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $count = 1;
                    $blo2 = mysqli_query($dbcon, "SELECT * FROM posts order by id DESC");
                    while ($blog = mysqli_fetch_array($blo2)) {
                      $s_title = substr($blog['short'], 0, 10) . "...";
                      $title = substr($blog['title'], 0, 40) . "...";
                      $desc = substr($blog['description'], 0, 30) . "...";
                    ?>

                      <tr>
                        <td class="text-center"><?php echo $count++; ?></td>
                        <td> <?php echo $title ?> </td>
                        <td><?php echo $s_title ?></td>
                        <td> <?php echo $blog['category'] ?> </td>
                        <td> <?php echo $blog['date'] ?> </td>
                        <td>
                          <a href="edit_blog.php?id=<?php echo $blog['id']; ?>" class="text-success" title="edit content"><span class="fa fa-edit"> </span></a>
                          <a href="delete_blog.php?id=<?php echo $blog['id']; ?>" class="text-danger" title="delete content" onclick="return confirm('Are you sure you want to delete this post?')"><span class="fa fa-trash"> </span></a>
                        </td>

                      </tr>
                    <?php } ?>

                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </section>
</div>



<?php
include "footer.php";
?>