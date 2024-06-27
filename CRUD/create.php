<!doctype html>
<html lang="en" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Add Details</title>
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

    <div class="container">
        <div class="row">
            <div class="col-6">
                <h1>Add User</h1>
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
                <form action="create_process.php" method="post">
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" name="name" id="name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" name="email" id="email" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" name="password" id="password" class="form-control">
                    <button type="submit" class="btn mt-3 btn-primary">Add User</button>
                </form>
            </div>
        </div>

    </div>

</body>
</html>
