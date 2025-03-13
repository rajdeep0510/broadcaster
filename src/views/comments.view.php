<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Message - Broadcaster</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-800">
    <?php include_once __DIR__ . '/../helpers/header.php'; ?>

    <main class="container mx-auto mt-8 p-4">
        <!-- Message -->
        <div class="bg-gray-700 rounded-lg shadow p-6 mb-8">
            <div class="flex items-center justify-between mb-4">
                <div class="flex items-center space-x-4">
                    <a href="/broadcaster/profile?user=<?php echo htmlspecialchars($message['m_username']); ?>" class="text-blue-500 hover:underline">
                        @<?php echo htmlspecialchars($message['m_username']); ?>
                    </a>
                    <span class="text-gray-400">
                        <?php echo date('F j, Y g:i a', strtotime($message['created_at'])); ?>
                    </span>
                </div>
            </div>
            <p class="text-2xl text-white mb-4"><?php echo htmlspecialchars($message['message']); ?></p>
            
            <!-- Like button -->
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

        <!-- Comments section -->
        <div class="bg-gray-700 rounded-lg shadow p-6">
            <h2 class="text-xl text-white mb-4">Comments</h2>
            
            <?php if ($_SESSION['is_logged_in']): ?>
                <!-- Comment form -->
                <form action="/broadcaster/comments" method="POST" class="mb-6">
                    <input type="hidden" name="message_id" value="<?php echo $message['id']; ?>">
                    <textarea 
                        name="comment" 
                        placeholder="Write a comment..." 
                        class="w-full bg-gray-600 text-white rounded-lg p-3 mb-2 resize-none"
                        rows="3"
                        required></textarea>
                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors">
                        Post Comment
                    </button>
                </form>
            <?php endif; ?>

            <!-- Comments list -->
            <?php if ($comments): ?>
                <?php foreach ($comments as $comment): ?>
                    <div class="border-b border-gray-600 py-4">
                        <div class="flex items-center justify-between mb-2">
                            <a href="/broadcaster/profile?user=<?php echo htmlspecialchars($comment['username']); ?>" class="text-blue-500 hover:underline">
                                @<?php echo htmlspecialchars($comment['username']); ?>
                            </a>
                            <span class="text-gray-400 text-sm">
                                <?php echo date('F j, Y g:i a', strtotime($comment['created_at'])); ?>
                            </span>
                        </div>
                        <p class="text-white"><?php echo htmlspecialchars($comment['comment']); ?></p>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p class="text-gray-400">No comments yet. Be the first to comment!</p>
            <?php endif; ?>
        </div>
    </main>
</body>
</html> 

