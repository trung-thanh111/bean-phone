<!DOCTYPE html>
<html lang="vi">

<head>
    @include('backend.dashboard.component.head')
</head>
<body id="page-top">
    <div id="wrapper">
        <!-- Sidebar -->
        @include('backend.dashboard.component.sidebar')
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <!-- Topbar -->
                @include('backend.dashboard.component.navbar')
                <!-- Main Content -->
                @include($template)
            </div>
            <!-- Footer -->
            @include('backend.dashboard.component.footer')
        </div>
    </div>
    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>
    @include('backend.dashboard.component.script')
    
</body>

</html>
