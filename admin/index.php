<?php
session_start();

$dataFile = __DIR__ . '/../data/content.json';

// Simple password protection
$password = 'admin123'; // CHANGE THIS PASSWORD
$error = '';

if (isset($_POST['login'])) {
    if ($_POST['password'] === $password) {
        $_SESSION['loggedin'] = true;
    } else {
        $error = 'Invalid password';
    }
}

if (isset($_GET['logout'])) {
    session_destroy();
    header('Location: index.php');
    exit;
}

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-100 flex items-center justify-center min-h-screen">
    <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-sm">
        <h1 class="text-2xl font-bold mb-6 text-center text-slate-800">Admin Login</h1>
        <?php if ($error): ?>
            <p class="text-red-500 text-sm mb-4 text-center"><?php echo $error; ?></p>
        <?php endif; ?>
        <form method="post">
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="password">Password</label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="password" type="password" name="password" required>
            </div>
            <div class="flex items-center justify-between">
                <button class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline w-full" type="submit" name="login">
                    Sign In
                </button>
            </div>
        </form>
    </div>
</body>
</html>
<?php
    exit;
}

// Handle Save
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['save_data'])) {
    $newData = json_decode($_POST['json_data'], true);
    if ($newData !== null) {
        file_put_contents($dataFile, json_encode($newData, JSON_PRETTY_PRINT));
        $success = "Data saved successfully!";
    } else {
        $error = "Invalid JSON data.";
    }
}

// Read Data
$currentData = file_get_contents($dataFile);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/monaco-editor/0.30.1/min/vs/loader.min.js"></script>
</head>
<body class="bg-slate-50 text-slate-900 font-sans">
    <nav class="bg-slate-900 text-white p-4">
        <div class="container mx-auto flex justify-between items-center">
            <span class="text-xl font-bold">Portfolio Admin</span>
            <a href="?logout=true" class="text-sm bg-red-600 px-3 py-1 rounded hover:bg-red-700">Logout</a>
        </div>
    </nav>

    <div class="container mx-auto p-6">
        <?php if (isset($success)): ?>
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                <?php echo $success; ?>
            </div>
        <?php endif; ?>
        <?php if (isset($error) && $error): ?>
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                <?php echo $error; ?>
            </div>
        <?php endif; ?>

        <div class="bg-white rounded-lg shadow-md p-6">
            <h2 class="text-lg font-semibold mb-4">Edit Content (JSON)</h2>
            <p class="text-sm text-gray-600 mb-4">Directly edit the JSON structure below. Be careful with syntax.</p>
            
            <form method="post" id="editForm">
                <input type="hidden" name="save_data" value="1">
                <input type="hidden" name="json_data" id="jsonDataInput">
                
                <div id="editor" style="height: 600px; border: 1px solid #e2e8f0; border-radius: 0.5rem;"></div>

                <div class="mt-6 flex justify-end">
                    <button type="button" onclick="submitForm()" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded focus:outline-none focus:shadow-outline">
                        Save Changes
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        require.config({ paths: { 'vs': 'https://cdnjs.cloudflare.com/ajax/libs/monaco-editor/0.30.1/min/vs' }});
        require(['vs/editor/editor.main'], function() {
            window.editor = monaco.editor.create(document.getElementById('editor'), {
                value: <?php echo json_encode($currentData); ?>,
                language: 'json',
                theme: 'vs-light',
                automaticLayout: true
            });
        });

        function submitForm() {
            const value = window.editor.getValue();
            document.getElementById('jsonDataInput').value = value;
            document.getElementById('editForm').submit();
        }
    </script>
</body>
</html>
