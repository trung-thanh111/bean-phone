<div class="container mt-3">
    <div class="row ">
        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 col-12">
            <div id="carouselExample" class="carousel slide ">
                <div class="carousel-inner">
                    @php
                        $albumMains = json_decode(str_replace("'", '"', $banners->albums), true);
                    @endphp
                    @foreach ($albumMains as $key => $album)
                        <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                            <img src="{{ asset('upload/banner/' . $album) }}" class="d-block w-100 rounded-1" alt="Banner Home" width="966" height="378">
                        </div>
                    @endforeach
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExample"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
                <div class="row bg-white rounded-bottom-1 p-md-2 w-100" style="margin-left:1px">
                    <div class="col-4 swiper-slide swiper-slide-visible swiper-slide-active swiper-slide-thumb-active">
                        <div class="title_one_slide fs-6"> Galaxy A13 Bản 5G <br>
                            Cam kết giá rẻ</div>
                    </div>
                    <div class="col-4 swiper-slide swiper-slide-visible swiper-slide-active swiper-slide-thumb-active">
                        <div class="title_one_slide"> Galaxy A13 Bản 5G <br>
                            Cam kết giá rẻ</div>
                    </div>
                    <div class="col-4 swiper-slide swiper-slide-visible swiper-slide-active swiper-slide-thumb-active">
                        <div class="title_one_slide"> Galaxy A14 Bản 5G <br>
                            Cam kết giá rẻ</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 col-12">
            @php
                $albumSubs = json_decode(str_replace("'", '"', $bannerSubs->albums), true);
            @endphp

            @foreach ($albumSubs as $key => $album)
                    <img src="{{ asset('upload/banner/' . $album) }}" class="d-block w-100 mb-3 object-fit-cover rounded-1" alt="Banner Sub Home" width="306" height="135">
            @endforeach
        </div>
    </div>

    <div class="row text-center ms-1 mt-3" style="width: 100%;">
        <div class="col d-flex justify-content-center rounded-3 bg-white border m-3 p-3  ">
            <i class="fa-solid fa-truck-fast fs-1 text-info-emphasis"></i>
            <span class="ms-2" style="color: var(--mainColor);">
                Vận chuyển <strong>Miễn Phí</strong> <br>
                Trong khu vực <strong>TP.HCM</strong>
            </span>
        </div>
        <div class="col d-flex justify-content-center rounded-3 bg-white border m-3 p-3  ">
            <i class="fa-solid fa-box fs-1 text-info-emphasis"></i>
            <span class="ms-2" style="color: var(--mainColor);">
                Đổi trả <strong>Miễn Phí</strong> <br>
                Trong vòng <strong>30 ngày</strong>
            </span>
        </div>
        <div class="col d-flex justify-content-center rounded-3 bg-white border m-3 p-3  ">
            <i class="fa-solid fa-credit-card fs-1 text-info-emphasis"></i>
            <span class="ms-2" style="color: var(--mainColor);">
                Tiến hành <strong>Thanh toán</strong> <br>
                Với nhiều <strong>Phương thức</strong>
            </span>
        </div>
        <div class="col d-flex justify-content-center rounded-3 bg-white border m-3 p-3  ">
            <i class="fa-solid fa-hand-holding-dollar fs-1 text-info-emphasis"></i>
            <span class="ms-2" style="color: var(--mainColor);">
                <strong>100% Hoàn tiền</strong> <br>
                Nếu sản phẩm lỗi
            </span>

        </div>
    </div>
