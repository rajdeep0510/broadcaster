<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="/broadcast/src/output.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <!-- <a href="/broadcast/about/">About</a> -->
    <!-- <a href="/broadcast/profile/">Profile</a> -->
    <?php include_once __DIR__ . '/../helpers/header.php'; ?>
    
    <main class="container mx-auto mt-8 p-4">
        <div class="feed bg-white rounded-lg shadow p-6" id="messageFeed">
            <?php if ($messages): ?>
                <?php foreach ($messages as $message): ?>
                    <div class="mb-4 p-4 border-b">
                        <p class="text-gray-800"><?php echo htmlspecialchars($message['message']); ?></p>
                        <?php if (isset($message['created_at'])): ?>
                            <p class="text-sm text-gray-500 mt-2">
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

    <!-- Debug section (remove in production) -->
    <?php if (isset($_ENV['DEBUG']) && $_ENV['DEBUG']): ?>
        <div class="container mx-auto mt-8 p-4">
            <pre class="bg-gray-100 p-4 rounded">
                <?php print_r($messages); ?>
            </pre>
        </div>
    <?php endif; ?>
</body>
</html>