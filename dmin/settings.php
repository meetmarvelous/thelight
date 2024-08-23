<?php
require_once 'header.php';
require_once 'nav/sidebar.php';


$myid = 10;
$collect = mysqli_query($dbcon, "SELECT * FROM site_info where site_id='$myid' ");
$site = mysqli_fetch_assoc($collect);

$webname = $site['webname'];
$about_heading = $site['about_heading'];
$about_content = $site['about_content'];
$phone = $site['phone'];
$phone_no = $site['phone_no'];
$email = $site['email'];
$facebook_link = $site['facebook_link'];
$whatsapp_link = $site['whatsapp_link'];
$youtube_link = $site['youtube_link'];
$instagram_link = $site['instagram_link'];
$twitter_link = $site['twitter_link'];
$linkedin_link = $site['linkedin_link'];
$github_link = $site['github_link'];
$web_link = $site['web_link'];
$work_hours = $site['work_hours'];
$work_days = $site['work_days'];
$header_logo = $site['header_logo'];
$footer_logo = $site['footer_logo'];
$icon = $site['icon'];
$about_image = $site['about_image'];
$address = $site['address'];
$welcome_note = $site['welcome_note'];


if (isset($_POST['change1'])) {

  $webname = stripslashes($_POST["webname"]);
  $phone_no = stripslashes($_POST["phone_no"]);
  $email = stripslashes($_POST["email"]);
  $address = stripslashes($_POST["address"]);

  $webname = mysqli_real_escape_string($dbcon, $webname);
  $phone_no = mysqli_real_escape_string($dbcon, $phone_no);
  $email = mysqli_real_escape_string($dbcon, $email);
  $address = mysqli_real_escape_string($dbcon, $address);

  $change1 = mysqli_query($dbcon, "UPDATE site_info SET webname='$webname', phone_no= '$phone_no', email='$email', address='$address' where site_id='$myid' ");

  if ($change1) {
    echo "<script>window.alert('successfully updated!'); window.location='settings.php';</script>";
  } else {
    echo "<script>window.alert('Failed to update Info!');</script>";
  }
}

if (isset($_POST['change2'])) {

  $welcome_note = stripslashes($_POST["welcome_note"]);
  $work_hours = stripslashes($_POST["work_hours"]);
  $work_days = stripslashes($_POST["work_days"]);
  $facebook_link = stripslashes($_POST["facebook_link"]);
  $whatsapp_link = stripslashes($_POST["whatsapp_link"]);
  $instagram_link = stripslashes($_POST["instagram_link"]);
  $youtube_link = stripslashes($_POST["youtube_link"]);
  $twitter_link = stripslashes($_POST["twitter_link"]);
  $github_link = stripslashes($_POST["github_link"]);
  $web_link = stripslashes($_POST["web_link"]);

  $welcome_note = mysqli_real_escape_string($dbcon, $welcome_note);
  $work_hours = mysqli_real_escape_string($dbcon, $work_hours);
  $work_days = mysqli_real_escape_string($dbcon, $work_days);
  $facebook_link = mysqli_real_escape_string($dbcon, $facebook_link);
  $whatsapp_link = mysqli_real_escape_string($dbcon, $whatsapp_link);
  $instagram_link = mysqli_real_escape_string($dbcon, $instagram_link);
  $youtube_link = mysqli_real_escape_string($dbcon, $youtube_link);
  $twitter_link = mysqli_real_escape_string($dbcon, $twitter_link);
  $github_link = mysqli_real_escape_string($dbcon, $github_link);
  $web_link = mysqli_real_escape_string($dbcon, $web_link);

  $change2 = mysqli_query($dbcon, "UPDATE site_info SET welcome_note='$welcome_note', work_hours= '$work_hours', work_days='$work_days', facebook_link='$facebook_link', whatsapp_link='$whatsapp_link', instagram_link='$instagram_link', youtube_link='$youtube_link', github_link='$github_link', twitter_link='$twitter_link', web_link='$web_link' where site_id='$myid' ");

  if ($change2) {
    echo "<script>window.alert('successfully updated!'); window.location='settings.php';</script>";
  } else {
    echo "<script>window.alert('Failed to update Info!');</script>";
  }
}

if (isset($_POST['change3'])) {

  $about_heading = stripslashes($_POST["about_heading"]);
  $about_content = stripslashes($_POST["about_content"]);

  $about_heading = mysqli_real_escape_string($dbcon, $about_heading);
  $about_content = mysqli_real_escape_string($dbcon, $about_content);

  $change3 = mysqli_query($dbcon, "UPDATE site_info SET about_heading='$about_heading', about_content= '$about_content' where site_id='$myid' ");

  if ($change3) {
    echo "<script>window.alert('successfully updated!'); window.location='settings.php';</script>";
  } else {
    echo "<script>window.alert('Failed to update Info!');</script>";
  }
}

