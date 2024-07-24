<ul class="navbar-nav  sidebar sidebar-dark accordion position-sticky" id="accordionSidebar"
    style="background-color:rgb(33, 37, 41) !important;">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon font-weight-bold">
            <i class="fa-solid fa-b" style="color: #dea003;"></i>
        </div>
        <!-- logo  -->
        <div class="sidebar-brand-text mx-3">
            <img src="/backend/img/logo.webp" alt="" width="140">
        </div>
    </a>
    <li class="nav-item {{ Route::currentRouteName() == 'dashboard' ? 'active' : '' }} mb-3">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span class="font-weight-bold">Dashboard</span></a>
    </li>
    <div class="sidebar-heading">
        Quản lý
    </div>
    <!-- Nav Item - Pages Collapse Menu -->
    <li
        class="nav-item {{ Route::currentRouteName() == 'admin.product' ||
        Route::currentRouteName() == 'admin.brands' ||
        Route::currentRouteName() == 'admin.product.catalogues' ||
        Route::currentRouteName() == 'product.catalogue.create' ||
        Route::currentRouteName() == 'product.catalogue.update' ||
        Route::currentRouteName() == 'product.catalogue.delete' ||
        Route::currentRouteName() == 'product.create' ||
        Route::currentRouteName() == 'product.update' ||
        Route::currentRouteName() == 'product.delete' ||
        Route::currentRouteName() == 'brand.create' ||
        Route::currentRouteName() == 'brand.update' ||
        Route::currentRouteName() == 'brand.delete'
            ? 'active'
            : '' }}">
        <a class="nav-link collapsed" href="{{ route('admin.product') }}" data-toggle="collapse"
            data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
            <i class="fa-brands fa-product-hunt"></i>
            <span class="font-weight-bold">Sản phẩm</span>
        </a>
        <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Thực Hiện CRUD</h6>
                <a class="collapse-item" href="{{ route('admin.product') }}"><i
                        class="fa-solid fa-list-ol mr-2"></i>Danh sách sản phẩm</a>
                <a class="collapse-item" href="{{ route('admin.product.catalogues') }}"> <i
                        class="fa-solid fa-layer-group mr-2"></i>Nhóm sản phẩm</a>
                <a class="collapse-item" href="{{ route('admin.brands') }}"><i
                        class="fa-brands fa-font-awesome mr-2"></i>Thương hiệu</a>
                <a class="collapse-item" href="{{ route('product.create') }}"> <i class="fa-solid fa-plus mr-2"></i>Thêm
                    mới</a>
            </div>
        </div>
    </li>
    <li
        class="nav-item {{ Route::currentRouteName() == 'admin.users' ||
        Route::currentRouteName() == 'admin.user.catalogues' ||
        Route::currentRouteName() == 'user.catalogue.create' ||
        Route::currentRouteName() == 'user.catalogue.update' ||
        Route::currentRouteName() == 'user.catalogue.delete' ||
        Route::currentRouteName() == 'user.create' ||
        Route::currentRouteName() == 'user.update' ||
        Route::currentRouteName() == 'user.delete'
            ? 'active'
            : '' }}">
        <a class="nav-link collapsed" href="{{ route('admin.users') }}" data-toggle="collapse"
            data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fa-solid fa-users"></i>
            <span class="font-weight-bold">Thành viên</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Thực Hiện CRUD</h6>
                <a class="collapse-item" href="{{ route('admin.users') }}"><i class="fa-solid fa-list-ol mr-2"></i>Danh
                    sách thành viên</a>
                <a class="collapse-item" href="{{ route('admin.user.catalogues') }}"><i
                        class="fa-solid fa-user-group mr-2"></i>Nhóm thành viên</a>
                <a class="collapse-item" href="{{ route('user.create') }}"> <i class="fa-solid fa-plus mr-2"></i>Thêm
                    mới</a>
            </div>
        </div>
    </li>
    <li
        class="nav-item {{ Route::currentRouteName() == 'admin.posts' ||
        Route::currentRouteName() == 'admin.post.catalogues' ||
        Route::currentRouteName() == 'post.catalogue.create' ||
        Route::currentRouteName() == 'post.catalogue.update' ||
        Route::currentRouteName() == 'post.catalogue.delete' ||
        Route::currentRouteName() == 'post.create' ||
        Route::currentRouteName() == 'post.update' ||
        Route::currentRouteName() == 'post.delete'
            ? 'active'
            : '' }}">
        <a class="nav-link collapsed" href="{{ route('admin.posts') }}" data-toggle="collapse"
            data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
            <i class="fa-brands fa-ioxhost"></i>
            <span class="font-weight-bold">Bài viết</span>
        </a>
        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Thực Hiện CRUD</h6>
                <a class="collapse-item" href="{{ route('admin.posts') }}"><i class="fa-solid fa-list-ol mr-2"></i>Danh
                    sách bài viết</a>
                <a class="collapse-item" href="{{ route('admin.post.catalogues') }}"><i
                        class="fa-solid fa-signs-post mr-2"></i>Nhóm bài viết</a>
                <a class="collapse-item" href="{{ route('post.create') }}"> <i class="fa-solid fa-plus mr-2"></i>Thêm
                    mới</a>
            </div>
        </div>
    </li>
    <li
        class="nav-item {{ Route::currentRouteName() == 'admin.orders' ||
        Route::currentRouteName() == 'order.create' ||
        Route::currentRouteName() == 'order.update' ||
        Route::currentRouteName() == 'order.delete' || 
        Route::currentRouteName() == 'order.detail'
            ? 'active'
            : '' }}">
        <a class="nav-link collapsed" href="{{ route('admin.orders') }}" data-toggle="collapse"
            data-target="#collapseFor" aria-expanded="true" aria-controls="collapseFor">
            <i class="fa-solid fa-clapperboard"></i>
            <span class="font-weight-bold">Đơn hàng</span>
        </a>
        <div id="collapseFor" class="collapse" aria-labelledby="headingFor" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Thông tin đơn hàng</h6>
                <a class="collapse-item" href="{{ route('admin.orders') }}"><i
                        class="fa-solid fa-list-ol mr-2"></i>Danh
                    sách đơn hàng</a>
                <a class="collapse-item" href="{{ route('post.create') }}"> <i
                        class="fa-solid fa-plus mr-2"></i>Thêm
                    mới</a>
            </div>
        </div>
    </li>
    <li
        class="nav-item {{ Route::currentRouteName() == 'admin.comments' ||
        Route::currentRouteName() == 'comment.create' ||
        Route::currentRouteName() == 'comment.update' ||
        Route::currentRouteName() == 'comment.delete'
            ? 'active'
            : '' }}">
        <a class="nav-link collapsed" href="{{ route('admin.comments') }}" data-toggle="collapse"
            data-target="#collapseFive" aria-expanded="true" aria-controls="collapseFive">
            <i class="fa-solid fa-comments"></i>
            <span class="font-weight-bold">Bình Luận</span>
        </a>
        <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Thực Hiện CRUD</h6>
                <a class="collapse-item" href="{{ route('admin.comments') }}"><i
                        class="fa-solid fa-list-ol mr-2"></i>Danh
                    sách bình luận</a>
                <a class="collapse-item" href="{{ route('comment.create') }}"> <i
                        class="fa-solid fa-plus mr-2"></i>Thêm
                    mới</a>
            </div>
        </div>
    </li>
    <li
        class="nav-item {{ Route::currentRouteName() == 'admin.banners' ||
        Route::currentRouteName() == 'banner.create' ||
        Route::currentRouteName() == 'banner.update' ||
        Route::currentRouteName() == 'banner.delete'
            ? 'active'
            : '' }}">
        <a class="nav-link collapsed" href="{{ route('admin.banners') }}" data-toggle="collapse"
            data-target="#collapseSix" aria-expanded="true" aria-controls="collapseSix">
            <i class="fa-brands fa-slideshare"></i>
            <span class="font-weight-bold">Banner</span>
        </a>
        <div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Thực Hiện CRUD</h6>
                <a class="collapse-item" href="{{ route('admin.banners') }}"><i
                        class="fa-solid fa-list-ol mr-2"></i>Danh
                    sách banner</a>
                <a class="collapse-item" href="{{ route('banner.create') }}"> <i
                        class="fa-solid fa-plus mr-2"></i>Thêm
                    mới</a>
            </div>
        </div>
    </li>
    <li
        class="nav-item {{ Route::currentRouteName() == 'admin.albums' ||
        Route::currentRouteName() == 'album.create' ||
        Route::currentRouteName() == 'album.update' ||
        Route::currentRouteName() == 'album.delete'
            ? 'active'
            : '' }}">
        <a class="nav-link collapsed" href="{{ route('admin.albums') }}" data-toggle="collapse"
            data-target="#collapseSeven" aria-expanded="true" aria-controls="collapseSeven">
            <i class="fa-brands fa-slideshare"></i>
            <span class="font-weight-bold">Albums </span>
        </a>
        <div id="collapseSeven" class="collapse" aria-labelledby="headingSeven" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Thực Hiện CRUD</h6>
                <a class="collapse-item" href="{{ route('admin.albums') }}"><i
                        class="fa-solid fa-list-ol mr-2"></i>Album sản phẩm</a>
                <a class="collapse-item" href="{{ route('album.create') }}"> <i
                        class="fa-solid fa-plus mr-2"></i>Thêm
                    mới</a>
            </div>
        </div>
    </li>
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>
