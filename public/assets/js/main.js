const btnMenu = document.getElementById('sidebar-toggler');
const sidebarMenu = document.querySelectorAll('#sidebarMenu .nav-link');
const inputThumb = document.getElementById('thumbnail');
const labelThumb = document.querySelector('.label-thumbnail small');

// Button menu sidebar toggle
if(typeof(sidebarMenu) == 'undefined') {
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
}

// Sidebar menu navigation active state
sidebarMenu.forEach(element => {
    if(element.textContent.trim() == document.title) {
        element.classList.add("active");
    } 
});

// Summernote setting
$(document).ready(function() {
    $('#summernote').summernote({
        placeholder: 'Write here ....',
        theme: 'monokai',
        tabsize: 2,
        minHeight: 700,
        toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'italic', 'underline', 'fontsize']],
            ['para', ['ul', 'ol', 'paragraph', 'height']],
            ['insert', ['link', 'picture']],
            ['misc', ['undo', 'redo']],
            ['view', ['help', 'codeview']]
        ],
        codeviewFilter: false,
        codeviewIframeFilter: true
    });
});

// Sign that thumblnail has been selected for post
inputThumb.addEventListener('change', function(e) {
    const fileList = e.target.files;
    labelThumb.textContent = fileList[0].name;
}, false)


