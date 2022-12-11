$(document).ready(function() {
    // Sidebar menu navigation active state
    $('#sidebarMenu .nav-link').each(function() {
        if($(this).text().trim() == document.title) {
            $(this).addClass("active");
        } 
    })

    
    // Summernote setting
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


    // Sign that thumblnail has been selected for post
    $('#thumbnail').change(function(e) {
        const fileList = e.target.files;
        $('.label-thumbnail small').text(fileList[0].name);
        console.log(fileList[0].name);
    });
});
