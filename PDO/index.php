<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PDO CRUD</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
<main class="flex justify-center py-24 h-screen">
    <div class="flex flex-col w-full max-w-6xl">
        <!-- Top bar with Search and Add button -->
        <div class="flex justify-between items-center mb-4 px-4">
            <!-- Search input and button -->
            <form method="post" class="flex items-center space-x-2">
                <input type="text" placeholder="Search..." name="search" value="<?= $_POST["search"] ?? "" ?>"
                       class="px-3 py-2 border border-gray-300 rounded-md text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                <button type="submit" name="search-btn"
                        class="px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    Search
                </button>
            </form>
            <!-- Add button -->
            <a href="create.php"
               class="px-4 py-2 bg-green-600 text-white text-sm font-medium rounded-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500">
                Add
            </a>
        </div>

        <!-- Table -->
        <div class="-m-1.5 overflow-x-auto">
            <div class="p-1.5 min-w-full inline-block align-middle">
                <div class="border rounded-lg overflow-hidden">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">
                                Name
                            </th>
                            <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">
                                Email
                            </th>
                            <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">
                                Password
                            </th>
                            <th scope="col" class="px-6 py-3 text-end text-xs font-medium text-gray-500 uppercase">
                                Details
                            </th>
                            <th scope="col" class="px-6 py-3 text-end text-xs font-medium text-gray-500 uppercase">
                                Edit
                            </th>
                            <th scope="col" class="px-6 py-3 text-end text-xs font-medium text-gray-500 uppercase">
                                Delete
                            </th>
                        </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                        <?php


                        require_once "classes/User.php";
                        $user_obj = new User();
                        if (isset($_POST["search-btn"])) {
                            $allUsers = $user_obj->searchUser($_POST["search"]);
                        } else {
                            $allUsers = $user_obj->getAllUsers();
                        }
                        if ($allUsers["status"] == "success"):
                            foreach ($allUsers["data"] as $user):
                                ?>
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800"><?= $user["name"] ?></td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800"><?= $user["email"] ?></td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800"><?= $user["password"] ?></td>
                                    <td class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium">
                                        <a href="details.php?id=<?= $user["id"] ?>"
                                           class="inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-blue-600 hover:text-blue-800 focus:outline-none focus:text-blue-800 disabled:opacity-50 disabled:pointer-events-none">
                                            Details
                                        </a>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium">
                                        <a href="edit.php?id=<?= $user["id"] ?>"
                                           class="inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-yellow-600 hover:text-yellow-800 focus:outline-none focus:text-yellow-800 disabled:opacity-50 disabled:pointer-events-none">
                                            Edit
                                        </a>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium">
                                        <a href="delete.php?id=<?= $user["id"] ?>"
                                           class="inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-red-600 hover:text-red-800 focus:outline-none focus:text-red-800 disabled:opacity-50 disabled:pointer-events-none">
                                            Delete
                                        </a>
                                    </td>
                                </tr>
                            <?php
                            endforeach;
                        else:
                            ?>

                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-md font-medium text-red-800"><?= $allUsers["message"] ?></td>
                            </tr>
                        <?php
                        endif;
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>
</body>
</html>