if (isset($_POST["imgchange1"])) {
	// code to store image file
	$fileInfo = PATHINFO($_FILES["header_logo"]["name"]);
  $fileInfo['extension'] = strtolower($fileInfo['extension']);
	if ($fileInfo['extension'] == "png" or $fileInfo['extension'] == "jpg" or $fileInfo['extension'] == "jpeg") {

		$filename = $_FILES["header_logo"]["name"];
		$tempname = $_FILES["header_logo"]["tmp_name"];

		$newFileName = $fileInfo['filename'] . "-" . time() . "." . $fileInfo['extension'];
		$folder = "../assets/images/logo/" . $newFileName;

		// Now let's move the uploaded file into the folder: ebook    
		move_uploaded_file($tempname, $folder);
		// Get all the submitted data from the form
    
    $imgchange1 = mysqli_query($dbcon, "UPDATE site_info SET header_logo='$newFileName' where site_id='$myid' ");

    if ($imgchange1) {
      echo "<script>window.alert('successfully updated!'); window.location='settings.php';</script>";
    } else {
      echo "<script>window.alert('Failed to update Info!');</script>";
    }
	} else {
		echo "<script>window.alert('This Image type is not supported yet. PNG,JPEG and JPG File only!');</script>";
	}
}

if (isset($_POST["imgchange2"])) {
	// code to store image file
	$fileInfo = PATHINFO($_FILES["footer_logo"]["name"]);
  $fileInfo['extension'] = strtolower($fileInfo['extension']);
	if ($fileInfo['extension'] == "png" or $fileInfo['extension'] == "jpg" or $fileInfo['extension'] == "jpeg") {

		$filename = $_FILES["footer_logo"]["name"];
		$tempname = $_FILES["footer_logo"]["tmp_name"];

		$newFileName = $fileInfo['filename'] . "-" . time() . "." . $fileInfo['extension'];
		$folder = "../assets/images/logo/" . $newFileName;

		// Now let's move the uploaded file into the folder: ebook    
		move_uploaded_file($tempname, $folder);
		// Get all the submitted data from the form
    
    $imgchange2 = mysqli_query($dbcon, "UPDATE site_info SET footer_logo='$newFileName' where site_id='$myid' ");

    if ($imgchange2) {
      echo "<script>window.alert('successfully updated!'); window.location='settings.php';</script>";
    } else {
      echo "<script>window.alert('Failed to update Info!');</script>";
    }
	} else {
		echo "<script>window.alert('This Image type is not supported yet. PNG,JPEG and JPG File only!');</script>";
	}
}

