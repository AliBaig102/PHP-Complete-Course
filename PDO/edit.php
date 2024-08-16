<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User Form</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex justify-center items-center min-h-screen bg-gray-100">

<!-- Form Container -->
<div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md">
    <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">Edit a User</h2>
    <?php
    require_once "classes/User.php";
    $user_obj = new User();
    $user = $user_obj->getUserById($_GET['id']);
    if ($user["status"] == "success"):
    $user = $user["data"];
    ?>
    <!-- Form -->
    <form method="post">
        <!-- Name Input -->
        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Name</label>
            <input type="text" id="name" name="name" required value="<?= $user["name"] ?>"
                   class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500 focus:outline-none">
        </div>

        <!-- Email Input -->
        <div class="mb-4">
            <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
            <input type="email" id="email" name="email" required value="<?= $user["email"] ?>"
                   class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500 focus:outline-none">
        </div>

        <!-- Password Input -->
        <div class="mb-4">
            <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
            <input type="password" id="password" name="password" required value="<?= $user["password"] ?>"
                   class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500 focus:outline-none">
        </div>

        <!-- Submit Button -->
        <button type="submit" name="edit"
                class="w-full py-2 bg-blue-600 text-white text-sm font-medium rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
            Edit Details
        </button>
        <?php else: ?>
            <h2 class="text-3xl font-bold text-center text-red-800 mb-6 "> <?= $user["message"] ?></h2>
            <a href="index.php"
               class="w-full flex justify-center py-2 bg-gray-500 text-white text-sm font-medium rounded-md hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-400">
                Back
            </a>
        <?php endif; ?>
    </form>
    <?php
    if (isset($_POST['edit'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $res= $user_obj->updateUser($_GET['id'],$name, $email, $password);
        if ($res["status"] == "success") {
            header("Location: index.php");
        }else{
            echo $res["message"];
        }
    }
    ?>
</div>
</body>
</html>
