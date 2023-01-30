// $(document).ready(function() {
//     // Sidebar menu navigation active state
//     $('#sidebarMenu .nav-link').each(function() {
//         if($(this).text().trim() == document.title) {
//             $(this).addClass("active");
//         } 
//     })

    
//     // Summernote setting
//     $('#summernote').summernote({
//         placeholder: 'Write here ....',
//         theme: 'monokai',
//         tabsize: 2,
//         minHeight: 700,
//         toolbar: [
//             ['style', ['style']],
//             ['font', ['bold', 'italic', 'underline', 'fontsize']],
//             ['para', ['ul', 'ol', 'paragraph', 'height']],
//             ['insert', ['link', 'picture']],
//             ['misc', ['undo', 'redo']],
//             ['view', ['help', 'codeview']]
//         ],
//         codeviewFilter: false,
//         codeviewIframeFilter: true
//     });


//     // Sign that thumblnail has been selected for post
//     $('#thumbnail').change(function(e) {
//         const fileList = e.target.files;
//         $('.label-thumbnail small').text(fileList[0].name);
//         console.log(fileList[0].name);
//     });
// });


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


