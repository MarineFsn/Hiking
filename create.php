<!DOCTYPE html>
<html>

<head>
    <title>Add a hiking</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<header class="bg-gray-200 py-4">
    <div class="container mx-auto flex justify-between items-center px-4">
        <h1 class="text-2xl font-bold text-gray-800">[HIKE]Réunion</h1>
        <div class="flex items-center space-x-4">
            <a href="index.php"
                class="text-2xl font-bold text-gray-800 border border-gray-800 rounded-md px-4 py-2 transition-colors duration-300 hover:bg-gray-800 hover:text-white">Home</a>

        </div>
    </div>
</header>

<body>
    <div class="container mx-auto py-8">
        <fieldset class="p-6 bg-white shadow-md rounded">
            <legend class="text-xl font-bold mb-4">Add your information here</legend>

            <form action="index.php" method="POST">
                <div class="mb-4">
                    <label for="name" class="block text-gray-700">Name:</label>
                    <input type="text" name="name" id="name" required
                        class="w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">
                </div>

                <div class="mb-4">
                    <label for="difficulty" class="block text-gray-700">Difficulty:</label>
                    <input type="text" name="difficulty" id="difficulty" required
                        class="w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">
                </div>

                <div class="mb-4">
                    <label for="distance" class="block text-gray-700">Distance:</label>
                    <input type="text" name="distance" id="distance" required
                        class="w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">
                </div>

                <div class="mb-4">
                    <label for="duration" class="block text-gray-700">Duration:</label>
                    <input type="time" name="duration" id="duration" required
                        class="w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">
                </div>

                <div class="mb-4">
                    <label for="height_difference" class="block text-gray-700">Height difference:</label>
                    <input type="text" name="height_difference" id="height_difference" required
                        class="w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">
                </div>

                <input type="submit" value="Add Hiking"
                    class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-700 cursor-pointer">
            </form>
        </fieldset>
    </div>
</body>
<?php include "./partials/footer.php" ?>

</html>