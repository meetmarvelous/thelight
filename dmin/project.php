<?php
require_once 'header.php';
require_once 'nav/sidebar.php';

$pos = mysqli_query($dbcon, "SELECT * FROM projects");
$post_count = mysqli_num_rows($pos);
$number = $post_count;

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
                  <a href="./add_project.php" class="btn btn-secondary">Add New Project</a>
                  <a href="./project.php" class="btn btn-primary">View All Projects</a>
                  <!-- <a href="./project_category.php" class="btn btn-secondary">Add New Project Caategory</a> -->
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
              <h4><span class="fa fa-edit"></span> &nbsp;Manage All Projects</h4>
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
                      <th>Project Title</th>
                      <th>Department</th>
                      <th>Faculty</th>
                      <th>Date Added</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $count = 1;
                    $blo2 = mysqli_query($dbcon, "SELECT * FROM projects order by id DESC");
                    while ($project = mysqli_fetch_array($blo2)) {
                      $title = substr($project['title'], 0, 40) . "...";
                    ?>

                      <tr>
                        <td class="text-center"><?php echo $count++; ?></td>
                        <td> <?php echo $title ?> </td>
                        <td> <?php echo $project['department'] ?> </td>
                        <td> <?php echo $project['faculty'] ?> </td>
                        <td> <?php echo $project['date'] ?> </td>
                        <td>
                          <a href="#" class="text-success" title="edit content"><span class="fa fa-edit"> </span></a>
                          <a href="delete_project.php?id=<?php echo $project['id']; ?>" class="text-danger" title="delete content" onclick="return confirm('Are you sure you want to delete this post?')"><span class="fa fa-trash"> </span></a>
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