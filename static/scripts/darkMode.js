// darkMode.js - Módulo para gestionar el modo oscuro en todo el proyecto
(function() {
    function getCookie(name) {
        const value = `; ${document.cookie}`;
        const parts = value.split(`; ${name}=`);
        if (parts.length === 2) return parts.pop().split(';').shift();
    }
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
    // Inicializar estado del switch si existe
    document.addEventListener('DOMContentLoaded', function() {
        const switchMode = document.getElementById('switchMode');
        if (switchMode) {
            if (getCookie('darkmode') === '1') {
                switchMode.checked = true;
            }
            switchMode.addEventListener('change', function() {
                setDarkModePHP(this.checked);
            });
        }
        // Aplicar modo oscuro al cargar
        if (getCookie('darkmode') === '1') {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
    });
    // Exportar función global si se requiere en otros scripts
    window.setDarkModePHP = setDarkModePHP;
})();