</div>
<div class="container mt-5 ">
    <h3 class="text-info text-center ">Thương Hiệu HOT</h3>
    <div class="row mb-5 mt-5">
        @foreach ($brands as $key => $item)
            <div class="col p-0 m-0">
                <img src="/fontend/img/{{ $item->image }}" class="rounded object-fit-cover border-3 scale-hover"
                    alt="" width="150px" height="150px"> <br>
                <h5 class="text-center mt-2">
                    <a href="{{ route('product.brand', ['id' => $item->id]) }}"
                        class="text-color-hover ">{{ $item->name }}</a>
                </h5>
            </div>
        @endforeach
    </div>
    <div class="container product-sales sct-color rounded pb-3">
        <div class="row p-3 text-white ">
            <div class="col-4 d-flex mt-3 ">
                <i class="fa-solid fa-bolt text-warning" style="font-size: 60px;"></i>
                <div class="afitication-deal">
                    <h3 class="text-warning">GIỜ VANG DEAL SỐC</h3>
                    <span class="d-flex ">Kết thúc trong
                        <p class="p-1 m-2 mb-2 text-bg-dark text-center rounded fw-bold"> 05</p>
                        <p class="p-1 m-2 mb-2 text-bg-dark text-center rounded fw-bold"> 12</p>
                        <p class="p-1 m-2 mb-2 text-bg-dark text-center rounded fw-bold"> 43</p>
                    </span>
                </div>
            </div>
            <div class="col-4 fw-bolder  text-center">
                <h5>12:00 - 14:00</h5>
                <span>Đang diễn ra</span>
            </div>
            <div class="col-4 fw-bolder text-center">
                <h5>16:00 - 23:00</h5>
                <span>Sắp diễn ra</span>
            </div>
        </div>
        <div class="row me-4 mb-2 justify-content-around">
            @foreach ($productDeals as $key => $item)
                <div class="col-2 p-0">
                    <div class="card shadow">
                        <div class="head-card d-flex p-2">
                            <span
                                class="text-bg-danger rounded-end ps-2 pe-2 pt-1 fz-10 {{ $item->del == 0 ? 'hidden' : '' }}">
                                {{ $item->del != 0 ? number_format((($item->del - $item->price) / $item->del) * 100, 1) . '%' : '' }}
                            </span>
                            <span class="ms-auto"><i class="fa-regular fa-heart "></i></span>
                        </div>
                        <img src="/fontend/img/{{ $item->image }}" class="card-img-top object-fit-cover scale-hover"
                            alt="..." width="231" height="231">
                        <span
                            class="text-white ms-2 mt-4  ps-3 pe-3  rounded-pill position-absolute fz-14 top-50  start-0 translate-middle-y"
                            style="background-color: var(--subColor); ">
                            {{ $item->hot == 1 ? 'Sản Phẩm Hot' : '' }}
                        </span>

                        <div class="card-body p-2">
                            <h6 class="fw-light" style="height: 40px;">
                                <a href="{{ route('product.detail', ['id' => $item->id]) }}"
                                    class="text-break w-100 text-hover fw-medium">{{ $item->title }}</a>
                                </h5>
                                <div class="d-flex ">
                                    <span class="text-danger">{{ number_format($item->price, 0, ',', '.') }} VNĐ<br>
                                        <del
                                            class="text-secondary fz-14 text-decoration-line-through w-100 {{ $item->del == 0 ? 'hidden' : '' }}">
                                            {{ number_format($item->del, 0, ',', '.') }} VNĐ
                                        </del>
                                    </span>
                                    <span class="ms-auto align-middle">
                                        <form action="{{ route('cart.store') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="product_id" value="{{ $item->id }}">
                                            <input type="hidden" name="price" value="{{ $item->price }}">
                                            <input type="hidden" name="quantity" value="1">
                                            <button type="submit" class="btn btn-link p-0"><i
                                                    class="fa-solid fa-cart-plus p-2 bg-info rounded text-white scale-hover"></i></button>
                                        </form>
                                    </span>
                                </div>
                                <p
                                    class="card-text mb-2 mt-2  bg-success p-0 rounded-pill fz-10 text-center text-white">
                                    Đã bán {{ $item->sold }} sản phẩm
                                </p>
                                <p class="card-text bg-light p-0 rounded fz-10 text-center text-dark pt-1 pb-1 {{ $item->gift == '' ? 'hidden' : '' }}"
                                    style="height: 30px">{{ $item->gift }}</p>
                                <div class="head-card d-flex p-0">
                                    @php
                                        $rating = $item->rate;
                                        $fullStar = floor($rating);
                                        $halfStar = $rating - $fullStar;
                                    @endphp
                                    <span class="fz-14 ">
                                        <div class="rating">
                                            @for ($i = 0; $i < $fullStar; $i++)
                                                <span class="fa fa-star text-warning"></span>
                                            @endfor
                                            @if ($halfStar >= 0.5)
                                                <span class="fa fa-star-half-alt text-warning"></span>
                                            @endif
                                        </div>
                                    </span>
                                    <span class="ms-auto fz-14">{{ $item->feedback }}</span>
                                </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
    <div class="container">
        <div
            class="row rounded-2  mt-5 title-heading-section sct-color pb-1 pt-1  border border-4 border-top-0 border-info ">
            <div class="col-6 d-flex position-relative ">
                <h6 class="bg-info  d-block position-absolute top-0 start-0 translate-middle text-white fs-5 rounded-top  pt-2 pb-2 pe-3 ps-3"
                    style="margin-left: 47px;">Iphone</h6>
                <h4 class="text-white" style="margin-left: 100px;">Bổi Bật</h4>
            </div>
            <div class="col-6">
                <div class="row">
                    <div class="col d-flex flex-wrap">
                        <div class="mx-1 pt-2 pb-2 flex-grow-1">
                            <span class="text-secondary button-hover ps-3 pe-3 pt-1 pb-1 rounded bg-white"><a
                                    href="#" class="text-color-hover fw-lighter">IP16 seris</a></span>
                        </div>
                        <div class="mx-1 pt-2 pb-2 flex-grow-1">
                            <span class="text-secondary ps-3 pe-3 pt-1 pb-1 rounded bg-white"><a href="#"
                                    class="text-color-hover fw-lighter">IP15 Promax</a></span>
                        </div>
                        <div class="mx-1 pt-2 pb-2 flex-grow-1">
                            <span class="text-secondary ps-3 pe-3 pt-1 pb-1 rounded bg-white"><a href="#"
                                    class="text-color-hover fw-lighter">IP14 seris</a></span>
                        </div>
                        <div class="mx-1 pt-2 pb-2 flex-grow-1">
                            <span class="text-secondary ps-3 pe-3 pt-1 pb-1 rounded bg-white"><a href="#"
                                    class="text-color-hover fw-lighter">IP13 Promax</a></span>
                        </div>
                        <div class="mx-1 pt-2 pb-2 flex-grow-1">
                            <span class="text-secondary ps-3 pe-3 pt-1 pb-1 rounded bg-white"><a href="#"
                                    class="text-color-hover fw-lighter">IP Khác</a></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-lg-2">
            @foreach ($iphones as $key => $item)
                <div class="col p-2">
                    <div class="card shadow">
                        <div class="head-card d-flex p-2">
                            <span
                                class="text-bg-danger rounded-end ps-2 pe-2 pt-1 fz-10 {{ $item->del == 0 ? 'hidden' : '' }}">{{ $item->del != 0 ? number_format((($item->del - $item->price) / $item->del) * 100, 1) . '%' : '' }}</span>
                            <span class="ms-auto"><i class="fa-regular fa-heart "></i></span>
                        </div>
                        <img src="/fontend/img/{{ $item->image }}" class="card-img-top object-fit-cover scale-hover"
                            alt="..." width="231" height="231">
                        <span
                            class="text-white ms-2 mt-4  ps-3 pe-3  rounded-pill position-absolute fz-14 top-50  start-0 translate-middle-y"
                            style="background-color: var(--subColor); ">{{ $item->hot == 1 ? 'Sản Phẩm Hot' : '' }}</span>

                        <div class="card-body p-2">
                            <h6 class="fw-light" style="height: 40px;"><a
                                    href="{{ route('product.detail', ['id' => $item->id]) }}"
                                    class="text-break w-100 text-hover fw-medium ">{{ $item->title }}</a></h5>
                                <div class="d-flex ">
                                    <span class="text-danger">{{ number_format($item->price, 0, ',', '.') }} VNĐ<br>
                                        <del
                                            class="text-secondary fz-14 text-decoration-line-through w-100 {{ $item->del == 0 ? 'hidden' : '' }}">{{ number_format($item->del, 0, ',', '.') }}
                                            VNĐ</del></span>
                                    <span class="ms-auto align-middle">
                                        <form action="{{ route('cart.store') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="product_id" value="{{ $item->id }}">
                                            <input type="hidden" name="price" value="{{ $item->price }}">
                                            <input type="hidden" name="quantity" value="1">
                                            <button type="submit" class="btn btn-link p-0">
                                                <i
                                                    class="fa-solid fa-cart-plus p-2 bg-info rounded text-white scale-hover"></i></button>
                                        </form>
                                    </span>
                                </div>
                                <p
                                    class="card-text mb-2 mt-2  bg-success p-0 rounded-pill fz-10 text-center text-white">
                                    Đã bán {{ $item->sold }} sản phẩm</p>
                                <p class="card-text bg-light p-0 rounded fz-10 text-center text-dark pt-1 pb-1 {{ $item->gift == '' ? 'hidden' : '' }}"
                                    style="height: 30px">{{ $item->gift }}
                                </p>
                                <div class="head-card d-flex p-0">
                                    @php
                                        $rating = $item->rate;
                                        $fullStar = floor($rating);
                                        $halfStar = $rating - $fullStar;
                                    @endphp
                                    <span class="fz-14 ">
                                        <div class="rating">
                                            @for ($i = 0; $i < $fullStar; $i++)
                                                <span class="fa fa-star text-warning"></span>
                                            @endfor
                                            @if ($halfStar >= 0.5)
                                                <span class="fa fa-star-half-alt text-warning"></span>
                                            @endif
                                        </div>
                                    </span>
                                    <span class="ms-auto fz-14">{{ $item->feedback }}</span>
                                </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="container">
        <div
            class="row rounded-2  mt-5 title-heading-section sct-color pb-1 pt-1  border border-4 border-top-0 border-info ">
            <div class="col-7 d-flex position-relative ">
                <h6 class="bg-info  d-block position-absolute top-0 start-0 translate-middle text-white fs-5 rounded-top  pt-2 pb-2 pe-3 ps-3"
                    style="margin-left: 58px;">SamSung</h6>
                <h4 class="text-white" style="margin-left: 125px;">Bổi Bật</h4>
            </div>
            <div class="col-5">
                <div class="row">
                    <div class="col d-flex flex-wrap">
                        <div class="mx-1 pt-2 pb-2 flex-grow-1">
                            <span class="text-secondary button-hover ps-3 pe-3 pt-1 pb-1 rounded bg-white"><a
                                    href="#" class="text-color-hover fw-lighter">Galaxy S seris</a></span>
                        </div>
                        <div class="mx-1 pt-2 pb-2 flex-grow-1">
                            <span class="text-secondary ps-3 pe-3 pt-1 pb-1 rounded bg-white"><a href="#"
                                    class="text-color-hover fw-lighter">Galaxy Note Seris</a></span>
                        </div>
                        <div class="mx-1 pt-2 pb-2 flex-grow-1">
                            <span class="text-secondary ps-3 pe-3 pt-1 pb-1 rounded bg-white"><a href="#"
                                    class="text-color-hover fw-lighter">IP14 seris</a></span>
                        </div>
                        <div class="mx-1 pt-2 pb-2 flex-grow-1">
                            <span class="text-secondary ps-3 pe-3 pt-1 pb-1 rounded bg-white"><a href="#"
                                    class="text-color-hover fw-lighter">Khác</a></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-lg-2">
            @foreach ($samsungs as $key => $item)
                <div class="col p-2">
                    <div class="card shadow">
                        <div class="head-card d-flex p-2">
                            <span
                                class="text-bg-danger rounded-end ps-2 pe-2 pt-1 fz-10 {{ $item->del == 0 ? 'hidden' : '' }}">{{ $item->del != 0 ? number_format((($item->del - $item->price) / $item->del) * 100, 1) . '%' : '' }}</span>
                            <span class="ms-auto"><i class="fa-regular fa-heart "></i></span>
                        </div>
                        <img src="/fontend/img/{{ $item->image }}" class="card-img-top object-fit-cover scale-hover"
                            alt="..." width="231" height="231">
                        <span
                            class="text-white ms-2 mt-4  ps-3 pe-3  rounded-pill position-absolute fz-14 top-50  start-0 translate-middle-y"
                            style="background-color: var(--subColor); ">{{ $item->hot == 1 ? 'Sản Phẩm Hot' : '' }}</span>

                        <div class="card-body p-2">
                            <h6 class="fw-light" style="height: 40px;"><a
                                    href="{{ route('product.detail', ['id' => $item->id]) }}"
                                    class="text-break w-100 text-hover fw-medium ">{{ $item->title }}</a></h5>
                                <div class="d-flex ">
                                    <span class="text-danger">{{ number_format($item->price, 0, ',', '.') }} VNĐ<br>
                                        <del
                                            class="text-secondary fz-14 text-decoration-line-through w-100 {{ $item->del == 0 ? 'hidden' : '' }}">{{ number_format($item->del, 0, ',', '.') }}
                                            VNĐ</del></span>
                                    <span class="ms-auto align-middle">
                                        <form action="{{ route('cart.store') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="product_id" value="{{ $item->id }}">
                                            <input type="hidden" name="price" value="{{ $item->price }}">
                                            <input type="hidden" name="quantity" value="1">
                                            <button type="submit" class="btn btn-link p-0"><i
                                                    class="fa-solid fa-cart-plus p-2 bg-info rounded text-white scale-hover"></i></button>
                                        </form>
                                    </span>
                                </div>
                                <p
                                    class="card-text mb-2 mt-2  bg-success p-0 rounded-pill fz-10 text-center text-white">
                                    Đã bán {{ $item->sold }} sản phẩm</p>
                                <p class="card-text bg-light p-0 rounded fz-10 text-center text-dark pt-1 pb-1 {{ $item->gift == '' ? 'hidden' : '' }}"
                                    style="height: 30px">{{ $item->gift }}
                                </p>
                                <div class="head-card d-flex p-0">
                                    @php
                                        $rating = $item->rate;
                                        $fullStar = floor($rating);
                                        $halfStar = $rating - $fullStar;
                                    @endphp
                                    <span class="fz-14 ">
                                        <div class="rating">
                                            @for ($i = 0; $i < $fullStar; $i++)
                                                <span class="fa fa-star text-warning"></span>
                                            @endfor
                                            @if ($halfStar >= 0.5)
                                                <span class="fa fa-star-half-alt text-warning"></span>
                                            @endif
                                        </div>
                                    </span>
                                    <span class="ms-auto fz-14">{{ $item->feedback }}</span>
                                </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>

        <div class="row mt-4 mb-4">
            <div class="col-4">
                <img src="/fontend/img/img_3banner_1.webp" class="rounded-2 w-100 scale-hover" style="height: 160px;"
                    alt="">
            </div>
            <div class="col-4">
                <img src="/fontend/img/img_3banner_2.webp" class="rounded-2 w-100 scale-hover" style="height: 160px;"
                    alt="">
            </div>
            <div class="col-4">
                <img src="/fontend/img/img_3banner_3.webp" class="rounded-2 w-100 scale-hover" style="height: 160px;"
                    alt="">
            </div>
        </div>
    </div>
    <div class="container">
        <div
            class="row rounded-2  mt-5 title-heading-section sct-color pb-1 pt-1  border border-4 border-top-0 border-info ">
            <div class="col-8 d-flex position-relative ">
                <h6 class="bg-info  d-block position-absolute top-0 start-0 translate-middle text-white fs-5 rounded-top  pt-2 pb-2 pe-3 ps-3"
                    style="margin-left: 47px;">Xiaomi</h6>
                <h4 class="text-white" style="margin-left: 100px;">Bổi Bật</h4>
            </div>
            <div class="col-4">
                <div class="row">
                    <div class="col d-flex flex-wrap">
                        <div class="mx-1 pt-2 pb-2 flex-grow-1">
                            <span class="text-secondary button-hover ps-3 pe-3 pt-1 pb-1 rounded bg-white"><a
                                    href="#" class="text-color-hover fw-lighter">Redmi K seris</a></span>
                        </div>
                        <div class="mx-1 pt-2 pb-2 flex-grow-1">
                            <span class="text-secondary ps-3 pe-3 pt-1 pb-1 rounded bg-white"><a href="#"
                                    class="text-color-hover fw-lighter">Redmi Note Seris</a></span>
                        </div>
                        <div class="mx-1 pt-2 pb-2 flex-grow-1">
                            <span class="text-secondary ps-3 pe-3 pt-1 pb-1 rounded bg-white"><a href="#"
                                    class="text-color-hover fw-lighter">Mi Seris</a></span>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-lg-2">
            @foreach ($xiaomis as $key => $item)
                <div class="col p-2">
                    <div class="card shadow">
                        <div class="head-card d-flex p-2">
                            <span
                                class="text-bg-danger rounded-end ps-2 pe-2 pt-1 fz-10 {{ $item->del == 0 ? 'hidden' : '' }}">{{ $item->del != 0 ? number_format((($item->del - $item->price) / $item->del) * 100, 1) . '%' : '' }}</span>
                            <span class="ms-auto"><i class="fa-regular fa-heart "></i></span>
                        </div>
                        <img src="/fontend/img/{{ $item->image }}" class="card-img-top object-fit-cover scale-hover"
                            alt="..." width="231" height="231">
                        <span
                            class="text-white ms-2 mt-4  ps-3 pe-3  rounded-pill position-absolute fz-14 top-50  start-0 translate-middle-y"
                            style="background-color: var(--subColor); ">{{ $item->hot == 1 ? 'Sản Phẩm Hot' : '' }}</span>

                        <div class="card-body p-2">
                            <h6 class="fw-light" style="height: 40px;"><a
                                    href="{{ route('product.detail', ['id' => $item->id]) }}"
                                    class="text-break w-100 text-hover fw-medium ">{{ $item->title }}</a></h5>
                                <div class="d-flex ">
                                    <span class="text-danger">{{ number_format($item->price, 0, ',', '.') }} VNĐ<br>
                                        <del
                                            class="text-secondary fz-14 text-decoration-line-through w-100 {{ $item->del == 0 ? 'hidden' : '' }}">{{ number_format($item->del, 0, ',', '.') }}
                                            VNĐ</del></span>
                                    <span class="ms-auto align-middle">
                                        <form action="{{ route('cart.store') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="product_id" value="{{ $item->id }}">
                                            <input type="hidden" name="price" value="{{ $item->price }}">
                                            <input type="hidden" name="quantity" value="1">
                                            <button type="submit" class="btn btn-link p-0"><i
                                                    class="fa-solid fa-cart-plus p-2 bg-info rounded text-white scale-hover"></i></button>
                                        </form>
                                    </span>
                                </div>
                                <p
                                    class="card-text mb-2 mt-2  bg-success p-0 rounded-pill fz-10 text-center text-white">
                                    Đã bán {{ $item->sold }} sản phẩm</p>
                                <p class="card-text bg-light p-0 rounded fz-10 text-center text-dark pt-1 pb-1 {{ $item->gift == '' ? 'hidden' : '' }}"
                                    style="height: 30px">{{ $item->gift }}
                                </p>
                                <div class="head-card d-flex p-0">
                                    @php
                                        $rating = $item->rate;
                                        $fullStar = floor($rating);
                                        $halfStar = $rating - $fullStar;
                                    @endphp
                                    <span class="fz-14 ">
                                        <div class="rating">
                                            @for ($i = 0; $i < $fullStar; $i++)
                                                <span class="fa fa-star text-warning"></span>
                                            @endfor
                                            @if ($halfStar >= 0.5)
                                                <span class="fa fa-star-half-alt text-warning"></span>
                                            @endif
                                        </div>
                                    </span>
                                    <span class="ms-auto fz-14">{{ $item->feedback }}</span>
                                </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="container">
        <div
            class="row rounded-2  mt-5 title-heading-section sct-color pb-1 pt-1  border border-4 border-top-0 border-info ">
            <div class="col-9 d-flex position-relative ">
                <h6 class="bg-info  d-block position-absolute top-0 start-0 translate-middle text-white fs-5 rounded-top  pt-2 pb-2 pe-3 ps-3"
                    style="margin-left: 55px;">Phụ Kiện</h6>
                <h4 class="text-white" style="margin-left: 118px;">Bổi Bật</h4>
            </div>
            <div class="col-3">
                <div class="row">
                    <div class="col d-flex flex-wrap">
                        <div class="mx-1 pt-2 pb-2 flex-grow-1">
                            <span class="text-secondary button-hover ps-3 pe-3 pt-1 pb-1 rounded bg-white"><a
                                    href="#" class="text-color-hover fw-lighter">Tai nghe</a></span>
                        </div>
                        <div class="mx-1 pt-2 pb-2 flex-grow-1">
                            <span class="text-secondary ps-3 pe-3 pt-1 pb-1 rounded bg-white"><a href="#"
                                    class="text-color-hover fw-lighter">Ốp lưng</a></span>
                        </div>
                        <div class="mx-1 pt-2 pb-2 flex-grow-1">
                            <span class="text-secondary ps-3 pe-3 pt-1 pb-1 rounded bg-white"><a href="#"
                                    class="text-color-hover fw-lighter"> khác</a></span>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-lg-2">
            @foreach ($accessories as $key => $item)
                <div class="col p-2">
                    <div class="card shadow">
                        <div class="head-card d-flex p-2">
                            <span
                                class="text-bg-danger rounded-end ps-2 pe-2 pt-1 fz-10 {{ $item->del == 0 ? 'hidden' : '' }}">{{ $item->del != 0 ? number_format((($item->del - $item->price) / $item->del) * 100, 1) . '%' : '' }}</span>
                            <span class="ms-auto"><i class="fa-regular fa-heart "></i></span>
                        </div>
                        <img src="/fontend/img/{{ $item->image }}" class="card-img-top object-fit-cover scale-hover"
                            alt="..." width="231" height="231">
                        <span
                            class="text-white ms-2 mt-4  ps-3 pe-3  rounded-pill position-absolute fz-14 top-50  start-0 translate-middle-y"
                            style="background-color: var(--subColor); ">{{ $item->hot == 1 ? 'Sản Phẩm Hot' : '' }}</span>

                        <div class="card-body p-2">
                            <h6 class="fw-light" style="height: 40px;"><a
                                    href="{{ route('product.detail', ['id' => $item->id]) }}"
                                    class="text-break w-100 text-hover fw-medium">{{ $item->title }}</a></h5>
                                <div class="d-flex ">
                                    <span class="text-danger">{{ number_format($item->price, 0, ',', '.') }} VNĐ<br>
                                        <del
                                            class="text-secondary fz-14 text-decoration-line-through w-100 {{ $item->del == 0 ? 'hidden' : '' }}">{{ number_format($item->del, 0, ',', '.') }}
                                            VNĐ</del></span>
                                    <span class="ms-auto align-middle">
                                        <form action="{{ route('cart.store') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="product_id" value="{{ $item->id }}">
                                            <input type="hidden" name="price" value="{{ $item->price }}">
                                            <input type="hidden" name="quantity" value="1">
                                            <button type="submit" class="btn btn-link p-0"><i
                                                    class="fa-solid fa-cart-plus p-2 bg-info rounded text-white scale-hover"></i></button>
                                        </form>
                                    </span>
                                </div>
                                <p
                                    class="card-text mb-2 mt-2  bg-success p-0 rounded-pill fz-10 text-center text-white">
                                    Đã bán {{ $item->sold }} sản phẩm</p>
                                <p class="card-text bg-light p-0 rounded fz-10 text-center text-dark pt-1 pb-1 {{ $item->gift == '' ? 'hidden' : '' }} "
                                    style="height: 30px">{{ $item->gift }}
                                </p>
                                <div class="head-card d-flex p-0">
                                    @php
                                        $rating = $item->rate;
                                        $fullStar = floor($rating);
                                        $halfStar = $rating - $fullStar;
                                    @endphp
                                    <span class="fz-14 ">
                                        <div class="rating">
                                            @for ($i = 0; $i < $fullStar; $i++)
                                                <span class="fa fa-star text-warning"></span>
                                            @endfor
                                            @if ($halfStar >= 0.5)
                                                <span class="fa fa-star-half-alt text-warning"></span>
                                            @endif
                                        </div>
                                    </span>
                                    <span class="ms-auto fz-14">{{ $item->feedback }}</span>
                                </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="d-flex justify-content-center mt-3 mb-5">
            <button type="button" class="btn btn-primary"><a href="#!product"
                    class="fw-medium text-white ps-3 pe-3">Xem Thêm</a>
            </button>
        </div>
    </div>
    <div class="container text-center mt-5">
        <h4>#TrungBeanMobile</h4>
        <span><a href="#">Hãy theo dõi chúng tôi để nhận những đãi sớm nhất. </a>
            <hr class="text-info border-4 ">
        </span>
        <div class="row">
            <div class="col p-0 p-0">
                <img src="/fontend/img/image_ins_1.webp" class="rounded-3" style="width: 220px; height: 220px;"
                    alt="">
            </div>
            <div class="col p-0">
                <img src="/fontend/img/image_ins_2.webp" class="rounded-3" style="width: 220px; height: 220px;"
                    alt="">
            </div>
            <div class="col p-0">
                <img src="/fontend/img/image_ins_3.webp" class="rounded-3" style="width: 220px; height: 220px;"
                    alt="">
            </div>
            <div class="col p-0">
                <img src="/fontend/img/image_ins_4.webp" class="rounded-3" style="width: 220px; height: 220px;"
                    alt="">
            </div>
            <div class="col p-0">
                <img src="/fontend/img/image_ins_5.webp" class="rounded-3" style="width: 220px; height: 220px;"
                    alt="">
            </div>
        </div>
    </div>
    <div class="row sct2-color pt-5 pb-5 mt-5">
        <div class="col-6 text-center  pe-0 ">
            <img src="/fontend/img/img_event.webp" class="" alt="">
        </div>
        <div class="col-6">
            <h1 class="fs-1 fw-bolder mb-4">Sự Kiện Mua Sắm Của Bean</h1>
            <span class="fs-5  ">
                Hãy nhanh tay và nhận giảm giá cho tất cả các thiết bị Apple lên tới 20%
            </span>

            <span class="d-flex mt-4">
                <p class="p-1 m-2 mb-2 text-bg-info text-white p-3 text-center rounded fw-bold" style="width: 80px;">
                    05
                    <br> Ngày
                </p>
                <p class="p-1 m-2 mb-2 text-bg-info text-white p-3 text-center rounded fw-bold" style="width: 80px;">
                    00
                    <br> Giờ
                </p>
                <p class="p-1 m-2 mb-2 text-bg-info text-white p-3 text-center rounded fw-bold" style="width: 80px;">
                    00<br> Phút
                </p>
                <p class="p-1 m-2 mb-2 text-bg-info text-white p-3 text-center rounded fw-bold" style="width: 80px;">
                    00<br> Giây
                </p>
            </span>
            <div class="btn btn-primary button-hover outline-none mt-5">
                <a href="/product" class="text-white ">Mua Săm Ngay</a>
            </div>
        </div>
        <div class="row  mt-3">
            @foreach ($productPriceLow as $key => $item)
                <div class="col d-flex bg-light rounded ms-4" style="width: 264px">
                    <a href="{{ route('product.detail', ['id' => $item->id]) }}" class="pt-1 pb-1">
                        <div class="col-6" style="width: 70px;">
                            <img src="/fontend/img/{{ $item->image }}" style="width: 70px;" alt="">
                        </div>
                        <div class="col-6">
                            <div class="text-break fz-10 mt-1" style="height: 15px;"><a
                                    href="{{ route('product.detail', ['id' => $item->id]) }}">{{ $item->title }}</a>
                            </div>
                            <br>
                            <div class="d-flex" style="width: 140px">
                                <span class="d-flex text-danger fz-10 w-100"
                                    style="margin-top: 2px;">{{ number_format($item->price, 0, ',', '.') }} VND</span>
                                <span
                                    class="ms-2 align-middle fz-10 text-decoration-line-through w-100 {{ $item->del == 0 ? 'hidden' : '' }}"
                                    style="margin-top: 2px;">{{ number_format($item->del, 0, ',', '.') . 'VND' }}</span>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
    <div class="container mt-5 mb-5">
        <div class="row">
            @foreach ($posts as $key => $item)
                <div class="col-4 rounded  bg-light overflow-hidden">
                    <div class="img">
                        <a href="{{ route('post.detail', ['id' => $item->id]) }}">
                            <img src="/fontend/img/{{ $item->image }}" width="400" alt=""
                                height="250" class="rounded-top scale-hover object-fit-cover">
                        </a>
                    </div>
                    <div class="title" style="height: 40px; width: 92%">
                        <h5 style="font-size: 18px; " class="mt-3 mb-3 text-hover">
                            <a href="{{ route('post.detail', ['id' => $item->id]) }}"
                                class="text-hover text-dark custom-text">{!! $item->title !!}</a>
                        </h5>
                    </div>
                    <div class="author-day fz-14  text-secondary ">
                        <span class=" ">Tác Giả: <strong
                                class="text-success">{{ $item->userName }}</strong></span>
                        <span class="ms-5">{{ $item->date_submit }}</span>
                    </div>
                    <div class="content w-100 mt-3 " style="height: 40px;">
                        <div class="text-truncate">
                            <p><a href="{{ route('post.detail', ['id' => $item->id]) }}" class="custom-text "
                                    style="width: 92%">{!! $item->description !!}</a></p>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="col-4 rounded  bg-light overflow-hidden " style="width: 400px;">
                <h3>Tin Nổi Bật</h3>
                @foreach ($postSubs as $key => $item)
                    <div class="row">
                        <div class="title mt-3 text-truncate" style="height: 30px;">
                            <h6 class="text-hover"><a href="{{ route('post.detail', ['id' => $item->id]) }}"
                                    class="custom-text">{!! $item->title !!}</a></h6>
                        </div>
                        <div class="author-day fz-14 text-secondary ">
                            <span class=" ">Tác Giả: <strong
                                    class="text-success">{{ $item->userName }}</strong></span>
                            <span class="ms-5">{{ $item->date_submit }}</span>
                        </div>
                        <div class="content w-100 mt-2" style="height: 40px;">
                            <div class="text-truncate fz-14">
                                <p><a href="{{ route('post.detail', ['id' => $item->id]) }}"
                                        class="custom-text m-0">{!! $item->description !!}</a></p>
                            </div>
                            <div class="text-success border-3">
                                <hr>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@if (session('success'))
    <script>
        swal({
            title: "Thành công!",
            text: "{{ session('success') }}",
            icon: "success",
            buttons: {
                viewCart: {
                    text: "Giỏ hàng",
                    value: "viewCart",
                },
                ok: "OK",
            },
        }).then((value) => {
            switch (value) {
                case "ok":
                    break;
                case "viewCart":
                    window.location.href = "{{ route('cart.index') }}";
                    break;
                default:
                    break;
            }
        });
    </script>
@endif
