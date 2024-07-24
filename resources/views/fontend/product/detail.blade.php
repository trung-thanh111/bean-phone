<div class="bg-light ">
    <div class="row ms-3  pt-3">
        <nav aria-label="breadcrumb ">
            <ol class="breadcrumb container">
                <li class="breadcrumb-item"><a href="/">Trang Chủ</a></li>
                <li class="breadcrumb-item"><a href="/product">Sản Phẩm</a></li>
                <li class="breadcrumb-item active fw-bold" aria-current="page">Chi Tiết</li>
            </ol>
        </nav>

    </div>
</div>
</div>
<div class="container mb-5 mt-5 ">
    <div class="row ">
        <div class="col-md-9">
            <div class="row">
                <div class="col-5">
                    <div class="position-relative">
                        <div id="subimage-products" class="carousel slide">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="/fontend/img/{{ $product->image }}" class="d-block w-100" alt="...">
                                </div>
                                <div class="">
                                    @foreach ($albumSubs as $key => $item)
                                        <div class="carousel-item ">
                                            <img src="/upload/product/{{ $item }}" class=" d-block w-100"
                                                alt="...">
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#subimage-products"
                                data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#subimage-products"
                                data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                        <div class="row {{ count($albumSubs) == 0 ? 'text-start' : 'justify-content-md-around' }}">
                            @php
                                $i = 1;
                            @endphp
                            <div class="col-md-auto p-0 ms-1 me-1 mt-3">
                                <img data-bs-target="#subimage-products" data-bs-slide-to="0"
                                    src="/fontend/img/{{ $product->image }}" width="90" height="90"
                                    alt="">
                            </div>
                            @foreach ($albumSubs as $key => $item)
                                <div class="col-md-auto p-0 ms-1 me-1 mt-3">
                                    <img data-bs-target="#subimage-products" data-bs-slide-to="{{ $i++ }}"
                                        src="/upload/product/{{ $item }}" class="d-block w-100"
                                        alt="sub image product" width="90" height="90">
                                </div>
                            @endforeach
                        </div>
                        <span
                            class="fz-14 position-absolute top-0 start-0 ms-2 mt-2 btn btn-danger rounded-pill ps-3 pe-3 pt-1 pb-1 {{ $product->del == 0 ? 'hidden' : '' }}">
                            {{ $product->del != 0 ? number_format((($product->del - $product->price) / $product->del) * 100, 1) . '%' : '' }}
                        </span>
                        <span>
                            <i class="fa fa-heart position-absolute top-0 end-0 me-4 mt-2 fs-4 text-danger"></i>
                        </span>
                    </div>
                </div>
                <div class="col-7">
                    <h4 class="mb-3">{{ $product->title }}</h4>
                    <div class="d-flex ">
                        <span class="fz-14 text-secondary">
                            Đã bán: {{ $product->sold }} sản phẩm
                        </span>
                        <span class=" ms-5 mb-3 fz-14 text-secondary">
                            @php
                                $rating = $product->rate;
                                $fullStar = floor($rating);
                                $halfStar = $rating - $fullStar;
                            @endphp
                            <div class="rating">
                                @for ($i = 0; $i < $fullStar; $i++)
                                    <span class="fa fa-star text-warning"></span>
                                @endfor
                                @if ($halfStar >= 0.5)
                                    <span class="fa fa-star-half-alt text-warning"></span>
                                @endif
                            </div>
                        </span>
                        <span class="fz-14 text-secondary ms-3">
                            Đánh giá: {{ $product->feedback }}
                        </span>
                    </div>
                    <h4 class="mb-2">Giá Bán: <strong class="text-danger ">
                            {{ number_format($product->price, 0, ',', '.') }}VNĐ</strong></h4>
                    <div class="d-flex mb-3 mt-2 ">
                        <span class="fz-14 text-secondary">
                            <span class="fw-medium me-2">Giá thị trường: </span>
                            <del>{{ number_format($product->del, 0, ',', '.') }} VNĐ</del>
                        </span>
                        <span class=" ms-5 fz-14 text-secondary {{ $product->del == 0 ? 'hidden' : '' }}">
                            Tiết Kiệm: <strong
                                class="text-danger fw-light">{{ number_format($product->del - $product->price, 0, ',', '.') }}
                                VNĐ</strong> so với giá thị
                            trường
                        </span>
                    </div>
                    <h5 class=" mb-2 fs-6 bg-body-secondary p-2 mb-2">Quà Tặng Khuyến Mãi</h5>
                    <div class="d-flex ">
                        <span class="fz-14 text-secondary">
                            <div class="form-check mb-2  ms-2 table-bordered">
                                <label class="form-check-label2 link-underline-secondary ms-0" for="flexCheckDefault">
                                    <i
                                        class="fa-solid fa-gift fs-6 text-secondary me-2"></i>{{ $product->gift != null ? $product->gift : 'Tiếc quá sản phẩm này không có quà tặng rồi!' }}
                                </label>
                            </div>
                        </span>
                    </div>
                    <div class="d-flex mt-2">
                        <h5 class="fs-6 mb-0 fs-6">Màu Sắc: </h5>
                        <span class="fs-6  text-secondary">
                            <div class="ms-4">
                                <label class="form-check-label2" for="flexCheckDefault">
                                    <strong>{{ $product->color }}</strong>
                                </label>
                            </div>
                        </span>
                    </div>
                    <h5 class=" mb-2 fs-6 mt-3">Số Lượng: </h5>
                    <div class="quantity mt-3 mb-5">
                        <button class="minus" aria-label="Decrease">&minus;</button>
                        <input type="number" class="input-box" value="1" min="1"
                            max="{{ $product->sold }}">
                        <button class="plus" aria-label="Increase">&plus;</button>
                    </div>
                    <div class="mb-3 w-100 m">
                        <a href="" type="submit" class="btn w-100 btn-primary fs-6 fw-bold"><i
                                class="fa-solid fa-cart-shopping me-2 "></i>Mua Ngay <br>
                            <span class="fz-12 fw-medium"> Giao hàng tận nơi hoặc nhận tại cửa hàng</span></a>
                        <div class="row w-100 mt-2 ms-0">
                            <div class="col p-0 w-100 ">
                                <form action="{{ route('cart.store') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                    <input type="hidden" name="price" value="{{ $product->price }}">
                                    <input type="hidden" name="quantity" value="1">
                                    <button type="submit"
                                        class="btn btn-outline-primary w-100 fw-bold d-flex justify-content-center align-items-center"
                                        type="submit" style="height: 61px;">Thêm Vào
                                        Giỏ Hàng </button>
                                </form>
                            </div>
                            <div class="col p-0 ms-2">
                                <a href="#"><button class="btn btn-outline-primary w-100 fw-bold">Mua Trả Góp
                                        <br class="p-1">
                                        <span class="fz-10">Duyệt hồ sơ nhanh </span></button></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="list-group border ">
                <button type="button" class="list-group-item list-group-item-action fw-bold bg-title-cl text-white"
                    aria-current="true">
                    Chính Sách Của Chúng Tôi
                </button>
                <div class="fz-14 p-3">
                    <div class="form-check mb-1 mt-1">
                        <label class="form-check-label" for="flexCheckDefault">
                            <i class="fa-solid fa-truck-fast  text-secondary me-2"></i> Miễn phí vận chuyển tại
                            Tp.HCM
                        </label>
                    </div>
                    <hr>
                    <div class="form-check mb-1 mt-1">
                        <label class="form-check-label" for="">
                            <i class="fa-solid fa-shield text-secondary me-3"></i> Bảo hành chính hãng toàn quốc
                        </label>
                    </div>
                    <hr>
                    <div class="form-check mb-1 mt-1">
                        <label class="form-check-label" for="">
                            <i class="fa-regular fa-handshake text-secondary me-2"></i> Cam kết chính hàng 100%
                        </label>
                    </div>
                    <hr>
                    <div class="form-check mt-2">
                        <label class="form-check-label  me-2" for="">
                            <i class="fa-solid fa-box me-3 text-secondary"></i> 1 đổi 1 nếu sản phẩm lỗi
                        </label>
                    </div>

                </div>
            </div>
            <div class="list-group border mt-3">
                <button type="button" class="list-group-item list-group-item-action fw-bold bg-title-cl text-white"
                    aria-current="true">
                    Có Thể Bạn Thích
                </button>
                <div class="fz-14 p-3 ">
                    @foreach ($productYourLikes as $key => $item)
                        <div class="mb-1 mt-1 row d-flex">
                            <div class="col-3">
                                <img src="/fontend/img/{{ $item->image }}" alt=""
                                    class="object-fit-cover rounded-2" width="60px" height="70px">
                            </div>
                            <div class="col-9 justify-content-center align-items-center">
                                <div class="mb-2">
                                    <span class="fz-14 ">
                                        <a href="{{ route('product.detail', ['id' => $item->id]) }}">
                                            {{ $item->title }}
                                        </a>
                                    </span>
                                </div>
                                <div>
                                    <span class="fz-14 text-danger">
                                        {{ number_format($item->price, 0, ',', '.') . 'VNĐ' }}
                                    </span>
                                    <span class="fz-12 ms-2 text-decoration-line-through">
                                        {{ number_format($item->del, 0, ',', '.') . 'VNĐ' }}
                                    </span>
                                </div>
                            </div>
                        </div>
                        <hr>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active border-0" id="home-tab" data-bs-toggle="tab"
                    data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane"
                    aria-selected="true">Mô Tả Sản Phẩm</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link border-0" id="profile-tab" data-bs-toggle="tab"
                    data-bs-target="#profile-tab-pane" type="button" role="tab"
                    aria-controls="profile-tab-pane" aria-selected="false">Chính Sách Đổi Trả</button>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active fz-14 product-description" id="home-tab-pane" role="tabpanel"
                aria-labelledby="home-tab" tabindex="0">
                {!! $product->description !!}
            </div>
            <div class="tab-pane fade fz-14" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab"
                tabindex="0">
                + Sản phẩm lỗi, hỏng do quá trình sản xuất hoặc vận chuyện
                <br>
                + Nằm trong chính sách đổi trả sản phẩm của Bean
                <br>
                + Sản phẩm còn nguyên tem mác không bị rớt vỡ, vô nước
                <br>
                + Thời gian đổi trả nhỏ hơn 15 ngày kể từ ngày nhận hàng
                <br>
                + Chi phí bảo hành về sản phẩm, vận chuyển khách hàng chịu chi phí
                <br>
                <br><strong>Điều kiện đổi trả hàng</strong> <br>
                Điều kiện về thời gian đổi trả: trong vòng 07 ngày kể từ khi nhận được hàng và phải liên hệ gọi ngay
                cho chúng tôi theo số điện thoại trên để được xác nhận đổi trả hàng. <br> <br>
                <strong>Điều kiện đổi trả hàng</strong>: <br>

                - Sản phẩm gửi lại phải còn nguyên đai nguyên kiện
                <br>
                - Phiếu bảo hành (nếu có) và tem của công ty trên sản phẩm còn nguyên vẹn.
                <br>
                - Sản phẩm đổi/ trả phải còn đầy đủ hộp, giấy hướng dẫn sử dụng và không bị trầy xước, bể.
                <br>
                - Quý khách chịu chi phí vận chuyển, đóng gói, thu hộ tiền, chi phí liên lạc tối đa tương đương 10%
                <br> giá trị đơn hàng. <br>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <h1 class="mb-3 mt-5 fz-18 fw-bold text-uppercase">Đánh gía sản phẩm</h1>
        </div>
        <div class="col-md-6">
            <h5 class="mb-3 mt-5 fz-18 fw-bold text-uppercase">Đánh giá của khách hàng</h5>
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-md-6">
            <form class="row g-3" action="{{ route('product.comment', ['id' => $product->id]) }}" method="POST">
                @csrf
                <div class="rateing">
                    <label for="" class="form-label text-info fw-medium fz-14">Đánh Giá:* </label>
                    <span class="fa fa-star text-secondary"></span>
                    <span class="fa fa-star text-secondary"></span>
                    <span class="fa fa-star text-secondary"></span>
                    <span class="fa fa-star text-secondary"></span>
                    <span class="fa fa-star text-secondary"></span>
                </div>
                <div class="">
                    <label for="" class="form-label text-info fw-medium">
                        Nội dung:*
                    </label>
                    <textarea class="form-control pt-2 pb-2 rounded-1" placeholder="Nội dung bình luận" rows="8" name="content"></textarea>
                </div>
                <div class="col-12 mt-4 text-end">
                    <button type="submit" class="btn btn-info text-light fw-medium ps-4 pe-4 rounded-1">Xác
                        nhận</button>
                </div>
            </form>
        </div>
        <div class="col-md-6">
            @foreach ($commentHots as $key => $item)
                <div class="fz-14 d-flex ms-3 mt-3 position-relative mb-2">
                    <img src="/fontend/img/{{ $item->user->image == null ? 'avt-conan.jpg' : $item->user->image }}"
                        class="rounded-circle" style="width: 60px; height: 60px;" alt="">
                    <div class="ms-3">
                        <span class="fs-6 d-flex mb-2">
                            <h6 class="me-5 mb-0">{{ $item->user->name }}</h6>
                            <span class="fz-14">| Đánh Giá:
                                @php
                                    $rating = $item->rating;
                                    $fullStar = floor($rating);
                                    $halfStar = $rating - $fullStar;
                                @endphp
                                @for ($i = 0; $i < $fullStar; $i++)
                                    <span class="fa fa-star text-warning"></span>
                                @endfor
                                @if ($halfStar >= 0.5)
                                    <span class="fa fa-star-half-alt text-warning"></span>
                                @endif
                            </span>
                        </span>
                        <p class="text-dark mb-1 fw-medium fst-italic">{{ $item->content }}</p>
                        <span>
                            <div class="fz-10 text-primary">
                                <i class="fa-regular fa-clock fz-10"></i>
                                <span>Thời gian: {{ \Carbon\Carbon::parse($item->created_at)->format('h:i:sa d-m-Y') }}
                                </span>
                            </div>
                        </span>
                    </div>
                </div>
                <hr>
            @endforeach
        </div>
    </div>
    <div class="mt-5 mb-5 col-md-7">
        <h6 class="">Đánh giá sản phẩm ({{ $product->comment->count() }})</h6>
        @foreach ($product->comment as $key => $item)
            <div class="fz-14 d-flex ms-3 mt-3 position-relative">
                <img src="/fontend/img/{{ !$item->user->image ? 'avt-conan.jpg' : $item->user->image }}"
                    class="rounded-circle" style="width: 60px; height: 60px;" alt="">
                <div class="ms-3">
                    <span class="fs-6">
                        <h6>{{ $item->user->name }}</h6>
                    </span>
                    <span>
                        <div class="fz-10 mb-2 text-primary">
                            <i class="fa-regular fa-clock fz-10 "></i>
                            <Span>Thời gian: {{ \Carbon\Carbon::parse($item->created_at)->format('h:i:sa d-m-Y') }}</Span>
                        </div>
                    </span>
                    <p class="text-dark fw-medium fst-italic">{{ $item->content }}</p>
                </div>
                @if (Auth::id() == $item->user_id)
                    <div class="text-end position-absolute end-0">
                        <form method="POST" action="{{ route('comment.destroy', $item->id) }}" class="delete-form">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <button type="button"
                                class="btn btn-outline-danger border-0 btn-delete-comment">Xóa</button>
                        </form>
                    </div>
                @endif
            </div>
        @endforeach
        <div class="text-center ">
            <div class="btn btn-outline-info text-secondary">Xem Thêm</div>
        </div>
    </div>
    <div class="row mb-5">
        <h2 class="fs-4 mb-3 fw-bold text-warning">CÓ THỂ BẠN THÍCH</h2>
        @foreach ($productRelates as $key => $item)
            <div class="col p-0">
                <div class="card shadow">
                    <div class="head-card d-flex p-2">
                        <span
                            class="text-bg-danger rounded-end ps-2 pe-2 pt-1 fz-10 {{ $item->del == 0 ? 'hidden' : '' }}">{{ $item->del != 0 ? number_format((($item->del - $item->price) / $item->del) * 100, 1) . '%' : '' }}</span>
                        <span class="ms-auto"><i class="fa-regular fa-heart "></i></span>
                    </div>
                    <img src="/fontend/img/{{ $item->image }}" class="card-img-top scale-hover object-fit-cover"
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
                                    <del class="text-secondary fz-14">{{ number_format($item->del, 0, ',', '.') }}
                                        VNĐ</del></span>
                                <span class="ms-auto align-middle"><a type="submit"><i
                                            class="fa-solid fa-cart-plus p-2 bg-info rounded text-white scale-hover"></i></a></span>
                            </div>
                            <p class="card-text mb-2 mt-2  bg-success p-0 rounded-pill fz-10 text-center text-white">
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
        <h2 class="fs-4 mb-3 mt-4 fw-bold text-warning">SẢN PHẨM LIÊN QUAN</h2>
        @foreach ($productYourLikeMains as $key => $item)
            <div class="col p-0">
                <div class="card shadow">
                    <div class="head-card d-flex p-2">
                        <span
                            class="text-bg-danger rounded-end ps-2 pe-2 pt-1 fz-10 {{ $item->del == 0 ? 'hidden' : '' }}">{{ $item->del != 0 ? number_format((($item->del - $item->price) / $item->del) * 100, 1) . '%' : '' }}</span>
                        <span class="ms-auto"><i class="fa-regular fa-heart "></i></span>
                    </div>
                    <img src="/fontend/img/{{ $item->image }}" class="card-img-top scale-hover object-fit-cover"
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
                                    <del class="text-secondary fz-14">{{ number_format($item->del, 0, ',', '.') }}
                                        VNĐ</del></span>
                                <span class="ms-auto align-middle"><a type="submit"><i
                                            class="fa-solid fa-cart-plus p-2 bg-info rounded text-white scale-hover"></i></a></span>
                            </div>
                            <p class="card-text mb-2 mt-2  bg-success p-0 rounded-pill fz-10 text-center text-white">
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
<script>
    $(document).ready(function() {
        $('.btn-delete-comment').click(function() {
            var form = $(this).closest('form');

            swal({
                title: "Xác nhận",
                text: "Bạn có muốn xóa bình luận của bạn không?",
                icon: "warning",
                buttons: {
                    cancel: {
                        text: "Hủy",
                        value: false,
                        visible: true,
                        className: "",
                        closeModal: true,
                    },
                    confirm: {
                        text: "Xóa",
                        value: true,
                        visible: true,
                        className: "",
                        closeModal: true
                    }
                },
                dangerMode: true,
            }).then((isConfirm) => {
                if (isConfirm) {
                    form.submit();
                }
            });
        });

        @if (session('success'))
            swal({
                title: "Thành công!",
                text: "{{ session('success') }}",
                icon: "success",
                button: "OK",
            });
        @endif

        @if (session('error'))
            swal({
                title: "Lỗi!",
                text: "{{ session('error') }}",
                icon: "error",
                button: "OK",
            });
        @endif
    });
</script>
