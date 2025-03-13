<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Helvetica', 'Arial', 'sans-serif'],
                    },
                    spacing: {
                        '128': '32rem',
                    }
                }
            }
        }
    </script>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-800 ">
    <?php include_once __DIR__ . '/../helpers/header.php'; ?>

    <main class="container mx-auto mt-8 p-4">
        <?php if ($_SESSION['is_logged_in']): ?>
            <!-- Message Form -->

            <div class="bg-black text-white rounded-lg p-4 mb-8 border border-gray-700">
                <form action="/broadcaster/" method="POST" class="space-y-4">
                    <div>
                        <textarea
                            name="message"
                            placeholder="What's on your mind?"
                            class="w-full bg-black text-white placeholder-gray-500 border-none resize-none"
                            rows="3"
                            required></textarea>
                    </div>
                    <div class="flex justify-end">
                        <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition-colors">
                            Post
                        </button>
                    </div>
                </form>
            </div>
        <?php endif; ?>
        <!-- Message Feed -->

            <div class="feed bg-gray-700 rounded-lg shadow p-6" id="messageFeed">
                <?php if ($messages): ?>
                    <?php foreach ($messages as $message): ?>
                        <!-- message container -->
                        <div class="mb-4 p-4 border-b border-gray-600 flex flex-col <?php echo ($message['m_username'] === $_SESSION['username']) ? 'items-end' : 'items-start'; ?>">
                            <a href="/broadcaster/comments?id=<?php echo $message['id']; ?>" class="w-full">
                                <p class="text-2xl text-white max-w-[70%] hover:text-blue-400 transition-colors"><?php echo htmlspecialchars($message['message']); ?></p>
                            </a>
                            <div class="mt-4 flex items-center justify-between w-full">
                                <div class="flex items-center space-x-4">
                                    <a href="/broadcaster/profile?user=<?php echo htmlspecialchars($message['m_username']); ?>" class="text-sm text-gray-500">
                                        <div class="flex space-x-2">
                                            <span class="text-blue-500">@<?php echo htmlspecialchars($message['m_username']); ?></span>
                                        </div>
                                    </a>
                                    <p class="text-sm text-gray-400">
                                        <?php echo date('F j, Y g:i a', strtotime($message['created_at'])); ?>
                                    </p>
                                </div>

                                <!-- like button -->
                                <?php if (!$_SESSION['is_logged_in']): ?>
                                    <div class="flex items-center space-x-1 px-3 py-1 rounded-full border border-pink-500 hover:bg-pink-500/10 transition-colors">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-pink-500" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd" />
                                        </svg>
                                        <span class="text-sm font-medium text-pink-500">
                                            <?php
                                            $likes = json_decode($message['liked_users'], true) ?? [];
                                            echo count($likes);
                                            ?>
                                        </span>
                                    </div>
                                <?php endif; ?>
                                <?php if ($_SESSION['is_logged_in']): ?>
                                    <form action="/broadcaster/like/" method="POST" class="flex items-center">
                                        <input type="hidden" name="message_id" value="<?php echo $message['id']; ?>">
                                        <?php
                                        $likes = json_decode($message['liked_users'], true) ?? [];
                                        $hasLiked = in_array($_SESSION['username'], $likes);
                                        ?>
                                        <button type="submit" class="flex items-center space-x-1 px-3 py-1 rounded-full border border-pink-500 hover:bg-pink-500/10 transition-colors <?php echo $hasLiked ? 'bg-pink-500/10' : ''; ?>">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-pink-500" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd" />
                                            </svg>
                                            <span class="text-sm font-medium text-pink-500"><?php echo count($likes); ?></span>
                                        </button>
                                    </form>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p class="text-gray-500">No messages found.</p>
                <?php endif; ?>
            </div>
        </a>
    </main>


</body>

</html>