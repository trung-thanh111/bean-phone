$(document).ready(function() {
    $('#sortSelect').change(function() {
        var selectedOption = $(this).val();
        // Gửi request AJAX để lấy danh sách sản phẩm tương ứng
        $.ajax({
            url: '/get-products', // Đường dẫn đến route xử lý request này trong Laravel
            type: 'GET',
            data: {
                sortOption: selectedOption
            },
            success: function(response) {
                $('#productList').html(response);
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    });
});