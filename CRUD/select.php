 <!doctype html>
<html lang="en" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Displaying Data</title>
</head>
<style>
    table {
        width: 100%;
        border-collapse: collapse;
    }

    table th, table td {
        padding: 10px;
        text-align: left;
    }
    
    @media (max-width: 768px) {
        .col-10, .col-2 {
            flex: 1;
        }
    }
</style>
<body>
<div class="container">
    <div class="row align-items-center my-5">
        <div class="col-10">
            <h1>Displaying Data of Users</h1>
        </div>
        <div class="col-2 d-flex justify-content-end">  <a href="create.php" class="btn btn-success">Create</a>
        </div>
    </div>
    <table class="table table-bordered">
        <thead class="thead-dark">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Password</th>
            <th>Edit</th>
            <th>Details</th>
            <th>Delete</th>
        </tr>
        </thead>
        <tbody>
        <?php
        require "dbConnection.php";
        $sql = 'SELECT * FROM users';
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['name'] . "</td>";
            echo "<td>" . $row['email'] . "</td>";
            echo "<td>" . $row['password'] . "</td>";
            echo "<td><a class='btn btn-primary' href='update.php?id=" . $row['id'] . "'>Edit</a></td>";
            echo "<td><a class='btn btn-secondary' href='details.php?id=" . $row['id'] . "'>Details</a></td>";
            echo "<td><a class='btn btn-danger' href='delete.php?id=" . $row['id'] . "'>Delete</a></td>";
            echo "</tr>";
        }
        ?>
        </tbody>
    </table>
</div>

</body>
</html>
