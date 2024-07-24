<div class="container">
    <div class="row  p-2 align-items-center">
        <div class="col-2">
            <a class="navbar-brand" href="/"><img class="w-100" src="/fontend/img/logo.webp" alt=""></a>
        </div>
        <div class="col-md-7">
            <form class="d-flex align-items-center" action="{{ route('product.search') }}" method="GET">
                <div class="position-relative w-100">
                    <input class="form-control " type="text" placeholder="Bạn Muốn Tìm Gì ?" name="keyword">
                    <button class="btn btn-outline-success position-absolute top-50 end-0 translate-middle-y"
                        type="submit">
                        <i class="fa-solid fa-magnifying-glass "></i>
                    </button>
                </div>
            </form>

        </div>
        <div class="col-3 text-center align-middle">
            <i class="fa-solid fa-shop"></i>
            <span class="me-4">Store: 28 </span>
            <i class="fa-solid fa-phone"></i>
            <span>Hotline: 1900 1833</span>
        </div>
    </div>

</div>
@php
    $baseUrl = config('app.base_url');
@endphp
<div class="row">
    <nav class="navbar navbar-expand-lg bg-info ">
        <div class="container">
            <div class="collapse navbar-collapse " id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 text-white">
                    <li class="">
                        <a class="btn text-white btn-outline-info fw-medium" href="/">
                            Trang Chủ
                        </a>
                    </li>
                    <li class="nav-item dropdown ">
                        <a class="btn dropdown-toggle text-white btn-outline-info fw-medium"
                            href="{{ $baseUrl }}product" data-bs-toggle="dropdown">
                            Shop
                        </a>
                        <ul class="dropdown-menu bg-info mt-2 ">
                            <li><a class="dropdown-item text-secondary" href="{{ $baseUrl }}product">Tất Cả</a>
                            </li>
                            @foreach ($allCategories as $key => $item)
                                <li><a class="dropdown-item text-secondary"
                                        href="{{ route('product.category', ['id' => $item->id]) }}">{{ $item->name }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                    @foreach ($cateMenu as $key => $item)
                        <li class="nav-item dropdown ">
                            <a class="btn dropdown-toggle text-white btn-outline-info fw-medium" href=""
                                data-bs-toggle="dropdown">
                                {{ $item->name }}
                            </a>
                            <ul class="dropdown-menu bg-info mt-2 ">
                                @foreach ($brandInCates as $key => $val)
                                    @if ($item->id == $val->id)
                                        <li><a class="dropdown-item text-secondary"
                                                href="{{ route('product.brand', ['id' => $val->brandId]) }}">{{ $val->brandName }}</a>
                                        </li>
                                    @endif
                                @endforeach

                            </ul>
                        </li>
                    @endforeach
                    <li class="nav-item dropdown ">
                        <a class="btn dropdown-toggle text-white btn-outline-info fw-medium" href="/about">
                            Giới Thiệu
                        </a>
                    </li>
                    <li class="nav-item dropdown ">
                        <a class="btn dropdown-toggle text-white btn-outline-info fw-medium" href="/post">
                            Bài Viết
                        </a>
                    </li>
                    <li class="nav-item dropdown ">
                        <a class="btn dropdown-toggle text-white btn-outline-info fw-medium" href="/contact">
                            Liên Hệ
                        </a>
                    </li>
                </ul>
                <ul class="navbar-nav ">
                    <li class="nav-item text-secondary rounded-3 bg-light p-md-2 ">
                        <div class="heart">
                            <a class=" text-secondary icon-link-hover fw-light"
                                style="--bs-icon-link-transform: translate3d(0, -.125rem, 0);" href="#!whistlist">
                                <i class="fa-regular fa-heart fs-4" data-bs-toggle="tooltip"
                                    data-bs-title="Yêu thích"></i>
                            </a>
                        </div>
                    </li>
                    <li class="nav-item rounded-3 bg-light p-md-2 me-3 ms-3">
                        <div class="cart position-relative">
                            <a class=" text-secondary icon-link-hover fw-light"
                                style="--bs-icon-link-transform: translate3d(0, -.125rem, 0);" href="/cart">
                                <i class="fa-solid fa-cart-shopping fs-4" data-bs-toggle="tooltip"
                                    data-bs-title="Giỏ hàng"></i>
                            </a>
                            <div class="position-absolute top-0 start-100 translate-middle ms-1 mt-2">
                                <p class="fz-16 fw-bold text-success">{{ $countOrders }}</p>
                            </div>
                        </div>
                    </li>
                    @if (Auth::id() == 0)
                        <li class="nav-item text-secondary rounded-3 bg-light p-md-2 rounded-3 bg-light p-md-2">
                            <div class="account">
                                <a class=" text-secondary icon-link-hover fw-light"
                                    style="--bs-icon-link-transform: translate3d(0, -.125rem, 0);" href="/register">
                                    <i class="fa-regular fa-user fs-4" data-bs-toggle="tooltip"
                                        data-bs-title="Đăng nhập"></i>
                                </a>
                            </div>
                        </li>
                    @else
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle p-0" href="#" id="userDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <img class="img-profile rounded-circle"
                                    src="/fontend/img/{{ Auth::user()->image ?? 'avt-conan.jpg' }}" alt=""
                                    width="40" height="40">
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end shadow animated--grow-in fz-14"
                                aria-labelledby="userDropdown">
                                <li>
                                    <a class="dropdown-item" href="/profile">
                                        <i class="fas fa-user mr-2 fa-sm text-secondary"></i>
                                        Tài khoản
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="#">
                                        <i class="fa-solid fa-key mr-2 fa-sm text-secondary"></i>
                                        Đổi mật khẩu
                                    </a>
                                </li>
                                @if (Auth::id() < 3)
                                    <li>
                                        <a class="dropdown-item" href="/dashboard">
                                            <i class="fa-solid fa-user-tie mr-2 fa-sm text-secondary"></i>
                                            Quản trị
                                        </a>
                                    </li>
                                @else
                                @endif
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li>
                                    <a class="dropdown-item" href="#"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <i class="fas fa-sign-out-alt fa-sm mr-2 fa-sm text-secondary"></i>
                                        Đăng Xuất
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
</div>
