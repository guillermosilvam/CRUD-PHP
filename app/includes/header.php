<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/server/static/assets/output.css"/>
    <link rel="stylesheet" href="/server/static/assets/darkmode.css"/>
    <!-- FONT AWESOME -->
     <script src="https://kit.fontawesome.com/d18d0907ae.js" crossorigin="anonymous"></script>
     <title>PHP CRUD</title>
</head>
<body class="bg-[#f2f2f2] overflow-x-hidden">
<script>
// Modo oscuro global para todo el proyecto
(function() {
    function getCookie(name) {
        const value = `; ${document.cookie}`;
        const parts = value.split(`; ${name}=`);
        if (parts.length === 2) return parts.pop().split(';').shift();
    }
    if (getCookie('darkmode') === '1') {
        document.documentElement.classList.add('dark');
    }
})();
</script>
    <script>
    // Switch para modo oscuro global (puedes ponerlo en la navbar o donde quieras)
    function setDarkModePHP(enabled) {
        fetch('/server/app/controllers/cookie/set_darkmode.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
            body: 'darkmode=' + (enabled ? '1' : '0')
        }).then(() => {
            if (enabled) {
                document.documentElement.classList.add('dark');
            } else {
                document.documentElement.classList.remove('dark');
            }
        });
    }
    </script>
    <script src="/server/static/scripts/darkMode.js"></script>