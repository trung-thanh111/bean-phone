document.addEventListener("DOMContentLoaded", function() {
    // Tìm tất cả các phần tử textarea có class 'ckeditor'
    var textareas = document.querySelectorAll('textarea.ckeditor');
    // Khởi tạo CKEditor cho từng phần tử
    textareas.forEach(function(textarea) {
        var height = textarea.getAttribute('data-height');
        CKEDITOR.replace(textarea, {
            height: height ? height : 'auto', 
            extraPlugins: 'editorplaceholder',
            editorplaceholder: 'Start typing here...',
            removeButtons: 'PasteFromWord'
        });
    });
});