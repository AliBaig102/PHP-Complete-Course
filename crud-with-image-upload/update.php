<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <title>Update Product</title>
</head>
<body>
<?php
require("database/connection.php");

//$old_image = ""; // Initialize old_image variable

$id = $_GET["id"];


?>
<main>
    <h1 style="text-align: center;">Update Product</h1>
    <?php if (!empty($errors)) : ?>
        <div class="errors">
            <?php foreach ($errors as $error) : ?>
                <li><?php echo $error; ?></li>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
    <?php
    $sql = "SELECT * FROM products WHERE id = $id";
    $result = mysqli_query($connection, $sql);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $old_image = $row["image"];
        ?>
        <div class="popup-container">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="input-group">
                    <input type="text" name="name" id="name" value="<?= $row["name"] ?>"
                           placeholder="Enter Product Name">
                </div>
                <div class="input-group">
                    <input type="text" name="title" id="title" value="<?= $row["title"] ?>"
                           placeholder="Enter Product Title">
                </div>
                <div class="input-group">
                    <textarea name="description" id="description" cols="30" rows="5"
                              placeholder="Enter Product Description"><?= $row["description"] ?></textarea>
                </div>
                <div class="input-group">
                    <input type="text" name="price" id="price" value="<?= $row["price"] ?>"
                           placeholder="Enter Product Price">
                </div>
                <div class="input-group">
                    <input type="file" name="image" id="image" placeholder="Select Image">
                    <img style="width: 50px;" src="images/<?= $row["image"] ?>" alt="Product Image">
                </div>
                <button type="submit" name="submit">Submit</button>
            </form>
        </div>
        <?php
    } else {
        echo "No record found";
    }
    if (isset($_POST["submit"])) {
        $name = $_POST["name"];
        $title = $_POST["title"];
        $description = $_POST["description"];
        $price = $_POST["price"];

        // Check if image is selected or not
        if (!empty($_FILES["image"])) {
            // User has selected a new image
            $image = $_FILES["image"]["name"];
            $image_temp = $_FILES["image"]["tmp_name"];
            $image_size = $_FILES["image"]["size"];
            $image_error = $_FILES["image"]["error"];
            $image_type = $_FILES["image"]["type"];
            $image_ext = pathinfo($image, PATHINFO_EXTENSION);
            $image_allowed = ["jpg", "jpeg", "png"];

            if ($image_size > 2097152) {
                $errors['image'] = "Image size is too large";
            }

            if (!in_array($image_ext, $image_allowed)) {
                $errors['image'] = "Image type is not allowed";
            }

            if (empty($errors)) {
                $image_name = uniqid("img_", true) . "." . $image_ext;
                $image_destination = "images/" . $image_name;

                move_uploaded_file($image_temp, $image_destination);

                // Delete the old image if it exists
                if (!empty($old_image)) {
                    unlink("images/$old_image");
                }

                $image = $image_name; // Update image variable
            }
        } else {
            // User has not selected a new image, keep the old image
            $image = $old_image;
        }
        if (empty($errors)) {
            $sql = "UPDATE products SET name = '$name', title = '$title', description = '$description', price = '$price', image = '$image' WHERE id = $id";
            mysqli_query($connection, $sql);
            header("Location: index.php");
        }
    }
    ?>
</main>
</body>
</html>