<?php
function authCheck()
{
    if (!isset($_SESSION['user'])){
        header('location: index.php?a=getLoginForm&r=auth');
        exit;
    }
}