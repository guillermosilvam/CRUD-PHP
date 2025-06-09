<?php
// Recibe POST { darkmode: 1 | 0 } y guarda la cookie
if (isset($_POST['darkmode'])) {
    $value = ($_POST['darkmode'] == '1') ? '1' : '0';
    setcookie('darkmode', $value, time() + 60*60*24*365, "/"); // 1 año
    echo 'ok';
    exit;
}
http_response_code(400);
echo 'error';
