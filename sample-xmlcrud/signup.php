<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $newUsername = $_POST['username'];
    $newPassword = $_POST['password'];

    $xml = simplexml_load_file("users.xml");

    // Check if username already exists
    foreach ($xml->user as $user) {
        if ($user->username == $newUsername) {
            echo "❌ Username already exists.";
            exit;
        }
    }

    // Add new user
    $newUser = $xml->addChild('user');
    $newUser->addChild('username', $newUsername);
    $newUser->addChild('password', $newPassword);

    // Save back to file
    $xml->asXML("users.xml");

    echo "✅ Signup successful. You can now <a href='index.php'>LOGIN</a>.";
}
?>
