<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex flex-col items-center justify-center min-h-screen bg-gray-900 gap-8">
    <div class="text-center space-y-4">
        <h1 class="text-6xl font-extrabold bg-gradient-to-r from-cyan-400 via-blue-500 to-purple-500 text-transparent bg-clip-text animate-pulse drop-shadow-[0_0_15px_rgba(59,130,246,0.5)]">
            Welcome to Broadcaster
        </h1>
        <p class="text-gray-200 text-xl font-medium tracking-wide">Connect and share with the world</p>
    </div>

    <div class="w-full max-w-sm bg-white/80 backdrop-blur-sm p-6 rounded-2xl shadow-lg border border-white/20">
        
        <h2 class="text-2xl font-bold text-center text-gray-700">Login</h2>

        <?php if ($error): ?>
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                <span class="block sm:inline"><?php echo htmlspecialchars($error); ?></span>
            </div>
        <?php endif; ?>

        <form action="/broadcaster/login/" method="POST" class="mt-4">
            <div>
                <label class="block text-gray-600 text-sm">Username</label>
                <input type="text" name="username" required 
                    class="w-full mt-1 p-3 border border-gray-300 rounded-xl focus:ring focus:ring-blue-200 bg-white/50"
                    placeholder="Enter your username">
            </div>

            <div class="mt-4">
                <label class="block text-gray-600 text-sm">Password</label>
                <input type="password" name="password" required 
                    class="w-full mt-1 p-3 border border-gray-300 rounded-xl focus:ring focus:ring-blue-200 bg-white/50"
                    placeholder="Enter your password">
            </div>

            <div class="flex justify-between items-center mt-4">
                <a href="#" class="text-sm text-white hover:underline">Forgot password?</a>
            </div>

            <button type="submit"
                class="w-full bg-blue-600 text-white p-3 mt-4 rounded-xl hover:bg-blue-700 transition shadow-lg">
                Login
            </button>

            <div class="text-center mt-4">
                <a href="/broadcaster/register/" class="text-sm text-white hover:underline">
                    Don't have an account? Register here
                </a>
            </div>
        </form>
    </div>
</body>
</html>

