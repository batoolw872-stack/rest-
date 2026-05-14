<?php
session_start();

// Sab session variables hata do
session_unset();
session_destroy();

// Optional: cookie bhi clear kar dein
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// Redirect user to home page (index.php)
header('Location: ./index.php');
exit();
?>
