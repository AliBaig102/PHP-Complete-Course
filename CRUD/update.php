<!doctype html>
<html lang="en" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>View Details</title>
</head>
<style>
    details {
        border: 1px solid #ddd;
        border-radius: 4px;
        padding: 10px;
        margin-bottom: 15px;
    }

    summary {
        cursor: pointer;
        font-weight: bold;
    }

    details[open] summary {
        text-decoration: underline;
    }

    details > * {
        margin-top: 10px;
    }

</style>
<body>
<?php
require "dbConnection.php";

$id = $_GET['id'];

$sql = "SELECT * FROM users WHERE id = $id";
$result = mysqli_query($conn, $sql);
$user = mysqli_fetch_assoc($result);

if (!$user) {
    echo "<h1>User not found!</h1>";
} else {
    ?>
    <div class="container">
        <div class="row">
            <div class="col-6">
                <h1>Edit User</h1>
                <?php
                if (isset($_GET["error"])) {
                    $error = $_GET["error"];
                    if ($error == "emptyfields") {
                        echo "<h4>Fill in all fields!</h4>";
                    } elseif ($error == "invalidemail") {
                        echo "<h4>Invalid email format!</h4>";
                    } elseif ($error == "invalidusername") {
                        echo "<h4>Invalid username format!</h4>";
                    }
                }
                ?>
                <form action="update_process.php" method="post">
                    <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" name="name" id="name" class="form-control" value="<?php echo $user['name']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" name="email" id="email" class="form-control" value="<?php echo $user['email']; ?>">
                    </div>
                    <button type="submit" class="btn mt-3 btn-primary">Update</button>
                </form>
            </div>
        </div>

    </div>
    <?php
}
?>


</body>
</html>
