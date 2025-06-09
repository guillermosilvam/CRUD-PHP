const reportesBtn = document.getElementById('reportes-btn');
const reportesSubmenu = document.getElementById('reportes-submenu');
const reportesMenuContainer = document.getElementById('reportes-menu-container');

if (reportesBtn && reportesSubmenu && reportesMenuContainer) {
    reportesBtn.addEventListener('click', function(e) {
        e.preventDefault();
        reportesSubmenu.classList.toggle('opacity-0');
        reportesSubmenu.classList.toggle('invisible');
    });

    document.addEventListener('click', function(e) {
        if (!reportesMenuContainer.contains(e.target)) {
            reportesSubmenu.classList.add('opacity-0', 'invisible');
        }
    });
}
