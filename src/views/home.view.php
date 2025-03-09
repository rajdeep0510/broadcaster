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
<body class="bg-gray-900 ">
    <?php include_once __DIR__ . '/../helpers/header.php'; ?>
    
    <main class="container mx-auto mt-8 p-4">
        <?php if ($_SESSION['is_logged_in']): ?>
            <!-- Message Form -->
            <div class="bg-white rounded-lg shadow p-6 mb-8">
                <form action="/broadcast/" method="POST" class="space-y-4">
                    <div>
                        <textarea 
                            name="message" 
                            placeholder="What's on your mind?" 
                            class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 resize-none"
                            rows="3"
                            required
                        ></textarea>
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
                    <div class="mb-4 p-4 border-b">
                        <p class="text-gray-800 text-2xl text-white"><?php echo htmlspecialchars($message['message']); ?></p>
                        <?php if (isset($message['created_at'])): ?>
                            <a href="/broadcast/profile?user=<?php echo htmlspecialchars($message['m_username']); ?>" class="text-sm text-gray-500 mt-2">
                                <div class="flex items-center space-x-2">
                                    <span class="text-blue-500">@<?php echo htmlspecialchars($message['m_username']); ?></span>
                                </div>
                            </a>
                            <p class="text-sm text-white mt-2">
                                <?php echo date('F j, Y g:i a', strtotime($message['created_at'])); ?>                            
                            </p>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p class="text-gray-500">No messages found.</p>
            <?php endif; ?>
        </div>
    </main>


</body>
</html>