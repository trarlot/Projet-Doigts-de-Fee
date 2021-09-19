<?php
function remove_cookies()
{
    foreach ($_COOKIE as $cookie_name => $cookie_value) {
        if ($cookie_name != 'PHPSESSID') {
            unset($_COOKIE[$cookie_name]);
            setcookie($cookie_name, '', time() - 2000, '/');
        }
    }
}
