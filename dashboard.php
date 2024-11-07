<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body class="bg-gray-100 font-sans leading-normal tracking-normal">
   
    <!-- Sidebar -->
    <div class="flex flex-no-wrap h-screen">
        <div class="w-64 bg-blue-800 text-white hidden md:block">
            <div class="p-4">
                <h2 class="text-2xl font-bold">Dashboard</h2>
            </div>
            <nav class="mt-5">
                <a href="dashboard.php" class="block py-2 px-4 text-white hover:bg-blue-600">Home</a><hr>
                <a href="users.php" class="block py-2 px-4 text-white hover:bg-blue-600">Users</a><hr>
                <a href="#" class="block py-2 px-4 text-white hover:bg-blue-600">Logout</a><hr>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="container mx-auto p-6">
             <h2 class="text-2xl font-bold text-gray-700 mb-4">User Records</h2>
              <!-- Search Input -->
        
        <div class="max-w-sm py-6">
            <div class="bg-white rounded-lg shadow-lg p-6">
                <h2 class="text-2xl font-bold text-gray-800">Users</h2>
                <p class="text-gray-600 mt-2">Total Users: <span class="text-blue-600 font-semibold"><?php include('db.php') ?></span></p>
                <div class="mt-4 flex justify-between">
                    <a href="users.php" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">View all users</a>
                    <form action="export_excel.php" method="POST">
                        <button class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600" type="submit">Export file</button>
                    </form>
                </div>
            </div>
        </div>


        <div class="">
        <h2 class="text-2xl font-bold text-center text-gray-700 mb-4">Registered Users Profile</h2>
        </div>

        <div class="container mx-auto">
    

    
    <!-- View All Button -->
    <div class=" mt-6 mb-5 py-5">
    <span class="text-2xl font-bold mb-4">User Profiles</span>
    <a href="view_all.php" class="bg-blue-500 text-white px-4 py-3 ml-5 rounded-lg">View All Profiles</a>
    </div>

    <!-- Profile Cards Container -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
    <?php include ('profile.php')?>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $id = $row['id'];
                $file = $row['file'];
                $full_name = $row['full_name'];
                $email = $row['email'];
                $phone = $row['phone'];
        ?>
                <div class="bg-white p-4 rounded-lg shadow-md">
                    <img src="<?php echo $file; ?>" alt="Profile Picture" class="w-sm h-32 object-cover rounded-md mb-4">
                    <h2 class="text-xl font-bold"><?php echo $full_name; ?></h2>
                    <p><?php echo $email; ?></p>
                    <p class="text-gray-600 mb-5"><?php echo $phone; ?></p>
                    <p><?php echo "<a href='profile_details.php?id=$id' class='bg-blue-500 text-white  px-4 py-2 rounded-lg'>View Full Details</a>";?></p>
                </div>
        <?php
            }
        } else {
            echo "<p>No profiles found.</p>";
        }
        ?>
    </div>

</div>
<!--  -->
            
        </div>
    </div>
    <script src="js/script.js"></script>
   
</body>
</html>
