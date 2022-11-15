const btnMenu = document.getElementById('sidebar-toggler');
const sidebarMenu = document.querySelectorAll('#sidebarMenu .nav-link');

// Button Menu Sidebar Toggle 
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

sidebarMenu.forEach(element => {
    let e = element;

    if(e.children[1].innerHTML == document.title) {
        e.classList.add("active")
    }
});