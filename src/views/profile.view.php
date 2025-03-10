<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Page</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-800">
    <?php include_once __DIR__ . '/../helpers/header.php'; ?>
    <?php
        $username = $user['u_name'];
        $full_name = $user['full_name'];
        $bio = $user['bio'];
        $email = $user['email'];
    ?>

    <div class="max-w-2xl mx-auto mt-10 bg-gray-400 rounded-lg shadow-md">
        <!-- Banner -->
        <div class="relative">
            <img src="https://www.notion.so/images/page-cover/met_william_morris_1877_willow.jpg" alt="Banner" class="w-full h-48 object-cover rounded-t-lg">
            <img src="/broadcaster/public/d_icon.png" alt="Profile Pic" class="w-24 h-24 rounded-full border-4 border-white absolute left-1/2 transform -translate-x-1/2 -bottom-12">
        </div>
        <!-- user info -->
        <div class="p-6 text-center mt-10">
            <h2 class="text-xl font-semibold"><?php echo $full_name; ?></h2>
            <p class="text-white">@<?php echo $username; ?></p>
            <p class="text-white"><?php echo $bio; ?></p>
            
            <!-- Followers and Following -->
            <div class="flex justify-center space-x-8 mt-4">
                <div class="text-center">
                    <p class="text-lg font-semibold">1.2K</p>
                    <p class="text-white text-sm">Followers</p>
                </div>
                <div class="text-center">
                    <p class="text-lg font-semibold">800</p>
                    <p class="text-white text-sm">Following</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Message Feed -->
    <h2 class="text-xl text-white font-semibold text-center mt-10">YourMessages</h2>
    <div class="feed bg-gray-700 rounded-lg shadow  m-10 p-6" id="messageFeed">
        <?php if ($messages): ?>
            <?php foreach ($messages as $message): ?>
                <div class="mb-4 p-4 border-b">
                    <p class="text-white"><?php echo htmlspecialchars($message['message']); ?></p>
                    <?php if (isset($message['created_at'])): ?>
                        <p class="text-sm text-gray-300 mt-2">
                            Posted by <?php echo htmlspecialchars($message['m_username']); ?> on <?php echo date('F j, Y g:i a', strtotime($message['created_at'])); ?>
                        </p>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p class="text-gray-300">No messages found.</p>
        <?php endif; ?>
    </div>

</body>
</html>

