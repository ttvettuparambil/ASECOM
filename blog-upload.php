<?php
$conn = new mysqli("localhost", "root", "", "carousel");
$msg = '';
if (isset($_POST['upload'])) {
    $image = $_FILES['image']['name'];
    $path = 'images/' . $image;
    $sql = $conn->query("Insert into slider(image_path) values('$path')");
    if ($sql) {move_uploaded_file($_FILES['image']['tmp_name'], $path);
        $msg = 'Image
Uploaded Successfully';} else { $msg = 'Image Upload Unsuccessful';
    }
}
$result = $conn->query("SELECT image_path from slider");
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <meta name="author" content="Thomas Thomas" />
    <meta
      name="viewport"
      content="width=device-width,initial-scale=1,shrink-to-fit=no"
    />
    <title></title>
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
      integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2"
      crossorigin="anonymous"
    />
  </head>
  <body>
    <h2 class="text-center bg-dark text-light pb-2">
      Dynamic Bootstrap4 using PHP and MySQL
    </h2>
    <div class="container-fluid">
      <div class="row">
        <!-- inserting bootstrap carousel -->
        <div class="col-lg-10">
          <div id="demo" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ul class="carousel-indicators">
                <?php
$i = 0;
foreach ($result as $row) {
    $actives = '';
    if ($i == 0) {
        $actives = 'active';
    }

    ?>
              <li data-target="#demo" data-slide-to="<?=$i;?>" class="<?=$actives;?>"></li>
              <!--  to be added in code below -->
              <?php $i++;}?>

              <!--<li data-target="#demo" data-slide-to="1"></li>
              <li data-target="#demo" data-slide-to="2"></li>-->
            </ul>

            <!-- The slideshow -->
            <div class="carousel-inner">
                <!-- Adding php code -->
                <?php
$i = 0;
foreach ($result as $row) {
    $actives = '';
    if ($i == 0) {
        $actives = 'active';
    }

    ?>
                <!-- php code ends -->
              <div class="carousel-item <?=$actives;?>">
                <img src="<?=$row['image_path']?>" width="100%" height="400">
              </div>
                    <?php $i++;}?>
            </div>

            <!-- Left and right controls -->
            <a class="carousel-control-prev" href="#demo" data-slide="prev">
              <span class="carousel-control-prev-icon"></span>
            </a>
            <a class="carousel-control-next" href="#demo" data-slide="next">
              <span class="carousel-control-next-icon"></span>
            </a>
          </div>
        </div>
      </div>
      <!-- BOOTSRAP SLIDER CODE ENDS HERE -->
      <div class="row justify-content-center">
        <div class="col-lg-4 bg-dark rounded px-4">
          <h4 class="text-center text-light p-1">Select Image to Upload</h4>
          <form action="" method="post" enctype="multipart/form-data">
            <div class="form group">
              <input
                type="file"
                name="image"
                class="form-control p-1"
                required
              />
            </div>
            <div class="form-group">
              <input type="submit" name="upload" value="Upload Image" class="btn btn-warning btn-block">
              <h5 class="text-center text-light"><?=$msg;?></h5>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!-- jQuery and JS bundle w/ Popper.js -->
    <script
      src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
      integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
