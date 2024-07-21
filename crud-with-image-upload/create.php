<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <title>Create Product</title>
</head>
<body>
<?php
require("database/connection.php");
$errors = [];
if (isset($_POST["submit"])) {
    $name = $_POST["name"];
    $title = $_POST["title"];
    $description = $_POST["description"];
    $price = $_POST["price"];
    $image = $_FILES["image"]["name"];
    $image_temp = $_FILES["image"]["tmp_name"];
    $image_size = $_FILES["image"]["size"];
    $image_error = $_FILES["image"]["error"];
    $image_type = $_FILES["image"]["type"];
    $image_ext = pathinfo($image, PATHINFO_EXTENSION);
    $image_allowed = ["jpg", "jpeg", "png"];
    if (empty($name)) {
        $errors['name'] = "Name is required";
    }
    if (empty($title)) {
        $errors['title'] = "Title is required";
    }
    if (empty($description)) {
        $errors['description'] = "Description is required";
    }
    if (empty($price)) {
        $errors['price'] = "Price is required";
    }
    if (empty($image)) {
        $errors['image'] = "Image is required";

    } else {
        if ($image_size > 2097152) {
            $errors['image'] = "Image size is too large";
        }
        if (!in_array($image_ext, $image_allowed)) {
            $errors['image'] = "Image type is not allowed";
        }
    }
    if (empty($errors)) {
        $image = uniqid() . "." . $image_ext;
        move_uploaded_file($image_temp, "images/$image");
        $sql = "INSERT INTO products (name, title, description, price, image) VALUES ('$name', '$title', '$description', '$price', '$image')";
        mysqli_query($connection, $sql) or die("Error in query: $sql. " . mysqli_error($connection));
        header("location: index.php");
    }
}
?>
<main>
    <h1 style="text-align: center;">Create Product</h1>
    <?php if (isset($errors)) : ?>
        <div class="errors">
            <?php foreach ($errors as $error) : ?>
                <li><?php echo $error; ?></li>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
    <div class="popup-container">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="input-group">
                <input type="text" name="name" id="name" value="<?= $name ?? '' ?>" placeholder="Enter Product Name">
            </div>
            <div class="input-group">
                <input type="text" name="title" id="title" value="<?= $title ?? '' ?>" placeholder="Enter Product Title">
            </div>
            <div class="input-group">
            <textarea name="description" id="description" cols="30" rows="5" placeholder="Enter Product Description"><?= $description ?? '' ?></textarea>
            </div>
            <div class="input-group">
                <input type="text" name="price" id="price" value="<?= $price ?? '' ?>" placeholder="Enter Product Price">
            </div>
            <div class="input-group">
                <input type="file" name="image" id="image" value="<?= $image ?? '' ?>" placeholder="Select Image">
            </div>
            <button type="submit" name="submit">Submit</button>
        </form>
    </div>
</main>
</body>
</html>