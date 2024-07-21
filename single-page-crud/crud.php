<?php
$connection = mysqli_connect("localhost", "root", "", "crud") or die("Could not connect to database." . mysqli_connect_error());

function secureInput(string $data, bool $trim = true): string
{
    $data = $trim ? trim($data) : $data;
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return mysqli_real_escape_string($data);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>
<main>

    <form id="add-form" action="" method="post">
        <div class="input-group">
            <label for="name"><i class="fas fa-user"></i> </label>
            <input type="text" placeholder="Enter Your Name" name="name" id="name">
        </div>
        <div class="input-group">
            <label for="email"><i class="fas fa-envelope"></i> </label>
            <input type="text" placeholder="Enter Your Email" name="email" id="email">
        </div>
        <div class="input-group">
            <label for="age"><i class="fas fa-user"></i></label>
            <input type="text" placeholder="Enter Your Age" name="age" id="age">
        </div>
        <div class="input-group">
            <label for="city"><i class="fas fa-solid fa-city"></i></label>
            <select name="city" id="city">
                <option selected disabled>Select City</option>
                <?php
                $query = "SELECT * FROM cities";
                $result = mysqli_query($connection, $query) or die("Query Failed." . mysqli_error($connection));
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<option value='" . $row['id'] . "'>" . $row['city_name'] . "</option>";
                    }
                }
                ?>
            </select>
        </div>
        <button name="add">Submit</button>
    </form>
    <?php
    if (isset($_POST['add'])) {
        $errors = [];
        $name = "";
        $email = "";
        $age = "";
        $city = "";
        if (empty($_POST['name'])) {
            $errors['name'] = "Name is required";
        } else {
            $name = secureInput($_POST['name'], false);
        }
        if (empty($_POST['email'])) {
            $errors['email'] = "Email is required";
        } elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = "Email is not valid";
        } else {
            $email = secureInput($_POST['email']);
        }
        if (empty($_POST['age'])) {
            $errors['age'] = "Age is required";
        } elseif (!is_numeric($_POST['age'])) {
            $errors['age'] = "Age is not valid";
        } else {
            $age = secureInput($_POST['age']);
        }
        if (empty($_POST['city'])) {
            $errors['city'] = "City is required";
        } else {
            $city = secureInput($_POST['city']);
        }

        if (!empty($errors)) {
            echo "<ul class='errors'>";
            foreach ($errors as $key => $value) {
                echo "<li>$value</li>";
            }
            echo "</ul>";

        } else {
            $query = "INSERT INTO students (name, email, age, city_id) VALUES ('$name', '$email', '$age', '$city')";
            $result = mysqli_query($connection, $query) or die("Query Failed." . mysqli_error($connection));

        }
    }
    ?>
    <!--    <ul class="errors">-->
    <!--            <li>Name is required</li>-->
    <!--            <li>Email is required</li>-->
    <!--            <li>Age is required</li>-->
    <!--            <li>City is required</li>-->
    <!--            <li>Email is not valid</li>-->
    <!--    </ul>-->
    <table border="1">
        <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Age</th>
            <th>City</th>
            <th width="200px">Action</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $query = "SELECT s.*, c.city_name FROM students s inner join cities c on s.city_id = c.id";
        $result = mysqli_query($connection, $query) or die("Query Failed." . mysqli_error($connection));
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['name'] . "</td>";
                echo "<td>" . $row['email'] . "</td>";
                echo "<td>" . $row['age'] . "</td>";
                echo "<td>" . $row['city_name'] . "</td>";
                echo "<td width=\"200px\">
                        <a href='crud.php?update_id=" . $row['id'] . "' class='edit'><i class='fas fa-edit'></i></a> 
                        <a href='crud.php?delete_id=" . $row['id'] . "' class='delete'><i class='fas fa-trash'></i></a>
                      </td>";
                echo "</tr>";
            }
        } else {
            echo "No Data Found";
        }
        ?>
        <!--        <tr>-->
        <!--            <td colspan="2">Rahul</td>-->
        <!--            <td colspan="2">22</td>-->
        <!--            <td colspan="2">Delhi</td>-->
        <!--            <td colspan="1" width="200px">-->
        <!--                <button class="edit"><i class="fas fa-edit"></i></button>-->
        <!--                <button class="delete"><i class="fas fa-trash"></i></button>-->
        <!--            </td>-->
        <!--        </tr>-->
        </tbody>
    </table>
    <?php
    //    Delete Functionality
    if (isset($_GET['delete_id'])) {
        $delete_id = $_GET['delete_id'];
        $query = "DELETE FROM students WHERE id = $delete_id";
        $result = mysqli_query($connection, $query) or die("Query Failed." . mysqli_error($connection));
        if ($result) {
            echo "<script>
                    alert('Data Deleted Successfully'); 
                    window.location.href = 'crud.php';
                  </script>";
        }
    }


    //    Update Functionality
    $activeClass = "";
    if (isset($_GET['update_id'])) {
        $update_id = $_GET['update_id'];
        $activeClass = "active";
    }
    ?>
    <div class="popup-container <?php echo $activeClass; ?> edit-popup">
        <form id="edit-form" action="" method="post">
            <h3>Edit User</h3>
            <?php
            $sql = "SELECT * FROM students WHERE id = $update_id";
            $result = mysqli_query($connection, $sql);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $name = $row['name'];
                    $email = $row['email'];
                    $age = $row['age'];
                    $city_id = $row['city_id'];
                    ?>
                    <div class="input-group">
                        <label for="name"><i class="fas fa-user"></i> </label>
                        <input type="text" placeholder="Enter Your Name" name="name" value="<?php echo $name; ?>"
                               id="name">
                    </div>
                    <div class="input-group">
                        <label for="email"><i class="fas fa-envelope"></i> </label>
                        <input type="text" placeholder="Enter Your Email" name="email" value="<?php echo $email; ?>"
                               id="email">
                    </div>
                    <div class="input-group">
                        <label for="age"><i class="fas fa-user"></i></label>
                        <input type="text" placeholder="Enter Your Age" name="age" value="<?php echo $age; ?>" id="age">
                    </div>
                    <div class="input-group">
                        <label for="city"><i class="fas fa-solid fa-city"></i></label>
                        <select name="city" id="city">
                            <?php
                            $query = "SELECT * FROM cities";
                            $result = mysqli_query($connection, $query) or die("Query Failed." . mysqli_error($connection));
                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $city_name = $row['city_name'];
                                    $c_id = $row['id'];
                                    if ($c_id == $city_id) {
                                        echo "<option value='$c_id' selected>$city_name</option>";
                                    } else {
                                        echo "<option value='$c_id'>$city_name</option>";
                                    }
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <?php
                }
            }
            ?>
            <button name="update">Submit</button>
        </form>
        <?php
        if (isset($_POST['update'])) {
            if (empty($_POST['name']) || empty($_POST['email']) || empty($_POST['age']) || empty($_POST['city'])) {
                // if All fields are empty the display error message in the alert box
                echo "<script>alert('All Fields are required')</script>";
//                header("Location: crud.php?update_id=$update_id");
//                exit();
            } else {

                $name = $_POST['name'];
                $email = $_POST['email'];
                $age = $_POST['age'];
                $city = $_POST['city'];
                $sql = "UPDATE students SET name = '$name', email = '$email', age = $age, city_id = $city WHERE id = $update_id";
                $result = mysqli_query($connection, $sql) or die("Query Failed." . mysqli_error($connection));
                if ($result) {
                    echo "<script>
                            alert('Record Updated Successfully');
                            window.location.href = 'crud.php';
                          </script>";

                }
            }
        }
        ?>
        <div class="close-btn"><i class="fas fa-times"></i></div>
    </div>
</main>
</body>
</html>
<script>
    const Popup = document.querySelector('.popup-container');
    const closeBtn = document.querySelector('.close-btn');

    function openPopup() {
        Popup.classList.add('active');
    }

    function closePopup() {
        Popup.classList.remove('active');
        setTimeout(function () {
            window.location.href = 'crud.php';
        }, 500);

    }

    closeBtn.addEventListener('click', closePopup);
</script>