// Init ckeditor4
if(document.getElementById('editor')) {
    CKEDITOR.replace('editor');
}

// Preview thumbnail for post
function imagePreview (inputThumb, preview) {
    const oFReader = new FileReader();
    oFReader.readAsDataURL(inputThumb.files[0]);

    oFReader.onload = function(oFREvent) {
        preview.src = oFREvent.target.result;
        preview.classList.add("h-fit", "w-full");
    }
}

// Menu navigation active state
document.querySelectorAll('nav .nav-link').forEach(function(e) {
    if(e.pathname == window.location.pathname) {
        e.classList.add("active");
    }
});


