<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php
if (isset($_FILES["image"])) {
    $image = $_FILES["image"];
    $imageName = $image["name"];
    $imageTmpName = $image["tmp_name"];
    $imageSize = $image["size"];
    $imageError = $image["error"];
    $imageType = $image["type"];

    $imageExt = explode(".", $imageName);
    $imageActualExt = strtolower(end($imageExt));

    $allowed = array("jpg", "jpeg", "png", "pdf");
    if ($allowed != $imageActualExt) {
        echo "You cannot upload files of this type.";
    } else {
        if ($imageError === 0) {
            if ($imageSize < 1000000) {
                $imageNameNew = uniqid("", true) . "." . $imageActualExt;
                $imageDestination = "uploads/" . $imageNameNew;
                move_uploaded_file($imageTmpName, $imageDestination);
                echo "Your file has been uploaded.";
            } else {
                echo "Your file is too big.";
            }
        } else {
            echo "There was an error uploading your file.";
        }
    }
}
?>

<form action="" method="post" enctype="multipart/form-data">>
    <input type="file" name="image" accept="image/*" id="">
    <input type="submit">
</form>
</body>
</html>