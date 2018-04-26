<?php

include 'models/auth.php';


function getLoginForm()
{
    return [
        'view' => 'loginform.php'
    ];
}

function login()
{
    if (!isset($_POST['email']) || !isset($_POST['password'])) {
        header('Location: index.php?a=getLoginForm&r=auth');
        exit;
    }
    $email = $_POST['email'];
    $password = $_POST['password'];
    $user = authLogin($password, $email);
    if (isset($_SESSION['user'])) {
        unset($_SESSION['user']);
    }

    if ($user) {
        $_SESSION ['user'] = $user;
        header('location: index.html?a=index&r=post');
    } else {
        header('location: index.html?a=getLoginForm&r=auth');
    }
    exit;
}

function logOut()
{
// Initialize the session.
// If you are using session_name("something"), don't forget it now!
    session_start();

// Unset all of the session variables.
    $_SESSION = [];

// If it's desired to kill the session, also delete the session cookie.
// Note: This will destroy the session, and not just the session data!
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', 0,
            $params["path"], $params["domain"],
            $params["secure"], $params["httponly"]
        );
    }

// Finally, destroy the session.
    session_destroy();
    header('location: index.php');
    exit;
}
