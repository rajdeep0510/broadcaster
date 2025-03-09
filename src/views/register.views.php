<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Broadcast</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 gap-8">
    <?php include_once __DIR__ . '/../helpers/header.php'; ?>
    <div class="flex items-center justify-center min-h-screen p-4">
   
    <div class="w-full max-w-2xl bg-white/80 backdrop-blur-sm p-8 rounded-2xl shadow-lg border border-white/20">
        <h2 class="text-3xl font-bold text-center text-gray-700 mb-8">Create Account</h2>

        <?php if ($error): ?>
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                <span class="block sm:inline"><?php echo htmlspecialchars($error); ?></span>
            </div>
        <?php endif; ?>

        <form action="/broadcast/register/" method="POST" class="space-y-6">
            <!-- Two columns for username and full name -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-gray-600 text-sm font-medium mb-2">Username</label>
                    <input type="text" 
                        name="username" required 
                        class="w-full p-3 border border-gray-300 rounded-xl focus:ring focus:ring-blue-200 bg-white/50"
                        placeholder="Choose a username">
                    <p class="text-xs text-gray-500 mt-1">username starts with @ automatically</p>
                </div>

                <div>
                    <label class="block text-gray-600 text-sm font-medium mb-2">Full Name</label>
                    <input type="text" 
                        name="fullname" required 
                        class="w-full p-3 border border-gray-300 rounded-xl focus:ring focus:ring-blue-200 bg-white/50"
                        placeholder="Enter your full name">
                </div>
            </div>

            <!-- Email field -->
            <div>
                <label class="block text-gray-600 text-sm font-medium mb-2">Email Address</label>
                <input type="email" 
                    name="email" required 
                    class="w-full p-3 border border-gray-300 rounded-xl focus:ring focus:ring-blue-200 bg-white/50"
                    placeholder="Enter your email">
            </div>

            <!-- Bio field -->
            <div>
                <label class="block text-gray-600 text-sm font-medium mb-2">Bio</label>
                <textarea 
                    name="bio" rows="4" 
                    class="w-full p-3 border border-gray-300 rounded-xl focus:ring focus:ring-blue-200 bg-white/50 resize-none"
                    placeholder="Tell us about yourself"></textarea>
                <p class="text-xs text-gray-500 mt-1">Optional - Write a short bio about yourself</p>
            </div>

            <!-- Two columns for password fields -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-gray-600 text-sm font-medium mb-2">Password</label>
                    <input type="password" 
                        name="password" required 
                        class="w-full p-3 border border-gray-300 rounded-xl focus:ring focus:ring-blue-200 bg-white/50"
                        placeholder="Choose a strong password">
                    <p class="text-xs text-gray-500 mt-1">Must be at least 8 characters long</p>
                </div>

                <div>
                    <label class="block text-gray-600 text-sm font-medium mb-2">Confirm Password</label>
                    <input type="password" 
                        name="confirm_password" required 
                        class="w-full p-3 border border-gray-300 rounded-xl focus:ring focus:ring-blue-200 bg-white/50"
                        placeholder="Confirm your password">
                </div>
            </div>

            <!-- Submit Button -->
            <button type="submit"
                class="w-full bg-blue-600 text-white p-4 rounded-xl hover:bg-blue-700 transition shadow-lg text-lg font-semibold mt-6">
                Create Account
            </button>
        </form>
            <!-- Login Link -->
            <div class="text-center text-sm text-gray-600 mt-4">
                Already have an account? 
                <a href="/broadcast/login/" class="text-blue-600 hover:underline font-medium">
                    Login
                </a>
            </div>
        </div>
     </div>
    </body>
</html>