if (isset($_POST["iconchange"])) {
	// code to store image file
	$fileInfo = PATHINFO($_FILES["icon"]["name"]);
  $fileInfo['extension'] = strtolower($fileInfo['extension']);
	if ($fileInfo['extension'] == "png" or $fileInfo['extension'] == "jpg" or $fileInfo['extension'] == "jpeg") {

		$filename = $_FILES["icon"]["name"];
		$tempname = $_FILES["icon"]["tmp_name"];

		$newFileName = $fileInfo['filename'] . "-" . time() . "." . $fileInfo['extension'];
		$folder = "../assets/images/logo/" . $newFileName;

		// Now let's move the uploaded file into the folder: ebook    
		move_uploaded_file($tempname, $folder);
		// Get all the submitted data from the form
    
    $iconchange = mysqli_query($dbcon, "UPDATE site_info SET icon='$newFileName' where site_id='$myid' ");

    if ($iconchange) {
      echo "<script>window.alert('successfully updated!'); window.location='settings.php';</script>";
    } else {
      echo "<script>window.alert('Failed to update Info!');</script>";
    }
	} else {
		echo "<script>window.alert('This Image type is not supported yet. PNG,JPEG and JPG File only!');</script>";
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
                <h3>Website Settings</h3>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        
      <!-- <div class="col-12">
          <div class="card">
            <div class="card-body">
              <button class="btn btn-primary" onclick="window.history.back();">
                <span class="fa fa-arrow-left"> </span> Back
              </button>
            </div>
          </div>
      </div>         -->
        
        <div class="col-12 col-md-4">
          <div class="card">
            <div class="card-header">
              <span class="fa fa-plus"></span> &nbsp; Edit Website Info
            </div>
            <div class="card-body">
              <form method="POST" enctype="multipart/form-data">
                <div class="form-group">
                  <label>Website Name</label>
                  <input type="text" class="form-control" value="<?php echo htmlspecialchars($webname); ?>" name="webname" required>
                </div>

                <div class="form-group">
                  <label>Contact Number</label>
                  <input type="text" class="form-control" value="<?php echo htmlspecialchars($phone_no); ?>" name="phone_no" required>
                </div>

                <div class="form-group">
                  <label>Contact Email</label>
                  <input type="text" class="form-control" value="<?php echo htmlspecialchars($email); ?>" name="email" required>
                </div>

                <div class="form-group">
                  <label>Address</label>
                  <textarea class="summernote-simple" name="address" required><?php echo htmlspecialchars($address); ?></textarea>
                </div>

                <div class="form-group form-button">
                  <button type="submit" name="change1" class="btn btn-fill col-md-12 btn-primary">Update Information</button>
                </div>
              </form>

              <form method="POST" enctype="multipart/form-data">
                <div class="form-group">
                  <label>Header Logo</label>
                  <input type="file" name="header_logo" class="form-control" required>
                </div>

                <div class="form-group form-button">
                  <button type="submit" name="imgchange1" class="btn btn-fill col-md-12 btn-primary">Submit</button>
                </div>
                
              </form>
              <form method="POST" enctype="multipart/form-data">
              <div class="form-group">
                  <label>Footer Logo</label>
                  <input type="file" name="footer_logo" class="form-control" required>
                </div>
                
                <div class="form-group form-button">
                  <button type="submit" name="imgchange2" class="btn btn-fill col-md-12 btn-primary">Submit</button>
                </div>
              </form>

            </div>
          </div>
        </div>

        <div class="col-12 col-md-4">
          <div class="card">
            <div class="card-header">
              <span class="fa fa-plus"></span> &nbsp; Edit Website Info
            </div>
            <div class="card-body">
              <form method="POST">

              <div class="form-group">
                <label>Welcome Note</label>
                <textarea class="summernote-simple" name="welcome_note" required><?php echo htmlspecialchars($welcome_note); ?></textarea>
              </div>

              <div class="form-group">
                <label>Working Hours</label>
                <input type="text" class="form-control" value="<?php echo htmlspecialchars($work_hours); ?>" name="work_hours" required>
              </div>

              <div class="form-group">
                <label>Working Days</label>
                <input type="text" class="form-control" value="<?php echo htmlspecialchars($work_days); ?>" name="work_days" required>
              </div>

              <div class="form-group">
                <label>Facebook Link</label>
                <input type="text" class="form-control" value="<?php echo htmlspecialchars($facebook_link); ?>" name="facebook_link" required>
              </div>

              <div class="form-group">
                <label>Whatsapp Link</label>
                <input type="text" class="form-control" value="<?php echo htmlspecialchars($whatsapp_link); ?>" name="whatsapp_link" required>
              </div>

              <div class="form-group">
                <label>Instagram Link</label>
                <input type="text" class="form-control" value="<?php echo htmlspecialchars($instagram_link); ?>" name="instagram_link" required>
              </div>

              <div class="form-group">
                <label>Twitter Link</label>
                <input type="text" class="form-control" value="<?php echo htmlspecialchars($twitter_link); ?>" name="twitter_link" required>
              </div>

              <div class="form-group">
                <label>YouTube Link</label>
                <input type="text" class="form-control" value="<?php echo htmlspecialchars($youtube_link); ?>" name="youtube_link" required>
              </div>

              <div class="form-group">
                <label>GitHub Link</label>
                <input type="text" class="form-control" value="<?php echo htmlspecialchars($github_link); ?>" name="github_link" required>
              </div>

              <div class="form-group">
                <label>Website Link</label>
                <input type="text" class="form-control" value="<?php echo htmlspecialchars($web_link); ?>" name="web_link" required>
              </div>

              <div class="form-group form-button">
                <button type="submit" name="change2" class="btn btn-fill col-md-12 btn-primary">Update Information</button>
              </div>
              </form>
            </div>
          </div>
        </div>

        <div class="col-12 col-md-4">
          <div class="card">
            <div class="card-header">
              <span class="fa fa-plus"></span> &nbsp; Edit Website Info
            </div>
            <div class="card-body">
              <form method="POST">
                <div class="form-group">
                  <label>About Heading</label>
                  <textarea class="summernote-simple" name="about_heading" required><?php echo htmlspecialchars($about_heading); ?></textarea>

                </div>

                <div class="form-group">
                  <label>About Content</label>
                  <textarea class="summernote-simple" name="about_content" required><?php echo htmlspecialchars($about_content); ?></textarea>
                </div>

                <div class="form-group form-button">
                  <button type="submit" name="change3" class="btn btn-fill col-md-12 btn-primary">Update Information</button>
                </div>
              </form>

              <form method="POST" enctype="multipart/form-data">
                <div class="form-group">
                  <label>Website Icon</label>
                  <div id="image-preview" class="image-preview">
                    <label for="image-upload" id="image-label">Choose File</label>
                    <input type="file" name="icon" id="image-upload" required/>
                  </div>
                </div>
                
                <div class="form-group form-button">
                  <button type="submit" name="iconchange" class="btn btn-fill col-md-12 btn-primary">Submit</button>
                </div>
              </form>
            </div>
          </div>
        </div>


      </div>
  </section>
</div>



<?php
require_once 'footer.php';
?>