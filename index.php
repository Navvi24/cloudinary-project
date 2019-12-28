<!DOCTYPE html>
<?php
require "vendor\autoload.php";
require "config-cloud.php";
if (isset($_POST['submit']))
{
  $filename = $_POST['nama'];
  $slug = $_POST['slug'];
  $fileupload = $_FILES['file']['name'];
  $file_tmp = $_FILES['file']['tmp_name'];
  \Cloudinary\Uploader::upload($file_tmp, array("public_id" => $slug));
}
 ?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel="stylesheet" href="/public/styles/style.css">
    <title>Image Upload</title>
    <style media="screen">
    form{
        margin-top: 1em;
        text-align: center;
      }
    </style>
  </head>
  <body>
    <form method="post" enctype="multipart/form-data">
    <input type="text" name="nama" placeholder="file name">
    <input type="text" name="slug">
    <?php echo cl_image_upload_tag('image_id'); ?>
    <input type="submit" value="Upload" name="submit">
</form>
<hr>
<?php
if (isset($_POST['submit']))
{
echo cl_image_tag($slug);
}
else
{
  
}
?>
  </body>
</html>
