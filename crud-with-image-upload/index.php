<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <title>CRUD Application with Image Upload</title>
</head>
<body>
<main>

    <h1 style="text-align: center;">CRUD Application with Image Upload</h1>
    <a class="create" style="width: fit-content; text-decoration: none;" href="create.php">Create New Product</a>
    <?php
    require("database/connection.php");

    $query = "SELECT * FROM products";
    $result = mysqli_query($connection, $query) or die("Error in query: $query. " . mysqli_error($connection));
    $products = [];
    if (mysqli_num_rows($result) > 0) {
        $products = mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
    ?>
    <?php if (!empty($products)): ?>
        <table>
            <thead>
            <tr>
                <th>ID</th>
                <th>Image</th>
                <th>Name</th>
                <th>Title</th>
                <th>Description</th>
                <th>Price</th>
                <th width="100px">Action</th>
            </thead>
            <tbody>
            <?php foreach ($products as $product): ?>
                <tr>
                    <td><?= $product['id'] ?></td>
                    <td height="70px" style="padding: 0">
                        <img style="width: 100%; height: 100%; object-fit: contain;" src="images/<?= $product['image'] ?>" alt="<?= $product['name'] ?>">
                    </td>
                    <td><?= $product['name'] ?></td>
                    <td><?= $product['title'] ?></td>
                    <td><?= $product['description'] ?></td>
                    <td><?= $product['price'] ?></td>
                    <td height="76px">
                        <a class="edit" href="update.php?id=<?= $product['id'] ?>">Edit</a>
                        <a class="delete" href="delete.php?id=<?= $product['id'] ?>&old_image_name=<?= $product['image'] ?>">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
    <?php if (empty($products)): ?>
        <h3 class="errors">No products found.</h3>
    <?php endif; ?>
</main>
</body>
</html>