const Delta = Quill.import('delta');
// quill js initialize
if(document.getElementById('editor')) {
    // quill config
    var quill = new Quill(editor, {
        theme: 'snow',
        modules: {
            toolbar: '#toolbar',
        },
        placeholder: 'write here....'
    });

    // input old
    const input = document.querySelector('input[name=body]'); 
    if(input.value) {
        quill.setContents(JSON.parse(input.value));
    }
}

// Form submit for quill js
// because quill editor using div tag instead of textarea or input, 
// so we must create hidden input and add some value that we have write on quill editor
function postSubmit(body) {
    body.value = JSON.stringify(quill.getContents());
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
    if(e.href == window.location.href) {
        e.classList.add("active");
    }
});


