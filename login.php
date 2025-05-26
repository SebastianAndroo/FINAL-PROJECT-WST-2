<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $inputUsername = $_POST['username'];
    $inputPassword = $_POST['password'];

    $xml = simplexml_load_file("users.xml");

    $found = false;
    foreach ($xml->user as $user) {
        if ($user->username == $inputUsername && $user->password == $inputPassword) {
            $found = true;
            break;
        }
    }

    if ($found) {
        // Start a session to remember user (optional)
        session_start();
        $_SESSION['username'] = $inputUsername;

        // ✅ Redirect to home.php
        header("Location: home.php");
        exit();
    } else {
        echo "❌ Invalid username or password. <br><a href='index.php'>Try again</a>";
    }
}
?>
