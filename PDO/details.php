<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Details</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex justify-center items-center min-h-screen bg-gray-100">

<!-- Details Container -->
<div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-lg">
    <h2 class="text-3xl font-bold text-center text-gray-800 mb-6">User Details</h2>

    <!-- User Information -->
    <?php
    require_once "classes/User.php";
    $user_obj = new User();
    $user = $user_obj->getUserById($_GET["id"]);
    if ($user["status"] == "success"):
        $user = $user["data"];
    ?>
    <div class="mb-6">
        <!-- Name -->
        <div class="flex items-center justify-between mb-4">
            <span class="text-sm font-medium text-gray-600">Name:</span>
            <span class="text-lg font-semibold text-gray-800"><?= $user["name"] ?></span>
        </div>
        <!-- Email -->
        <div class="flex items-center justify-between mb-4">
            <span class="text-sm font-medium text-gray-600">Email:</span>
            <span class="text-lg font-semibold text-gray-800"><?= $user["email"] ?></span>
        </div>
        <!-- Registered Date -->
        <div class="flex items-center justify-between mb-4">
            <span class="text-sm font-medium text-gray-600">Registered Date:</span>
            <span class="text-lg font-semibold text-gray-800"><?php echo date_format(new DateTime($user["created_at"]), "F j, Y, g:i a")  ?></span>
        </div>
    </div>

    <!-- Action Buttons -->
    <div class="flex justify-between space-x-4">
        <!-- Edit Button -->
        <a href="edit.php?id=<?= $user["id"] ?>"
                class="flex-1 flex justify-center py-2 bg-yellow-500 text-white text-sm font-medium rounded-md hover:bg-yellow-600 focus:outline-none focus:ring-2 focus:ring-yellow-400">
            Edit
        </a>
        <!-- Delete Button -->
        <a href="delete.php?id=<?= $user["id"] ?>"
                class="flex-1 flex justify-center py-2 bg-red-600 text-white text-sm font-medium rounded-md hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500">
            Delete
        </a>
        <!-- Back Button -->
        <a href="index.php"
                class="flex-1 flex justify-center py-2 bg-gray-500 text-white text-sm font-medium rounded-md hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-400">
            Back
        </a>
        <?php else: ?>
        <h2 class="text-3xl font-bold text-center text-red-800 mb-6 "> <?= $user["message"] ?></h2>
            <a href="index.php"
                    class="w-full flex justify-center py-2 bg-gray-500 text-white text-sm font-medium rounded-md hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-400">
                Back
            </a>
        <?php endif; ?>
    </div>
</div>

</body>
</html>
