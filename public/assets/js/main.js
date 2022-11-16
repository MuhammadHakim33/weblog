const btnMenu = document.getElementById('sidebar-toggler');
const sidebarMenu = document.querySelectorAll('#sidebarMenu .nav-link');

// Button menu sidebar toggle
btnMenu.addEventListener('click', function() {
    let btn = this.children[0];

    if(btn.classList.contains('ri-menu-line')) {
        btn.classList.remove('ri-menu-line');
        btn.classList.add('ri-close-line');
    } else {
        btn.classList.remove('ri-close-line');
        btn.classList.add('ri-menu-line');
    }
});

// Sidebar menu navigation active state
sidebarMenu.forEach(element => {
    if(element.textContent.trim() == document.title) {
        element.classList.add("active");
    } 
});