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
                  <a href="add_ebook.php" class="btn btn-secondary">Add New Ebook</a>
                  <a href="ebook.php" class="btn btn-primary">View All Ebooks</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header"><span class="fa fa-edit"></span> &nbsp;View All Ebooks</div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped" id="table-1">
                  <thead>
                    <tr>
                      <th class="text-center">S/N
                      </th>
                      <th>Title</th>
                      <th>Filename</th>
                      <th>Code</th>
                      <th>Department / Faculty</th>
                      <th>Year</th>
                      <th>Type</th>
                      <th>Size</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $count = 1;
                    $bok = mysqli_query($dbcon, "SELECT * FROM ebook order by ebook_id DESC");
                    while ($ebook = mysqli_fetch_array($bok)) {
                    ?>

                      <tr>
                        <td class="text-center"><?php echo $count++; ?></td>
                        <td><?php echo $ebook['title'] ?></td>
                        <td><?php echo $ebook['filename']; ?></td>
                        <td><?php echo $ebook['code']; ?></td>
                        <td><?php echo $ebook['department']; ?><br><?php echo $ebook['faculty']; ?></td>
                        <td><?php echo $ebook['year']; ?></td>
                        <td><?php echo $ebook['type']; ?></td>
                        <td><?php echo $ebook['size']; ?></td>
                        <td>
                          <a href="edit_ebook.php?id=<?php echo $ebook['ebook_id']; ?>" class="text-success" title="edit content"><span class="fa fa-edit"> </span></a>
                          <a href="delete_ebook.php?id=<?php echo $ebook['ebook_id']; ?>" class="text-danger" title="delete content"><span class="fa fa-trash"> </span></a>
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