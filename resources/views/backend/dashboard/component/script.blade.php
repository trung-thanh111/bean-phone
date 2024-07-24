<!-- Bootstrap core JavaScript-->
<script src="/backend/vendor/jquery/jquery.min.js"></script>
<script src="/backend/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Core plugin JavaScript-->
<script src="/backend/vendor/jquery-easing/jquery.easing.min.js"></script>
<!-- Custom scripts for all pages-->
<script src="/backend/js/sb-admin-2.min.js"></script>
<!-- Page level plugins -->
<script src="/backend/vendor/chart.js/Chart.min.js"></script>\
<!-- Page level custom scripts -->
<script src="/backend/js/demo/chart-area-demo.js"></script>
<script src="/backend/js/demo/chart-pie-demo.js"></script>
{{-- jquery --}}
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
<!-- select2 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
{{-- ckeditor 4 --}}
<script src="https://cdn.ckeditor.com/4.22.1/standard-all/ckeditor.js"></script>
<script src="/fontend/js/ckeditor.js"></script>

<script>
    $(document).ready(function() {
        $(".setupSelect2").select2();
        // Thêm các tùy chọn của bạn vào đây.
    });
</script>
{{-- <script>
    document.addEventListener('DOMContentLoaded', function () {
        const productSelect = document.getElementById('productSelect');
        const postSelect = document.getElementById('postSelect');
    
        productSelect.addEventListener('change', function () {
            if (this.value != "0") {
                postSelect.disabled = true;
            } else {
                postSelect.disabled = false;
            }
        });
    
        postSelect.addEventListener('change', function () {
            if (this.value != "0") {
                productSelect.disabled = true;
            } else {
                productSelect.disabled = false;
            }
        });
    });
    </script> --}}